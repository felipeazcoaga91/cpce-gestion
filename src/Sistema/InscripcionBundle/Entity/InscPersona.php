<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * InscPersona
 *
 * @ORM\Table(name="insc_persona")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscPersonaRepository")
 */
class InscPersona {

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
     * @ORM\Column(name="apellido", type="string", length=255, nullable=false)
     */
    private $apellido;

    /**
     * @var integer
     *
     * @ORM\Column(name="dni", type="integer", nullable=false)
     */
    private $dni;

    /**
     * @var \Date
     *
     * @ORM\Column(name="fechaNac", type="date", nullable=false)
     */
    private $fechaNac;

    /**
     * @var integer
     *
     * @ORM\Column(name="edad", type="integer", nullable=false)
     */
    private $edad;

    /**
     * @var string
     *
     * @ORM\Column(name="nacionalidad", type="string", length=255, nullable=false)
     */
    private $nacionalidad;

    /**
     * @ORM\ManyToOne(targetEntity="InscHotel", inversedBy="acompaniantes")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     */
    private $hotel;

    /**
     * @ORM\ManyToOne(targetEntity="InscTransporte", inversedBy="acompaniantes")
     * @ORM\JoinColumn(name="transporte_id", referencedColumnName="id")
     */
    private $transporte;

    /**
     * @ORM\ManyToMany(targetEntity="InscFichaOlimpiada", mappedBy="personas", cascade={"persist"})
     */
    private $ficha;

    public function __toString()
    {
        return (string)$this->getNombre();
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fichas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return InscPersona
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
     * Set apellido
     *
     * @param string $apellido
     * @return InscPersona
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set dni
     *
     * @param integer $dni
     * @return InscPersona
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return integer 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set fechaNac
     *
     * @param \DateTime $fechaNac
     * @return InscPersona
     */
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    /**
     * Get fechaNac
     *
     * @return \DateTime 
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     * @return InscPersona
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set nacionalidad
     *
     * @param string $nacionalidad
     * @return InscPersona
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    /**
     * Get nacionalidad
     *
     * @return string 
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Set hotel
     *
     * @param \Sistema\InscripcionBundle\Entity\InscHotel $hotel
     * @return InscPersona
     */
    public function setHotel(\Sistema\InscripcionBundle\Entity\InscHotel $hotel = null)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \Sistema\InscripcionBundle\Entity\InscHotel 
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * Set transporte
     *
     * @param \Sistema\InscripcionBundle\Entity\InscTransporte $transporte
     * @return InscPersona
     */
    public function setTransporte(\Sistema\InscripcionBundle\Entity\InscTransporte $transporte = null)
    {
        $this->transporte = $transporte;

        return $this;
    }

    /**
     * Get transporte
     *
     * @return \Sistema\InscripcionBundle\Entity\InscTransporte 
     */
    public function getTransporte()
    {
        return $this->transporte;
    }

    /**
     * Add ficha
     *
     * @param \Sistema\InscripcionBundle\Entity\InscFichaOlimpiada $ficha
     * @return InscPersona
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
