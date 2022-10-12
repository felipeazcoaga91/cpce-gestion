<?php

namespace Sistema\CPCEBundle\Controller;

use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\CPCEBundle\Entity\Trabajo;
use Sistema\CPCEBundle\Entity\Afiliado;
use Sistema\CPCEBundle\Entity\Comitente;
use Sistema\CPCEBundle\Form\FrontTrabajoType;
use Sistema\CPCEBundle\Form\FrontTrabajoConfirmarType;
use Sistema\CPCEBundle\Form\TrabajoFilterType;
use Goutte\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Trabajo controller.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 *
 * @Route("/matriculado")
 */
class DefaultController extends Controller
{

    private $tipdoc;
    private $nrodoc;
    private $montoHonorario = false;

    /**
     * @Route("/", name="afiliado")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => "Default Index");
    }

    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/CPCEBundle/Resources/config/FrontTrabajo.yml',
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

        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository($repository)
            ->createQueryBuilder('a')
            ->where('a.user = :user')
            ->setParameter('user', $user)
            ->orderBy('a.id', 'DESC')
        ;

        return $queryBuilder;
    }

    /**
     * Lists all Trabajo entities.
     *
     * @Route("/trabajos", name="front_trabajo")
     * @Method("GET")
     * @Template()
     */
    public function indexTrabajoAction()
    {
        $this->config['filterType'] = new TrabajoFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * @Route("/liquidaciones/trabajo/{id}", name="front_trabajo_liquidaciones")
     * @Method("GET")
     * @Template()
     */
    public function liquidacionesAction($id)
    {
        $this->config['filterType'] = new TrabajoFilterType();

        $config = $this->getConfig();
        list($filterForm, $queryBuilder) = $this->filter($config);

        $em = $this->getDoctrine()->getManager();
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->findAfiliadoByDoc($this->tipdoc, $this->nrodoc);
        $trabajo = $em->getRepository('SistemaCPCEBundle:Trabajo')->find($id);
        $nro_legalizacion = $trabajo->getNroLegalizacion();
        $comprobantes = $em->getRepository('SistemaCPCEBundle:Comproba')->getComprobantesLiquidacionesByAfiliadoAndTrabajo($this->tipdoc, $this->nrodoc, $nro_legalizacion);
        
        unset($config['filterType']);

        return array(
            'config'        => $config,
            'entities'      => $queryBuilder->getQuery()->getResult(),
            'filterForm'    => $filterForm->createView(),
            'trabajo'       => $trabajo,
            'afiliado'      => $afiliado,
            'comprobantes'  => $comprobantes,
        );
    }

    /**
     * @Route("/liquidacion/{id}", name="front_liquidacion_detalle")
     * @Method("GET")
     * @Template()
     */
    public function liquidacionDetalleAction($id)
    {
        $this->config['filterType'] = new TrabajoFilterType();

        $config = $this->getConfig();
        list($filterForm, $queryBuilder) = $this->filter($config);

        $em = $this->getDoctrine()->getManager();

        $comprobante = $em->getRepository('SistemaCPCEBundle:Comproba')->getComPByNrocom($id);
        $totales = $em->getRepository('SistemaCPCEBundle:Totales')->getTotalesByNroAsi($comprobante->getComNroAsi());
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->findAfiliadoByDoc($comprobante->getComTipdoc(), $comprobante->getComNrodoc());
        $comitente = $em->getRepository('SistemaCPCEBundle:Comitente')->findComitenteByNro('COM', $comprobante->getComNrocmt());
        $trabajo = $em->getRepository('SistemaCPCEBundle:Trabajo')->getTrabajoByNroLegalizacion($comprobante->getComNrotrabajo());
        
        unset($config['filterType']);

        return array(
            'config'        => $config,
            'entities'      => $queryBuilder->getQuery()->getResult(),
            'filterForm'    => $filterForm->createView(),
            'afiliado'      => $afiliado,
            'comprobante'   => $comprobante,
            'totales'       => $totales,
            'comitente'     => $comitente,
            'trabajo'       => $trabajo,
            'id'            => $id,
        );
    }

    /**
     * @Route("/liquidacion/pdf/{id}", name="front_liquidacion_pdf")
     * @Method("GET")
     * @Template()
     */
    public function liquidacionPdfAction($id)
    {  
        $this->config['filterType'] = new TrabajoFilterType();

        $config = $this->getConfig();
        list($filterForm, $queryBuilder) = $this->filter($config);

        $fecha = new \Datetime('today');

        $em = $this->getDoctrine()->getManager();
        $comprobante = $em->getRepository('SistemaCPCEBundle:Comproba')->getComPByNrocom($id);
        $totales = $em->getRepository('SistemaCPCEBundle:Totales')->getTotalesByNroAsi($comprobante->getComNroAsi());
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->findAfiliadoByDoc($comprobante->getComTipdoc(), $comprobante->getComNrodoc());
        $comitente = $em->getRepository('SistemaCPCEBundle:Comitente')->findComitenteByNro('COM', $comprobante->getComNrocmt());
        $trabajo = $em->getRepository('SistemaCPCEBundle:Trabajo')->getTrabajoByNroLegalizacion($comprobante->getComNrotrabajo());

        $html  = $this->renderView('SistemaCPCEBundle:Default:liquidacionPdf.html.twig', array(
            'fecha'         => $fecha->format("d/m/Y"),
            'afiliado'      => $afiliado,
            'comprobante'   => $comprobante,
            'totales'       => $totales,
            'comitente'     => $comitente,
            'trabajo'       => $trabajo,
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
                'Content-Disposition'   => 'attachment; filename="liquidacion_nro_' . $comprobante->getComNroCom() . '.pdf"'
            )
        );

        return $response;
    }

    /**
     * Process filter request.
     * @param array $config
     * @return array
     */
    protected function filter($config)
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $filterForm = $this->createFilterForm($config);
        $queryBuilder = $this->createQuery($config['repository']);
        // Bind values from the request
        $filterForm->handleRequest($request);
        // Reset filter
        if ($filterForm->get('reset')->isClicked()) {
            $session->remove($config['sessionFilter']);
            $filterForm = $this->createFilterForm($config);
        }

        // Filter action
        if ($filterForm->get('filter')->isClicked()) {
            //if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $request->get($filterForm->getName());
                $session->set($config['sessionFilter'], $filterData);
            //}
        } else {
            // Get filter from session
            if ($session->has($config['sessionFilter'])) {
                $filterData = $session->get($config['sessionFilter']);
                $filterForm->submit($filterData);                
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
            }
        }

        return array($filterForm, $queryBuilder);
    }

    /**
     * Creates a new Trabajo entity.
     *
     * @Route("/trabajos/", name="front_trabajo_create")
     * @Method("POST")
     * @Template("SistemaCPCEBundle:Default:trabajoNewConfirmar.html.twig")
     */
    public function createAction()
    {
        $request     = $this->getRequest();
        $formRequest = $request->request->get('cpce_trabajo_front');
        $tareaCodigo = $formRequest['servicio'];
        $user        = $this->getUser();
        $em          = $this->getDoctrine()->getManager();

        $tarea = $em->getRepository('SistemaCPCEBundle:Tareas')->findOneByTarCodigo($tareaCodigo);

        if ($tarea->getTarUsamonto()) {
            //Calculo arancel minimo
            $calculoArancelMinimo = true;
        } else {
            //NO Calculo arancel minimo
            $calculoArancelMinimo = false;
        }

        $this->config['newType'] = new FrontTrabajoConfirmarType($calculoArancelMinimo,
            $this->getEditarSession('editarComitente'),
            $this->getEditarSession('editarMatriculado'),
            false,
            false
        );
        $config  = $this->getConfig();
        //Estado Default
        $partialTrabajoEstado = $em->getPartialReference('Sistema\CPCEBundle\Entity\TrabajoEstado', 1);
        $entity  = new $config['entity']($partialTrabajoEstado);
        //SETEO VALORES
        $entity->setServicio($tarea);
        $entity->setCondicionIva($formRequest['condicionIva']);
        if ($tareaCodigo == 1) {
            $entity->setAuditoriaTipo($formRequest['auditoriaTipo']);
        }
        if ($tareaCodigo == 3 || $tareaCodigo == 6 || $tareaCodigo == 9 || $tareaCodigo == 11) {
            $entity->setEsAuditor($formRequest['esAuditor']);
        }
        $entity->setUser($user);//setUser
        //FIN SETEO VALORES
        $config['action'] = $config['create'];
        $config['method'] = "POST";
        $config['label']  = "Confirmar";
        $form    = $this->createCreateForm($config, $entity);
        $form->handleRequest($request);
        //calculo arancel minimo
        if ($tarea->getTarUsamonto()) {
            $entity->setImporte1($entity->getActivo() + $entity->getPasivo());
            //CALCULO HONORARIO MINIMO
            if ($entity->getImporte1() >= $entity->getImporte2()) {
                $entity->setHonorarioMinimo($em->getRepository('SistemaCPCEBundle:Thcalcac')->getHonorarioMinimo($entity->getImporte1(), $entity->getServicio()));
            } else {
                $entity->setHonorarioMinimo($em->getRepository('SistemaCPCEBundle:Thcalcac')->getHonorarioMinimo($entity->getImporte2(), $entity->getServicio()));
            }
            //SI ES SIN FINES DE LUCRO o MISMO AUDITOR Y SINDICO o PERIODO INTERMEDIO
            $entity->setHonorarioMinimo($this->calculaHonorarioMinimo(
                $tareaCodigo, $entity->getHonorarioMinimo(), $entity->getAuditoriaTipo(), $entity->getEsAuditor(), $entity->getImportePeriodo(), $entity->getPorcentajeSindico()
            ));
        } else {
            //NO Calculo arancel minimo
            $entity->setHonorarioMinimo(0);
            $entity->setImporte1(0);
            $entity->setImporte2(0);
            $entity->setMonto(0);
            $entity->setMontoDeposito(0);
        }
        //fin calculo
        if ($form->isValid()) {
            $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->findOneBy(array(
                'afiTipdoc' => $user->getTipdoc(),
                'afiNrodoc' => $user->getNrodoc(),
            ));
            if (!$afiliado) {
                throw $this->createNotFoundException('No se encuentran los datos del matriculado.');
            }
            //ACTUALIZO DATOS DEL PROFESIONAL
            //$entity->setProfesional($afiliado->getAfiNombre());
            //$entity->setMatricula($afiliado->getAfiTitulo().$afiliado->getAfiMatricula());
            $afiliado->setAfiDireccion($entity->getDomicilio());
            $afiliado->setAfiTelefono1($entity->getTelefono());
            $afiliado->setAfiCelular($entity->getCelular());
            $afiliado->setAfiMail($entity->getCorreo());
            $afiliado->setAfiGanancias($entity->getCondicionIva());
            $afiliado->setAfiCuit($entity->getCuit());
            //ACTUALIZO DATOS DEL COMITENTE SI EXISTE SINO LO CREO
            $comitente = $this->buscoComitente($em, $entity->getComitenteCuit());
            if (!is_null($comitente)) {
                $comitente->setAfiNombre($entity->getClienteComitente());
                $comitente->setAfiDireccion($entity->getComitenteDomicilio());

                $em->persist($comitente);
            }
            if (is_null($entity->getMontoIva())) {
                $entity->setMontoIva(0);
            }
            if (is_null($entity->getMontoAporte())) {
                $entity->setMontoAporte(0);
            }
            //else {
                // $comitente = new Comitente();
                // $comitente->setAfiTipdoc('COM');
                // $comitente->setAfiTipo('C');
                // $comitente->setAfiCuit($cuit);
            //}

            $em->persist($entity);
            $em->persist($afiliado);

            $em->flush();

            $this->useACL($entity, 'create');

            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl($config['show'], array('id' => $entity->getId())));
        }

        if (is_null($form->getErrorsAsString())) {
            $this->get('session')->getFlashBag()->add('danger', 'flash.create.error');
        } else {
            $this->get('session')->getFlashBag()->add('danger', $form->getErrorsAsString());
        }

        // remove the form to return to the view
        unset($config['newType']);

        if ($entity->getServicio()->getTarUsamonto()) {
            $formView = "trabajoConfirmarMontosForm";
        } else {
            $formView = "trabajoConfirmarForm";
        }

        return array(
            'config'    => $config,
            'entity'    => $entity,
            'form'      => $form->createView(),
            'formviews' => $formView,
        );
    }

    /**
     * Displays a form to create a new Trabajo entity.
     *
     * @Route("/trabajos/nuevo", name="front_trabajo_new")
     * @Method("GET")
     * @Template("SistemaCPCEBundle:Default:trabajoNewConfirmar.html.twig")
     */
    public function trabajoNewAction()
    {
        $config = $this->getConfig();

        if (is_null($this->getEditarSession('afiliado'))) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'Debe regular su situación, por favor acérquese al CPCE.');
            $return = $this->redirect($this->generateUrl($config['index']));
        } else if (is_null($this->getEditarSession('afiliado_activo'))) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'Su categoría no lo habilita a presentar trabajos, por favor acérquese al CPCE.');
            $return = $this->redirect($this->generateUrl($config['index']));
        } else {
            $this->setEditarSession('editarComitente', true);
            $this->setEditarSession('editarMatriculado', true);
            $em   = $this->getDoctrine()->getManager();
            $user = $this->getUser();

            if (!$user) {
                throw $this->createNotFoundException('No se encuentran los datos del matriculado.');
            }

            $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->findOneBy(array(
                'afiTipdoc' => $user->getTipdoc(),
                'afiNrodoc' => $user->getNrodoc(),
            ));
            if (!$afiliado) {
                throw $this->createNotFoundException('No se encuentran los datos del matriculado.');
            }

            $config['newType'] = new FrontTrabajoType("servicio");

            //Estado Default
            $partialTrabajoEstado = $em->getPartialReference('Sistema\CPCEBundle\Entity\TrabajoEstado', 1);

            $entity = new $config['entity']($partialTrabajoEstado);

            $entity->setProfesional($afiliado->getAfiNombre());
            $entity->setMatricula($afiliado->getAfiTitulo().$afiliado->getAfiMatricula());
            $entity->setDomicilio($afiliado->getAfiDireccion());
            $entity->setTelefono($afiliado->getAfiTelefono1());
            $entity->setCelular($afiliado->getAfiCelular());
            $entity->setCorreo($afiliado->getAfiMail());
            $entity->setCondicionIva($afiliado->getAfiGanancias());
            $entity->setCuit($afiliado->getAfiCuit());
            $entity->setCbu($afiliado->getAfiCbuCredito());            

            $config['action'] = $config['confirmar'];
            $config['method'] = "GET";
            $config['label']  = "Seleccionar";
            $form   = $this->createCreateForm($config, $entity);

            // remove the form to return to the view
            unset($config['newType']);

            $return = array(
                'config'    => $config,
                'entity'    => $entity,
                'form'      => $form->createView(),
                'formviews' => 'trabajoServicioForm',
            );
        }

        return $return;
    }

    /**
     * Displays a form to create a new Trabajo entity.
     *
     * @Route("/trabajos/confirmar", name="front_trabajo_confirmar")
     * @Method({"GET", "POST"})
     * @Template("SistemaCPCEBundle:Default:trabajoNewConfirmar.html.twig")
     */
    public function trabajoConfirmarAction()
    {
        $em      = $this->getDoctrine()->getManager();
        //controlo los datos que vienen del new
        $request = $this->getRequest();
        //Estado Default
        $partialTrabajoEstado = $em->getPartialReference('Sistema\CPCEBundle\Entity\TrabajoEstado', 1);

        if ($request->isMethod('POST')) {
            //POST viene form servicio con monto
            $this->config['newType'] = new FrontTrabajoType("montos");
            $config = $this->getConfig();
            $config['action'] = $config['confirmar'];
            $config['method'] = "POST";
            $config['label']  = "Continuar";
            //Estado Default
            $entity   = new $config['entity']($partialTrabajoEstado);
            $servicio = $em->getRepository('SistemaCPCEBundle:Tareas')
                            ->find($request->get('cpce_trabajo_front')['servicio']);
            $entity->setServicio($servicio);
        } else {
            //GET viene form servicio sin monto
            $this->config['newType'] = new FrontTrabajoType("servicio");
            
            $config = $this->getConfig();
            $config['action'] = $config['confirmar'];
            $config['method'] = "GET";
            $config['label']  = "Seleccionar";

            //Estado Default
            $entity = new $config['entity']($partialTrabajoEstado);
        }
        
        $form   = $this->createCreateForm($config, $entity);
        $form->handleRequest($request);
        //fin controlo
        $hasCbu   = false;
        $user     = $this->getUser();
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->findOneBy(array(
            'afiTipdoc' => $user->getTipdoc(),
            'afiNrodoc' => $user->getNrodoc(),
        ));
        if (!$afiliado) {
            throw $this->createNotFoundException('No se encuentran los datos del matriculado.');
        }
        //Valido Matriculado contra AFIP
        $afiliado = $this->validoMatriculado($afiliado);
        $entity->setProfesional($afiliado->getAfiNombre());
        $entity->setMatricula($afiliado->getAfiTitulo().$afiliado->getAfiMatricula());
        $entity->setDomicilio($afiliado->getAfiDireccion());
        $entity->setTelefono($afiliado->getAfiTelefono1());
        $entity->setCelular($afiliado->getAfiCelular());
        $entity->setCorreo($afiliado->getAfiMail());
        $entity->setCondicionIva($afiliado->getAfiGanancias());
        $entity->setCuit($afiliado->getAfiCuit());
        
        if ($afiliado->getAfiCbuCredito()) {
            $entity->setCbu($afiliado->getAfiCbuCredito());
            $hasCbu = true;
        }
        
        //Segun Trabajo renderizo formulario
        if ($entity->getServicio() && $entity->getServicio()->getTarUsamonto()) {
            $formView                = "trabajoConfirmarMontosForm";
            //CALCULO HONORARIO MINIMO
            $entity->setImporte1($entity->getActivo() + $entity->getPasivo());
            if ($entity->getImporte1() >= $entity->getImporte2()) {
                $entity->setHonorarioMinimo($em->getRepository('SistemaCPCEBundle:Thcalcac')->getHonorarioMinimo($entity->getImporte1(), $entity->getServicio()));
            } else {
                $entity->setHonorarioMinimo($em->getRepository('SistemaCPCEBundle:Thcalcac')->getHonorarioMinimo($entity->getImporte2(), $entity->getServicio()));
            }
            //SI ES SIN FINES DE LUCRO o MISMO AUDITOR Y SINDICO o PERIODO INTERMEDIO
            $entity->setHonorarioMinimo($this->calculaHonorarioMinimo(
                $entity->getServicio()->getTarCodigo(), $entity->getHonorarioMinimo(), $entity->getAuditoriaTipo(), $entity->getEsAuditor(), $entity->getImportePeriodo(), $entity->getPorcentajeSindico()
            ));
             //Si el monto honorario es menor a 10 mil bloqueo y solo dejo trasferencia
             if ($entity->getHonorarioMinimo() < 10000) {
                $this->montoHonorario = true;
            }

            if ($request->isMethod('POST')) {
                //Busco y Cargo el comitente
                $this->cargoComitente($em, $entity, $request->get('cpce_trabajo_front')['comitenteCuit']);
                //Calculo arancel minimo y seteo el formulario
                $this->config['newType'] = new FrontTrabajoConfirmarType(True,
                    $this->getEditarSession('editarComitente'),
                    $this->getEditarSession('editarMatriculado'),
                    $hasCbu,
                    $this->montoHonorario
                );
              
               


                //Fin
                $config           = $this->getConfig();
                $config['label']  = "Confirmar";
                $config['action'] = $config['create'];
            } else {
                $this->config['newType'] = new FrontTrabajoType("montos");
                $formView                = "trabajoNewForm";

                $config           = $this->getConfig();
                $config['label']  = "Continuar";
                $config['action'] = $config['confirmar'];
            }

            $config['method'] = "POST";
        } else {
            //Busco y Cargo el comitente
            $this->cargoComitente($em, $entity, $request->get('cpce_trabajo_front')['comitenteCuit']);
            //NO calculo arancel minimo y seteo el formulario
            $this->config['newType'] = new FrontTrabajoConfirmarType(False,
                $this->getEditarSession('editarComitente'),
                $this->getEditarSession('editarMatriculado'),
                $hasCbu,
                $this->montoHonorario
            );
            $formView                = "trabajoConfirmarForm";
            //Fin
            $config = $this->getConfig();
            $config['action'] = $config['create'];
            $config['method'] = "POST";
            $config['label']  = "Confirmar";
        }

        $form   = $this->createCreateForm($config, $entity);

        // remove the form to return to the view
        unset($config['newType']);

        return array(
            'config'    => $config,
            'entity'    => $entity,
            'form'      => $form->createView(),
            'formviews' => $formView,
        );
    }

    private function calculaHonorarioMinimo($tareaCodigo, $honorarioMinimo, $auditoriaTipo, $esAuditor, $importePeriodo, $porcentajeSindico)
    {
        //SI ES SIN FINES DE LUCRO
        if ($tareaCodigo == 1) {
            if ($auditoriaTipo == "SFL") {
                $honorarioMinimo = $honorarioMinimo / 2;
            }
        }
        //MISMO AUDITOR Y SINDICO Y PERIODO INTERMEDIO
        if ($tareaCodigo == 3 || $tareaCodigo == 6 || $tareaCodigo == 9 || $tareaCodigo == 11) {
            //MISMO AUDITOR Y SINDICO
            if ($esAuditor == "SI") {
                $honorarioMinimo = $honorarioMinimo / 2;
            }
            //PERIODO INTERMEDIO
            if ($porcentajeSindico != 100 && $porcentajeSindico != 0) {
                $honorarioMinimo = $honorarioMinimo / 100 * $porcentajeSindico;
            }
        }
        //LO ULTIMO QUE SE HACE ES RESTAR EL IMPORTE DEL PERIODO ANTERIOR
        if ($tareaCodigo == 6 || $tareaCodigo == 9  || $tareaCodigo == 11) {
            if ($honorarioMinimo > $importePeriodo) {
                $honorarioMinimo = round($honorarioMinimo - $importePeriodo, 2);
            } else {
                $honorarioMinimo = 0;
            }
        }

        return $honorarioMinimo;
    }

    /**
    * Creates a form to create a entity.
    * @param array $config
    * @param $entity The entity
    * @return \Symfony\Component\Form\Form The form
    */
    protected function createCreateForm($config, $entity)
    {
        $form = $this->createForm($config['newType'], $entity, array(
            'action' => $this->generateUrl($config['action']),
            'method' => $config['method'],
        ));

        $form
            ->add('save', 'submit', array(
                'translation_domain' => 'MWSimpleAdminCrudBundle',
                'label'              => $config['label'],
                'attr'               => array(
                    'class' => 'form-control btn-success savesubmit',
                    'col'   => 'col-md-3 col-xs-12 pull-right pull-right-xs',
                )
            ))
        ;

        return $form;
    }

    /**
     * Finds and displays a Trabajo entity.
     *
     * @Route("/trabajos/{id}", name="front_trabajo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($config['repository'])->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find '.$config['entityName'].' entity.');
        }
        $this->useACL($entity, 'show');

        return array(
            'config' => $config,
            'entity' => $entity,
        );
    }

    /**
     * Finds and generate PDF a Trabajo entity.
     *
     * @Route("/trabajos/pdf/{id}", name="front_trabajo_pdf")
     * @Method("GET")
     * @Template()
     */
    public function trabajoPdfAction($id)
    {
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($config['repository'])->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find '.$config['entityName'].' entity.');
        }

        $this->useACL($entity, 'show');//controlo permisos

        return $this->createPdf($entity);
    }

    /**
     * Finds and generate PDF a Trabajo entity.
     *
     * @Route("/trabajos/pdfpreview/{form}", name="front_trabajo_pdfpreview", defaults={"form" = null})
     * @Method("GET")
     * @Template()
     */
    public function trabajoPdfpreviewAction($form)
    {
        parse_str($form, $formArray);

        $tarCodigo = $formArray['cpce_trabajo_front']['servicio'];
        $em        = $this->getDoctrine()->getManager();
        $user      = $this->getUser();

        $tarea = $em->getRepository('SistemaCPCEBundle:Tareas')->findOneByTarCodigo($tarCodigo);

        if ($tarea->getTarUsamonto()) {
            //Calculo arancel minimo
            $calculoArancelMinimo = true;
        } else {
            //NO Calculo arancel minimo
            $calculoArancelMinimo = false;
        }
        $this->config['newType'] = new FrontTrabajoConfirmarType($calculoArancelMinimo,
            $this->getEditarSession('editarComitente'),
            $this->getEditarSession('editarMatriculado')
        );

        $config = $this->getConfig();
        //Estado Default
        $partialTrabajoEstado = $em->getPartialReference('Sistema\CPCEBundle\Entity\TrabajoEstado', 1);
        $entity = new $config['entity']($partialTrabajoEstado);

        $entity->setServicio($tarea);
        $entity->setCondicionIva($formArray['cpce_trabajo_front']['condicionIva']);
        if ($tarCodigo == 1) {
            $entity->setAuditoriaTipo($formArray['cpce_trabajo_front']['auditoriaTipo']);
        }
        $entity->setUser($user);//setUser

        $config['action'] = $config['create'];
        $config['method'] = "GET";
        $config['label']  = "Confirmar";
        $form    = $this->createCreateForm($config, $entity);
        $request = $this->getRequest();
        $request->query->add($formArray);

        $form->handleRequest($request);

        return $this->createPdf($entity);
    }

    /**
     * Recibe la entidad y crea el pdf, devuelve una variable response
     */
    private function createPdf($entity)
    {
        $fecha = new \Datetime('today');

        $html  = $this->renderView('SistemaCPCEBundle:Default:trabajoPdf.html.twig', array(
            'fecha'  => $fecha->format("d/m/Y"),
            'entity' => $entity,
        ));
        
        // return $html;
        
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
                'Content-Disposition'   => 'attachment; filename="trabajo_nro_'.$entity->getId().'.pdf"'
            )
        );

        return $response;
    }

    /**
     * Exporter Trabajo.
     *
     * @Route("/trabajos/exporter/{format}", name="front_trabajo_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * Anula Trabajo
     *
     * @Route("/anular/{id}", name="trabajo_anular")
     * @Method({"GET"})
     */
    public function anularAction($id)
    {
        $config = $this->getConfig();
        $em     = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($config['repository'])->getTrabajoByAfiliado($id, $this->getUser());

        if (!$entity) {
            $this->get('session')->getFlashBag()
                ->add('danger', 'El Trabajo con código nro: '.$id.' no se puede anular');
        } else {
            $partialTrabajoEstado = $em->getPartialReference('Sistema\CPCEBundle\Entity\TrabajoEstado', 20);
            $entity->setEstado($partialTrabajoEstado);//20 = ANULADO
            $em->flush();
            
            $this->get('session')->getFlashBag()
                ->add('success', 'Trabajo código nro: '.$entity->getId().' Anulado');
        }

        return $this->redirect($this->generateUrl($config['index']));
    }

    //Si existe comitente lo agrego a la entity
    private function cargoComitente($em, $entity, $cuit)
    {
        if ($cuit == '00-00000000-0') {//El comitente no tiene CUIL asique lo debe cargar
            $this->setEditarSession('editarComitente', false);
        } else {
            $comitente = $this->buscoComitente($em, $cuit);
            $comitente = $this->validoComitente($comitente, $cuit);

            if (!is_null($comitente)) {
                $entity->setClienteComitente($comitente->getAfiNombre());
                $entity->setComitenteDomicilio($comitente->getAfiDireccion());
            }
        }
    }
    //Busco el comitente en la BD
    private function buscoComitente($em, $cuit)
    {
        $comitente = $em->getRepository('SistemaCPCEBundle:Comitente')->findOneBy(array(
            'afiTipdoc' => 'COM',
            'afiCuit'   => $cuit,
        ));

        return $comitente;
    }
    //AFIP webservice SOA publico
    private function apiGetDataAfip($tipo, $id)
    {
        //RETORNO
        $return = array();
        return $return;
        //FIN RETORNO
        $id     = $this->slugifyCUIT($id);
        $client = new Client();
        $guzzle = $client->getClient(); //You'll want to pull the Guzzle client out of Goutte to inherit its defaults
        $guzzle->setDefaultOption('verify', false); //Set the certificate at @mtdowling recommends
        $client->setClient($guzzle); //Tell Goutte to use your modified Guzzle client

        if ($tipo == "cuit") {
            $url = 'https://soa.afip.gob.ar/sr-padron/v2/persona/'.$id;
            //$url = 'https://aws.afip.gob.ar/sr-padron/v2/persona/'.$id;
        } elseif ($tipo == "dni") {
            $url = 'https://soa.afip.gob.ar/sr-padron/v2/personas/'.$id;
            //$url = 'https://aws.afip.gob.ar/sr-padron/v2/personas/'.$id;
        }

        $crawlerRequest  = $client->getClient()->createRequest('GET', $url);

        if ($this->hayInternet()) {
            try {
                $crawlerResponse = $client->getClient()->send($crawlerRequest); // Send created request to server
                $return = $crawlerResponse->json();
            } catch (RequestException $e) {
                $return = array();
            }
        } else {
            $return = array();
        }

        return $return; // Returns PHP Array
    }
    //controlo internet
    private function hayInternet()
    {
        $connected = @fsockopen("www.google.com", 80); 
        //website, port  (try 80 or 443)
        if ($connected){
            $is_conn = true; //action when connected
            fclose($connected);
        }else{
            $is_conn = false; //action in connection failure
        }
        return $is_conn;
    }
    //Validacion de cuit existente en AFIP
    private function validoComitente($comitente, $cuit)
    {
        $data = $this->apiGetDataAfip("cuit", $cuit);
        //Obtengo el json
        if (array_key_exists('success', $data)) {
            //Si estado success true entra
            if ($data['success']) {
                //No permito editar el comitente porque obtengo todos los datos
                $this->setEditarSession('editarComitente', true);
                //Si el comitente es null no existe en nuestra BD lo creo PERO NO LO GUARDO
                if (is_null($comitente)) {
                    $comitente = new Comitente();
                    //$comitente->setAfiTipdoc('COM');
                    //$comitente->setAfiTipo('C');
                    //$comitente->setAfiCuit($cuit);
                }
                if (array_key_exists('data', $data)) {
                    $datos = $data['data'];
                    if (array_key_exists('idPersona', $datos)) {//CUIT
                        $comitente->setAfiCuit($datos['idPersona']);
                    } else {
                        //SI POR ALGUN MOTIVO ENCUENTRA EL CUIT PERO NO TRAE ALGUN DATO PERMITO EDITAR TODOS
                        $this->setEditarSession('editarComitente', false);
                    }
                    if (array_key_exists('nombre', $datos)) {//Nombre y Apellido
                        $comitente->setAfiNombre($datos['nombre']);
                    } else {
                        //SI POR ALGUN MOTIVO ENCUENTRA EL CUIT PERO NO TRAE ALGUN DATO PERMITO EDITAR TODOS
                        $this->setEditarSession('editarComitente', false);
                    }
                    if (array_key_exists('domicilioFiscal', $datos)) {
                        $domicilioFiscal = $datos['domicilioFiscal'];
                        if (array_key_exists('direccion', $domicilioFiscal)) {
                            $comitente->setAfiDireccion($domicilioFiscal['direccion']);
                        } else {
                            //SI POR ALGUN MOTIVO ENCUENTRA EL CUIT PERO NO TRAE ALGUN DATO PERMITO EDITAR TODOS
                            $this->setEditarSession('editarComitente', false);
                        }
                        // if (array_key_exists('localidad', $domicilioFiscal)) {
                        //     $comitente->setAfiLocalidad($domicilioFiscal['localidad']);
                        // }
                        // if (array_key_exists('codPostal', $domicilioFiscal)) {
                        //     $comitente->setAfiCodpos($domicilioFiscal['codPostal']);
                        // }
                    } else {
                        //SI POR ALGUN MOTIVO ENCUENTRA EL CUIT PERO NO TRAE ALGUN DATO PERMITO EDITAR TODOS
                        $this->setEditarSession('editarComitente', false);
                    }
                }
            } else {
                $this->setEditarSession('editarComitente', false);
            }
        } else {
            $this->setEditarSession('editarComitente', false);
        }

        return $comitente;
    }
    //Validacion de cuit existente en AFIP
    private function validoMatriculado($afiliado)
    {
        if ($afiliado->getAfiCuit()) {//Si tiene CUIT busco por cuit
            $data = $this->apiGetDataAfip("cuit", $afiliado->getAfiCuit());
            $sinCuit = false;
        } else {//sino busco cuit segun dni
            $data = $this->apiGetDataAfip("dni", $afiliado->getAfiNrodoc());
            $sinCuit = true;
        }
        //Obtengo el json
        if (array_key_exists('success', $data)) {
            //Si estado success true entra
            if ($data['success']) {
                //Si permito editar el afiliado porque no obtengo todos los datos aun
                $this->setEditarSession('editarMatriculado', false);
                if (array_key_exists('data', $data)) {
                    //Si entra No tiene Cuit lo busco por DNI
                    if ($sinCuit) {
                        $datos = $data['data'];
                        $data  = $this->apiGetDataAfip("cuit", $datos[0]);//Obtengo el json
                    }

                    if (array_key_exists('success', $data)) {
                        //Si estado success true entra
                        if ($data['success']) {
                            //No permito editar el afiliado porque obtengo todos los datos
                            $this->setEditarSession('editarMatriculado', true);
                            if (array_key_exists('data', $data)) {
                                $datos = $data['data'];
                                if (array_key_exists('idPersona', $datos)) {//CUIT
                                    $afiliado->setAfiCuit($datos['idPersona']);
                                }
                                //Si tiene Impuestos
                                if (array_key_exists('impuestos', $datos)) {
                                    //Si tiene impuesto valor 20 es Monotributo
                                    if (in_array("20", $datos['impuestos'])) {
                                        $afiliado->setAfiGanancias("NO");
                                    } else {
                                        $afiliado->setAfiGanancias("SI");
                                    }
                                }
                            }
                        } else {
                            $this->setEditarSession('editarMatriculado', false);
                        }
                    } else {
                        $this->setEditarSession('editarMatriculado', false);
                    }
                }
            } else {
                $this->setEditarSession('editarMatriculado', false);
            }
        } else {
            $this->setEditarSession('editarMatriculado', false);
        }

        return $afiliado;
    }
    //Reemplazo el - para que busque solo numeros
    private function slugifyCUIT($cuit)
    {
        // replace all non letters or digits by -
        return str_replace("-", "", $cuit);
    }
    //Funcion que setea en la session si permite o no editar el comitente en el formulario
    private function setEditarSession($clave, $valor)
    {
        $session = $this->getRequest()->getSession();
        $session->set($clave, $valor);
    }
    //Funcion que retorna el valor de la session editarComitente
    private function getEditarSession($clave)
    {
        $session = $this->getRequest()->getSession();
        if ($session->has($clave)) {
            $res = $session->get($clave);
        } else {
            $res = false;
        }
        return $res;
    }
}