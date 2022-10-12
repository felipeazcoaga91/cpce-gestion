<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lotehistorico
 *
 * @ORM\Table(name="lotehistorico")
 * @ORM\Entity
 */
class Lotehistorico
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lhi_fecha", type="date", nullable=true)
     */
    private $lhiFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="lhi_hora", type="string", length=8, nullable=false)
     */
    private $lhiHora;

    /**
     * @var integer
     *
     * @ORM\Column(name="lhi_origen", type="integer", nullable=false)
     */
    private $lhiOrigen;

    /**
     * @var integer
     *
     * @ORM\Column(name="lhi_cantReg", type="integer", nullable=false)
     */
    private $lhiCantreg;

    /**
     * @var integer
     *
     * @ORM\Column(name="lhi_ultreg", type="integer", nullable=false)
     */
    private $lhiUltreg;

    /**
     * @var string
     *
     * @ORM\Column(name="lhi_estado", type="string", length=1, nullable=false)
     */
    private $lhiEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="lhi_consulta", type="string", length=1, nullable=false)
     */
    private $lhiConsulta;

    /**
     * @var integer
     *
     * @ORM\Column(name="lhi_nrocli", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $lhiNrocli;

    /**
     * @var string
     *
     * @ORM\Column(name="lhi_tabla", type="string", length=25)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $lhiTabla;

    /**
     * @var float
     *
     * @ORM\Column(name="lhi_lote", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $lhiLote;



    /**
     * Set lhiFecha
     *
     * @param \DateTime $lhiFecha
     * @return Lotehistorico
     */
    public function setLhiFecha($lhiFecha)
    {
        $this->lhiFecha = $lhiFecha;

        return $this;
    }

    /**
     * Get lhiFecha
     *
     * @return \DateTime 
     */
    public function getLhiFecha()
    {
        return $this->lhiFecha;
    }

    /**
     * Set lhiHora
     *
     * @param string $lhiHora
     * @return Lotehistorico
     */
    public function setLhiHora($lhiHora)
    {
        $this->lhiHora = $lhiHora;

        return $this;
    }

    /**
     * Get lhiHora
     *
     * @return string 
     */
    public function getLhiHora()
    {
        return $this->lhiHora;
    }

    /**
     * Set lhiOrigen
     *
     * @param integer $lhiOrigen
     * @return Lotehistorico
     */
    public function setLhiOrigen($lhiOrigen)
    {
        $this->lhiOrigen = $lhiOrigen;

        return $this;
    }

    /**
     * Get lhiOrigen
     *
     * @return integer 
     */
    public function getLhiOrigen()
    {
        return $this->lhiOrigen;
    }

    /**
     * Set lhiCantreg
     *
     * @param integer $lhiCantreg
     * @return Lotehistorico
     */
    public function setLhiCantreg($lhiCantreg)
    {
        $this->lhiCantreg = $lhiCantreg;

        return $this;
    }

    /**
     * Get lhiCantreg
     *
     * @return integer 
     */
    public function getLhiCantreg()
    {
        return $this->lhiCantreg;
    }

    /**
     * Set lhiUltreg
     *
     * @param integer $lhiUltreg
     * @return Lotehistorico
     */
    public function setLhiUltreg($lhiUltreg)
    {
        $this->lhiUltreg = $lhiUltreg;

        return $this;
    }

    /**
     * Get lhiUltreg
     *
     * @return integer 
     */
    public function getLhiUltreg()
    {
        return $this->lhiUltreg;
    }

    /**
     * Set lhiEstado
     *
     * @param string $lhiEstado
     * @return Lotehistorico
     */
    public function setLhiEstado($lhiEstado)
    {
        $this->lhiEstado = $lhiEstado;

        return $this;
    }

    /**
     * Get lhiEstado
     *
     * @return string 
     */
    public function getLhiEstado()
    {
        return $this->lhiEstado;
    }

    /**
     * Set lhiConsulta
     *
     * @param string $lhiConsulta
     * @return Lotehistorico
     */
    public function setLhiConsulta($lhiConsulta)
    {
        $this->lhiConsulta = $lhiConsulta;

        return $this;
    }

    /**
     * Get lhiConsulta
     *
     * @return string 
     */
    public function getLhiConsulta()
    {
        return $this->lhiConsulta;
    }

    /**
     * Set lhiNrocli
     *
     * @param integer $lhiNrocli
     * @return Lotehistorico
     */
    public function setLhiNrocli($lhiNrocli)
    {
        $this->lhiNrocli = $lhiNrocli;

        return $this;
    }

    /**
     * Get lhiNrocli
     *
     * @return integer 
     */
    public function getLhiNrocli()
    {
        return $this->lhiNrocli;
    }

    /**
     * Set lhiTabla
     *
     * @param string $lhiTabla
     * @return Lotehistorico
     */
    public function setLhiTabla($lhiTabla)
    {
        $this->lhiTabla = $lhiTabla;

        return $this;
    }

    /**
     * Get lhiTabla
     *
     * @return string 
     */
    public function getLhiTabla()
    {
        return $this->lhiTabla;
    }

    /**
     * Set lhiLote
     *
     * @param float $lhiLote
     * @return Lotehistorico
     */
    public function setLhiLote($lhiLote)
    {
        $this->lhiLote = $lhiLote;

        return $this;
    }

    /**
     * Get lhiLote
     *
     * @return float 
     */
    public function getLhiLote()
    {
        return $this->lhiLote;
    }
}
