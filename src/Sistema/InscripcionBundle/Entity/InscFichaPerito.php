<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * InscFichaPerito
 *
 * @ORM\Table(name="insc_ficha_perito")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscFichaPeritoRepository")
 */
class InscFichaPerito {
    
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
     * @ORM\ManyToOne(targetEntity="InscCircunscripcion", inversedBy="ficha")
     * @ORM\JoinColumn(name="circunscripcion_id", referencedColumnName="id", nullable=true)
     */
    private $circunscripcion;
    
    /**
     * @ORM\ManyToMany(targetEntity="InscFuero", inversedBy="ficha")
     * @ORM\JoinTable(name="insc_ficha_fuero")
     */
    private $fueros;

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
        $this->fueros = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return InscFichaPerito
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
     * @return InscFichaPerito
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
     * @return InscFichaPerito
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
     * @return InscFichaPerito
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
     * @return InscFichaPerito
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
     * @return InscFichaPerito
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
     * Set circunscripcion
     *
     * @param \Sistema\InscripcionBundle\Entity\InscCircunscripcion $circunscripcion
     * @return InscFichaPerito
     */
    public function setCircunscripcion(\Sistema\InscripcionBundle\Entity\InscCircunscripcion $circunscripcion = null)
    {
        $this->circunscripcion = $circunscripcion;

        return $this;
    }

    /**
     * Get circunscripcion
     *
     * @return \Sistema\InscripcionBundle\Entity\InscCircunscripcion
     */
    public function getCircunscripcion()
    {
        return $this->circunscripcion;
    }

    /**
     * Add fueros
     *
     * @param \Sistema\InscripcionBundle\Entity\InscFuero $fueros
     * @return InscFichaPerito
     */
    public function addFuero(\Sistema\InscripcionBundle\Entity\InscFuero $fueros)
    {
        $this->fueros[] = $fueros;

        return $this;
    }

    /**
     * Remove fueros
     *
     * @param \Sistema\InscripcionBundle\Entity\InscFuero $fueros
     */
    public function removeFuero(\Sistema\InscripcionBundle\Entity\InscFuero $fueros)
    {
        $this->fueros->removeElement($fueros);
    }

    /**
     * Get fueros
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFueros()
    {
        return $this->fueros;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return InscMolde
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
