<?php

namespace Sistema\CPCEBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\BackBundle\Entity\Archivo;


/**
 * Ayuda controller.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 *
 * @Route("/matriculado")
 */
class AyudaController extends Controller
{
    /**
     * @Route("/ayuda", name="ayuda_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/novedades", name="ayuda_novedad_index")
     * @Template()
     */
    public function novedadIndexAction()
    {
        return array();
    }

	/**
     * @Route("/biblioteca", name="redirect_biblioteca_index")
     * @Method("GET")
     */
    public function bibliotecaIndexAction()
    {
    	
        return $this->redirect('https://cpcech.org.ar/index.php/2021/02/19/biblioteca-digital/');
    }

	/**
     * @Route("/calendario", name="redirect_calendario_index")
     * @Method("GET")
     */
    public function calendarioIndexAction()
    {
    	
        return $this->redirect('https://cpcech.org.ar/index.php/events/');
    }

	/**
     * @Route("/consultas", name="redirect_consultas_index")
     * @Method("GET")
     */
    public function consultasIndexAction()
    {
    	
        return $this->redirect('https://cpcech.org.ar/index.php/2021/02/19/consultas-profesionales-gratuitas/');
    }

    /**
     * @Route("/servicios/{seccion}", name="ayuda_servicios_index")
     * @Method("GET")
     * @Template()
     */
    public function serviciosIndexAction($seccion = null)
    {
        $em = $this->getDoctrine()->getManager();

        if (is_null($seccion)) {
            $entities = $em->getRepository('SistemaBackBundle:Archivo')->getAllArchivosBySeccionFilter();
        } else {
            $entities = $em->getRepository('SistemaBackBundle:Archivo')->getArchivosBySeccion($seccion);
        }
        
        return array(
            'archivos' => $entities,
        );
    }

    /**
     * @Route("/cpce", name="cpce_index")
     * @Method("GET")
     * @Template()
     */
    public function cpceIndexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBackBundle:Archivo')->getArchivosBySeccion("CPCE");
        
        return array(
            'archivos' => $entities,
        );
    }

    /**
     * @Route("/sipres", name="sipres_index")
     * @Method("GET")
     * @Template()
     */
    public function sipresIndexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBackBundle:Archivo')->getArchivosBySeccion("SIPRES");
        
        return array(
            'archivos' => $entities,
        );
    }

    /**
     * @Route("/honorarios", name="honorarios_index")
     * @Method("GET")
     * @Template()
     */
    public function honorariosIndexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBackBundle:Archivo')->getArchivosBySeccion("HONORARIOS");
        
        return array(
            'archivos' => $entities,
        );
    }

    /**
     * get a archivo pdf.
     *
     * @Route("/get-archivo/{archivoId}", name="getArchivo")
     * @Method("GET")
     */
    public function getArchivo($archivoId)
    {
        $request = $this->get('request');
        $em = $this->getDoctrine()->getManager();
        
        $entity = $em->getRepository('SistemaBackBundle:Archivo')->find($archivoId);

        $response = new Response();

        $response->headers->set('Content-type', mime_content_type($entity->getUploadDir()));
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $entity->getFilePath() . '";');

        $response->setContent(file_get_contents($entity->getWebPath()));

        return $response;
    }
}