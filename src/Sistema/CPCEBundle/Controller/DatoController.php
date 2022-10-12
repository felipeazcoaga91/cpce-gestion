<?php

namespace Sistema\CPCEBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Symfony\Component\Yaml\Yaml;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\CPCEBundle\Entity\Afiliado;
use Sistema\CPCEBundle\Form\DatosType;
use Sistema\CPCEBundle\Form\DatosFamiliares;

use Knp\Snappy\Pdf;


/**
 * Afiliado controller.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 *
 * @Route("/matriculado/datos")
 */
class DatoController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Sistema/CPCEBundle/Resources/config/AfiliadoDato.yml',
    );

    protected function getConfig(){
        $configs = Yaml::parse(file_get_contents($this->get('kernel')->getRootDir().'/../src/'.$this->config['yml']));
        foreach ($configs as $key => $value) {
            $config[$key] = $value;
        }
        foreach ($this->config as $key => $value) {
            if ($key != 'yml') {
                $config[$key] = $value;
            }
        }
        return $config;
    }

    /**
     * Create query.
     * @param string $repository
     * @return Doctrine\ORM\QueryBuilder $queryBuilder
     */
    protected function createQuery($repository)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository($repository)
            ->createQueryBuilder('a')
        ;

        return $queryBuilder;
    }

    /**
     * Finds and displays a Afiliado entity.
     *
     * @Route("/", name="front_dato")
     * @Method("GET")
     * @Template()
     */
    public function datosAction()
    {
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $entity = $em->getRepository($config['repository'])
            ->findAfiliadoCategoriaDescByDoc($user->getTipdoc(), $user->getNrodoc());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find '.$config['entityName'].' entity.');
        }
        
        return array(
            'config' => $config,
            'entity' => $entity,
            'user'   => $user,
        );
    }

    /**
     * Displays a form to edit an existing Afiliado entity.
     *
     * @Route("/editar", name="front_dato_editar")
     * @Method("GET")
     * @Template("SistemaCPCEBundle:Dato:edit.html.twig")
     */
    public function editarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userId = $this->getUser()->getNrodoc();

        $entity = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($userId);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find '. 'Afiliado' .' entity.');
        }
        
        $form = $this->createForm(new DatosType(), $entity, array(
            'action' => $this->generateUrl('front_dato_editar'),
            'method' => 'GET',
        ));

        $form
            ->add('save', 'submit', array(
                'translation_domain' => 'MWSimpleAdminCrudBundle',
                'label'              => 'views.new.save',
                'attr'               => array(
                    'class' => 'form-control btn-success',
                    'col'   => 'col-lg-2',
                )
            ))
        ;
    
        $request = $this->getRequest();
        $form->handleRequest($request);
    	// dump($entity);
    	// die();
        if ($form->isValid()) {
            $this->get('session')->getFlashBag()->add('success', 'Los datos fueron actualizados');
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('front_dato'));
    
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Afiliado entity.
     *
     * @Route("/editarFamiliares", name="front_dato_editarFamiliares")
     * @Method("GET")
     * @Template("SistemaCPCEBundle:Dato:editFamiliares.html.twig")
     */
    public function editarFamiliaresAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userId = $this->getUser()->getNrodoc();

        $entity = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($userId);
        
        $user_resg = clone $entity;

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find '. 'Afiliado' .' entity.');
        }
        
        $form = $this->createForm(new DatosFamiliares(), $entity, array(
            'action' => $this->generateUrl('front_dato_editarFamiliares'),
            'method' => 'GET',
        ));

        $form
            ->add('save', 'submit', array(
                'translation_domain' => 'MWSimpleAdminCrudBundle',
                'label'              => 'views.new.save',
                'attr'               => array(
                    'class' => 'form-control btn-success',
                    'col'   => 'col-lg-2',
                )
            ))
        ;
        $request = $this->getRequest();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $mailer = $this->get('sistema_cpce.custom_mailer_familiares');
            if($entity != $user_resg){
                //controlo si se cargo algun nuevo familiar
                $familia = array(
                    $entity->getAfiAut2(),
                    $entity->getAfiNac2(),
                    $entity->getAfiSex2(),
                    $entity->getAfiFil2(),
                );
                $mailer->sendNewFamiliaresEmailMessage($entity);
                $this->get('session')->getFlashBag()->add('success', 'Los datos fueron enviados, los familiares cargados serán verificados en un lapso de 24 a 48 horas hábiles');
            }
            else{
                $this->get('session')->getFlashBag()->add('warning', 'No hay datos para actualizar');
            }
            return $this->redirect($this->generateUrl('front_dato_benef'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and generate PDF a Dato entity.
     *
     * @Route("/pdf", name="front_dato_pdf")
     * @Method("GET")
     * @Template()
     */
    public function datosPdfAction()
    {
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $entity = $em->getRepository($config['repository'])
            ->findAfiliadoCategoriaDescByDoc($user->getTipdoc(), $user->getNrodoc());

        $fecha = new \Datetime('today');

        $html = $this->renderView('SistemaCPCEBundle:Dato:datosPdf.html.twig', array(
            'fecha'  => $fecha,
            'entity' => $entity[0],
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
                'Content-Disposition'   => 'attachment; filename="matriculado_nro_' . $entity[0]->getAfiMatricula() . '.pdf"'
            )
        );
    }
    /**
     *
     * @Route("/beneficios", name="front_dato_benef")
     * @Method("GET")
     * @Template("SistemaCPCEBundle:Dato:beneficios_familiares.txt.twig")
     */
    public function BeneficiosAction()
    {
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $entity = $em->getRepository($config['repository'])
            ->findAfiliadoCategoriaDescByDoc($user->getTipdoc(), $user->getNrodoc());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find '.$config['entityName'].' entity.');
        }
        
        return array(
            'config' => $config,
            'entity' => $entity,
            'user'   => $user,
        );
    }
    /**
     *
     * @Route("/certificados", name="front_dato_certif")
     * @Method("GET")
     * @Template("SistemaCPCEBundle:Dato:certificados.html.twig")
     */
    public function certificadosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userId = $this->getUser()->getNrodoc();

        $entity = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($userId);
            
        if (!$entity) {
            throw $this->createNotFoundException('No se encuentran los datos del Afiliado.');
        }
        
        return array(
            'entity' => $entity
        );
    }

    /**
     *
     * @Route("/home", name="front_dato_index")
     * @Method("GET")
     * @Template("SistemaCPCEBundle:Dato:index.html.twig")
     */
    public function indexAction()
    {
        
    }

    /**
     *
     * @Route("/constancia/{tipo}", name="front_dato_const")
     * @Method("GET")
     */
    public function constanciaAction($tipo)
    {
        return new Response (
            $this->imprimirConstancia($tipo)
        );
    }

    /**
     *
     * @Route("/pedido/{pedido}", name="front_dato_pedido")
     * @Method("GET")
     */
    public function constPedidoAction($pedido)
    {
        $this->pedido($pedido);
    }
    
    public function imprimirConstancia($tipo) {
        
        $config = $this->getConfig();
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $entity = $em->getRepository($config['repository'])
            ->findAfiliadoCategoriaDescByDoc($user->getTipdoc(), $user->getNrodoc());

        $fecha = new \Datetime('today');

        return $html = $this->renderView('SistemaCPCEBundle:Dato:const_'. $tipo . '.html.twig', array(
            'fecha'  => $fecha,
            'entity' => $entity[0],
        ));

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
        //         'Content-Disposition'   => 'attachment; filename="matriculado_nro_' . $entity[0]->getAfiMatricula() . 'constancia_' . $tipo . '.pdf"'
        //     )
        // );
    }

    public function pedido($tipo) {
        // Aportes o Sancion
        if ($tipo == "aportes") {
            
        } else {
            
        }

    } 

}