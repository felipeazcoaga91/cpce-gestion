<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestamos
 *
 * @ORM\Table(name="prestamos")
 * @ORM\Entity
 */
class Prestamos
{
    /**
     * @var float
     *
     * @ORM\Column(name="pre_impcuota", type="float", precision=10, scale=2, nullable=false)
     */
    private $preImpcuota;

    /**
     * @var integer
     *
     * @ORM\Column(name="pre_lote", type="bigint", nullable=false)
     */
    private $preLote;

    /**
     * @var integer
     *
     * @ORM\Column(name="pre_tipafi", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $preTipafi;

    /**
     * @var float
     *
     * @ORM\Column(name="pre_importe", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $preImporte;

    /**
     * @var integer
     *
     * @ORM\Column(name="pre_cuota", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $preCuota;



    /**
     * Set preImpcuota
     *
     * @param float $preImpcuota
     * @return Prestamos
     */
    public function setPreImpcuota($preImpcuota)
    {
        $this->preImpcuota = $preImpcuota;

        return $this;
    }

    /**
     * Get preImpcuota
     *
     * @return float 
     */
    public function getPreImpcuota()
    {
        return $this->preImpcuota;
    }

    /**
     * Set preLote
     *
     * @param integer $preLote
     * @return Prestamos
     */
    public function setPreLote($preLote)
    {
        $this->preLote = $preLote;

        return $this;
    }

    /**
     * Get preLote
     *
     * @return integer 
     */
    public function getPreLote()
    {
        return $this->preLote;
    }

    /**
     * Set preTipafi
     *
     * @param integer $preTipafi
     * @return Prestamos
     */
    public function setPreTipafi($preTipafi)
    {
        $this->preTipafi = $preTipafi;

        return $this;
    }

    /**
     * Get preTipafi
     *
     * @return integer 
     */
    public function getPreTipafi()
    {
        return $this->preTipafi;
    }

    /**
     * Set preImporte
     *
     * @param float $preImporte
     * @return Prestamos
     */
    public function setPreImporte($preImporte)
    {
        $this->preImporte = $preImporte;

        return $this;
    }

    /**
     * Get preImporte
     *
     * @return float 
     */
    public function getPreImporte()
    {
        return $this->preImporte;
    }

    /**
     * Set preCuota
     *
     * @param integer $preCuota
     * @return Prestamos
     */
    public function setPreCuota($preCuota)
    {
        $this->preCuota = $preCuota;

        return $this;
    }

    /**
     * Get preCuota
     *
     * @return integer 
     */
    public function getPreCuota()
    {
        return $this->preCuota;
    }
}
