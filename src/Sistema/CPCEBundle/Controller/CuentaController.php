<?php

namespace Sistema\CPCEBundle\Controller;

use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\CPCEBundle\Entity\Totales;
use Sistema\CPCEBundle\Form\CuentaFilterType;

/**
 * Trabajo controller.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 *
 * @Route("/matriculado/cuenta")
 */
class CuentaController extends Controller
{
    private $tipdoc;
    private $nrodoc;
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/CPCEBundle/Resources/config/FrontCuenta.yml',
    );

    /**
     * Create query.
     * @param string $repository
     * @return Doctrine\ORM\QueryBuilder $queryBuilder
     */
    protected function createQuery($repository)
    {
        $user = $this->getUser();
        if (!$user) {
            throw $this->createNotFoundException('No se encuentran los datos del matriculado.');
        }
        $this->tipdoc = $user->getTipdoc();
        $this->nrodoc = $user->getNrodoc();
        $fecven = new \DateTime('Today');
        //Agrego 10 dias para que el 1ero traiga la cuota que vence el 10
        $fecven->modify('+10 day');

        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository($repository)
            ->getQueryTotalesByAfiliado($this->tipdoc, $this->nrodoc, $fecven);

        return $queryBuilder;
    }

    /**
     * @Route("/", name="front_cuenta")
     * @Template()
     */
    public function indexAction()
    {
        // ini_set('memory_limit','256M');
        // $user     = $this->getUser();
        // if (!$user) {
        //     throw $this->createNotFoundException('No se encuentran los datos del matriculado.');
        // }

        // $em      = $this->getDoctrine()->getManager();
        // $cuentas = $em->getRepository('SistemaCPCEBundle:Totales')->findTotalesByAfiliado($user->getTipdoc(), $user->getNrodoc());

        // return array('cuentas' => $cuentas);
        $this->config['filterType'] = new CuentaFilterType();

        $config = $this->getConfig();
        list($filterForm, $queryBuilder) = $this->filter($config);

        $em = $this->getDoctrine()->getManager();
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')
            ->findAfiliadoByDoc($this->tipdoc, $this->nrodoc);
        $saldosTotales = $em->getRepository($config['repository'])
            ->getQueryTotalesCompletoByAfiliado($this->tipdoc, $this->nrodoc);
        // $paginator  = $this->get('knp_paginator');
        // $pagination = $paginator->paginate(
        //     $queryBuilder,
        //     $this->get('request')->query->get('page', 1),
        //     ($this->container->hasParameter('knp_paginator.page_range')) ? $this->container->getParameter('knp_paginator.page_range'):10
        // );
        //remove the form to return to the view
        unset($config['filterType']);

        return array(
            'config'        => $config,
            'entities'      => $queryBuilder->getQuery()->getResult(),
            'filterForm'    => $filterForm->createView(),
            'afiliado'      => $afiliado,
            'saldosTotales' => $saldosTotales,
        );
    }

    /**
     * Exporter Cuenta.
     *
     * @Route("/exporter/{format}", name="front_cuenta_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * @Route("/{cuenta}", name="front_cuenta_detalle")
     * @Method("GET")
     * @Template()
     */
    public function detalleAction($cuenta)
    {
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();
        if (!$user) {
            throw $this->createNotFoundException('No se encuentran los datos del matriculado.');
        }

        $entities = $em->getRepository($config['repository'])
            ->findDetalleByAfiliadoCuenta($user->getTipdoc(), $user->getNrodoc(), $cuenta);

        $saldoTotalAsientos = $em->getRepository($config['repository'])
            ->findSaldoTotalDetalleByAfiliadoCuenta($user->getTipdoc(), $user->getNrodoc(), $cuenta);

        $plan = $em->getRepository('SistemaCPCEBundle:Plancuen')->find($cuenta);
        
        return array(
            'config'             => $config,
            'entities'           => $entities,
            'cuenta'             => $cuenta,
            'saldoTotalAsientos' => $saldoTotalAsientos,
            'permiteImprimir' => $plan->getPlaPermitewebimprimir(),
        );
    }

    /**
     * Finds and generate PDF a Totales entity.
     *
     * @Route("/pdf/{cuenta}", name="front_cuenta_pdf")
     * @Method("GET")
     * @Template()
     */
    public function cuentaPdfAction($cuenta)
    {
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();
        if (!$user) {
            throw $this->createNotFoundException('No se encuentran los datos del matriculado.');
        }

        $entities = $em->getRepository($config['repository'])
            ->findDetalleByAfiliadoCuenta($user->getTipdoc(), $user->getNrodoc(), $cuenta);
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')
            ->findAfiliadoByDoc($user->getTipdoc(), $user->getNrodoc());
        $saldoTotalAsientos = $em->getRepository($config['repository'])
            ->findSaldoTotalDetalleByAfiliadoCuenta($user->getTipdoc(), $user->getNrodoc(), $cuenta);

        $fecha = new \Datetime('today');

        $html = $this->renderView('SistemaCPCEBundle:Detalle:pdf.html.twig', array(
            'fecha'              => $fecha->format("d/m/Y"),
            'entities'           => $entities,
            'afiliado'           => $afiliado,
            'saldoTotalAsientos' => $saldoTotalAsientos,
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
                'Content-Disposition'   => 'attachment; filename="cuenta_'.$user->getTipdoc().'_'.$user->getNrodoc().'_'.$cuenta.'.pdf"'
            )
        );
    }

    /**
     * Impresion de Comprobantes de Cuenta
     *
     * @Route("/imprimir/asiento/{asiento}", name="front_cuenta_imprimir")
     * @Method({"GET"})
     */
    public function cuentaImprimirAction($asiento)
    {
        $config = $this->getConfig();
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->findAfiliadoByDoc($user->getTipdoc(), $user->getNrodoc());

        $comproba = $em->getRepository('SistemaCPCEBundle:Comproba')->findOneBy(
            array(
                'comNroasi' => $asiento,
                'comTipdoc' => $user->getTipdoc(),
                'comNrodoc' => $user->getNrodoc()
            )
        );

        $totales = $em->getRepository('SistemaCPCEBundle:Totales')->findOneBy(
            array(
                'totNroasi' => $comproba->getComNroasi(),
                'totNrocom' => $comproba->getComNrocom()
            )
        );

        $proceso = $em->getRepository('SistemaCPCEBundle:Procesos')->findOneBy(
            array(
                'proCodigo' => $totales->getTotProceso()
            )
        );
        
        $plan = $em->getRepository('SistemaCPCEBundle:Plancuen')->findOneBy(
            array(
                'plaNropla' => $totales->getTotNropla()
            )
        );

        $tipo = '';
        switch ($plan->getPlaNropla()) {
            case '13070100': 
            case '21010300':
                $tipo = 'Reintegro Honorarios';
                break;
            case '11030900':
                $tipo = 'Deposito' . $plan->getPlaNomcorto();
                break;
            case '11030801':
            case '11031001':
                $tipo = 'Debito';
                break;
            default:
                $tipo = $plan->getPlaNomcorto();
                break;
        }

        if (!$comproba) {
            return $this->get('session')->getFlashBag()->add('danger', 'Su comprobante no pudo ser generado');
        } else {

            $html = $this->renderView('SistemaCPCEBundle:Detalle:comprobante.html.twig', array(
                'afiliado' => $afiliado,
                'comproba' => $comproba,
                'total'    => $totales->getTotDebe(),
                'tipo'     => $tipo,
                'proceso'  => $proceso
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
                    'Content-Disposition'   => 'attachment; filename="comprobante_nro_'. $comproba->getComNrocom() .'.pdf"'
                )
            );
        }

    }
}