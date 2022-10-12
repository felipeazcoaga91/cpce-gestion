<?php

namespace Sistema\ForoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Foro controller.
 *
 * @Route("/admin/foro")
 */
class BackController extends Controller {

	/**
     * @Route("/", name="mws_foro_grupo")
     * @Template()
     */
    public function indexAction() {    
        return array();
    }

}