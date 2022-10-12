<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Sistema\InscripcionBundle\Entity\InscPersona;
use Sistema\InscripcionBundle\Entity\InscFicha;
use Sistema\InscripcionBundle\Entity\InscMolde;

use Sistema\InscripcionBundle\Form\InscFichaGenericType;
use Sistema\InscripcionBundle\Form\fichas\InscFichaOlimpiadasType;
use Sistema\InscripcionBundle\Form\fichas\InscFichaPeritosType;

use Knp\Snappy\Pdf;

/**
 * Admin controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/matriculado/inscripcion")
 */
class InscripcionController extends Controller
{
    /**
     * Section Inscripciones.
     *
     * @Route("/", name="front_inscripcion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $moldes = $em->getRepository('SistemaInscripcionBundle:InscMolde')->findBy(array('activo' => true));

        return array(
            'moldes' => $moldes
        );
    }

    /**
     * valida datos de usuario.
     *
     * @Route("/validacion/{id}", name="front_inscripcion_validacion")
     * @Method("GET")
     * @Template()
     */
    public function validacionAction($id)
    {
        $user = $this->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $molde = $em->getRepository('SistemaInscripcionBundle:InscMolde')->find($id);
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($user->getNrodoc());

        return array(
            'afiliado' => $afiliado,
            'molde' => $molde
        );
    }

    /**
     * Displays a form to create a new InscFicha entity.
     *
     * @Route("/nueva/{id}", name="front_inscripcion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id) {

        $em = $this->getDoctrine()->getManager();
        $molde = $em->getRepository('SistemaInscripcionBundle:InscMolde')->find($id);
    
        $tieneDeuda = $this->controlCuentas($molde);

        if ($tieneDeuda == true) {
            
            $this->get('session')->getFlashBag()->add('danger', 'Debe regularizar su situación, por favor comuniquese con la delegación');
            $nextAction = $this->generateUrl('front_inscripcion');
            
            return $this->redirect($nextAction);

        } else {

            switch ($molde->getTipo()) {
                case 'olimpiadas':
                    $forwardResponse = 'SistemaInscripcionBundle:InscFichaOlimpiada:new';
                    break;
                case 'peritos':
                    $forwardResponse = 'SistemaInscripcionBundle:InscFichaPerito:new';
                    break;
                case 'asamblea':
                    $forwardResponse = 'SistemaInscripcionBundle:InscFichaAsamblea:new';
                    break;
                default:
                    $forwardResponse = 'SistemaInscripcionBundle:InscFichaOlimpiada:new';
                    break;
            }

            $response = $this->forward($forwardResponse, array(
                'id' => $molde->getId(),
            ));

            return $response;
            
        }
        
    }

    public function controlCuentas($molde) {

        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($user->getNrodoc());

        $saldo = 0;

        foreach ($molde->getCuentas() as $cuenta) {
            $controlCuenta = $cuenta->getControlCuenta();

            $saldoCuenta = $em->getRepository('SistemaCPCEBundle:Totales')->findSaldoTotalDetalleByAfiliadoCuenta($user->getTipdoc(), $user->getNrodoc(), $controlCuenta->getCodigo());
            if (floatval($saldoCuenta['saldo']) >= floatval($cuenta->getImporte()) ) {
                $saldo = $saldo + floatval($saldoCuenta['saldo']);
            } 
        }       
        
        //Control de Deudas
        if ($saldo == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Autocomplete a Area entity.
     *
     * @Route("/autocomplete-forms/get-areas", name="inscripcion_autocomplete_area")
     */
    public function getAutocompleteArea()
    {
        $options = array(
            'repository' => "SistemaInscripcionBundle:InscArea",
            'field'      => "nombre",
        );
        
        $request = $this->getRequest();
        $term = $request->query->get('q', null);

        $qb = null;

        if (is_null($qb)) {
            $em = $this->getDoctrine()->getManager();

            $qb = $em->getRepository($options['repository'])->createQueryBuilder('a');
            $qb
                ->where("a.".$options['field']." LIKE :term")
                ->AndWhere("a.activo = 1")
                ->orderBy("a.".$options['field'], "ASC")
            ;
        }

        $qb->setParameter("term", "%" . $term . "%");

        $entities = $qb->getQuery()->getResult();

        $array = array();

        foreach ($entities as $entity) {
            $array[] = array(
                'id'   => $entity->getId(),
                'text' => $entity->__toString(),
            );
        }

        $response = new JsonResponse();
        $response->setData($array);

        return $response;
    }

    /**
     * Autocomplete a Disciplina entity.
     *
     * @Route("/autocomplete-forms/get-disciplina", name="inscripcion_autocomplete_disciplina")
     */
    public function getAutocompleteDisciplina()
    {
        $options = array(
            'repository' => "SistemaInscripcionBundle:InscDisciplina",
            'field'      => "nombre",
        );
        
        $request = $this->getRequest();
        $term = $request->query->get('q', null);

        $qb = null;

        if (is_null($qb)) {
            $em = $this->getDoctrine()->getManager();

            $qb = $em->getRepository($options['repository'])->createQueryBuilder('a');
            $qb
                ->where("a.".$options['field']." LIKE :term")
                ->AndWhere("a.activo = 1")
                ->orderBy("a.".$options['field'], "ASC")
            ;
        }

        $qb->setParameter("term", "%" . $term . "%");

        $entities = $qb->getQuery()->getResult();

        $array = array();

        foreach ($entities as $entity) {
            $array[] = array(
                'id'   => $entity->getId(),
                'text' => $entity->__toString(),
            );
        }

        $response = new JsonResponse();
        $response->setData($array);

        return $response;
    }

    /**
     * Autocomplete a Hotel entity.
     *
     * @Route("/autocomplete-forms/get-hotel", name="inscripcion_autocomplete_hotel")
     */
    public function getAutocompleteHotel()
    {
        $options = array(
            'repository' => "SistemaInscripcionBundle:InscHotel",
            'field'      => "nombre",
        );
        
        $request = $this->getRequest();
        $term = $request->query->get('q', null);

        $qb = null;
        $tipo = $this->get('session')->get('tipo');

        if (is_null($qb)) {
            $em = $this->getDoctrine()->getManager();

            $qb = $em->getRepository($options['repository'])->createQueryBuilder('a');
            $qb
                ->where("a.".$options['field']." LIKE :term")
                ->AndWhere("a.activo = 1")
                ->AndWhere("a.reservado < a.cupo")
                //->AndWhere("a.tipo = ". $tipo)
                ->orderBy("a.".$options['field'], "ASC")
            ;
        }

        $qb->setParameter("term", "%" . $term . "%");

        $entities = $qb->getQuery()->getResult();

        $array = array();

        foreach ($entities as $entity) {
            $array[] = array(
                'id'   => $entity->getId(),
                'text' => $entity->__toString(),
            );
        }

        $response = new JsonResponse();
        $response->setData($array);

        return $response;
    }

    /**
     * Autocomplete a Transporte entity.
     *
     * @Route("/autocomplete-forms/get-transporte", name="inscripcion_autocomplete_transporte")
     */
    public function getAutocompleteTransporte()
    {
        $options = array(
            'repository' => "SistemaInscripcionBundle:InscTransporte",
            'field'      => "nombre",
        );
        
        $request = $this->getRequest();
        $term = $request->query->get('q', null);

        $qb = null;
        $tipo = $this->get('session')->get('tipo');

        if (is_null($qb)) {
            $em = $this->getDoctrine()->getManager();

            $qb = $em->getRepository($options['repository'])->createQueryBuilder('a');
            $qb
                ->where("a.".$options['field']." LIKE :term")
                ->AndWhere("a.activo = 1")
                ->AndWhere("a.reservado < a.cupo")
                //->AndWhere("a.tipo = ". $tipo)
                ->orderBy("a.".$options['field'], "ASC")
            ;
        }

        $qb->setParameter("term", "%" . $term . "%");

        $entities = $qb->getQuery()->getResult();

        $array = array();

        foreach ($entities as $entity) {
            $array[] = array(
                'id'   => $entity->getId(),
                'text' => $entity->__toString(),
            );
        }

        $response = new JsonResponse();
        $response->setData($array);

        return $response;
    }

    /**
     * Autocomplete a Circunscripcion entity.
     *
     * @Route("/autocomplete-forms/get-circunscripcion", name="inscripcion_autocomplete_circunscripcion")
     */
    public function getAutocompleteCircunscripcion()
    {
        $options = array(
            'repository' => "SistemaInscripcionBundle:InscCircunscripcion",
            'field'      => "nombre",
        );
        
        $request = $this->getRequest();
        $term = $request->query->get('q', null);

        $qb = null;
        $tipo = $this->get('session')->get('tipo');

        if (is_null($qb)) {
            $em = $this->getDoctrine()->getManager();

            $qb = $em->getRepository($options['repository'])->createQueryBuilder('a');
            $qb
                ->where("a.".$options['field']." LIKE :term")
                ->AndWhere("a.activo = 1")
                ->orderBy("a.".$options['field'], "ASC")
            ;
        }

        $qb->setParameter("term", "%" . $term . "%");

        $entities = $qb->getQuery()->getResult();

        $array = array();

        foreach ($entities as $entity) {
            $array[] = array(
                'id'   => $entity->getId(),
                'text' => $entity->__toString(),
            );
        }

        $response = new JsonResponse();
        $response->setData($array);

        return $response;
    }

    /**
     * Autocomplete a Fuero entity.
     *
     * @Route("/autocomplete-forms/get-fuero", name="inscripcion_autocomplete_fuero")
     */
    public function getAutocompleteFuero()
    {
        $options = array(
            'repository' => "SistemaInscripcionBundle:InscFuero",
            'field'      => "nombre",
        );
        
        $request = $this->getRequest();
        $term = $request->query->get('q', null);

        $qb = null;

        if (is_null($qb)) {
            $em = $this->getDoctrine()->getManager();

            $qb = $em->getRepository($options['repository'])->createQueryBuilder('a');
            $qb
                ->where("a.".$options['field']." LIKE :term")
                ->AndWhere("a.activo = 1")
                ->orderBy("a.".$options['field'], "ASC")
            ;
        }

        $qb->setParameter("term", "%" . $term . "%");

        $entities = $qb->getQuery()->getResult();

        $array = array();

        foreach ($entities as $entity) {
            $array[] = array(
                'id'   => $entity->getId(),
                'text' => $entity->__toString(),
            );
        }

        $response = new JsonResponse();
        $response->setData($array);

        return $response;
    }
}
