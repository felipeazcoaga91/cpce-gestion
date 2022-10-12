<?php

namespace Sistema\UserBundle\Controller;

use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\UserBundle\Entity\Role;
use Sistema\UserBundle\Form\RoleType;
use Sistema\UserBundle\Form\RoleFilterType;

/**
 * Role controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/superadmin/role")
 */
class RoleController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/UserBundle/Resources/config/Role.yml',
    );

    /**
     * Lists all Role entities.
     *
     * @Route("/", name="admin_role")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new RoleFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Role entity.
     *
     * @Route("/", name="admin_role_create")
     * @Method("POST")
     * @Template("SistemaUserBundle:Role:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new RoleType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Role entity.
     *
     * @Route("/new", name="admin_role_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new RoleType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Role entity.
     *
     * @Route("/{id}", name="admin_role_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Role entity.
     *
     * @Route("/{id}/edit", name="admin_role_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new RoleType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Role entity.
     *
     * @Route("/{id}", name="admin_role_update")
     * @Method("PUT")
     * @Template("SistemaUserBundle:Role:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new RoleType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Role entity.
     *
     * @Route("/{id}", name="admin_role_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter Role.
     *
     * @Route("/exporter/{format}", name="admin_role_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);
        return $response;
    }
}
