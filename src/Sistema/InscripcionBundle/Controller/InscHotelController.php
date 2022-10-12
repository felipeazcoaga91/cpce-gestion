<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\InscripcionBundle\Entity\InscHotel;
use Sistema\InscripcionBundle\Form\InscHotelType;
use Sistema\InscripcionBundle\Form\InscHotelFilterType;

/**
 * InscHotel controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/inscripciones/hoteles")
 */
class InscHotelController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/InscripcionBundle/Resources/config/InscHotel.yml',
    );

    /**
     * Lists all InscHotel entities.
     *
     * @Route("/", name="admin_inscripciones_hoteles")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new InscHotelFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new InscHotel entity.
     *
     * @Route("/", name="admin_inscripciones_hoteles_create")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscHotel:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new InscHotelType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new InscHotel entity.
     *
     * @Route("/new", name="admin_inscripciones_hoteles_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new InscHotelType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a InscHotel entity.
     *
     * @Route("/{id}", name="admin_inscripciones_hoteles_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing InscHotel entity.
     *
     * @Route("/{id}/edit", name="admin_inscripciones_hoteles_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new InscHotelType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing InscHotel entity.
     *
     * @Route("/{id}", name="admin_inscripciones_hoteles_update")
     * @Method("PUT")
     * @Template("SistemaInscripcionBundle:InscHotel:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new InscHotelType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a InscHotel entity.
     *
     * @Route("/{id}", name="admin_inscripciones_hoteles_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter InscHotel.
     *
     * @Route("/exporter/{format}", name="admin_inscripciones_hoteles_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}