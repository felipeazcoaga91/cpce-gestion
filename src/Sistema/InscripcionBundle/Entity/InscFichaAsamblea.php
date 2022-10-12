<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * InscFichaAsamblea
 *
 * @ORM\Table(name="insc_ficha_asamblea")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscFichaAsambleaRepository")
 */
class InscFichaAsamblea {
    
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="molde_id", type="integer", nullable=false)
     */
    private $moldeId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_tipdoc", type="string", length=3)
     */
    private $afiTipdoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="afi_nrodoc", type="integer", length=8)
     */
    private $afiNrodoc;

    /**
     * @var float
     *
     * @ORM\Column(name="importe_total", type="float", nullable=false)
     */
    private $importeTotal;

    /**
     * @var float
     *
     * @ORM\Column(name="importe_abonado", type="float", nullable=false)
     */
    private $importeAbonado;

    /**
     * @var text
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="delegacion", type="string", length=255, nullable=false)
     */
    private $delegacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     */
    private $estado;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fecha = new \DateTime('now');
        $this->importeTotal = 0;
        $this->importeAbonado = 0;
        $this->estado = 0;
    }

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
     * Set moldeId
     *
     * @param integer $moldeId
     * @return InscFichaAsamblea
     */
    public function setMoldeId($moldeId)
    {
        $this->moldeId = $moldeId;

        return $this;
    }

    /**
     * Get moldeId
     *
     * @return integer 
     */
    public function getMoldeId()
    {
        return $this->moldeId;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return InscFichaAsamblea
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set afiTipdoc
     *
     * @param string $afiTipdoc
     * @return InscFichaAsamblea
     */
    public function setAfiTipdoc($afiTipdoc)
    {
        $this->afiTipdoc = $afiTipdoc;

        return $this;
    }

    /**
     * Get afiTipdoc
     *
     * @return string 
     */
    public function getAfiTipdoc()
    {
        return $this->afiTipdoc;
    }

    /**
     * Set afiNrodoc
     *
     * @param integer $afiNrodoc
     * @return InscFichaAsamblea
     */
    public function setAfiNrodoc($afiNrodoc)
    {
        $this->afiNrodoc = $afiNrodoc;

        return $this;
    }

    /**
     * Get afiNrodoc
     *
     * @return integer 
     */
    public function getAfiNrodoc()
    {
        return $this->afiNrodoc;
    }

    /**
     * Set importeTotal
     *
     * @param float $importeTotal
     * @return InscFichaAsamblea
     */
    public function setImporteTotal($importeTotal)
    {
        $this->importeTotal = $importeTotal;

        return $this;
    }

    /**
     * Get importeTotal
     *
     * @return float 
     */
    public function getImporteTotal()
    {
        return $this->importeTotal;
    }

    /**
     * Set importeAbonado
     *
     * @param float $importeAbonado
     * @return InscFichaAsamblea
     */
    public function setImporteAbonado($importeAbonado)
    {
        $this->importeAbonado = $importeAbonado;

        return $this;
    }

    /**
     * Get importeAbonado
     *
     * @return float 
     */
    public function getImporteAbonado()
    {
        return $this->importeAbonado;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return InscFichaAsamblea
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set delegacion
     *
     * @param string $delegacion
     * @return InscFichaAsamblea
     */
    public function setDelegacion($delegacion)
    {
        $this->delegacion = $delegacion;

        return $this;
    }

    /**
     * Get delegacion
     *
     * @return string 
     */
    public function getDelegacion()
    {
        return $this->delegacion;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return InscFichaPerito
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
