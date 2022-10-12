<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * InscExtra
 *
 * @ORM\Table(name="insc_extra")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscExtraRepository")
 */
class InscExtra {
    
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
     * @var float
     *
     * @ORM\Column(name="importe", type="float", nullable=false)
     */
    private $importe;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var integer
     *
     * @ORM\Column(name="molde_id", type="integer", nullable=false)
     */
    private $moldeId;

    /**
     * @var boolean
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->importe = 0;
        $this->moldeId = 0;
    }

    public function __toString()
    {
        return (string)$this->getNombre();
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
     * @return InscExtra
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
     * Set importe
     *
     * @param float $importe
     * @return InscExtra
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return float 
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return InscExtra
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set moldeId
     *
     * @param integer $moldeId
     * @return InscFicha
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
     * Set activo
     *
     * @param boolean $activo
     * @return InscExtra
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
