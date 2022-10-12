<?php

namespace Sistema\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Sistema\ClasificadoBundle\Entity\OfertaLaboral;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        $form = $this->crearFormHabilitar();

        return array(
            'form' => $form->createView(),
        );
    }
    /** Formulario para habilitar al usuario */
    private function crearFormHabilitar()
    {
        $titulos = array(
            'CP' => 'Contador Público',
            'LE' => 'Licenciado en Economía',
            'LA' => 'Licenciado en Administración',
        );
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formulario_habilitar'))
            ->setMethod('POST')
            ->add('titulo', 'choice', array(
                'label'    => 'Título',
                'required' => true,
                'choices'  => $titulos,
            ))
            ->add('matricula', 'integer', array(
                'label'    => 'Matrícula',
                'required' => true,
            ))
            ->add('save', 'submit', array(
                'label' => 'Habilitar usuario',
                'attr'  => array(
                    'class' => 'btn-primary'
                )
            ))
            ->getForm();
    }
    /**
     * @Route("/usuario/formulario/habilitar", name="formulario_habilitar")
     * @Method("POST")
     * @Template()
     */
    public function formularioHabilitarAction(Request $request)
    {
        $form = $this->crearFormHabilitar();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //obtengo los datos del formulario
            $dataForm = $form->getData();
            //Busco el usuario
            $user = $this->getUser();
            if (!$user) {
                $this->get('session')->getFlashBag()->add('alert_danger', 'No se encuentran los datos del matriculado.');
                throw $this->createNotFoundException('No se encuentran los datos del matriculado.');
            }
            //Busco el matriculado
            $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->findOneBy(array(
                'afiTipdoc' => $user->getTipdoc(),
                'afiNrodoc' => $user->getNrodoc(),
            ));
            if (!$afiliado) {
                $this->get('session')->getFlashBag()->add('alert_danger', 'No se encuentran los datos del matriculado.');
                throw $this->createNotFoundException('No se encuentran los datos del matriculado.');
            }
            //Verifico que sea la matricula correcta
            if (($afiliado->getAfiTitulo() . $afiliado->getAfiMatricula()) == ($dataForm['titulo'] . $dataForm['matricula'])) {
                //Si esta bien la matricula busco el ROLE_MATRICULADO y lo agrego al usuario
                $role = $em->getRepository('SistemaUserBundle:Role')->findOneByName("ROLE_MATRICULADO");
                $user->addRole($role);
                $afiliado->setAfiMail($user->getEmail());//Actualizo el correo
                $em->persist($user);
                $em->flush();
                //Actualizo los roles del usuario token session
                $this->logIn($user);

                $this->get('session')->getFlashBag()->add('fos_user_success', 'Usuario habilitado correctamente.');
            } else {
                $this->get('session')->getFlashBag()->add('alert_danger', 'El usuario no se pudo habilitar, controle sus datos o comuníquese con el administrador.');
            }
        } else {
            $this->get('session')->getFlashBag()->add('alert_danger', 'El usuario no se pudo habilitar, controle sus datos o comuníquese con el administrador.');
        }

        return $this->redirect($this->generateUrl('homepage'));
    }
    //Logeo el usuario con los nuevos roles
    private function logIn($user)
    {
        $firewall = 'main';
        $token    = new UsernamePasswordToken($user, null, $firewall, $user->getRoles());
        $this->get('security.token_storage')->setToken($token);
        //$this->get('session')->set('_security_'.$firewall, serialize($token));
    }

    /**
     * @Route("/usuario/formulario/activacion", name="formulario_activacion")
     * @Template()
     */
    public function formularioActivacionAction()
    {
        $user  = $this->getUser();
        $fecha = new \Datetime('today');

        $html  = $this->renderView('SistemaFrontBundle:Default:formularioActivacion.html.twig', array(
            'fecha' => $fecha->format("d/m/Y"),
            'id'    => $user->getId(),
            'dni'   => $user->getTipdoc()." ".$user->getNrodoc(),
            'email' => $user->getEmail(),
        ));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml(
                $html,
                array(
                    'images'=> true,
                    'enable-external-links' => true
                )
            ),
            200,
            array(
                'images'                => true,
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="cpce_solicitud_'.$user->getId().'.pdf"'
            )
        );
    }
    /**
     * @Route("/formulario/instructivo", name="formulario_instructivo")
     * @Template()
     */
    public function formularioInstructivoAction()
    {
        $html  = $this->renderView('SistemaFrontBundle:Default:formularioInstructivo.html.twig');

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml(
                $html,
                array(
                    'images'=> true,
                    'enable-external-links' => true
                )
            ),
            200,
            array(
                'images'                => true,
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="cpce_instructivo.pdf"'
            )
        );
    }

    /**
     * OfertasLaborales index embed.
     *
     * @Route("/ofertas/laborales", name="ofertas_laborales")
     * @Template("SistemaClasificadoBundle:OfertaLaboral:ofertasLaborales.html.twig")
     */
    public function ofertasLaboralesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SistemaClasificadoBundle:OfertaLaboral')->getOfertasOrderByFecha();
        if (!$entities) {
            $entities = null;
        }

        return array(
            'entities' => $entities,
        );
    }

    /**
     * OfertaLaboral view show.
     *
     * @Route("/matriculado/oferta/laboral/{id}", name="oferta_laboral_show")
     * @Template("SistemaClasificadoBundle:OfertaLaboral:ofertaLaboral.html.twig")
     */
    public function ofertaLaboralAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SistemaClasificadoBundle:OfertaLaboral')->find($id);
        //compruebo si ya oferto el matriculado
        //si no se oferto, control para cargar cv antes.
        if ($this->getUser()->getUserCurriculum()) {
            $postulado = $em->getRepository('SistemaClasificadoBundle:OfertaLaboral')
            ->getIsPostuladoByOferta($id, $this->getUser()->getUserCurriculum()->getId());
        } else {
            $postulado = false;    
        }
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ofertaLaboral entity.');
        }
        
        return array(
            'entity' => $entity,
            'postulado' => $postulado,
        );
    }

    /**
     * OfertaLaboral matricularse.
     *
     * @Route("/matriculado/oferta/laboral/postular/{idOferta}", name="oferta_laboral_postular")
     * @Template()
     */
    public function PostularAction($idOferta)
    {
        $em = $this->getDoctrine()->getManager();
        if ($this->isMatriculado()) {
            $entity = $em->getRepository('SistemaClasificadoBundle:OfertaLaboral')->find($idOferta);
        }   
        if ($entity) {
            if ($this->isMatriculado()) {
                $userCV = $this->getUser()->getUserCurriculum();
                $entity->addCvPostulante($userCV);

                $em->persist($entity);
                $em->flush();

                //Envio de MAIL
                $mailer = $this->get('sistema_cpce.custom_mailer_oferta');
                $mailer->sendPostulanteCvEmailMessage($this->getUser(), $entity);

                $this->get('session')->getFlashBag()->add('success', 'Usted se ha postulado a esta Oferta');
            } else {
                $this->get('session')->getFlashBag()->add('danger', 'Es posible que usted no sea Matriculado');
            }   
        } else {
            $this->get('session')->getFlashBag()->add('danger', 'No se ha podido Postular');
        }

        return $this->redirect($this->generateUrl('oferta_laboral_show', array('id' => $entity->getId())));
    }

    private function isMatriculado()
    {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_MATRICULADO')) {
            $isMatriculado = False;
        } else {
            $isMatriculado = True;
        }

        return $isMatriculado;
    }
}
