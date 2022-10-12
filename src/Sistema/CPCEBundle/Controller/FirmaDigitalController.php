<?php

namespace Sistema\CPCEBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Goutte\Client;
use Symfony\Component\Yaml\Yaml;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Sistema\CPCEBundle\Entity\FirmaDigital;
use Sistema\CPCEBundle\Entity\Comitente;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * FirmaDigital controller.
 * @author Max Shtefec <max.shtefec@gmail.com>
 *
 * @Route("/firmadigital")
 */
class FirmaDigitalController extends Controller {

    /**
     * @Route("/", name="firma_digital_resolucion")
     * @Method("GET")
     * @Template("SistemaCPCEBundle:FirmaDigital:a_resolucion.html.twig")
     */
    public function resolucionAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->setMethod('GET')
            ->add('resolucion', 'choice', array(
                'label'   => 'Selecciona tipo de formulario',
                'choices' => array(
                    1 => 'Cliente Persona Humana',
                    2 => 'Cliente Persona Jurídica',
                    3 => 'Cliente Persona Jurídica con Sindicatura Societaría de Contador Público',
                ),
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-3 col-md-6 col-sm-8',
                )
            ))
            ->add('siguiente', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-default pull-right'
                ),
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $tipo = $form["resolucion"]->getData();
            
            $entity = new FirmaDigital();
            $entity->setTipo($tipo);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('firma_digital_cliente', array('id' => $entity->getId())));
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/cliente/{id}", name="firma_digital_cliente")
     * @Method("GET")
     * @Template("SistemaCPCEBundle:FirmaDigital:b_cliente.html.twig")
     */
    public function clienteAction($id ,Request $request)
    {

        $form = $this->createFormBuilder()
            ->setMethod('GET')
            ->add('cuit', 'text', array(
                'label'   => 'Cuit',
                'required'   => true,
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                )
            ))
            ->add('comitente', 'text', array(
                'label'   => 'Comitente',
                'read_only' => 'true',
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                )
            ))
            ->add('domicilio', 'text', array(
                'label'   => 'Domilicio legal',
                'read_only' => 'true',
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                   
                )
            ))
            ->add('ciudad', 'text', array(
                'label'   => 'Ciudad',
                'read_only' => 'true',
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                )
            ))
            ->add('provincia', 'text', array(
                'label'   => 'Provincia',
                'read_only' => 'true',
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                )
            ))
            ->add('siguiente', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-default pull-right',
                ),
            ))
            ->getForm();
            
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // $client = new Client();
            // $response = $client->request('GET', 'https://afip.tangofactura.com/Rest/GetContribuyenteFull?cuit=30-55352699-6');
            // ladybug_dump_die($response);

            $cuit = $form["cuit"]->getData();
            $cliente = $em->getRepository('SistemaCPCEBundle:Comitente')->findOneBy(array(
                'afiTipdoc' => 'COM',
                'afiCuit'   => str_replace("-", "", $cuit),
            ));
            
            $entity = $em->getRepository('Sistema\CPCEBundle\Entity\FirmaDigital')->find($id);
            $entity->setCliente($cliente);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('firma_digital_trabajo', array('id' => $entity->getId())));
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/trabajo/{id}", name="firma_digital_trabajo")
     * @Method("GET")
     * @Template("SistemaCPCEBundle:FirmaDigital:c_trabajo.html.twig")
     */
    public function trabajoAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $firma = $em->getRepository('Sistema\CPCEBundle\Entity\FirmaDigital')->find($id);

        $tareas = $em->getRepository('Sistema\CPCEBundle\Entity\Tareas')->findBy(
            array('tarActivo' => '1', 'tarActivoweb' => '1')
        );

        // foreach ($tareas as $key => $tarea) {
            if ($firma->getTipo() == 1) {
                unset($tareas[3], $tareas[7], $tareas[18], $tareas[32]);
            }
            if ($firma->getTipo() == 2) {
                // ladybug_dump_die($tareas[19]);
                unset($tareas[19]);
            }
            if ($firma->getTipo() == 3) {
                unset($tareas[3], $tareas[7], $tareas[18], $tareas[32]);
            }
        // }
        
        $form = $this->createFormBuilder()
            ->setMethod('GET')
            ->add('trabajo', 'entity', array(
                'label'   => 'Selecciona servicio',
                'class' => 'Sistema\CPCEBundle\Entity\Tareas',
                'choices' => $tareas,
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                )
            ))
            ->add('fechaCierre', 'date', array(
                'required'   => true,
                'label'      => 'Fecha de cierre / corte',
                'widget' => 'single_text',
                'attr' => array (
                    'class' => 'datepicker'
                ),
            ))
            ->add('fechaInforme', 'date', array(
                'required'   => true,
                'label'      => 'Fecha del informe / certificación',
                'widget' => 'single_text',
                'attr' => array (
                    'class' => 'datepicker'
                ),
            ))
            ->add('periodoInicio', 'date', array(
                'required'   => true,
                'label'      => 'Periodo',
                'widget' => 'single_text',
                'attr' => array (
                    'class' => 'datepicker'
                ),
            ))
            ->add('periodoFin', 'date', array(
                'required'   => true,
                'label'      => 'a',
                'widget' => 'single_text',
                'attr' => array (
                    'class' => 'datepicker',
                ),
            ))
            ->add('siguiente', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-default pull-right',
                ),
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $trabajo = $form["trabajo"]->getData();
            $fechaCierre = $form["fechaCierre"]->getData();
            $fechaInforme = $form["fechaInforme"]->getData();
            $periodoInicio = $form["periodoInicio"]->getData();
            $periodoFin = $form["periodoFin"]->getData();
            $entity = $em->getRepository('Sistema\CPCEBundle\Entity\FirmaDigital')->find($id);
            $entity->setTrabajo($trabajo);
            $entity->setFechaCierre($fechaCierre);
            $entity->setFechaInforme($fechaInforme);
            $entity->setPeriodoInicio($periodoInicio);
            $entity->setPeriodoFin($periodoFin);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('firma_digital_profesional', array('id' => $entity->getId())));
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/profesional/{id}", name="firma_digital_profesional")
     * @Method("GET")
     * @Template("SistemaCPCEBundle:FirmaDigital:d_profesional.html.twig")
     */
    public function profesionalAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getNrodoc();

        $profesional = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($userId);
        if (!$profesional) {
            throw $this->createNotFoundException('Unable to find '. 'Afiliado' .' entity.');
        }

        $form = $this->createFormBuilder()
            ->setMethod('GET')
            ->add('cuit', 'text', array(
                'label'   => 'Cuit',
                'read_only' => 'true',
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                )
            ))
            ->add('nombre', 'text', array(
                'label'   => 'Nombre',
                'read_only' => 'true',
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                )
            ))
            ->add('domicilio', 'text', array(
                'label'   => 'Domilicio legal',
                'read_only' => 'true',
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                   
                )
            ))
            ->add('ciudad', 'text', array(
                'label'   => 'Ciudad',
                'read_only' => 'true',
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                )
            ))
            ->add('provincia', 'text', array(
                'label'   => 'Provincia',
                'read_only' => 'true',
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-12 col-md-6 col-sm-8',
                )
            ))
            ->add('siguiente', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-default pull-right',
                ),
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entity = $em->getRepository('Sistema\CPCEBundle\Entity\FirmaDigital')->find($id);
            $entity->setProfesional($profesional);
            $em->persist($entity);
            $em->flush();

            return $this->AnexoPdfAction($entity->getId(), $entity->getTipo());
        }

        return array(
            'form' => $form->createView(),
            'entity' => $profesional
        );
    }

    /**
     * Displays a welcome.
     *
     * @Route("/AnexoPdf")
     * @Template()
     */
    public function AnexoPdfAction($id, $tipo) {

        /* TIPOS 1, 2, 3 que corresponden a los anexos */

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Sistema\CPCEBundle\Entity\FirmaDigital')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $fecha = new \Datetime('today');

        $html = $this->renderView('SistemaCPCEBundle:FirmaDigital:modelo' . $tipo . 'Pdf.html.twig', array(
            'fecha'  => $fecha->format("d/m/Y"),
            'entity' => $entity,
        ));

        $response = new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml(
                $html,
                array(
                    'page-size'             => 'A4',
                    'images'                => true,
                    'enable-external-links' => true
                )
            ),
            200,
            array(
                'images'                => true,
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="trabajo_firmadigital_'.$entity->getId().'.pdf"'
            )
        );

        return $response;

        // return new Response($html);
    }

    /**
     * @Route("/get-client-info", options={"expose" = true}, name="ajax_get_cliente")
     */
    public function clienteShowAction(Request $request) {

        if ($request->isXmlHttpRequest()) {

            $cuit = $request->request->get('cuit');
            
            $em = $this->getDoctrine()->getManager();
            
            $entity = $em->getRepository('SistemaCPCEBundle:Comitente')->findOneBy(array(
                'afiTipdoc' => 'COM',
                'afiCuit'   => $cuit,
            ));

            if (!is_null($entity)) {
               
                return new JsonResponse([
                    'clientDIR' => $entity->getAfiDireccion(),
                    'clientCiudad' => $entity->getAfiLocalidad(),
                    'clientNombre' => $entity->getAfiNombre(),
                    'clientProvincia' => $entity->getAfiProvincia()
                ]);
                
            } else {
                $entity = $em->getRepository('SistemaCPCEBundle:Afiliado')->findOneBy(array(
                    'afiTipdoc' => 'DNI',
                    'afiCuit'   => $cuit,
                ));

                if (is_null($entity)) {
                    return new JsonResponse([
                        'clientDIR' => "No se encontro datos. Intente de nuevo!.",
                        'clientCiudad' => "No se encontro datos. Intente de nuevo!.",
                        'clientNombre' => "No se encontro datos. Intente de nuevo!.",
                        'clientProvincia' => "No se encontro datos. Intente de nuevo!."
                    ]);
                } else {

                    $comitente = new Comitente();
                    $comitente
                        ->setAfiNombre($entity->getAfiNombre())
                        ->setAfiFecnac($entity->getAfiFecnac())
                        ->setAfiTipo("C")
                        ->setAfiTipdoc("COM")
                        ->setAfiNrodoc($entity->getAfiNrodoc())
                        ->setAfiTitulo($entity->getAfiTitulo())
                        ->setAfiMatricula($entity->getAfiMatricula())
                        ->setAfiDireccion($entity->getAfiDireccion())
                        ->setAfiLocalidad($entity->getAfiLocalidad())
                        ->setAfiProvincia($entity->getAfiProvincia())
                        ->setAfiZona($entity->getAfiZona())
                        ->setAficodpos($entity->getAficodpos())
                        ->setAfiTelefono1($entity->getAfiTelefono1())
                        ->setAfiCelular($entity->getAfiCelular())
                        ->setAfiMail($entity->getAfiMail())
                        ->setAfiTipoiva($entity->getAfiTipoiva())
                        ->setAfiCuit($entity->getAfiCuit())
                        ->setAfiDgr($entity->getAfiDgr())
                        ->setAfiLote($entity->getAfiLote())
                    ;

                    $em->persist($comitente);
                    $em->flush();

                    return new JsonResponse([
                        'clientDIR' => $comitente->getAfiDireccion(),
                        'clientCiudad' => $comitente->getAfiLocalidad(),
                        'clientNombre' => $comitente->getAfiNombre(),
                        'clientProvincia' => $comitente->getAfiProvincia()
                    ]);
                }

            }

            
        } else {
            // te estan hackeando
        }
    }
     
}