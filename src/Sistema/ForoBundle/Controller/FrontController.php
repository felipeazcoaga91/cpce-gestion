<?php

namespace Sistema\ForoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Foro controller.
 *
 * @Route("/matriculado/foro")
 */
class FrontController extends Controller {
    
    /**
     * @Route("/{foro_id}", name="mws_foro_front")
     * @Template()
     */
    public function indexAction($foro_id = null) {
        return array();
    }
}
