<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\InscripcionBundle\Entity\InscFuero;
use Sistema\InscripcionBundle\Form\InscFueroType;
use Sistema\InscripcionBundle\Form\InscFueroFilterType;

/**
 * InscFuero controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/inscripciones/fueros")
 */
class InscFueroController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/InscripcionBundle/Resources/config/InscFuero.yml',
    );

    /**
     * Lists all InscFuero entities.
     *
     * @Route("/", name="admin_inscripciones_fueros")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new InscFueroFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new InscFuero entity.
     *
     * @Route("/", name="admin_inscripciones_fueros_create")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscFuero:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new InscFueroType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new InscFuero entity.
     *
     * @Route("/new", name="admin_inscripciones_fueros_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new InscFueroType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a InscFuero entity.
     *
     * @Route("/{id}", name="admin_inscripciones_fueros_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing InscFuero entity.
     *
     * @Route("/{id}/edit", name="admin_inscripciones_fueros_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new InscFueroType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing InscFuero entity.
     *
     * @Route("/{id}", name="admin_inscripciones_fueros_update")
     * @Method("PUT")
     * @Template("SistemaInscripcionBundle:InscFuero:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new InscFueroType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a InscFuero entity.
     *
     * @Route("/{id}", name="admin_inscripciones_fueros_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter InscFuero.
     *
     * @Route("/exporter/{format}", name="admin_inscripciones_fueros_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}