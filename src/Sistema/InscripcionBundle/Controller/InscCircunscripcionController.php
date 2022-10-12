<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\InscripcionBundle\Entity\InscCircunscripcion;
use Sistema\InscripcionBundle\Form\InscCircunscripcionType;
use Sistema\InscripcionBundle\Form\InscCircunscripcionFilterType;

/**
 * InscCircunscripcion controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/inscripciones/circunscripciones")
 */
class InscCircunscripcionController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/InscripcionBundle/Resources/config/InscCircunscripcion.yml',
    );

    /**
     * Lists all InscCircunscripcion entities.
     *
     * @Route("/", name="admin_inscripciones_circunscripciones")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new InscCircunscripcionFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new InscCircunscripcion entity.
     *
     * @Route("/", name="admin_inscripciones_circunscripciones_create")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscCircunscripcion:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new InscCircunscripcionType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new InscCircunscripcion entity.
     *
     * @Route("/new", name="admin_inscripciones_circunscripciones_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new InscCircunscripcionType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a InscCircunscripcion entity.
     *
     * @Route("/{id}", name="admin_inscripciones_circunscripciones_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing InscCircunscripcion entity.
     *
     * @Route("/{id}/edit", name="admin_inscripciones_circunscripciones_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new InscCircunscripcionType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing InscCircunscripcion entity.
     *
     * @Route("/{id}", name="admin_inscripciones_circunscripciones_update")
     * @Method("PUT")
     * @Template("SistemaInscripcionBundle:InscCircunscripcion:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new InscCircunscripcionType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a InscCircunscripcion entity.
     *
     * @Route("/{id}", name="admin_inscripciones_circunscripciones_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter InscCircunscripcion.
     *
     * @Route("/exporter/{format}", name="admin_inscripciones_circunscripciones_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}