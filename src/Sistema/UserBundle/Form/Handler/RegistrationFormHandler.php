<?php

namespace Sistema\UserBundle\Form\Handler;

use FOS\UserBundle\Form\Handler\RegistrationFormHandler as BaseHandler;

class RegistrationFormHandler extends BaseHandler
{
    public function process($confirmation = false)
    {
        $user = $this->userManager->createUser();
        $this->form->setData($user);

        if ('POST' == $this->request->getMethod()) {
            $this->form->bind($this->request);
            $userBD = $this->userManager->findUserBy(array('nrodoc' => $this->form->getData()->getNrodoc()));//agregado
            if ($userBD) {//agregado
                if (!$userBD->isEnabled()) {//agregado
                    if ($this->form->isValid()) {
                        $this->actualizarUserBDConUser($userBD, $user);//agregado
                        $this->onSuccess($userBD, $confirmation);

                        return true;
                    }
                } else {//agregado
                    $this->request->getSession()->getFlashBag()->add('danger', 'El usuario ya existe.');//agregado
                }//agregado
            } else {//agregado
                $this->request->getSession()->getFlashBag()->add('danger', 'Verifique si ingresó correctamente su número de documento.');//agregado
            }//agregado
        }

        return false;
    }
    //agregado
    private function actualizarUserBDConUser($userBD, $user)
    {
        $userBD->setEmail($user->getEmail());
        $userBD->setEmailCanonical($user->getEmailCanonical());
        $userBD->setPassword($user->getPassword());
        $userBD->setPlainPassword($user->getPlainPassword());
        $userBD->setSaltString($user->getSalt());
        $userBD->setUsername($user->getUsername());
        $userBD->setUsernameCanonical($user->getUsernameCanonical());
    }
}