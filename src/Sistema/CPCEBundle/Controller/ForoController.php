<?php

namespace Sistema\CPCEBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Foro controller.
 *
 * @Route("/admin/mwsforo")
 */
class ForoController extends Controller
{

	/**
     * @Route("/", name="mws_foro_grupo")
     * @Template()
     */
    public function forogrupoAction()
    {    
        return array();
    }

}