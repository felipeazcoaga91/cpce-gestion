<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Numeros
 *
 * @ORM\Table(name="numeros")
 * @ORM\Entity
 */
class Numeros
{
    /**
     * @var integer
     *
     * @ORM\Column(name="num_puncom", type="integer", nullable=false)
     */
    private $numPuncom;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_nrocom", type="integer", nullable=false)
     */
    private $numNrocom;

    /**
     * @var string
     *
     * @ORM\Column(name="num_descri", type="string", length=60, nullable=false)
     */
    private $numDescri;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_lote", type="bigint", nullable=false)
     */
    private $numLote;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="num_fecha", type="date", nullable=false)
     */
    private $numFecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_unegos", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numUnegos;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_nrocli", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numNrocli;

    /**
     * @var string
     *
     * @ORM\Column(name="num_numerador", type="string", length=8)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numNumerador;



    /**
     * Set numPuncom
     *
     * @param integer $numPuncom
     * @return Numeros
     */
    public function setNumPuncom($numPuncom)
    {
        $this->numPuncom = $numPuncom;

        return $this;
    }

    /**
     * Get numPuncom
     *
     * @return integer 
     */
    public function getNumPuncom()
    {
        return $this->numPuncom;
    }

    /**
     * Set numNrocom
     *
     * @param integer $numNrocom
     * @return Numeros
     */
    public function setNumNrocom($numNrocom)
    {
        $this->numNrocom = $numNrocom;

        return $this;
    }

    /**
     * Get numNrocom
     *
     * @return integer 
     */
    public function getNumNrocom()
    {
        return $this->numNrocom;
    }

    /**
     * Set numDescri
     *
     * @param string $numDescri
     * @return Numeros
     */
    public function setNumDescri($numDescri)
    {
        $this->numDescri = $numDescri;

        return $this;
    }

    /**
     * Get numDescri
     *
     * @return string 
     */
    public function getNumDescri()
    {
        return $this->numDescri;
    }

    /**
     * Set numLote
     *
     * @param integer $numLote
     * @return Numeros
     */
    public function setNumLote($numLote)
    {
        $this->numLote = $numLote;

        return $this;
    }

    /**
     * Get numLote
     *
     * @return integer 
     */
    public function getNumLote()
    {
        return $this->numLote;
    }

    /**
     * Set numFecha
     *
     * @param \DateTime $numFecha
     * @return Numeros
     */
    public function setNumFecha($numFecha)
    {
        $this->numFecha = $numFecha;

        return $this;
    }

    /**
     * Get numFecha
     *
     * @return \DateTime 
     */
    public function getNumFecha()
    {
        return $this->numFecha;
    }

    /**
     * Set numUnegos
     *
     * @param integer $numUnegos
     * @return Numeros
     */
    public function setNumUnegos($numUnegos)
    {
        $this->numUnegos = $numUnegos;

        return $this;
    }

    /**
     * Get numUnegos
     *
     * @return integer 
     */
    public function getNumUnegos()
    {
        return $this->numUnegos;
    }

    /**
     * Set numNrocli
     *
     * @param integer $numNrocli
     * @return Numeros
     */
    public function setNumNrocli($numNrocli)
    {
        $this->numNrocli = $numNrocli;

        return $this;
    }

    /**
     * Get numNrocli
     *
     * @return integer 
     */
    public function getNumNrocli()
    {
        return $this->numNrocli;
    }

    /**
     * Set numNumerador
     *
     * @param string $numNumerador
     * @return Numeros
     */
    public function setNumNumerador($numNumerador)
    {
        $this->numNumerador = $numNumerador;

        return $this;
    }

    /**
     * Get numNumerador
     *
     * @return string 
     */
    public function getNumNumerador()
    {
        return $this->numNumerador;
    }
}
