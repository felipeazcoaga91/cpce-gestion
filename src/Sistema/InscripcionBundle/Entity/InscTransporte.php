<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * InscTransporte
 *
 * @ORM\Table(name="insc_transporte")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscTransporteRepository")
 */
class InscTransporte {
    
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
     * @var boolean
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

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
     * @ORM\Column(name="precio", type="float", nullable=false)
     */
    private $precio;

    /**
     * @ORM\OneToMany(targetEntity="InscPersona", mappedBy="transporte")
     */
    private $acompaniantes;

    /**
     * @ORM\OneToMany(targetEntity="InscFichaOlimpiada", mappedBy="transporte")
     */
    private $ficha;

    public function __toString()
    {
        return "Transporte: " . (string)$this->getNombre() . " | Importe: $" . (string)$this->getPrecio();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * @return InscTransporte
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
     * @return InscTransporte
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
     * Set activo
     *
     * @param boolean $activo
     * @return InscTransporte
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

    /**
     * Set cupo
     *
     * @param integer $cupo
     * @return InscTransporte
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
     * @return InscTransporte
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
     * Set precio
     *
     * @param float $precio
     * @return InscTransporte
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Add acompaniantes
     *
     * @param \Sistema\InscripcionBundle\Entity\InscPersona $acompaniantes
     * @return InscTransporte
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
     * @return InscTransporte
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
}
