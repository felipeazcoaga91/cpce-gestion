<?php

namespace Sistema\CPCEBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\CPCEBundle\Entity\Trabajo;
use Sistema\CPCEBundle\Form\TrabajoType;
use Sistema\CPCEBundle\Form\TrabajoFilterType;

/**
 * Trabajo controller.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 *
 * @Route("/admin/trabajo")
 */
class TrabajoController extends Controller
{
    private $denyAccessNotRole = "ROLE_ADMIN";
    private $noControlaACL     = "ROLE_SECTECNICA";

    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/CPCEBundle/Resources/config/Trabajo.yml',
    );

    /**
     * Lists all Trabajo entities.
     *
     * @Route("/", name="admin_trabajo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new TrabajoFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Trabajo entity.
     *
     * @Route("/", name="admin_trabajo_create")
     * @Method("POST")
     * @Template("SistemaCPCEBundle:Trabajo:new.html.twig")
     */
    public function createAction()
    {
        $this->denyAccessUnlessGranted($this->denyAccessNotRole);

        $config = $this->getConfig();
        $config['newType'] = new TrabajoType();
        $request = $this->getRequest();
        //Estado Default
        $partialTrabajoEstado = $em->getPartialReference('Sistema\CPCEBundle\Entity\TrabajoEstado', 1);
        $entity = new $config['entity']($partialTrabajoEstado);
        $form   = $this->createCreateForm($config, $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->useACL($entity, 'create');

            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            if (!array_key_exists('saveAndAdd', $config)) {
                $config['saveAndAdd'] = true;
            } elseif ($config['saveAndAdd'] != false) {
                $config['saveAndAdd'] = true;
            }

            if ($config['saveAndAdd']) {
                $nextAction = $form->get('saveAndAdd')->isClicked()
                ? $this->generateUrl($config['new'])
                : $this->generateUrl($config['show'], array('id' => $entity->getId()));
            } else {
                $nextAction = $this->generateUrl($config['show'], array('id' => $entity->getId()));
            }

            return $this->redirect($nextAction);
        }

        $this->get('session')->getFlashBag()->add('danger', 'flash.create.error');

        // remove the form to return to the view
        unset($config['newType']);

        return array(
            'config' => $config,
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Trabajo entity.
     *
     * @Route("/new", name="admin_trabajo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->denyAccessUnlessGranted($this->denyAccessNotRole);
        $config = $this->getConfig();
        $config['newType'] = new TrabajoType();
        //Estado Default
        $partialTrabajoEstado = $em->getPartialReference('Sistema\CPCEBundle\Entity\TrabajoEstado', 1);
        $entity = new $config['entity']($partialTrabajoEstado);
        $form   = $this->createCreateForm($config, $entity);

        // remove the form to return to the view
        unset($config['newType']);

        return array(
            'config' => $config,
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Trabajo entity.
     *
     * @Route("/{id}", name="admin_trabajo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($config['repository'])->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find '.$config['entityName'].' entity.');
        }
        if (false === $this->get('security.authorization_checker')->isGranted($this->noControlaACL)) {
            $this->useACL($entity, 'show');
        }
        $deleteForm = $this->createDeleteForm($config, $id);

        return array(
            'config'      => $config,
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Trabajo entity.
     *
     * @Route("/{id}/edit", name="admin_trabajo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->denyAccessUnlessGranted($this->denyAccessNotRole);
        $this->config['editType'] = new TrabajoType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Trabajo entity.
     *
     * @Route("/{id}", name="admin_trabajo_update")
     * @Method("PUT")
     * @Template("SistemaCPCEBundle:Trabajo:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->denyAccessUnlessGranted($this->denyAccessNotRole);
        $this->config['editType'] = new TrabajoType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Trabajo entity.
     *
     * @Route("/{id}", name="admin_trabajo_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $this->denyAccessUnlessGranted($this->denyAccessNotRole);
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter Trabajo.
     *
     * @Route("/exporter/{format}", name="admin_trabajo_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * Autocomplete a Trabajo entity.
     *
     * @Route("/autocomplete-forms/get-user", name="Trabajo_autocomplete_user")
     */
    public function getAutocompleteUser()
    {
        $options = array(
            'repository' => "SistemaUserBundle:User",
            'field'      => "username",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a Trabajo entity.
     *
     * @Route("/autocomplete-forms/get-servicio", name="Trabajo_autocomplete_servicio")
     */
    public function getAutocompleteTareas()
    {
        $options = array(
            'repository' => "SistemaCPCEBundle:Tareas",
            'field'      => "tarDescrip",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Secretaria Tecnica Revisar Trabajo
     * null = NO FINALIZADO
     * 1    = FINALIZADO
     *
     * @Route("/revisar/{id}", name="admin_trabajo_revisar")
     * @Method({"GET"})
     */
    public function revisarAction($id)
    {
        $config = $this->getConfig();
        $em     = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($config['repository'])->find($id);

        if (!$entity) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'Trabajo código nro: '.$entity->getId().' No existe');
        } else {
            //$entity->setCertificado(1);//1 = FINALIZADO
            //$em->flush();
            //AVISO AL MATRICULADO QUE SU TRABAJO NO SE ENCUENTRA FINALIZADO
            $mailer = $this->get('sistema_cpce.custom_mailer');
            $mailer->sendTrabajoRevisionEmailMessage($entity->getUser(), $entity->getId());

            $this->get('session')->getFlashBag()
                ->add('success', 'Trabajo código nro: '.$entity->getId().' No Finalizado');
        }

        return $this->redirect($this->generateUrl($config['index']));
    }


      /**
     * 2    = Revisado
     *
    * @Route("/estado/{id}", name="admin_trabajo_estado")
     * @Method({"GET"})
     */
    public function estadoAction($id)
    {
        $config = $this->getConfig();
        $em     = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($config['repository'])->find($id);
        $estado = $em->getRepository('SistemaCPCEBundle:TrabajoEstado')->find(2);

        $entity->setEstado($estado);
        
        $em->persist($entity);
        $em->flush();
        
        return $this->redirect($this->generateUrl($config['index']));
    }
}