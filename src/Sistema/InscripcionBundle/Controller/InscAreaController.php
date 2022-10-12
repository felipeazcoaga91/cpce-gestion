<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\InscripcionBundle\Entity\InscArea;
use Sistema\InscripcionBundle\Form\InscAreaType;
use Sistema\InscripcionBundle\Form\InscAreaFilterType;

/**
 * InscArea controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/inscripciones/areas")
 */
class InscAreaController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/InscripcionBundle/Resources/config/InscArea.yml',
    );

    /**
     * Lists all InscArea entities.
     *
     * @Route("/", name="admin_inscripciones_areas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new InscAreaFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new InscArea entity.
     *
     * @Route("/", name="admin_inscripciones_areas_create")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscArea:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new InscAreaType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new InscArea entity.
     *
     * @Route("/new", name="admin_inscripciones_areas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new InscAreaType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a InscArea entity.
     *
     * @Route("/{id}", name="admin_inscripciones_areas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing InscArea entity.
     *
     * @Route("/{id}/edit", name="admin_inscripciones_areas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new InscAreaType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing InscArea entity.
     *
     * @Route("/{id}", name="admin_inscripciones_areas_update")
     * @Method("PUT")
     * @Template("SistemaInscripcionBundle:InscArea:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new InscAreaType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a InscArea entity.
     *
     * @Route("/{id}", name="admin_inscripciones_areas_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter InscArea.
     *
     * @Route("/exporter/{format}", name="admin_inscripciones_areas_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}