<?php

namespace Sistema\CPCEBundle\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LoggedInListener
{
    private $router;
    private $container;

    public function __construct($router, $container)
    {
        $this->router    = $router;
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        //entra solo si esta logueado si no tiene role consulta ni admin
        $security = $this->container->get('security.authorization_checker');

        if (false === $security->isGranted('IS_AUTHENTICATED_FULLY')) {
            if (false === $security->isGranted('ROLE_CONSULTA')) {
                if (false === $security->isGranted('ROLE_ADMIN')) {
                    $session = $this->container->get('session');
                    if (is_null($session->get('afiliado'))) {
                        $session->set('afiliado', false);
                        $session->set('afiliado_activo', false);
                        //lo deslogueo
                        $this->container->get('security.context')->setToken(null);
                    }
                }
            }
        }
    }
}