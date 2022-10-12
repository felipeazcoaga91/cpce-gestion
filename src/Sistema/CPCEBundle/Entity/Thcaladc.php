<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thcaladc
 *
 * @ORM\Table(name="thcaladc")
 * @ORM\Entity
 */
class Thcaladc
{
    /**
     * @var float
     *
     * @ORM\Column(name="tha_fijo", type="float", precision=15, scale=2, nullable=false)
     */
    private $thaFijo;

    /**
     * @var float
     *
     * @ORM\Column(name="tha_adicporc", type="float", precision=6, scale=4, nullable=false)
     */
    private $thaAdicporc;

    /**
     * @var float
     *
     * @ORM\Column(name="tha_excedente", type="float", precision=15, scale=2, nullable=false)
     */
    private $thaExcedente;

    /**
     * @var float
     *
     * @ORM\Column(name="tha_mondes", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $thaMondes;

    /**
     * @var float
     *
     * @ORM\Column(name="tha_monhas", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $thaMonhas;



    /**
     * Set thaFijo
     *
     * @param float $thaFijo
     * @return Thcaladc
     */
    public function setThaFijo($thaFijo)
    {
        $this->thaFijo = $thaFijo;

        return $this;
    }

    /**
     * Get thaFijo
     *
     * @return float 
     */
    public function getThaFijo()
    {
        return $this->thaFijo;
    }

    /**
     * Set thaAdicporc
     *
     * @param float $thaAdicporc
     * @return Thcaladc
     */
    public function setThaAdicporc($thaAdicporc)
    {
        $this->thaAdicporc = $thaAdicporc;

        return $this;
    }

    /**
     * Get thaAdicporc
     *
     * @return float 
     */
    public function getThaAdicporc()
    {
        return $this->thaAdicporc;
    }

    /**
     * Set thaExcedente
     *
     * @param float $thaExcedente
     * @return Thcaladc
     */
    public function setThaExcedente($thaExcedente)
    {
        $this->thaExcedente = $thaExcedente;

        return $this;
    }

    /**
     * Get thaExcedente
     *
     * @return float 
     */
    public function getThaExcedente()
    {
        return $this->thaExcedente;
    }

    /**
     * Set thaMondes
     *
     * @param float $thaMondes
     * @return Thcaladc
     */
    public function setThaMondes($thaMondes)
    {
        $this->thaMondes = $thaMondes;

        return $this;
    }

    /**
     * Get thaMondes
     *
     * @return float 
     */
    public function getThaMondes()
    {
        return $this->thaMondes;
    }

    /**
     * Set thaMonhas
     *
     * @param float $thaMonhas
     * @return Thcaladc
     */
    public function setThaMonhas($thaMonhas)
    {
        $this->thaMonhas = $thaMonhas;

        return $this;
    }

    /**
     * Get thaMonhas
     *
     * @return float 
     */
    public function getThaMonhas()
    {
        return $this->thaMonhas;
    }
}
