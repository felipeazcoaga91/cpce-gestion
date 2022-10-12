<?php

namespace Sistema\ClasificadoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\ClasificadoBundle\Entity\UserCurriculum;
use Sistema\ClasificadoBundle\Form\UserCurriculumType;
use Sistema\ClasificadoBundle\Form\UserCurriculumFilterType;

/**
 * UserCurriculum controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/matriculado/curriculum")
 */
class UserCurriculumController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/ClasificadoBundle/Resources/config/UserCurriculum.yml',
    );

    /*
     * Lists all UserCurriculum entities.
     *
     * @Route("/", name="matriculado_curriculum")
     * @Method("GET")
     * @Template()
     *
    public function indexAction()
    {
        $this->config['filterType'] = new UserCurriculumFilterType($this->isAdmin());
        $response = parent::indexAction();

        return $response;
    }
    */

    /**
     * Creates a new UserCurriculum entity.
     *
     * @Route("/", name="matriculado_curriculum_create")
     * @Method("POST")
     * @Template("SistemaClasificadoBundle:UserCurriculum:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new UserCurriculumType($this->isAdmin());
        $config = $this->getConfig();
    	$request = $this->getRequest();
        $entity = new $config['entity']();
        $form   = $this->createCreateForm($config, $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if (!$this->isAdmin()) {
                $user = $this->getUser();
                $entity->setUsercv($user);
            }
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
                $nextAction = $this->generateUrl($config['index']);
            }

            return $this->redirect($nextAction);
        }

        $this->get('session')->getFlashBag()->add('danger', 'flash.create.error');

        // remove the form to return to the view
        unset($config['newType']);

        return array(
            'config'     => $config,
            'entity'     => $entity,
            'form'       => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new UserCurriculum entity.
     *
     * @Route("/new", name="matriculado_curriculum_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new UserCurriculumType($this->isAdmin());
        $config = $this->getConfig();
        $entity = new $config['entity']();
        $user = $this->getUser();
        $entity->setUsercv($user);
        $form = $this->createCreateForm($config, $entity);

        // remove the form to return to the view
        unset($config['newType']);

        return array(
            'config'     => $config,
            'entity'     => $entity,
            'form'       => $form->createView(),
        );

    }

    /*
     * Finds and displays a UserCurriculum entity.
     *
     * @Route("/{id}", name="matriculado_curriculum_show")
     * @Method("GET")
     * @Template()
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }
    */

    /**
     * Displays a form to edit an existing UserCurriculum entity.
     *
     * @Route("/{id}/edit", name="matriculado_curriculum_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new UserCurriculumType($this->isAdmin());
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();
        if ($this->isAdmin()) {
            $entity = $em->getRepository($config['repository'])->find($id);
        } else {
            $entity = $this->getUser()->getUserCurriculum();
        }
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find '.$config['entityName'].' entity.');
        }

        if (!$this->isAdmin()) {
            $user = $this->getUser();
            $entity->setUsercv($user);
        }

        $this->useACL($entity, 'edit');
        $editForm = $this->createEditForm($config, $entity);
        $deleteForm = $this->createDeleteForm($config, $id);

        // remove the form to return to the view
        unset($config['editType']);

        return array(
            'config'      => $config,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing UserCurriculum entity.
     *
     * @Route("/{id}", name="matriculado_curriculum_update")
     * @Method("PUT")
     * @Template("SistemaClasificadoBundle:UserCurriculum:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new UserCurriculumType($this->isAdmin());
        $config = $this->getConfig();
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($config['repository'])->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find '.$config['entityName'].' entity.');
        }
        $this->useACL($entity, 'update');
        $deleteForm = $this->createDeleteForm($config, $id);
        $editForm = $this->createEditForm($config, $entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if (!$this->isAdmin()) {
                $user = $this->getUser();
                $entity->setUsercv($user);
            }
            $entity->setUpdatedAt(new \DateTime('now'));
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

        if (!array_key_exists('saveAndAdd', $config)) {
            $config['saveAndAdd'] = true;
        } elseif ($config['saveAndAdd'] != false) {
            $config['saveAndAdd'] = true;
        }
            if ($config['saveAndAdd']) {
                $nextAction = $form->get('saveAndAdd')->isClicked()
                    ? $this->generateUrl($config['new'])
                    : $this->generateUrl($config['show'], array('id' => $id));
            } else {
                $nextAction = $this->generateUrl($config['index']);
            }
            return $this->redirect($nextAction);
        }

        $this->get('session')->getFlashBag()->add('danger', 'flash.update.error');

        // remove the form to return to the view
        unset($config['editType']);

        return array(
            'config'      => $config,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a UserCurriculum entity.
     *
     * @Route("/{id}", name="matriculado_curriculum_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter UserCurriculum.
     *
     * @Route("/exporter/{format}", name="matriculado_curriculum_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * Autocomplete a UserCurriculum entity.
     *
     * @Route("/autocomplete-forms/get-usercv", name="UserCurriculum_autocomplete_usercv")
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
     * Autocomplete a UserCurriculum entity.
     *
     * @Route("/autocomplete-forms/get-ofertaLaborals", name="UserCurriculum_autocomplete_ofertaLaborals")
     */
    public function getAutocompleteOfertaLaboral()
    {
        $options = array(
            'repository' => "SistemaClasificadoBundle:OfertaLaboral",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    private function isAdmin()
    {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $isAdmin = False;
        } else {
            $isAdmin = True;
        }

        return $isAdmin;
    }

    /**
     * get a curriculum pdf.
     *
     * @Route("/get-cvmatriculado/{matriculadoId}", name="matriculado_getCurriculum")
     * @Method("GET")
     */
    public function getCVMatriculado($matriculadoId)
    {
        $request = $this->get('request');
        $em = $this->getDoctrine()->getManager();
        if (!$this->isAdmin()) {
            $matriculadoId = $this->getUser()->getUserCurriculum()->getId();
        }
        $entity = $em->getRepository('SistemaClasificadoBundle:UserCurriculum')->find($matriculadoId);

        $response = new Response();

        $response->headers->set('Content-type', mime_content_type($entity->getUploadDir()));
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $entity->getFilePath() . '";');

        $response->setContent(file_get_contents($entity->getWebPath()));

        return $response;
    }
}
