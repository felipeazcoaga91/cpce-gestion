<?php
namespace Sistema\CPCEBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Twig Extension.
 *
 * @author name <example@gmail.com>
 */

class TwigCustom extends \Twig_Extension
{
    protected $container;

    public function __construct(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return array(
            'afiSex' => new \Twig_Function_Method($this, 'afiSex', array(
                'is_safe' => array('html')
            )),
            'afiFil' => new \Twig_Function_Method($this, 'afiFil', array(
                'is_safe' => array('html')
            )),
            'afiNac' => new \Twig_Function_Method($this, 'afiNac', array(
                'is_safe' => array('html')
            )),
        );
    }

    public function afiSex($sex)
    {
        switch ($sex) {
            case 'M':
                $res = "Hombre";
                break;
            case 'F':
                $res = "Mujer";
                break;
            default:
                $res = null;
                break;
        }
        
        return $res;
    }

    public function afiFil($fil)
    {
        switch ($fil) {
            case '0':
                $res = "Esposo/a";
                break;
            case '1':
                $res = "Hijo/a";
                break;
            case '2':
                $res = "Otro";
                break;
            default:
                $res = null;
                break;
        }
        
        return $res;
    }

    public function afiNac($nac)
    {
        if ($nac != "30/11/-0001") {
            $res = $nac;
        } else {
            $res = null;
        }
        
        return $res;
    }

    public function getName()
    {
        return 'twig.extension_custom';
    }
}
