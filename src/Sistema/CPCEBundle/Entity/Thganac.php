<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thganac
 *
 * @ORM\Table(name="thganac")
 * @ORM\Entity
 */
class Thganac
{
    /**
     * @var float
     *
     * @ORM\Column(name="thg_hasta", type="float", precision=10, scale=2, nullable=false)
     */
    private $thgHasta;

    /**
     * @var float
     *
     * @ORM\Column(name="thg_fijo", type="float", precision=10, scale=2, nullable=false)
     */
    private $thgFijo;

    /**
     * @var float
     *
     * @ORM\Column(name="thg_porcentaje", type="float", precision=5, scale=2, nullable=false)
     */
    private $thgPorcentaje;

    /**
     * @var float
     *
     * @ORM\Column(name="thg_excedente", type="float", precision=10, scale=2, nullable=false)
     */
    private $thgExcedente;

    /**
     * @var string
     *
     * @ORM\Column(name="thg_desde", type="decimal")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $thgDesde;



    /**
     * Set thgHasta
     *
     * @param float $thgHasta
     * @return Thganac
     */
    public function setThgHasta($thgHasta)
    {
        $this->thgHasta = $thgHasta;

        return $this;
    }

    /**
     * Get thgHasta
     *
     * @return float 
     */
    public function getThgHasta()
    {
        return $this->thgHasta;
    }

    /**
     * Set thgFijo
     *
     * @param float $thgFijo
     * @return Thganac
     */
    public function setThgFijo($thgFijo)
    {
        $this->thgFijo = $thgFijo;

        return $this;
    }

    /**
     * Get thgFijo
     *
     * @return float 
     */
    public function getThgFijo()
    {
        return $this->thgFijo;
    }

    /**
     * Set thgPorcentaje
     *
     * @param float $thgPorcentaje
     * @return Thganac
     */
    public function setThgPorcentaje($thgPorcentaje)
    {
        $this->thgPorcentaje = $thgPorcentaje;

        return $this;
    }

    /**
     * Get thgPorcentaje
     *
     * @return float 
     */
    public function getThgPorcentaje()
    {
        return $this->thgPorcentaje;
    }

    /**
     * Set thgExcedente
     *
     * @param float $thgExcedente
     * @return Thganac
     */
    public function setThgExcedente($thgExcedente)
    {
        $this->thgExcedente = $thgExcedente;

        return $this;
    }

    /**
     * Get thgExcedente
     *
     * @return float 
     */
    public function getThgExcedente()
    {
        return $this->thgExcedente;
    }

    /**
     * Get thgDesde
     *
     * @return string 
     */
    public function getThgDesde()
    {
        return $this->thgDesde;
    }
}
