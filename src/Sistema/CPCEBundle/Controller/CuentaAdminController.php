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
 * @Route("/admin/cuenta")
 */
class CuentaAdminController extends Controller
{
    private $tipdoc;
    private $nrodoc;
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/CPCEBundle/Resources/config/AdminCuenta.yml',
    );

    /**
     * Create query.
     * @param string $repository
     * @return Doctrine\ORM\QueryBuilder $queryBuilder
     */
    protected function createQuery($repository)
    {
        $request = $this->getRequest();
        if ($request->isMethod('POST')) {
            $this->tipdoc = $request->get('tipdoc');
            $this->nrodoc = $request->get('nrodoc');
        } else {
            $this->tipdoc = null;
            $this->nrodoc = null;
        }
        $fecven = new \DateTime('Today');
        //Agrego 10 dias para que el 1ero traiga la cuota que vence el 10
        $fecven->modify('+10 day');

        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository($repository)
            ->getQueryTotalesByAfiliado($this->tipdoc, $this->nrodoc, $fecven);

        return $queryBuilder;
    }

    /**
     * @Route("/", name="admin_cuenta")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new CuentaFilterType();

        $config = $this->getConfig();
        list($filterForm, $queryBuilder) = $this->filter($config);

        //remove the form to return to the view
        unset($config['filterType']);

        $em = $this->getDoctrine()->getManager();
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')
            ->findAfiliadoByDoc($this->tipdoc, $this->nrodoc);
        $saldosTotales = $em->getRepository($config['repository'])
            ->getQueryTotalesCompletoByAfiliado($this->tipdoc, $this->nrodoc);

        return array(
            'config'        => $config,
            'entities'      => $queryBuilder->getQuery()->getResult(),
            'filterForm'    => $filterForm->createView(),
            'afiliado'      => $afiliado,
            'tipdoc'        => $this->tipdoc,
            'nrodoc'        => $this->nrodoc,
            'saldosTotales' => $saldosTotales,
        );
    }

    /**
     * Exporter Cuenta.
     *
     * @Route("/exporter/{format}", name="admin_cuenta_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * @Route("/{cuenta}", name="admin_cuenta_detalle")
     * @Method("GET")
     * @Template()
     */
    public function detalleAction($cuenta)
    {
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $request = $this->getRequest();

        $tipdoc = $request->get('tipdoc');
        $nrodoc = $request->get('nrodoc');

        $entities = $em->getRepository($config['repository'])
            ->findDetalleByAfiliadoCuenta($tipdoc, $nrodoc, $cuenta);
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')
            ->findAfiliadoByDoc($tipdoc, $nrodoc);
        $saldoTotalAsientos = $em->getRepository($config['repository'])
            ->findSaldoTotalDetalleByAfiliadoCuenta($tipdoc, $nrodoc, $cuenta);

        return array(
            'config'             => $config,
            'entities'           => $entities,
            'afiliado'           => $afiliado,
            'tipdoc'             => $tipdoc,
            'nrodoc'             => $nrodoc,
            'cuenta'             => $cuenta,
            'saldoTotalAsientos' => $saldoTotalAsientos,
        );
    }

    /**
     * Finds and generate PDF a Totales entity.
     *
     * @Route("/pdf/listado", name="admin_cuenta_pdf_listado")
     * @Method("POST")
     * @Template()
     */
    public function listadoPdfAction()
    {
        $this->config['filterType'] = new CuentaFilterType();

        $config = $this->getConfig();
        list($filterForm, $queryBuilder) = $this->filter($config);

        //remove the form to return to the view
        unset($config['filterType']);

        $em = $this->getDoctrine()->getManager();
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')
            ->findAfiliadoByDoc($this->tipdoc, $this->nrodoc);
        $saldosTotales = $em->getRepository($config['repository'])
            ->getQueryTotalesCompletoByAfiliado($this->tipdoc, $this->nrodoc);

        $fecha = new \Datetime('today');

        $html = $this->renderView('SistemaCPCEBundle:Listado:pdf.html.twig', array(
            'fecha'         => $fecha->format("d/m/Y"),
            'entities'      => $queryBuilder->getQuery()->getResult(),
            'afiliado'      => $afiliado,
            'saldosTotales' => $saldosTotales,
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
                'Content-Disposition'   => 'attachment; filename="matriculado_'.$this->tipdoc.'_'.$this->nrodoc.'.pdf"'
            )
        );
    }

    /**
     * Finds and generate PDF a Totales entity.
     *
     * @Route("/pdf/detalle/{cuenta}", name="admin_cuenta_pdf_detalle")
     * @Method("GET")
     * @Template()
     */
    public function detallePdfAction($cuenta)
    {
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $request = $this->getRequest();

        $tipdoc = $request->get('tipdoc');
        $nrodoc = $request->get('nrodoc');

        $entities = $em->getRepository($config['repository'])
            ->findDetalleByAfiliadoCuenta($tipdoc, $nrodoc, $cuenta);
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')
            ->findAfiliadoByDoc($tipdoc, $nrodoc);
        $saldoTotalAsientos = $em->getRepository($config['repository'])
            ->findSaldoTotalDetalleByAfiliadoCuenta($tipdoc, $nrodoc, $cuenta);

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
                'Content-Disposition'   => 'attachment; filename="cuenta_'.$tipdoc.'_'.$nrodoc.'_'.$cuenta.'.pdf"'
            )
        );
    }
}