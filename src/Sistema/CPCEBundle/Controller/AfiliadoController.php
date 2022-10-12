<?php

namespace Sistema\CPCEBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\CPCEBundle\Entity\Afiliado;
use Sistema\CPCEBundle\Form\AfiliadoType;
use Sistema\CPCEBundle\Form\AfiliadoFilterType;

/**
 * Afiliado controller.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 *
 * @Route("/admin/afiliado")
 */
class AfiliadoController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/CPCEBundle/Resources/config/Afiliado.yml',
    );

    /**
     * Create query.
     * @param string $repository
     * @return Doctrine\ORM\QueryBuilder $queryBuilder
     */
    protected function createQuery($repository)
    {
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository($repository)
            ->createQueryBuilder('a')
            ->where('a.afiTipo = :tipo')
            ->setParameter('tipo', 'A')
            //->orderBy('a.afiTipdoc', 'DESC')
            //->orderBy('a.afiNrodoc', 'DESC')
        ;

        return $queryBuilder;
    }

    /**
     * Lists all Afiliado entities.
     *
     * @Route("/", name="admin_afiliado")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new AfiliadoFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Afiliado entity.
     *
     * @Route("/", name="admin_afiliado_create")
     * @Method("POST")
     * @Template("SistemaCPCEBundle:Afiliado:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new AfiliadoType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Afiliado entity.
     *
     * @Route("/new", name="admin_afiliado_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new AfiliadoType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Afiliado entity.
     *
     * @Route("/{id}", name="admin_afiliado_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Afiliado entity.
     *
     * @Route("/{id}/edit", name="admin_afiliado_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new AfiliadoType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Afiliado entity.
     *
     * @Route("/{id}", name="admin_afiliado_update")
     * @Method("PUT")
     * @Template("SistemaCPCEBundle:Afiliado:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new AfiliadoType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Afiliado entity.
     *
     * @Route("/{id}", name="admin_afiliado_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Autocomplete a Afiliado entity.
     *
     * @Route("/autocomplete-forms/get-afiGaranteTipdoc", name="Afiliado_autocomplete_afiGaranteTipdoc")
     */
    public function getAutocompleteAfiGaranteTipdoc()
    {
        $options = array(
            'repository' => "SistemaCPCEBundle:Afiliado",
            'field'      => "afiNombre",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a Afiliado entity.
     *
     * @Route("/autocomplete-forms/get-afiGarantedeTipdoc", name="Afiliado_autocomplete_afiGarantedeTipdoc")
     */
    public function getAutocompleteAfiGarantedeTipdoc()
    {
        $options = array(
            'repository' => "SistemaCPCEBundle:Afiliado",
            'field'      => "afiNombre",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Exporter Afiliado.
     *
     * @Route("/exporter/{format}", name="admin_afiliado_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);
        return $response;
    }
}