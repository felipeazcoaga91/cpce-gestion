<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hconcept
 *
 * @ORM\Table(name="hconcept")
 * @ORM\Entity
 */
class Hconcept
{
    /**
     * @var string
     *
     * @ORM\Column(name="hco_descripcion", type="string", length=50, nullable=false)
     */
    private $hcoDescripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="hco_porcentaje", type="float", precision=5, scale=2, nullable=false)
     */
    private $hcoPorcentaje;

    /**
     * @var string
     *
     * @ORM\Column(name="hco_Campo", type="string", length=10, nullable=false)
     */
    private $hcoCampo;

    /**
     * @var string
     *
     * @ORM\Column(name="hco_formcalc", type="string", length=250, nullable=false)
     */
    private $hcoFormcalc;

    /**
     * @var string
     *
     * @ORM\Column(name="hco_formacum", type="string", length=200, nullable=false)
     */
    private $hcoFormacum;

    /**
     * @var float
     *
     * @ORM\Column(name="hco_montoacum", type="float", precision=12, scale=2, nullable=false)
     */
    private $hcoMontoacum;

    /**
     * @var string
     *
     * @ORM\Column(name="hco_sobre", type="string", length=200, nullable=false)
     */
    private $hcoSobre;

    /**
     * @var string
     *
     * @ORM\Column(name="hco_tarea", type="string", length=8, nullable=false)
     */
    private $hcoTarea;

    /**
     * @var integer
     *
     * @ORM\Column(name="hco_concepto", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hcoConcepto;



    /**
     * Set hcoDescripcion
     *
     * @param string $hcoDescripcion
     * @return Hconcept
     */
    public function setHcoDescripcion($hcoDescripcion)
    {
        $this->hcoDescripcion = $hcoDescripcion;

        return $this;
    }

    /**
     * Get hcoDescripcion
     *
     * @return string 
     */
    public function getHcoDescripcion()
    {
        return $this->hcoDescripcion;
    }

    /**
     * Set hcoPorcentaje
     *
     * @param float $hcoPorcentaje
     * @return Hconcept
     */
    public function setHcoPorcentaje($hcoPorcentaje)
    {
        $this->hcoPorcentaje = $hcoPorcentaje;

        return $this;
    }

    /**
     * Get hcoPorcentaje
     *
     * @return float 
     */
    public function getHcoPorcentaje()
    {
        return $this->hcoPorcentaje;
    }

    /**
     * Set hcoCampo
     *
     * @param string $hcoCampo
     * @return Hconcept
     */
    public function setHcoCampo($hcoCampo)
    {
        $this->hcoCampo = $hcoCampo;

        return $this;
    }

    /**
     * Get hcoCampo
     *
     * @return string 
     */
    public function getHcoCampo()
    {
        return $this->hcoCampo;
    }

    /**
     * Set hcoFormcalc
     *
     * @param string $hcoFormcalc
     * @return Hconcept
     */
    public function setHcoFormcalc($hcoFormcalc)
    {
        $this->hcoFormcalc = $hcoFormcalc;

        return $this;
    }

    /**
     * Get hcoFormcalc
     *
     * @return string 
     */
    public function getHcoFormcalc()
    {
        return $this->hcoFormcalc;
    }

    /**
     * Set hcoFormacum
     *
     * @param string $hcoFormacum
     * @return Hconcept
     */
    public function setHcoFormacum($hcoFormacum)
    {
        $this->hcoFormacum = $hcoFormacum;

        return $this;
    }

    /**
     * Get hcoFormacum
     *
     * @return string 
     */
    public function getHcoFormacum()
    {
        return $this->hcoFormacum;
    }

    /**
     * Set hcoMontoacum
     *
     * @param float $hcoMontoacum
     * @return Hconcept
     */
    public function setHcoMontoacum($hcoMontoacum)
    {
        $this->hcoMontoacum = $hcoMontoacum;

        return $this;
    }

    /**
     * Get hcoMontoacum
     *
     * @return float 
     */
    public function getHcoMontoacum()
    {
        return $this->hcoMontoacum;
    }

    /**
     * Set hcoSobre
     *
     * @param string $hcoSobre
     * @return Hconcept
     */
    public function setHcoSobre($hcoSobre)
    {
        $this->hcoSobre = $hcoSobre;

        return $this;
    }

    /**
     * Get hcoSobre
     *
     * @return string 
     */
    public function getHcoSobre()
    {
        return $this->hcoSobre;
    }

    /**
     * Set hcoTarea
     *
     * @param string $hcoTarea
     * @return Hconcept
     */
    public function setHcoTarea($hcoTarea)
    {
        $this->hcoTarea = $hcoTarea;

        return $this;
    }

    /**
     * Get hcoTarea
     *
     * @return string 
     */
    public function getHcoTarea()
    {
        return $this->hcoTarea;
    }

    /**
     * Get hcoConcepto
     *
     * @return integer 
     */
    public function getHcoConcepto()
    {
        return $this->hcoConcepto;
    }
}
