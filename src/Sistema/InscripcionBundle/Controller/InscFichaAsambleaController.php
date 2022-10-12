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
use Sistema\InscripcionBundle\Entity\InscFichaAsamblea;

use Sistema\InscripcionBundle\Form\InscFichaAsambleaType;

use Knp\Snappy\Pdf;

/**
 * Ficha controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/matriculado/inscripcion-asamblea")
 */
class InscFichaAsambleaController extends Controller {

    /**
     * New InscFicha entity.
     *
     * @Route("/new/{id}", name="front_inscripcion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id) {

        $em = $this->getDoctrine()->getManager();
        $molde = $em->getRepository('SistemaInscripcionBundle:InscMolde')->find($id);

        $user = $this->getUser();    
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($user->getNrodoc());

        $entity = new InscFichaAsamblea();
        $entity->setMoldeId($molde->getId());
        
        $form = $this->createCreateForm($entity);

        return array(
            'molde' => $molde,
            'entity' => $entity,
            'afiliado' => $afiliado,
            'form'   => $form->createView(),
        );   
    }

    /**
     * Creates a new Inscasamblea entity.
     *
     * @Route("/", name="front_inscripcion_create_asamblea")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscFichaAsamblea:new.html.twig")
     */
    public function createAction() {

        $request = $this->getRequest();
        $entity = new InscFichaAsamblea();
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $importeFicha = 0;
            $importeSubTotal = 0;
            $importeSubTotalControl = 0;

            $importeFicha = floatval($request->request->get('importe_ficha'));
            
            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($user->getNrodoc());

            if (!$afiliado) {
                throw $this->createNotFoundException('No se encuentra al afiliado');
            }
            
            $importeSubTotal = $importeFicha;

            $entity->setAfiTipDoc($afiliado->getAfiTipDoc());
            $entity->setAfiNroDoc($afiliado->getAfiNrodoc());

            $moldeId = intval($request->request->get('molde_id'));
            $entity->setMoldeId($moldeId);

            $entity->setImporteTotal($importeSubTotal);

            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('success', 'Usted se ha inscripto correctamente');

            $nextAction = $this->generateUrl('front_inscripcion_asamblea_show', array('id' => $entity->getId()));
            
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
     * @Route("/{id}", name="front_inscripcion_asamblea_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SistemaInscripcionBundle:InscFichaAsamblea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ficha entity.');
        }

        $molde = $em->getRepository('SistemaInscripcionBundle:InscMolde')->find($entity->getMoldeId());
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($entity->getAfiNroDoc());
        
        return array(
            'entity' => $entity,
            'afiliado' => $afiliado,
            'molde' => $molde,
        );
    }

    /**
     * Creates a form to create a entity.
     * @param array $config
     * @param $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    protected function createCreateForm($entity) {

        $formType = new InscFichaAsambleaType();
        
        $form = $this->createForm($formType, $entity, array(
            'action' => $this->generateUrl('front_inscripcion_create_asamblea'),
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

    /**
     * Finds and generate PDF a Inscripcion entity.
     *
     * @Route("/get/pdf/{id}", name="front_inscripcion_asamblea_pdf")
     * @Method("GET")
     * @Template()
     */
    public function fichaPdfAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaInscripcionBundle:InscFichaAsamblea')->find($id);
        
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($entity->getAfiNroDoc());
        
        $renderView = 'SistemaInscripcionBundle:InscFichaAsamblea:fichaPdf.html.twig';

        // $html = $this->renderView($renderView, array(
        //     'fecha'  => $entity->getFecha(),
        //     'entity' => $entity,
        //     'afiliado' => $afiliado,
        // ));

        // descomentar estas lineas para ver el html sin impresion.

        $html = array(
            'fecha'  => $entity->getFecha(),
            'entity' => $entity,
            'afiliado' => $afiliado,
        );

        return $html;

        // return new Response(
        //     $this->get('knp_snappy.pdf')->getOutputFromHtml(
        //         $html,
        //         array(
        //             'images'                => true,
        //             'enable-external-links' => true
        //         )
        //     ),
        //     200,
        //     array(
        //         'images'                => true,
        //         'Content-Type'          => 'application/pdf',
        //         'Content-Disposition'   => 'attachment; filename="inscripcion_nro_' . $entity->getId() . '.pdf"'
        //     )
        // );
    }

}