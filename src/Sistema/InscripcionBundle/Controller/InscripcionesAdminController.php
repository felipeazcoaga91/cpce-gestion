<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Knp\Snappy\Pdf;

use Sistema\InscripcionBundle\Entity\InscFicha;
use Sistema\InscripcionBundle\Form\InscOlimpiadaType;
use Sistema\InscripcionBundle\Form\InscOlimpiadaFilterType;

/**
 * Admin controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/inscripciones")
 */
class InscripcionesAdminController extends Controller
{
    /**
     * Section Admin Inscripciones.
     *
     * @Route("/insc", name="admin_inscripciones")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => "Default Index");
    }

    /**
     * Section Admin Inscripciones.
     *
     * @Route("/olimpiadas", name="admin_olimpiadas_index")
     * @Method("GET")
     * @Template("SistemaInscripcionBundle:InscripcionesAdmin:indexOlimpiadas.html.twig")
     */
    public function indexOlimpiadasAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SistemaInscripcionBundle:InscFichaOlimpiada')->findAllFichasWithAfiliado();
            
        return array(
            'entities' => $entities,
        );
    }

    /**
     * Section Admin Edit Olimpiadas.
     *
     * @Route("/olimpiada/edit/{id}", name="admin_olimpiada_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaInscripcionBundle:InscFicha')->find($id);
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($entity->getAfiNrodoc());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }
        
        $editForm = $this->createEditForm($entity);
        //$deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'afiliado' => $afiliado,
            //'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a entity.
     * @param array $config
     * @param $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    protected function createEditForm($entity)
    {
        $form = $this->createForm($this->get('formtype.inscolimpiadatype'), $entity, array(
            'action' => $this->generateUrl('admin_olimpiada_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form
            ->add('save', 'submit', array(
                'label'              => 'Actualizar',
                'attr'               => array(
                    'class' => 'form-control btn-success',
                    'col'   => 'col-lg-2',
                )
            ))
        ;

        return $form;
    }

    /**
     * Displays a form to create a new InscFicha entity.
     *
     * @Route("/olimpiada/update/{id}", name="admin_olimpiada_update")
     * @Method("PUT")
     * @Template("SistemaInscripcionBundle:InscripcionesAdmin:edit.html.twig")
     */
    public function updateAction($id)
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaInscripcionBundle:InscFicha')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }
        
        //$deleteForm = $this->createDeleteForm($config, $id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity = $this->controlOlimpiada($entity);
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            $nextAction = $this->generateUrl('admin_olimpiadas_index');
            return $this->redirect($nextAction);
        }

        $this->get('session')->getFlashBag()->add('danger', 'flash.update.error');

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            //'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a InscModelo entity.
     *
     * @Route("/olimpiada/delete/{id}", name="admin_olimpiada_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SistemaInscripcionBundle:InscFicha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $em->remove($entity);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');

        $nextAction = $this->generateUrl('admin_olimpiadas_index');
        return $this->redirect($nextAction);
    }

    /**
     * Finds and generate PDF a Inscripcion entity.
     *
     * @Route("/get-admin/pdf/{id}", name="admin_inscripcion_pdf")
     * @Method("GET")
     * @Template()
     */
    public function inscripcionAdminPdfAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaInscripcionBundle:InscFicha')->find($id);
        $participante = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($entity->getAfiNrodoc());

        $html = $this->renderView('SistemaInscripcionBundle:Inscripciones:inscripcionPdf.html.twig', array(
            'fecha'  => $entity->getFecha(),
            'entity' => $entity,
            'afiliado' => $participante,
        ));

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

    public function controlOlimpiada($entity) {

        $em = $this->getDoctrine()->getManager();
        
        $impHotel = 0;
        $impTransporte = 0;

        $impFicha = 4700;

        $seguro = 200;
        $cenaGral = 3000;
        $cenaMenores = 1500;
        $extra = 0;

        $countReservado = 0;

        if ($entity->getExtra()) {
            $multAcomp = 1 + count($entity->getPersonas());
            $extra = 500 * $multAcomp;
            $entity->setHotel(null);
        }

        // PRECIO TOTAL POR PARTICIPANTE
        if ($entity->getHotel()) {
            $impHotel = $entity->getHotel()->getPrecio();
            //Reserva Lugar Participante
            $hotel = $em->getRepository('SistemaInscripcionBundle:InscHotel')->find($entity->getHotel()->getId());
            $countReservado = $hotel->getReservado();
            $hotel->setReservado($countReservado + 1);
            $em->persist($hotel);
            $countReservado = 0;
        }
        if ($entity->getTransporte()) {
            $impTransporte = $entity->getTransporte()->getPrecio();
            //Reserva Transporte Participante
            $transporte = $em->getRepository('SistemaInscripcionBundle:InscTransporte')->find($entity->getTransporte()->getId());
            $countReservado = $transporte->getReservado();
            $transporte->setReservado($countReservado + 1);
            $em->persist($transporte);
            $countReservado = 0;
        }

        $subTotal = $impHotel + $impTransporte + $extra;
        $total = $entity->getImporte() + $subTotal + $impFicha;
        
        $impHotelAcomp = 0;
        $impTransporteAcomp = 0;

        // PRECIO TOTAL POR ACOMPAÑANTES
        if ($entity->getPersonas()) {

            $subTotalPersona = 0;
            foreach ($entity->getPersonas() as $key => $persona) {
                
                $edad = $this->calculaEdad($persona->getFechaNac());
                $persona->setEdad($edad);
                
                if ($persona->getHotel()) {
                    $impHotelAcomp = $impHotelAcomp + $persona->getHotel()->getPrecio();

                    //Reserva Lugar Acompañante
                    $hotel = $em->getRepository('SistemaInscripcionBundle:InscHotel')->find($entity->getHotel()->getId());
                    $countReservado = $hotel->getReservado();
                    $hotel->setReservado($countReservado + 1);
                    $em->persist($hotel);
                    $countReservado = 0;
                }  
                if ($persona->getTransporte()) {
                    $impTransporteAcomp = $impTransporteAcomp + $persona->getTransporte()->getPrecio();

                    //Reserva Transporte Acompañante
                    $transporte = $em->getRepository('SistemaInscripcionBundle:InscTransporte')->find($entity->getTransporte()->getId());
                    $countReservado = $transporte->getReservado();
                    $transporte->setReservado($countReservado + 1);
                    $em->persist($transporte);
                    $countReservado = 0;
                }  

                if ($persona->getEdad() > 12) {
                    $subTotalPersona = $subTotalPersona + $seguro + $cenaGral;
                } else {
                    if ($persona->getEdad() >= 5) {
                        $subTotalPersona = $subTotalPersona + $seguro + $cenaMenores;
                    } else {
                        $subTotalPersona = $subTotalPersona + $seguro;
                    }
                    if ($persona->getHotel()->getPrecio() == 7500) {
                        $subTotalPersona = $subTotalPersona - 250;
                    }
                    if ($entity->getExtra() == True) {
                        $subTotalPersona = $subTotalPersona - 250;
                    }
                }
            }
            $subTotalPersona = $subTotalPersona + ($impHotelAcomp + $impTransporteAcomp);
            $total = $total + $subTotalPersona;
        }

        $entity->setImporte($total);

        return $entity;
    }

    //Funcion calcula edad
    public function calculaEdad($fecha) {
        $fecha = $fecha->format('Y-m-d H:i:s');
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }
}
