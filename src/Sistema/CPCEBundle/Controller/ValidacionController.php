<?php

namespace Sistema\CPCEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sistema\CPCEBundle\Entity\Afiliado;
use Sistema\CPCEBundle\Form\ValidacionType;


/**
 * Validacion controller.
 * @author Max Shtefec <max.shtefec@gmail.com>
 *
 * @Route("/validacion")
 */
class ValidacionController extends Controller
{
    /**
     * @Route("/", name="validacion_index")
     * @Template()
     */
    public function indexAction()
    {
        //Matriculado Activo (habilitado para ejercicio profesional independiente)
        $categorias = [
            '110101', '110102', '110103', '110104', '110105', '110106',
            '120000', '120101', '120102', '120103', '120104',
            '170000', '170100', '170101', '170102'
        ];
        //Matriculado Asociado (NO habilitado para ejercicio profesional independiente)
        $categoriasasociados = [
            '210000', '210100', '210200', '210300', '170103'
        ];
        $request = $this->getRequest();
        $entity = new Afiliado;
        $matriculados = null;
        $form = $this->createConsultaForm($entity);

        $form->handleRequest($request);

        if ($form->isValid()) {
        	$titulo = $entity->getAfiTitulo();
            $matricula = $entity->getAfiMatricula();
            $nombre = $entity->getAfiNombre();
            $dni = $entity->getAfiNroDoc();

            $em = $this->getDoctrine()->getManager();
            
            if (!$matricula && !$nombre && !$dni) {
                $message = 'Por favor, ingrese un Número de matrícula, DNI o Apellido para realizar la búsqueda';
                $this->get('session')->getFlashBag()->add('error', $message);
            } else {
                if ($matricula) {
                    $matriculados = $em->getRepository('SistemaCPCEBundle:Afiliado')->findAfiliadoByMatricula($titulo, $matricula);
                } elseif($dni){
                    $matriculados = $em->getRepository('SistemaCPCEBundle:Afiliado')->findAfiliadoByNroDoc('DNI', $dni);
                } else{
                    $matriculados = $em->getRepository('SistemaCPCEBundle:Afiliado')->findAfiliadoByNombre($nombre);
                }
                if (!$matriculados) {
                    $message = 'NO MATRICULADO';
                    $this->get('session')->getFlashBag()->add('error', $message);
                } else {
                    if (count($matriculados) > 1 ) {
                        $message = 'Se encontraron '.count($matriculados).' coincidencias de matriculados con ese apellido, especificar DNI o Nro de Matrícula, o pongase en contacto con nuestro Consejo.';
                        $this->get('session')->getFlashBag()->add('info', $message);
                        $matriculados = null;
                    }
                }
            }
        }
        
        // Reinicio los datos y el form
        $entity = new Afiliado;
        $form = $this->createConsultaForm($entity);
        
        return array(
            'form' => $form->createView(),
            'matriculados' => $matriculados,
            'categorias' => $categorias,
            'categoriasasociados' => $categoriasasociados
        );
    }
    private function createConsultaForm($entity)
    {
        $form = $this->createForm(new ValidacionType(), $entity, array(
		    'action' => $this->generateUrl('validacion_index'),
		    'method' => 'GET',
		));

        $form
            ->add('validar', 'submit', array(
                'label' => 'Consultar',
                'attr'  => array(
                    'class' => 'form-control btn-info',
                )
            ))
        ;

        return $form;
    }
}