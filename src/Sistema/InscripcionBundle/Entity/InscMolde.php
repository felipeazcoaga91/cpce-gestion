<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * InscMolde
 *
 * @ORM\Table(name="insc_molde")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscMoldeRepository")
 */
class InscMolde {
    
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
     */
    private $descripcion;

    /**
     * @var text
     *
     * @ORM\Column(name="contenido", type="text", nullable=false)
     */
    private $contenido;

    /**
     * @var string
     *
     * @ORM\Column(name="nota", type="string", length=255, nullable=false)
     */
    private $nota;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=false)
     */
    private $tipo;

    /**
     * @var boolean
     * @ORM\Column(name="control_cuentas", type="boolean", nullable=true)
     */
    private $controlCuentas;

    /**
     * @var float
     *
     * @ORM\Column(name="importe_total", type="float", nullable=false)
     */
    private $importeTotal;

    /**
     * @var float
     *
     * @ORM\Column(name="importe_subtotal", type="float", nullable=false)
     */
    private $importeSubTotal;

    /**
     * @ORM\OneToMany(targetEntity="InscMoldeCuenta", mappedBy="molde", cascade={"persist", "remove"})
     */
    protected $cuentas;

    /**
     * @var boolean
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    public function __toString()
    {
        return (string)$this->getNombre();
    }

    /**
     * Constructor
     */
    public function __construct() { 
        $this->cuentas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return InscMolde
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return InscMolde
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return InscMolde
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set nota
     *
     * @param string $nota
     * @return InscMolde
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string 
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return InscMolde
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set controlCuentas
     *
     * @param boolean $controlCuentas
     * @return InscMolde
     */
    public function setControlCuentas($controlCuentas)
    {
        $this->controlCuentas = $controlCuentas;

        return $this;
    }

    /**
     * Get controlCuentas
     *
     * @return boolean 
     */
    public function getControlCuentas()
    {
        return $this->controlCuentas;
    }

    /**
     * Set importeTotal
     *
     * @param float $importeTotal
     * @return InscMolde
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
     * Set importeSubTotal
     *
     * @param float $importeSubTotal
     * @return InscMolde
     */
    public function setImporteSubTotal($importeSubTotal)
    {
        $this->importeSubTotal = $importeSubTotal;

        return $this;
    }

    /**
     * Get importeSubTotal
     *
     * @return float 
     */
    public function getImporteSubTotal()
    {
        return $this->importeSubTotal;
    }

    /**
     * Add cuentas.
     *
     * @param \Sistema\InscripcionBundle\Entity\InscMoldeCuenta $cuentas
     *
     * @return InscMolde
     */
    public function addCuenta(\Sistema\InscripcionBundle\Entity\InscMoldeCuenta $cuentas)
    {
        $cuentas->setMolde($this);
        $this->cuentas[] = $cuentas;

        return $this;
    }

    /**
     * Remove cuentas.
     *
     * @param \Sistema\InscripcionBundle\Entity\InscMoldeCuenta $cuentas
     */
    public function removeCuenta(\Sistema\InscripcionBundle\Entity\InscMoldeCuenta $cuentas)
    {
        $this->cuentas->removeElement($cuentas);
    }

    /**
     * Get cuentas.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCuentas()
    {
        return $this->cuentas;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return InscMolde
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }
}