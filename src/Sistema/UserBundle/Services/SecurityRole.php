<?php
namespace Sistema\UserBundle\Services;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class SecurityRole
{
    private $container;
    private $em;

    public function __construct($container, $em)
    {
        $this->container = $container;
        $this->em = $em;
    }

    /**
     * Controla la url de los roles del usuario con la url que quiere acceder.
     */
    public function controlRolesUser()
    {
        $control = false;
        $sc = $this->container->get('security.context');
        $user = $sc->getToken()->getUser();
        $route = $this->container->get('request')->get('_route');
        if ($this->container->get('security.context')->isGranted('ROLE_SUPER_ADMIN') ||
            $this->container->get('security.context')->isGranted('ROLE_ADMIN')) {
            $roles = null;
            $control = true;
        } else {
            if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')) {
                $roles = null;
            } else {
                $roles = $user->getRoles();
            }
        }
        if (!is_null($roles)) {
            foreach ($roles as $role) {
                if ($route === $role->getUrl()) {
                    $control = true;
                    break;
                }
            }
        }
        if (false === $control) {
            throw new AccessDeniedException();
        }

        return true;
    }
}
