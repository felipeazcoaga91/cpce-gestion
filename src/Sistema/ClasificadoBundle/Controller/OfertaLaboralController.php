<?php

namespace Sistema\ClasificadoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\ClasificadoBundle\Entity\OfertaLaboral;
use Sistema\ClasificadoBundle\Form\OfertaLaboralType;
use Sistema\ClasificadoBundle\Form\OfertaLaboralFilterType;

/**
 * OfertaLaboral controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/ofertalaboral")
 */
class OfertaLaboralController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/ClasificadoBundle/Resources/config/OfertaLaboral.yml',
    );

    /**
     * Lists all OfertaLaboral entities.
     *
     * @Route("/", name="admin_ofertalaboral")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new OfertaLaboralFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new OfertaLaboral entity.
     *
     * @Route("/", name="admin_ofertalaboral_create")
     * @Method("POST")
     * @Template("SistemaClasificadoBundle:OfertaLaboral:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new OfertaLaboralType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new OfertaLaboral entity.
     *
     * @Route("/new", name="admin_ofertalaboral_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new OfertaLaboralType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a OfertaLaboral entity.
     *
     * @Route("/{id}", name="admin_ofertalaboral_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing OfertaLaboral entity.
     *
     * @Route("/{id}/edit", name="admin_ofertalaboral_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new OfertaLaboralType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing OfertaLaboral entity.
     *
     * @Route("/{id}", name="admin_ofertalaboral_update")
     * @Method("PUT")
     * @Template("SistemaClasificadoBundle:OfertaLaboral:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new OfertaLaboralType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a OfertaLaboral entity.
     *
     * @Route("/{id}", name="admin_ofertalaboral_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter OfertaLaboral.
     *
     * @Route("/exporter/{format}", name="admin_ofertalaboral_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * Autocomplete a OfertaLaboral entity.
     *
     * @Route("/autocomplete-forms/get-cvPostulantes", name="OfertaLaboral_autocomplete_cvPostulantes")
     */
    public function getAutocompleteUserCurriculum()
    {
        $options = array(
            'repository' => "SistemaClasificadoBundle:UserCurriculum",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }
}
