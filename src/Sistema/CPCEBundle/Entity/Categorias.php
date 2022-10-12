<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorias
 *
 * @ORM\Table(name="categorias")
 * @ORM\Entity
 */
class Categorias
{
    /**
     * @var string
     *
     * @ORM\Column(name="cat_descrip", type="string", length=50, nullable=false)
     */
    private $catDescrip;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_devenga1", type="string", length=6, nullable=false)
     */
    private $catDevenga1;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_devenga2", type="string", length=6, nullable=false)
     */
    private $catDevenga2;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_devenga3", type="string", length=6, nullable=false)
     */
    private $catDevenga3;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_recibo1", type="string", length=6, nullable=false)
     */
    private $catRecibo1;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_recibo2", type="string", length=6, nullable=false)
     */
    private $catRecibo2;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_recibo3", type="string", length=6, nullable=false)
     */
    private $catRecibo3;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_bloqueo", type="string", length=3, nullable=false)
     */
    private $catBloqueo;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_recat", type="string", length=1, nullable=false)
     */
    private $catRecat;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_codigo", type="string", length=6)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $catCodigo;

    /**
     * Set catDescrip
     *
     * @param string $catDescrip
     * @return Categorias
     */
    public function setCatDescrip($catDescrip)
    {
        $this->catDescrip = $catDescrip;

        return $this;
    }

    /**
     * Get catDescrip
     *
     * @return string 
     */
    public function getCatDescrip()
    {
        return $this->catDescrip;
    }

    /**
     * Set catDevenga1
     *
     * @param string $catDevenga1
     * @return Categorias
     */
    public function setCatDevenga1($catDevenga1)
    {
        $this->catDevenga1 = $catDevenga1;

        return $this;
    }

    /**
     * Get catDevenga1
     *
     * @return string 
     */
    public function getCatDevenga1()
    {
        return $this->catDevenga1;
    }

    /**
     * Set catDevenga2
     *
     * @param string $catDevenga2
     * @return Categorias
     */
    public function setCatDevenga2($catDevenga2)
    {
        $this->catDevenga2 = $catDevenga2;

        return $this;
    }

    /**
     * Get catDevenga2
     *
     * @return string 
     */
    public function getCatDevenga2()
    {
        return $this->catDevenga2;
    }

    /**
     * Set catDevenga3
     *
     * @param string $catDevenga3
     * @return Categorias
     */
    public function setCatDevenga3($catDevenga3)
    {
        $this->catDevenga3 = $catDevenga3;

        return $this;
    }

    /**
     * Get catDevenga3
     *
     * @return string 
     */
    public function getCatDevenga3()
    {
        return $this->catDevenga3;
    }

    /**
     * Set catRecibo1
     *
     * @param string $catRecibo1
     * @return Categorias
     */
    public function setCatRecibo1($catRecibo1)
    {
        $this->catRecibo1 = $catRecibo1;

        return $this;
    }

    /**
     * Get catRecibo1
     *
     * @return string 
     */
    public function getCatRecibo1()
    {
        return $this->catRecibo1;
    }

    /**
     * Set catRecibo2
     *
     * @param string $catRecibo2
     * @return Categorias
     */
    public function setCatRecibo2($catRecibo2)
    {
        $this->catRecibo2 = $catRecibo2;

        return $this;
    }

    /**
     * Get catRecibo2
     *
     * @return string 
     */
    public function getCatRecibo2()
    {
        return $this->catRecibo2;
    }

    /**
     * Set catRecibo3
     *
     * @param string $catRecibo3
     * @return Categorias
     */
    public function setCatRecibo3($catRecibo3)
    {
        $this->catRecibo3 = $catRecibo3;

        return $this;
    }

    /**
     * Get catRecibo3
     *
     * @return string 
     */
    public function getCatRecibo3()
    {
        return $this->catRecibo3;
    }

    /**
     * Set catBloqueo
     *
     * @param string $catBloqueo
     * @return Categorias
     */
    public function setCatBloqueo($catBloqueo)
    {
        $this->catBloqueo = $catBloqueo;

        return $this;
    }

    /**
     * Get catBloqueo
     *
     * @return string 
     */
    public function getCatBloqueo()
    {
        return $this->catBloqueo;
    }

    /**
     * Set catRecat
     *
     * @param string $catRecat
     * @return Categorias
     */
    public function setCatRecat($catRecat)
    {
        $this->catRecat = $catRecat;

        return $this;
    }

    /**
     * Get catRecat
     *
     * @return string 
     */
    public function getCatRecat()
    {
        return $this->catRecat;
    }

    /**
     * Get catCodigo
     *
     * @return string 
     */
    public function getCatCodigo()
    {
        return $this->catCodigo;
    }
}
