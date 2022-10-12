<?php

namespace Sistema\UserBundle\Controller;

/**
 * Description of slug
 * http://www.ens.ro/2012/04/03/symfony2-jobeet-day-5-the-routing/
 * @author Gonzalo Alonso <gonkpo@gmail.com>
 */
class Slug
{
    public static function slugify($text)
    {
        // replace all non letters or digits by -
        $text = preg_replace('/\W+/', '_', $text);

        // pasar a mayusculas
        $text = strtoupper(trim($text, '_'));

        return $text;
    }
}