<?php

namespace Sistema\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\UserBundle\Entity\User;
use Sistema\UserBundle\Form\UserType;
use Sistema\UserBundle\Form\UserFilterType;

/**
 * User controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/superadmin/user")
 */
class UserController extends Controller {

    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/UserBundle/Resources/config/User.yml',
    );

    /**
     * Create query.
     * @param string $repository
     * @return Doctrine\ORM\QueryBuilder $queryBuilder
     */
    protected function createQuery($repository)
    {
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository($repository)
            ->createQueryBuilder('a')
            ->select('a, ur')
            ->leftJoin('a.user_roles', 'ur')
            ->orderBy('a.id', 'DESC')
        ;

        return $queryBuilder;
    }

    /**
     * Lists all User entities.
     *
     * @Route("/", name="admin_user")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $this->config['filterType'] = new UserFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new User entity.
     *
     * @Route("/", name="admin_user_create")
     * @Method("POST")
     * @Template("SistemaUserBundle:User:new.html.twig")
     */
    public function createAction() {
        $this->config['newType'] = new UserType();

        $config = $this->getConfig();
        $request = $this->getRequest();
        $entity = new $config['entity']();
        $form = $this->createCreateForm($config, $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->setSecurePassword($entity);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->useACL($entity, 'create');

            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            $nextAction = $form->get('saveAndAdd')->isClicked() ? $this->generateUrl($config['new']) : $this->generateUrl($config['show'], array('id' => $entity->getId()));
            return $this->redirect($nextAction);
        }
        $this->get('session')->getFlashBag()->add('danger', 'flash.create.error');

        // remove the form to return to the view
        unset($config['newType']);

        return array(
            'config' => $config,
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new User entity.
     *
     * @Route("/new", name="admin_user_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $this->config['newType'] = new UserType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id}", name="admin_user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{id}/edit", name="admin_user_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $this->config['editType'] = new UserType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing User entity.
     *
     * @Route("/{id}", name="admin_user_update")
     * @Method("PUT")
     * @Template("SistemaUserBundle:User:edit.html.twig")
     */
    public function updateAction($id) {
        $this->config['editType'] = new UserType();

        $config = $this->getConfig();
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($config['repository'])->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ' . $config['entityName'] . ' entity.');
        }
        $this->useACL($entity, 'update');
        $current_pass = $entity->getPassword(); //pass anterior
        $deleteForm = $this->createDeleteForm($config, $id);
        $editForm = $this->createEditForm($config, $entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            //si pass es nulo guardo al anterior
            if (is_null($entity->getPassword())) {
                $entity->setPassword($current_pass);
            } elseif ($current_pass != $entity->getPassword()) {//si el password cambio lo codifico
                $this->setSecurePassword($entity);
            }
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            $nextAction = $editForm->get('saveAndAdd')->isClicked() ? $this->generateUrl($config['new']) : $this->generateUrl($config['show'], array('id' => $id));
            return $this->redirect($nextAction);
        }

        $this->get('session')->getFlashBag()->add('danger', 'flash.update.error');

        // remove the form to return to the view
        unset($config['editType']);

        return array(
            'config' => $config,
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="admin_user_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id) {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Autocomplete a User entity.
     *
     * @Route("/autocomplete-forms/get-user_roles", name="User_autocomplete_user_roles")
     */
    public function getAutocompleteRole() {
        $options = array(
            'repository' => "SistemaUserBundle:Role",
            'field'      => "role_name",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Exporter User.
     *
     * @Route("/exporter/{format}", name="admin_user_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);
        return $response;
    }

    private function setSecurePassword($entity) {
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($entity);
        $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
        $entity->setPassword($password);
    }

    /**
     * Activar Role Afiliado User entity.
     *
     * @Route("/activar/role/{id}", name="admin_user_activar_role")
     * @Method("GET")
     */
    public function activarRoleAction($id) {
        $config = $this->getConfig();
        $em     = $this->getDoctrine()->getManager();

        $entity   = $em->getRepository($config['repository'])->find($id);
        $role     = $em->getRepository('SistemaUserBundle:Role')->findOneByName("ROLE_MATRICULADO");
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->findOneBy(array(
            'afiTipdoc' => $entity->getTipdoc(),
            'afiNrodoc' => $entity->getNrodoc(),
        ));

        $entity->addRole($role);
        $afiliado->setAfiMail($entity->getEmail());//Actualizo el correo

        $em->flush();

        $mailer = $this->get('sistema_user.custom_mailer');
        $mailer->sendActivarRoleEmailMessage($entity);
        
        $this->get('session')->getFlashBag()
            ->add('success', 'Se activo correctamente al usuario DNI: '.$entity->getNrodoc().' como matriculado');

        return $this->redirect($this->generateUrl($config['index']));
    }
    /**
     * Activar Role Afiliado User entity.
     *
     * @Route("/correos/confirmacion", name="admin_user_correos_confirmacion")
     * @Method("GET")
     */
    public function resendConfirmationEmailAction() {
        $config  = $this->getConfig();
        $em      = $this->getDoctrine()->getManager();

        $entities = $em->getRepository($config['repository'])->findBy(array('enabled' => 0));

        $mailer = $this->get('sistema_user.custom_mailer');

        foreach ($entities as $user) {
            $mailer->sendConfirmationEmailMessage($user);
        }
        
        $this->get('session')->getFlashBag()
            ->add('success', 'Se reenvio correctamente los mails a los '.count($entities).' matriculados que no confirmaron su correo');

        return $this->redirect($this->generateUrl($config['index']));
    }
}