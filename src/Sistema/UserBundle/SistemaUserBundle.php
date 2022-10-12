<?php

namespace Sistema\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SistemaUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
