<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Common\Collections\ArrayCollection;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\InscripcionBundle\Entity\InscMolde;
use Sistema\InscripcionBundle\Entity\InscMoldeCuenta;
use Sistema\InscripcionBundle\Entity\InscControlCuenta;
use Sistema\InscripcionBundle\Form\InscMoldeType;
use Sistema\InscripcionBundle\Form\InscMoldeFilterType;

/**
 * InscMolde controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/inscripciones/moldes")
 */
class InscMoldeController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/InscripcionBundle/Resources/config/InscMolde.yml',
    );

    /**
     * Lists all InscMolde entities.
     *
     * @Route("/", name="admin_inscripciones_moldes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new InscMoldeFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new InscMolde entity.
     *
     * @Route("/", name="admin_inscripciones_moldes_create")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscMolde:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new InscMoldeType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new InscMolde entity.
     *
     * @Route("/new", name="admin_inscripciones_moldes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new InscMoldeType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a InscMolde entity.
     *
     * @Route("/{id}", name="admin_inscripciones_moldes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing InscMolde entity.
     *
     * @Route("/{id}/edit", name="admin_inscripciones_moldes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new InscMoldeType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing InscMolde entity.
     *
     * @Route("/{id}", name="admin_inscripciones_moldes_update")
     * @Method("PUT")
     * @Template("SistemaInscripcionBundle:InscMolde:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new InscMoldeType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a InscMolde entity.
     *
     * @Route("/{id}", name="admin_inscripciones_moldes_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter InscMolde.
     *
     * @Route("/exporter/{format}", name="admin_inscripciones_moldes_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * Autocomplete a InscControlCuenta entity.
     *
     * @Route("/autocomplete-forms/get-cuentas", name="admin_autocomplete_cuentas")
     */
    public function getAutocompleteCuenta() {
        
        //$cpceEm = $this->get('doctrine')->getManager('cpce');
        $em = $this->getDoctrine()->getManager();

        $qb = $em->getRepository('SistemaInscripcionBundle:InscControlCuenta')->createQueryBuilder('a');
        $qb
            //->add('where', 'a.cuentaMadre = 13010000 OR a.cuentaMadre = 31040000 OR a.cuentaMadre = 13040000')
            ->add('orderBy', 'a.id ASC')
        ;
        $entities = $qb->getQuery()->getResult();

        $array = array();

        foreach ($entities as $entity) {
            $array[] = array(
                'id' => $entity->getId(),
                'text' => $entity->getNombre(),
            );
        }

        $response = new JsonResponse();
        $response->setData($array);

        return $response;
    }
}