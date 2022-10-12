<?php

namespace Sistema\CPCEBundle\Listener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

class LoginListener
{
    private $session;
    private $em;

    public function __construct(Session $session, Doctrine $doctrine)
    {
        $this->session = $session;
        $this->em      = $doctrine->getManager();
    }

    public function onInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();
 
        if ($user) {
            //busco afiliado
            $afiliado = $this->em->getRepository('SistemaCPCEBundle:Afiliado')
                ->findAfiliadoByDoc($user->getTipdoc(), $user->getNrodoc());
            if ($afiliado) {
                //guardo datos en session
                $this->session->set('afiliado', $afiliado);
                $this->session->set('afiliado_activo', null);
                //controlo la categoria y guardo true or false
                $categoriasNoPermitidas = array("22");
                $categoriasActivas = array("11", "12", "17");

                if(strpos($afiliado['categoria'], $categoriasNoPermitidas[0]) === 0) {
                    $this->session->set('afiliado', null);
                    $this->session->set('afiliado_activo', null);
                    $this->session->getFlashBag()->add('danger', 'Debe regular su situación, por favor acérquese al CPCE.');
                } else {
                    foreach ($categoriasActivas as $categoriaA) {
                        if(strpos($afiliado['categoria'], $categoriaA) === 0) {
                            $this->session->set('afiliado_activo', true);
                            break;
                        }
                    }
                }
            } else {
                $this->session->set('afiliado', null);
                $this->session->set('afiliado_activo', null);
                $this->session->getFlashBag()->add('danger', 'Probablemente exista un error en sus datos, por favor comuníquese con Sistemas CPCE.');
            }
        } else {
            $this->session->set('afiliado', null);
            $this->session->set('afiliado_activo', null);
            $this->session->getFlashBag()->add('danger', 'Debe regular su situación, por favor acérquese al CPCE.');
        }
    }
}