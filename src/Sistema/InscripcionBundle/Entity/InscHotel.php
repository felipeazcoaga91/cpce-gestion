<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * InscHotel
 *
 * @ORM\Table(name="insc_hotel")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscHotelRepository")
 */
class InscHotel {
    
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
     * @var integer
     *
     * @ORM\Column(name="cupo", type="integer", nullable=false)
     */
    private $cupo;

    /**
     * @var integer
     *
     * @ORM\Column(name="reservado", type="integer", nullable=true)
     */
    private $reservado;

    /**
     * @var float
     *
     * @ORM\Column(name="importe_total", type="float", nullable=false)
     */
    private $importeTotal;

    /**
     * @var float
     *
     * @ORM\Column(name="importe_otro", type="float", nullable=false)
     */
    private $importeOtro;

    /**
     * @ORM\OneToMany(targetEntity="InscPersona", mappedBy="hotel")
     */
    private $acompaniantes;

    /**
     * @ORM\OneToMany(targetEntity="InscFichaOlimpiada", mappedBy="hotel")
     */
    private $ficha;

    /**
     * @var boolean
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    public function __toString() {
        return "Hotel: " . (string)$this->getNombre() . " | Importe: $" . (string)$this->getimporteTotal();
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->acompaniantes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ficha = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return InscHotel
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
     * @return InscHotel
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
     * Set cupo
     *
     * @param integer $cupo
     * @return InscHotel
     */
    public function setCupo($cupo)
    {
        $this->cupo = $cupo;

        return $this;
    }

    /**
     * Get cupo
     *
     * @return integer 
     */
    public function getCupo()
    {
        return $this->cupo;
    }

    /**
     * Set reservado
     *
     * @param integer $reservado
     * @return InscHotel
     */
    public function setReservado($reservado)
    {
        $this->reservado = $reservado;

        return $this;
    }

    /**
     * Get reservado
     *
     * @return integer 
     */
    public function getReservado()
    {
        return $this->reservado;
    }

    /**
     * Set importeTotal
     *
     * @param float $importeTotal
     * @return InscHotel
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
     * Set importeOtro
     *
     * @param float $importeOtro
     * @return InscHotel
     */
    public function setImporteOtro($importeOtro)
    {
        $this->importeOtro = $importeOtro;

        return $this;
    }

    /**
     * Get importeOtro
     *
     * @return float 
     */
    public function getImporteOtro()
    {
        return $this->importeOtro;
    }

    /**
     * Add acompaniantes
     *
     * @param \Sistema\InscripcionBundle\Entity\InscPersona $acompaniantes
     * @return InscHotel
     */
    public function addAcompaniante(\Sistema\InscripcionBundle\Entity\InscPersona $acompaniantes)
    {
        $this->acompaniantes[] = $acompaniantes;

        return $this;
    }

    /**
     * Remove acompaniantes
     *
     * @param \Sistema\InscripcionBundle\Entity\InscPersona $acompaniantes
     */
    public function removeAcompaniante(\Sistema\InscripcionBundle\Entity\InscPersona $acompaniantes)
    {
        $this->acompaniantes->removeElement($acompaniantes);
    }

    /**
     * Get acompaniantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAcompaniantes()
    {
        return $this->acompaniantes;
    }

    /**
     * Add ficha
     *
     * @param \Sistema\InscripcionBundle\Entity\InscFichaOlimpiada $ficha
     * @return InscHotel
     */
    public function addFicha(\Sistema\InscripcionBundle\Entity\InscFichaOlimpiada $ficha)
    {
        $this->ficha[] = $ficha;

        return $this;
    }

    /**
     * Remove ficha
     *
     * @param \Sistema\InscripcionBundle\Entity\InscFichaOlimpiada $ficha
     */
    public function removeFicha(\Sistema\InscripcionBundle\Entity\InscFichaOlimpiada $ficha)
    {
        $this->ficha->removeElement($ficha);
    }

    /**
     * Get ficha
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFicha()
    {
        return $this->ficha;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return InscHotel
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
