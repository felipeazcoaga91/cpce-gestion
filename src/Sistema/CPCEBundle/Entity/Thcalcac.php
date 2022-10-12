<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thcalcac
 *
 * @ORM\Table(name="thcalcac")
 * @ORM\Entity(repositoryClass="Sistema\CPCEBundle\Entity\ThcalcacRepository")
 */
class Thcalcac
{
    /**
     * @var float
     *
     * @ORM\Column(name="thc_fijo", type="float", precision=15, scale=2, nullable=false)
     */
    private $thcFijo;

    /**
     * @var float
     *
     * @ORM\Column(name="thc_adicporc", type="float", precision=6, scale=4, nullable=false)
     */
    private $thcAdicporc;

    /**
     * @var float
     *
     * @ORM\Column(name="thc_excedente", type="float", precision=15, scale=2, nullable=false)
     */
    private $thcExcedente;

    /**
     * @var float
     *
     * @ORM\Column(name="thc_mondes", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $thcMondes;

    /**
     * @var float
     *
     * @ORM\Column(name="thc_monhas", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $thcMonhas;



    /**
     * Set thcFijo
     *
     * @param float $thcFijo
     * @return Thcalcac
     */
    public function setThcFijo($thcFijo)
    {
        $this->thcFijo = $thcFijo;

        return $this;
    }

    /**
     * Get thcFijo
     *
     * @return float 
     */
    public function getThcFijo()
    {
        return $this->thcFijo;
    }

    /**
     * Set thcAdicporc
     *
     * @param float $thcAdicporc
     * @return Thcalcac
     */
    public function setThcAdicporc($thcAdicporc)
    {
        $this->thcAdicporc = $thcAdicporc;

        return $this;
    }

    /**
     * Get thcAdicporc
     *
     * @return float 
     */
    public function getThcAdicporc()
    {
        return $this->thcAdicporc;
    }

    /**
     * Set thcExcedente
     *
     * @param float $thcExcedente
     * @return Thcalcac
     */
    public function setThcExcedente($thcExcedente)
    {
        $this->thcExcedente = $thcExcedente;

        return $this;
    }

    /**
     * Get thcExcedente
     *
     * @return float 
     */
    public function getThcExcedente()
    {
        return $this->thcExcedente;
    }

    /**
     * Set thcMondes
     *
     * @param float $thcMondes
     * @return Thcalcac
     */
    public function setThcMondes($thcMondes)
    {
        $this->thcMondes = $thcMondes;

        return $this;
    }

    /**
     * Get thcMondes
     *
     * @return float 
     */
    public function getThcMondes()
    {
        return $this->thcMondes;
    }

    /**
     * Set thcMonhas
     *
     * @param float $thcMonhas
     * @return Thcalcac
     */
    public function setThcMonhas($thcMonhas)
    {
        $this->thcMonhas = $thcMonhas;

        return $this;
    }

    /**
     * Get thcMonhas
     *
     * @return float 
     */
    public function getThcMonhas()
    {
        return $this->thcMonhas;
    }
}
