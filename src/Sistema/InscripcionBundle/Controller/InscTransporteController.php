<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\InscripcionBundle\Entity\InscTransporte;
use Sistema\InscripcionBundle\Form\InscTransporteType;
use Sistema\InscripcionBundle\Form\InscTransporteFilterType;

/**
 * InscTransporte controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/inscripciones/transportes")
 */
class InscTransporteController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/InscripcionBundle/Resources/config/InscTransporte.yml',
    );

    /**
     * Lists all InscTransporte entities.
     *
     * @Route("/", name="admin_inscripciones_transportes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new InscTransporteFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new InscTransporte entity.
     *
     * @Route("/", name="admin_inscripciones_transportes_create")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscTransporte:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new InscTransporteType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new InscTransporte entity.
     *
     * @Route("/new", name="admin_inscripciones_transportes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new InscTransporteType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a InscTransporte entity.
     *
     * @Route("/{id}", name="admin_inscripciones_transportes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing InscTransporte entity.
     *
     * @Route("/{id}/edit", name="admin_inscripciones_transportes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new InscTransporteType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing InscTransporte entity.
     *
     * @Route("/{id}", name="admin_inscripciones_transportes_update")
     * @Method("PUT")
     * @Template("SistemaInscripcionBundle:InscTransporte:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new InscTransporteType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a InscTransporte entity.
     *
     * @Route("/{id}", name="admin_inscripciones_transportes_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter InscTransporte.
     *
     * @Route("/exporter/{format}", name="admin_inscripciones_transportes_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}