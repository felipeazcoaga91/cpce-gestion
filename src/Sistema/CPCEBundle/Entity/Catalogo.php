<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogo
 *
 * @ORM\Table(name="catalogo")
 * @ORM\Entity
 */
class Catalogo
{
    /**
     * @var string
     *
     * @ORM\Column(name="cat_indice", type="string", length=20, nullable=false)
     */
    private $catIndice;

    /**
     * @var integer
     *
     * @ORM\Column(name="cat_ultsucursal", type="integer", nullable=false)
     */
    private $catUltsucursal;

    /**
     * @var integer
     *
     * @ORM\Column(name="cat_ultlote", type="bigint", nullable=false)
     */
    private $catUltlote;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_vaiven", type="string", length=1, nullable=false)
     */
    private $catVaiven;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_campofar", type="string", length=15, nullable=false)
     */
    private $catCampofar;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_filtro", type="string", length=50, nullable=false)
     */
    private $catFiltro;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_orden", type="string", length=100, nullable=false)
     */
    private $catOrden;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_bloqueo", type="string", length=5, nullable=true)
     */
    private $catBloqueo;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_tabla", type="string", length=25)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $catTabla;



    /**
     * Set catIndice
     *
     * @param string $catIndice
     * @return Catalogo
     */
    public function setCatIndice($catIndice)
    {
        $this->catIndice = $catIndice;

        return $this;
    }

    /**
     * Get catIndice
     *
     * @return string 
     */
    public function getCatIndice()
    {
        return $this->catIndice;
    }

    /**
     * Set catUltsucursal
     *
     * @param integer $catUltsucursal
     * @return Catalogo
     */
    public function setCatUltsucursal($catUltsucursal)
    {
        $this->catUltsucursal = $catUltsucursal;

        return $this;
    }

    /**
     * Get catUltsucursal
     *
     * @return integer 
     */
    public function getCatUltsucursal()
    {
        return $this->catUltsucursal;
    }

    /**
     * Set catUltlote
     *
     * @param integer $catUltlote
     * @return Catalogo
     */
    public function setCatUltlote($catUltlote)
    {
        $this->catUltlote = $catUltlote;

        return $this;
    }

    /**
     * Get catUltlote
     *
     * @return integer 
     */
    public function getCatUltlote()
    {
        return $this->catUltlote;
    }

    /**
     * Set catVaiven
     *
     * @param string $catVaiven
     * @return Catalogo
     */
    public function setCatVaiven($catVaiven)
    {
        $this->catVaiven = $catVaiven;

        return $this;
    }

    /**
     * Get catVaiven
     *
     * @return string 
     */
    public function getCatVaiven()
    {
        return $this->catVaiven;
    }

    /**
     * Set catCampofar
     *
     * @param string $catCampofar
     * @return Catalogo
     */
    public function setCatCampofar($catCampofar)
    {
        $this->catCampofar = $catCampofar;

        return $this;
    }

    /**
     * Get catCampofar
     *
     * @return string 
     */
    public function getCatCampofar()
    {
        return $this->catCampofar;
    }

    /**
     * Set catFiltro
     *
     * @param string $catFiltro
     * @return Catalogo
     */
    public function setCatFiltro($catFiltro)
    {
        $this->catFiltro = $catFiltro;

        return $this;
    }

    /**
     * Get catFiltro
     *
     * @return string 
     */
    public function getCatFiltro()
    {
        return $this->catFiltro;
    }

    /**
     * Set catOrden
     *
     * @param string $catOrden
     * @return Catalogo
     */
    public function setCatOrden($catOrden)
    {
        $this->catOrden = $catOrden;

        return $this;
    }

    /**
     * Get catOrden
     *
     * @return string 
     */
    public function getCatOrden()
    {
        return $this->catOrden;
    }

    /**
     * Set catBloqueo
     *
     * @param string $catBloqueo
     * @return Catalogo
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
     * Get catTabla
     *
     * @return string 
     */
    public function getCatTabla()
    {
        return $this->catTabla;
    }
}
