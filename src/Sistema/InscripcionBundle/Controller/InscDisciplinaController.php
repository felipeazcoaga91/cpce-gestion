<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\InscripcionBundle\Entity\InscDisciplina;
use Sistema\InscripcionBundle\Form\InscDisciplinaType;
use Sistema\InscripcionBundle\Form\InscDisciplinaFilterType;

/**
 * InscDisciplina controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/inscripciones/disciplinas")
 */
class InscDisciplinaController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/InscripcionBundle/Resources/config/InscDisciplina.yml',
    );

    /**
     * Lists all InscDisciplina entities.
     *
     * @Route("/", name="admin_inscripciones_disciplinas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new InscDisciplinaFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new InscDisciplina entity.
     *
     * @Route("/", name="admin_inscripciones_disciplinas_create")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscDisciplina:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new InscDisciplinaType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new InscDisciplina entity.
     *
     * @Route("/new", name="admin_inscripciones_disciplinas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new InscDisciplinaType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a InscDisciplina entity.
     *
     * @Route("/{id}", name="admin_inscripciones_disciplinas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing InscDisciplina entity.
     *
     * @Route("/{id}/edit", name="admin_inscripciones_disciplinas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new InscDisciplinaType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing InscDisciplina entity.
     *
     * @Route("/{id}", name="admin_inscripciones_disciplinas_update")
     * @Method("PUT")
     * @Template("SistemaInscripcionBundle:InscDisciplina:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new InscDisciplinaType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a InscDisciplina entity.
     *
     * @Route("/{id}", name="admin_inscripciones_disciplinas_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter InscDisciplina.
     *
     * @Route("/exporter/{format}", name="admin_inscripciones_disciplinas_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}