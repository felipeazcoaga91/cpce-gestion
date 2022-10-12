<?php

namespace Sistema\UserBundle\EventListener;

use Symfony\Component\Security\Core\Event\AuthenticationEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Doctrine\ORM\EntityManager;

class LoginListener {

    /**
     * Router
     *
     * @var Router
     */
    protected $router;

    /**
     * EntityManager
     *
     * @var EntityManager
     */
    protected $em;

    /**
     * @var SecurityContext
     */
    protected $securityContext;

    /**
     * @param SecurityContext $securityContext
     * @param Router $router The router
     * @param EntityManager $em
     */
    public function __construct(SecurityContext $securityContext, Router $router, EntityManager $em) {
        $this->securityContext = $securityContext;
        $this->router = $router;
        $this->em = $em;
    }

    public function handle(AuthenticationEvent $event) {
        $token = $event->getAuthenticationToken();
    }

    public function onKernelResponse(FilterResponseEvent $event) {
        $request = $event->getRequest();
    }

}