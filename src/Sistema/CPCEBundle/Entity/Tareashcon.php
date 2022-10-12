<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tareashcon
 *
 * @ORM\Table(name="tareashcon")
 * @ORM\Entity
 */
class Tareashcon
{
    /**
     * @var float
     *
     * @ORM\Column(name="thc_porcentaje", type="float", precision=5, scale=2, nullable=false)
     */
    private $thcPorcentaje;

    /**
     * @var float
     *
     * @ORM\Column(name="thc_importe", type="float", precision=12, scale=2, nullable=false)
     */
    private $thcImporte;

    /**
     * @var float
     *
     * @ORM\Column(name="thc_retimporte", type="float", precision=10, scale=2, nullable=false)
     */
    private $thcRetimporte;

    /**
     * @var float
     *
     * @ORM\Column(name="thc_montomayor", type="float", precision=10, scale=2, nullable=false)
     */
    private $thcMontomayor;

    /**
     * @var string
     *
     * @ORM\Column(name="thc_retsinlucro", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $thcRetsinlucro;

    /**
     * @var string
     *
     * @ORM\Column(name="thc_retconlucro", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $thcRetconlucro;

    /**
     * @var string
     *
     * @ORM\Column(name="thc_formula", type="string", length=255, nullable=false)
     */
    private $thcFormula;

    /**
     * @var integer
     *
     * @ORM\Column(name="thc_tarea", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $thcTarea;

    /**
     * @var integer
     *
     * @ORM\Column(name="thc_concepto", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $thcConcepto;



    /**
     * Set thcPorcentaje
     *
     * @param float $thcPorcentaje
     * @return Tareashcon
     */
    public function setThcPorcentaje($thcPorcentaje)
    {
        $this->thcPorcentaje = $thcPorcentaje;

        return $this;
    }

    /**
     * Get thcPorcentaje
     *
     * @return float 
     */
    public function getThcPorcentaje()
    {
        return $this->thcPorcentaje;
    }

    /**
     * Set thcImporte
     *
     * @param float $thcImporte
     * @return Tareashcon
     */
    public function setThcImporte($thcImporte)
    {
        $this->thcImporte = $thcImporte;

        return $this;
    }

    /**
     * Get thcImporte
     *
     * @return float 
     */
    public function getThcImporte()
    {
        return $this->thcImporte;
    }

    /**
     * Set thcRetimporte
     *
     * @param float $thcRetimporte
     * @return Tareashcon
     */
    public function setThcRetimporte($thcRetimporte)
    {
        $this->thcRetimporte = $thcRetimporte;

        return $this;
    }

    /**
     * Get thcRetimporte
     *
     * @return float 
     */
    public function getThcRetimporte()
    {
        return $this->thcRetimporte;
    }

    /**
     * Set thcMontomayor
     *
     * @param float $thcMontomayor
     * @return Tareashcon
     */
    public function setThcMontomayor($thcMontomayor)
    {
        $this->thcMontomayor = $thcMontomayor;

        return $this;
    }

    /**
     * Get thcMontomayor
     *
     * @return float 
     */
    public function getThcMontomayor()
    {
        return $this->thcMontomayor;
    }

    /**
     * Set thcRetsinlucro
     *
     * @param string $thcRetsinlucro
     * @return Tareashcon
     */
    public function setThcRetsinlucro($thcRetsinlucro)
    {
        $this->thcRetsinlucro = $thcRetsinlucro;

        return $this;
    }

    /**
     * Get thcRetsinlucro
     *
     * @return string 
     */
    public function getThcRetsinlucro()
    {
        return $this->thcRetsinlucro;
    }

    /**
     * Set thcRetconlucro
     *
     * @param string $thcRetconlucro
     * @return Tareashcon
     */
    public function setThcRetconlucro($thcRetconlucro)
    {
        $this->thcRetconlucro = $thcRetconlucro;

        return $this;
    }

    /**
     * Get thcRetconlucro
     *
     * @return string 
     */
    public function getThcRetconlucro()
    {
        return $this->thcRetconlucro;
    }

    /**
     * Set thcFormula
     *
     * @param string $thcFormula
     * @return Tareashcon
     */
    public function setThcFormula($thcFormula)
    {
        $this->thcFormula = $thcFormula;

        return $this;
    }

    /**
     * Get thcFormula
     *
     * @return string 
     */
    public function getThcFormula()
    {
        return $this->thcFormula;
    }

    /**
     * Set thcTarea
     *
     * @param integer $thcTarea
     * @return Tareashcon
     */
    public function setThcTarea($thcTarea)
    {
        $this->thcTarea = $thcTarea;

        return $this;
    }

    /**
     * Get thcTarea
     *
     * @return integer 
     */
    public function getThcTarea()
    {
        return $this->thcTarea;
    }

    /**
     * Set thcConcepto
     *
     * @param integer $thcConcepto
     * @return Tareashcon
     */
    public function setThcConcepto($thcConcepto)
    {
        $this->thcConcepto = $thcConcepto;

        return $this;
    }

    /**
     * Get thcConcepto
     *
     * @return integer 
     */
    public function getThcConcepto()
    {
        return $this->thcConcepto;
    }
}
