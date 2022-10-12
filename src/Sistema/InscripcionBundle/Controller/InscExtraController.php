<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\InscripcionBundle\Entity\InscExtra;
use Sistema\InscripcionBundle\Form\InscExtraType;
use Sistema\InscripcionBundle\Form\InscExtraFilterType;

/**
 * InscExtra controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/inscripciones/extras")
 */
class InscExtraController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/InscripcionBundle/Resources/config/InscExtra.yml',
    );

    /**
     * Lists all InscExtra entities.
     *
     * @Route("/", name="admin_inscripciones_extras")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new InscExtraFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new InscExtra entity.
     *
     * @Route("/", name="admin_inscripciones_extras_create")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscExtra:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new InscExtraType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new InscExtra entity.
     *
     * @Route("/new", name="admin_inscripciones_extras_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new InscExtraType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a InscExtra entity.
     *
     * @Route("/{id}", name="admin_inscripciones_extras_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing InscExtra entity.
     *
     * @Route("/{id}/edit", name="admin_inscripciones_extras_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new InscExtraType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing InscExtra entity.
     *
     * @Route("/{id}", name="admin_inscripciones_extras_update")
     * @Method("PUT")
     * @Template("SistemaInscripcionBundle:InscExtra:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new InscExtraType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a InscExtra entity.
     *
     * @Route("/{id}", name="admin_inscripciones_extras_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter InscExtra.
     *
     * @Route("/exporter/{format}", name="admin_inscripciones_extras_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}