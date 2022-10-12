<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Sistema\InscripcionBundle\Entity\InscMolde;
use Sistema\InscripcionBundle\Entity\InscFichaOlimpiada;

use Sistema\InscripcionBundle\Form\InscFichaOlimpiadaType;

use Knp\Snappy\Pdf;

/**
 * Ficha controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/matriculado/inscripcion-olimpiadas")
 */
class InscFichaOlimpiadaController extends Controller {

    /**
     * New InscFicha entity.
     *
     * @Route("/new/{id}", name="front_inscripcion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id) {

        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $molde = $em->getRepository('SistemaInscripcionBundle:InscMolde')->find($id);
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($user->getNrodoc());
        $ficha = $em->getRepository('SistemaInscripcionBundle:InscFichaOlimpiada')->findFichaByDocAndMoldeId($user->getTipdoc(), $user->getNrodoc(), $molde->getId());
        
        if ($ficha) {
            
            $this->get('session')->getFlashBag()->add('danger', 'Usted ya se ha inscripto, solo se puede inscribir una vez');
            $nextAction = $this->generateUrl('front_inscripcion_olimpiada_show', array('id' => $ficha->getId()));
            
            return $this->redirect($nextAction);

        } else {

            $entity = new InscFichaOlimpiada();
            $entity->setMoldeId($molde->getId());
            $extras = $em->getRepository('SistemaInscripcionBundle:InscExtra')->findExtrasByMoldeId($molde->getId());

            $form = $this->createCreateForm($entity);

            return array(
                'molde' => $molde,
                'entity' => $entity,
                'afiliado' => $afiliado,
                'extras' => $extras,
                'form'   => $form->createView(),
            );   
        }
    }

    /**
     * Creates a new InscOlimpiada entity.
     *
     * @Route("/", name="front_inscripcion_create_olimpiada")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscFichaOlimpiada:new.html.twig")
     */
    public function createAction() {

        $request = $this->getRequest();
        $entity = new InscFichaOlimpiada();
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $importeFicha = 0;
            $importeHotel = 0;
            $importeTransporte = 0;
            $importeExtras = 0;
            $importeSubTotal = 0;
            $importeSubTotalControl = 0;

            $importeFicha = floatval($request->request->get('importe_ficha'));
            $importeExtras = floatval($request->request->get('subtotal'));

            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($user->getNrodoc());

            if (!$afiliado) {
                throw $this->createNotFoundException('No se encuentra al afiliado');
            }
            
            // Sumo el importe del hotel si es que eligio el inscripto.
            if ($entity->getHotel()) {
                $importeHotel = floatval($entity->getHotel()->getImporteTotal());
            }

            // Sumo el importe del hotel si es que eligio el inscripto.
            if ($entity->getTransporte()) {
                $importeTransporte = floatval($entity->getTransporte()->getPrecio());
            }

            $importeSubTotal = $importeFicha + $importeExtras + $importeHotel + $importeTransporte;

            $entity->setAfiTipDoc($afiliado->getAfiTipDoc());
            $entity->setAfiNroDoc($afiliado->getAfiNrodoc());

            $moldeId = intval($request->request->get('molde_id'));
            $entity->setMoldeId($moldeId);

            $cantidadAcomp = count($entity->getPersonas());

            if ($cantidadAcomp > 0) {
                $importeSubTotalControl = floatval($this->controlFichaAcomp($entity));
                $importeSubTotal += $importeSubTotalControl;
            }

            $entity->setImporteTotal($importeSubTotal);

            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('success', 'Usted se ha inscripto correctamente');

            $nextAction = $this->generateUrl('front_inscripcion_olimpiada_show', array('id' => $entity->getId()));
            
            return $this->redirect($nextAction);
        } else {
            $this->get('session')->getFlashBag()->add('danger', 'Hubo un problema al intentar validad el formulario.');

            $nextAction = $this->generateUrl('front_inscripcion');
            return $this->redirect($nextAction);
        }
    }

    /**
     * Finds and displays a InscFicha entity.
     *
     * @Route("/{id}", name="front_inscripcion_olimpiada_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaInscripcionBundle:InscFichaOlimpiada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ficha entity.');
        }

        $molde = $em->getRepository('SistemaInscripcionBundle:InscMolde')->find($entity->getMoldeId());
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($entity->getAfiNroDoc());
        $extras = $em->getRepository('SistemaInscripcionBundle:InscExtra')->findExtrasByMoldeId($entity->getMoldeId());

        return array(
            'entity' => $entity,
            'afiliado' => $afiliado,
            'molde' => $molde,
            'extras' => $extras,
        );
    }

    /**
     * Creates a form to create a entity.
     * @param array $config
     * @param $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    protected function createCreateForm($entity) {

        $formType = new InscFichaOlimpiadaType();
        
        $form = $this->createForm($formType, $entity, array(
            'action' => $this->generateUrl('front_inscripcion_create_olimpiada'),
            'method' => 'POST',
        ));

        $form
            ->add('save', 'submit', array(
                'translation_domain' => 'MWSimpleAdminCrudBundle',
                'label'              => 'Inscribirse',
                'attr'               => array(
                    'class' => 'form-control btn-success',
                    'col'   => 'col-lg-3',
                )
            ))
        ;

        return $form;
    }

    public function controlFichaAcomp($entity) {

        $em = $this->getDoctrine()->getManager();
        $extras = $em->getRepository('SistemaInscripcionBundle:InscExtra')->findExtrasByMoldeId($entity->getMoldeId());

        $cantidadAcomp = count($entity->getPersonas());
        $subTotalAcomp = 0;
        $importeHotelAcomp = 0;
        $importeExtras = 0;

        if ($cantidadAcomp > 0) {
            // foreach ($extras as $extra) {
            //     $importeExtras += floatval($extra->getImporte()); 
            // }

            // $subTotalAcomp = $importeExtras * $cantidadAcomp;

            // Voy a sumar la estadia de los participantes.
            if ($entity->getPersonas()) {
    
                foreach ($entity->getPersonas() as $key => $persona) {
                    
                    $edad = $this->calculaEdad($persona->getFechaNac());
                    $persona->setEdad($edad);
                    
                    if ($persona->getHotel()) {
                        $hotel = $persona->getHotel();
                        $importeHotelAcomp = floatval($hotel->getImporteOtro());
                        $subTotalAcomp += $importeHotelAcomp;
                        
                        //Reserva Lugar Acompañante
                        $countReservado = $hotel->getReservado();
                        $hotel->setReservado($countReservado + 1);
                        $em->persist($hotel);
                        $countReservado = 0;
                        $importeHotelAcomp = 0;
                    }

                    if ($persona->getTransporte()) {
                        $transporte = $persona->getTransporte();
                        $importeTransporteAcomp = floatval($transporte->getPrecio());
                        $subTotalAcomp += $importeTransporteAcomp;
                        
                        //Reserva Lugar Acompañante
                        $countReservado = $transporte->getReservado();
                        $transporte->setReservado($countReservado + 1);
                        $em->persist($transporte);
                        $countReservado = 0;
                        $importeTransporteAcomp = 0;
                    }
    
                }
            }
        }

        return $subTotalAcomp;
    }

    /**
     * Finds and generate PDF a Inscripcion entity.
     *
     * @Route("/get/pdf/{id}", name="front_inscripcion_olimpiada_pdf")
     * @Method("GET")
     * @Template()
     */
    public function fichaPdfAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaInscripcionBundle:InscFichaOlimpiada')->find($id);
        
        $molde = $em->getRepository('SistemaInscripcionBundle:InscMolde')->find($entity->getMoldeId());
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($entity->getAfiNroDoc());
        $extras = $em->getRepository('SistemaInscripcionBundle:InscExtra')->findExtrasByMoldeId($entity->getMoldeId());

        $renderView = 'SistemaInscripcionBundle:InscFichaOlimpiada:fichaPdf.html.twig';

        $html = $this->renderView($renderView, array(
            'fecha'  => $entity->getFecha(),
            'entity' => $entity,
            'molde' => $molde,
            'afiliado' => $afiliado,
            'extras' => $extras,
        ));

        // descomentar estas lineas para ver el html sin impresion.

        // $html = array(
        //     'fecha'  => $entity->getFecha(),
        //     'entity' => $entity,
        //     'molde' => $molde,
        //     'afiliado' => $afiliado,
        //     'extras' => $extras,
        // );

        // return $html;

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml(
                $html,
                array(
                    'images'                => true,
                    'enable-external-links' => true
                )
            ),
            200,
            array(
                'images'                => true,
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="inscripcion_nro_' . $entity->getId() . '.pdf"'
            )
        );
    }

    //Funcion calcula edad
    public function calculaEdad($fecha) {
        $fecha = $fecha->format('Y-m-d H:i:s');
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }

}