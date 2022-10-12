<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tareas
 *
 * @ORM\Table(name="tareas")
 * @ORM\Entity
 */
class Tareas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tar_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tarCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="tar_descrip", type="string", length=40, nullable=false)
     */
    private $tarDescrip;

    /**
     * @var integer
     *
     * @ORM\Column(name="tar_tipocalc", type="integer", nullable=false)
     */
    private $tarTipocalc;

    /**
     * @var string
     *
     * @ORM\Column(name="tar_formula", type="string", length=200, nullable=false)
     */
    private $tarFormula;

    /**
     * @var string
     *
     * @ORM\Column(name="tar_ctaing", type="string", length=8, nullable=false)
     */
    private $tarCtaing;

    /**
     * @var float
     *
     * @ORM\Column(name="tar_minimo", type="float", precision=12, scale=2, nullable=false)
     */
    private $tarMinimo;

    /**
     * @var float
     *
     * @ORM\Column(name="tar_porcentaje", type="float", precision=5, scale=2, nullable=false)
     */
    private $tarPorcentaje;

    /**
     * @var integer
     *
     * @ORM\Column(name="tar_tareaSaldo", type="integer", nullable=false)
     */
    private $tarTareasaldo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tar_activo", type="boolean", nullable=false)
     */
    private $tarActivo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tar_activoweb", type="boolean", nullable=false)
     */
    private $tarActivoweb;

    /**
     * @var float
     *
     * @ORM\Column(name="tar_porcentajehonorario", type="float", precision=5, scale=2, nullable=false)
     */
    private $tarPorcentajehonorario;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tar_usamonto", type="boolean", nullable=false)
     */
    private $tarUsamonto;


    public function __toString()
    {
        return $this->getTarDescrip();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->tarCodigo;
    }

    /**
     * Set tarDescrip
     *
     * @param string $tarDescrip
     * @return Tareas
     */
    public function setTarDescrip($tarDescrip)
    {
        $this->tarDescrip = $tarDescrip;

        return $this;
    }

    /**
     * Get tarDescrip
     *
     * @return string 
     */
    public function getTarDescrip()
    {
        return $this->tarDescrip;
    }

    /**
     * Set tarTipocalc
     *
     * @param integer $tarTipocalc
     * @return Tareas
     */
    public function setTarTipocalc($tarTipocalc)
    {
        $this->tarTipocalc = $tarTipocalc;

        return $this;
    }

    /**
     * Get tarTipocalc
     *
     * @return integer 
     */
    public function getTarTipocalc()
    {
        return $this->tarTipocalc;
    }

    /**
     * Set tarFormula
     *
     * @param string $tarFormula
     * @return Tareas
     */
    public function setTarFormula($tarFormula)
    {
        $this->tarFormula = $tarFormula;

        return $this;
    }

    /**
     * Get tarFormula
     *
     * @return string 
     */
    public function getTarFormula()
    {
        return $this->tarFormula;
    }

    /**
     * Set tarCtaing
     *
     * @param string $tarCtaing
     * @return Tareas
     */
    public function setTarCtaing($tarCtaing)
    {
        $this->tarCtaing = $tarCtaing;

        return $this;
    }

    /**
     * Get tarCtaing
     *
     * @return string 
     */
    public function getTarCtaing()
    {
        return $this->tarCtaing;
    }

    /**
     * Set tarMinimo
     *
     * @param float $tarMinimo
     * @return Tareas
     */
    public function setTarMinimo($tarMinimo)
    {
        $this->tarMinimo = $tarMinimo;

        return $this;
    }

    /**
     * Get tarMinimo
     *
     * @return float 
     */
    public function getTarMinimo()
    {
        return $this->tarMinimo;
    }

    /**
     * Set tarPorcentaje
     *
     * @param float $tarPorcentaje
     * @return Tareas
     */
    public function setTarPorcentaje($tarPorcentaje)
    {
        $this->tarPorcentaje = $tarPorcentaje;

        return $this;
    }

    /**
     * Get tarPorcentaje
     *
     * @return float 
     */
    public function getTarPorcentaje()
    {
        return $this->tarPorcentaje;
    }

    /**
     * Set tarTareasaldo
     *
     * @param integer $tarTareasaldo
     * @return Tareas
     */
    public function setTarTareasaldo($tarTareasaldo)
    {
        $this->tarTareasaldo = $tarTareasaldo;

        return $this;
    }

    /**
     * Get tarTareasaldo
     *
     * @return integer 
     */
    public function getTarTareasaldo()
    {
        return $this->tarTareasaldo;
    }

    /**
     * Get tarCodigo
     *
     * @return integer 
     */
    public function getTarCodigo()
    {
        return $this->tarCodigo;
    }

    /**
     * Set tarActivo
     *
     * @param boolean $tarActivo
     * @return Tareas
     */
    public function setTarActivo($tarActivo)
    {
        $this->tarActivo = $tarActivo;

        return $this;
    }

    /**
     * Get tarActivo
     *
     * @return boolean 
     */
    public function getTarActivo()
    {
        return $this->tarActivo;
    }

    /**
     * Set tarActivoweb
     *
     * @param boolean $tarActivoweb
     * @return Tareas
     */
    public function setTarActivoweb($tarActivoweb)
    {
        $this->tarActivoweb = $tarActivoweb;

        return $this;
    }

    /**
     * Get tarActivoweb
     *
     * @return boolean 
     */
    public function getTarActivoweb()
    {
        return $this->tarActivoweb;
    }

    /**
     * Set tarPorcentajehonorario
     *
     * @param float $tarPorcentajehonorario
     * @return Tareas
     */
    public function setTarPorcentajehonorario($tarPorcentajehonorario)
    {
        $this->tarPorcentajehonorario = $tarPorcentajehonorario;

        return $this;
    }

    /**
     * Get tarPorcentajehonorario
     *
     * @return float 
     */
    public function getTarPorcentajehonorario()
    {
        return $this->tarPorcentajehonorario;
    }

    /**
     * Set tarUsamonto
     *
     * @param boolean $tarUsamonto
     * @return Tareas
     */
    public function setTarUsamonto($tarUsamonto)
    {
        $this->tarUsamonto = $tarUsamonto;

        return $this;
    }

    /**
     * Get tarUsamonto
     *
     * @return boolean 
     */
    public function getTarUsamonto()
    {
        return $this->tarUsamonto;
    }
}
