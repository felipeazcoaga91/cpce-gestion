<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thcalact
 *
 * @ORM\Table(name="thcalact")
 * @ORM\Entity
 */
class Thcalact
{
    /**
     * @var float
     *
     * @ORM\Column(name="tac_fijo", type="float", precision=15, scale=2, nullable=false)
     */
    private $tacFijo;

    /**
     * @var float
     *
     * @ORM\Column(name="tac_adicporc", type="float", precision=6, scale=4, nullable=false)
     */
    private $tacAdicporc;

    /**
     * @var float
     *
     * @ORM\Column(name="tac_excedente", type="float", precision=15, scale=2, nullable=false)
     */
    private $tacExcedente;

    /**
     * @var float
     *
     * @ORM\Column(name="tac_mondes", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $tacMondes;

    /**
     * @var float
     *
     * @ORM\Column(name="tac_monhas", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $tacMonhas;



    /**
     * Set tacFijo
     *
     * @param float $tacFijo
     * @return Thcalact
     */
    public function setTacFijo($tacFijo)
    {
        $this->tacFijo = $tacFijo;

        return $this;
    }

    /**
     * Get tacFijo
     *
     * @return float 
     */
    public function getTacFijo()
    {
        return $this->tacFijo;
    }

    /**
     * Set tacAdicporc
     *
     * @param float $tacAdicporc
     * @return Thcalact
     */
    public function setTacAdicporc($tacAdicporc)
    {
        $this->tacAdicporc = $tacAdicporc;

        return $this;
    }

    /**
     * Get tacAdicporc
     *
     * @return float 
     */
    public function getTacAdicporc()
    {
        return $this->tacAdicporc;
    }

    /**
     * Set tacExcedente
     *
     * @param float $tacExcedente
     * @return Thcalact
     */
    public function setTacExcedente($tacExcedente)
    {
        $this->tacExcedente = $tacExcedente;

        return $this;
    }

    /**
     * Get tacExcedente
     *
     * @return float 
     */
    public function getTacExcedente()
    {
        return $this->tacExcedente;
    }

    /**
     * Set tacMondes
     *
     * @param float $tacMondes
     * @return Thcalact
     */
    public function setTacMondes($tacMondes)
    {
        $this->tacMondes = $tacMondes;

        return $this;
    }

    /**
     * Get tacMondes
     *
     * @return float 
     */
    public function getTacMondes()
    {
        return $this->tacMondes;
    }

    /**
     * Set tacMonhas
     *
     * @param float $tacMonhas
     * @return Thcalact
     */
    public function setTacMonhas($tacMonhas)
    {
        $this->tacMonhas = $tacMonhas;

        return $this;
    }

    /**
     * Get tacMonhas
     *
     * @return float 
     */
    public function getTacMonhas()
    {
        return $this->tacMonhas;
    }
}
