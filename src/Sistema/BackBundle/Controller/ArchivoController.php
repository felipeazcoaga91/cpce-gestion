<?php

namespace Sistema\BackBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\BackBundle\Entity\Archivo;
use Sistema\BackBundle\Form\ArchivoType;
use Sistema\BackBundle\Form\ArchivoFilterType;

/**
 * Archivo controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/archivo")
 */
class ArchivoController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/BackBundle/Resources/config/Archivo.yml',
    );

    /**
     * Lists all Archivo entities.
     *
     * @Route("/", name="admin_archivo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new ArchivoFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Archivo entity.
     *
     * @Route("/", name="admin_archivo_create")
     * @Method("POST")
     * @Template("SistemaBackBundle:Archivo:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new ArchivoType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Archivo entity.
     *
     * @Route("/new", name="admin_archivo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new ArchivoType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Archivo entity.
     *
     * @Route("/{id}", name="admin_archivo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Archivo entity.
     *
     * @Route("/{id}/edit", name="admin_archivo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new ArchivoType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Archivo entity.
     *
     * @Route("/{id}", name="admin_archivo_update")
     * @Method("PUT")
     * @Template("SistemaBackBundle:Archivo:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new ArchivoType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Archivo entity.
     *
     * @Route("/{id}", name="admin_archivo_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter Archivo.
     *
     * @Route("/exporter/{format}", name="admin_archivo_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}