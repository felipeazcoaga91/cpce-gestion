<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thcaljud
 *
 * @ORM\Table(name="thcaljud")
 * @ORM\Entity
 */
class Thcaljud
{
    /**
     * @var float
     *
     * @ORM\Column(name="thj_fijo", type="float", precision=15, scale=2, nullable=false)
     */
    private $thjFijo;

    /**
     * @var float
     *
     * @ORM\Column(name="thj_adicporc", type="float", precision=6, scale=4, nullable=false)
     */
    private $thjAdicporc;

    /**
     * @var float
     *
     * @ORM\Column(name="thj_excedente", type="float", precision=15, scale=2, nullable=false)
     */
    private $thjExcedente;

    /**
     * @var float
     *
     * @ORM\Column(name="thj_mondes", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $thjMondes;

    /**
     * @var float
     *
     * @ORM\Column(name="thj_monhas", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $thjMonhas;



    /**
     * Set thjFijo
     *
     * @param float $thjFijo
     * @return Thcaljud
     */
    public function setThjFijo($thjFijo)
    {
        $this->thjFijo = $thjFijo;

        return $this;
    }

    /**
     * Get thjFijo
     *
     * @return float 
     */
    public function getThjFijo()
    {
        return $this->thjFijo;
    }

    /**
     * Set thjAdicporc
     *
     * @param float $thjAdicporc
     * @return Thcaljud
     */
    public function setThjAdicporc($thjAdicporc)
    {
        $this->thjAdicporc = $thjAdicporc;

        return $this;
    }

    /**
     * Get thjAdicporc
     *
     * @return float 
     */
    public function getThjAdicporc()
    {
        return $this->thjAdicporc;
    }

    /**
     * Set thjExcedente
     *
     * @param float $thjExcedente
     * @return Thcaljud
     */
    public function setThjExcedente($thjExcedente)
    {
        $this->thjExcedente = $thjExcedente;

        return $this;
    }

    /**
     * Get thjExcedente
     *
     * @return float 
     */
    public function getThjExcedente()
    {
        return $this->thjExcedente;
    }

    /**
     * Set thjMondes
     *
     * @param float $thjMondes
     * @return Thcaljud
     */
    public function setThjMondes($thjMondes)
    {
        $this->thjMondes = $thjMondes;

        return $this;
    }

    /**
     * Get thjMondes
     *
     * @return float 
     */
    public function getThjMondes()
    {
        return $this->thjMondes;
    }

    /**
     * Set thjMonhas
     *
     * @param float $thjMonhas
     * @return Thcaljud
     */
    public function setThjMonhas($thjMonhas)
    {
        $this->thjMonhas = $thjMonhas;

        return $this;
    }

    /**
     * Get thjMonhas
     *
     * @return float 
     */
    public function getThjMonhas()
    {
        return $this->thjMonhas;
    }
}
