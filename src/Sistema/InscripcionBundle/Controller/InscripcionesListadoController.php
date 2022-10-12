<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Yaml\Yaml;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sistema\InscripcionBundle\Entity\InscPersona;
use Sistema\InscripcionBundle\Entity\InscFicha;
use Knp\Snappy\Pdf;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Admin controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/inscripciones/listado")
 */
class InscripcionesListadoController extends Controller
{

    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/InscripcionBundle/Resources/config/InsFicha.yml',
    );

    /**
     * Section Inscripciones.
     *
     * @Route("/OrderBy={criteria}", name="listado_inscripciones")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($criteria = 'o.id') {
        $em = $this->getDoctrine()->getManager();

        switch ($criteria) {
            case '1':
                $entities = $em->getRepository('SistemaInscripcionBundle:InscFicha')->findAllInscByTipo($criteria);
                break;
            case '2':
                $entities = $em->getRepository('SistemaInscripcionBundle:InscFicha')->findAllInscByTipo($criteria);
                break;
            default:
                $entities = $em->getRepository('SistemaInscripcionBundle:InscFicha')->findAllFichasWithAfiliado($criteria);
                break;
        }
            
        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and generate PDF a Inscripcion entity.
     *
     * @Route("/get/pdf/{id}", name="listado_pdf")
     * @Method("GET")
     * @Template()
     */
    public function inscripcionPdfAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaInscripcionBundle:InscFicha')->find($id);
        
        $molde = $em->getRepository('SistemaInscripcionBundle:InscMolde')->find($entity->getMoldeId());
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($entity->getAfiNroDoc());
        $extras = $em->getRepository('SistemaInscripcionBundle:InscExtra')->findExtrasByMoldeId($entity->getMoldeId());

        $renderView = 'SistemaInscripcionBundle:Inscripcion:fichaPdf.html.twig';

        $html = $this->renderView($renderView, array(
            'fecha'  => $entity->getFecha(),
            'entity' => $entity,
            'molde' => $molde,
            'afiliado' => $afiliado,
            'extras' => $extras,
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
}
