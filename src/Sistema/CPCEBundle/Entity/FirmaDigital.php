<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FirmaDigital
 *
 * @ORM\Table(name="firma_digital")
 * @ORM\Entity
 */
class FirmaDigital
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo", type="integer", nullable=false)
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Comitente")
     * @ORM\JoinColumn(name="cliente", referencedColumnName="afi_nrodoc", nullable=true)
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Afiliado")
     * @ORM\JoinColumn(name="sindico", referencedColumnName="afi_nrodoc", nullable=true)
     */
    private $sindico;

    /**
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Afiliado")
     * @ORM\JoinColumn(name="profesional", referencedColumnName="afi_nrodoc", nullable=true)
     */
    private $profesional;

    /**
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Tareas")
     * @ORM\JoinColumn(name="trabajo", referencedColumnName="tar_codigo", nullable=true)
     */
    private $trabajo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_cierre", type="date", nullable=true)
     */
    private $fechaCierre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_informe", type="date", nullable=true)
     */
    private $fechaInforme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="periodo_inicio", type="date", nullable=true)
     */
    private $periodoInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="periodo_fin", type="date", nullable=true)
     */
    private $periodoFin;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return FirmaDigital
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set cliente
     *
     * @param \Sistema\CPCEBundle\Entity\Comitente $cliente
     * @return FirmaDigital
     */
    public function setCliente(\Sistema\CPCEBundle\Entity\Comitente $cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Sistema\CPCEBundle\Entity\Comitente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set sindico
     *
     * @param \Sistema\CPCEBundle\Entity\Afiliado $sindico
     * @return FirmaDigital
     */
    public function setSindico(\Sistema\CPCEBundle\Entity\Afiliado $sindico)
    {
        $this->sindico = $sindico;

        return $this;
    }

    /**
     * Get sindico
     *
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function getSindico()
    {
        return $this->sindico;
    }

    /**
     * Set profesional
     *
     * @param \Sistema\CPCEBundle\Entity\Afiliado $profesional
     * @return FirmaDigital
     */
    public function setProfesional(\Sistema\CPCEBundle\Entity\Afiliado $profesional)
    {
        $this->profesional = $profesional;

        return $this;
    }

    /**
     * Get profesional
     *
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function getProfesional()
    {
        return $this->profesional;
    }

    /**
     * Set trabajo
     *
     * @param \Sistema\CPCEBundle\Entity\Tareas $trabajo
     * @return FirmaDigital
     */
    public function setTrabajo(\Sistema\CPCEBundle\Entity\Tareas $trabajo)
    {
        $this->trabajo = $trabajo;

        return $this;
    }

    /**
     * Get trabajo
     *
     * @return \Sistema\CPCEBundle\Entity\Tareas 
     */
    public function getTrabajo()
    {
        return $this->trabajo;
    }

    /**
     * Set fechaCierre
     *
     * @param \DateTime $fechaCierre
     * @return FirmaDigital
     */
    public function setFechaCierre($fechaCierre)
    {
        $this->fechaCierre = $fechaCierre;

        return $this;
    }

    /**
     * Get fechaCierre
     *
     * @return \DateTime 
     */
    public function getFechaCierre()
    {
        return $this->fechaCierre;
    }

    /**
     * Set fechaInforme
     *
     * @param \DateTime $fechaInforme
     * @return FirmaDigital
     */
    public function setFechaInforme($fechaInforme)
    {
        $this->fechaInforme = $fechaInforme;

        return $this;
    }

    /**
     * Get fechaInforme
     *
     * @return \DateTime 
     */
    public function getFechaInforme()
    {
        return $this->fechaInforme;
    }

    /**
     * Set periodoInicio
     *
     * @param \DateTime $periodoInicio
     * @return FirmaDigital
     */
    public function setPeriodoInicio($periodoInicio)
    {
        $this->periodoInicio = $periodoInicio;

        return $this;
    }

    /**
     * Get periodoInicio
     *
     * @return \DateTime 
     */
    public function getPeriodoInicio()
    {
        return $this->periodoInicio;
    }

    /**
     * Set periodoFin
     *
     * @param \DateTime $periodoFin
     * @return FirmaDigital
     */
    public function setPeriodoFin($periodoFin)
    {
        $this->periodoFin = $periodoFin;

        return $this;
    }

    /**
     * Get periodoFin
     *
     * @return \DateTime 
     */
    public function getPeriodoFin()
    {
        return $this->periodoFin;
    }
}
