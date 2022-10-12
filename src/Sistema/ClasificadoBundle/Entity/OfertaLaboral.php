<?php

namespace Sistema\ClasificadoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tecspro\Bundle\ComunBundle\Entity\TecsproGedmo;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * OfertaLaboral
 *
 * @ORM\Table(name="oferta_laboral")
 * @ORM\Entity(repositoryClass="Sistema\ClasificadoBundle\Entity\OfertaLaboralRepository")
 */
class OfertaLaboral extends TecsproGedmo 
{
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
     * @ORM\Column(name="titulo", type="string", length=255, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="solicitante", type="string", length=255, nullable=false)
     */
    private $solicitante;

    /**
     * @var string
     *
     * @ORM\Column(name="requiere", type="string", length=255, nullable=false)
     */
    private $requiere;

    /**
     * @var string
     *
     * @ORM\Column(name="puesto", type="string", length=255, nullable=false)
     */
    private $puesto;

    /**
     * @var string
     *
     * @ORM\Column(name="requisito", type="text", nullable=false)
     * @Assert\NotBlank()
     */
    private $requisito;

    /**
     * @var string
     *
     * @ORM\Column(name="tarea", type="text", nullable=false)
     * @Assert\NotBlank()
     */
    private $tarea;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFin", type="date", nullable=false)
     */
    private $fechaFin;

    /**
     * @var boolean
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var integer
     *
     * @ORM\Column(name="delegacion", type="integer", nullable=false)
     */
    private $delegacion;

    /**
     * @ORM\ManyToMany(targetEntity="Sistema\ClasificadoBundle\Entity\UserCurriculum", inversedBy="ofertaLaborals")
     * @ORM\JoinTable(name="ofertalaborals_cvpostulantes")
     */
    private $cvPostulantes;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255, nullable=false)
     */
    private $telefono;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cvPostulantes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return 'Oferta Nro. ' . $this->getId();
    }

    /**
     * Get OfertaLaboralString
     *
     * @return string 
     */
    public function getOfertaLaboralString()
    {
        if ($this->delegacion == 1) {
            $delegacion = 'Sede Central';
        } elseif ($this->delegacion == 2) {
            $delegacion = 'Saenz Peña';
        } elseif ($this->delegacion == 3) {
            $delegacion = 'Villa Angela';
        } elseif ($this->delegacion == 4) {
            $delegacion = 'Sudoeste';
        } else {
            $delegacion = false;
        }

        return $delegacion;
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
     * Set titulo
     *
     * @param string $titulo
     * @return OfertaLaboral
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set solicitante
     *
     * @param string $solicitante
     * @return OfertaLaboral
     */
    public function setSolicitante($solicitante)
    {
        $this->solicitante = $solicitante;

        return $this;
    }

    /**
     * Get solicitante
     *
     * @return string 
     */
    public function getSolicitante()
    {
        return $this->solicitante;
    }

    /**
     * Set requiere
     *
     * @param string $requiere
     * @return OfertaLaboral
     */
    public function setRequiere($requiere)
    {
        $this->requiere = $requiere;

        return $this;
    }

    /**
     * Get requiere
     *
     * @return string 
     */
    public function getRequiere()
    {
        return $this->requiere;
    }

    /**
     * Set puesto
     *
     * @param string $puesto
     * @return OfertaLaboral
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return string 
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * Set requisito
     *
     * @param string $requisito
     * @return OfertaLaboral
     */
    public function setRequisito($requisito)
    {
        $this->requisito = $requisito;

        return $this;
    }

    /**
     * Get requisito
     *
     * @return string 
     */
    public function getRequisito()
    {
        return $this->requisito;
    }

    /**
     * Set tarea
     *
     * @param string $tarea
     * @return OfertaLaboral
     */
    public function setTarea($tarea)
    {
        $this->tarea = $tarea;

        return $this;
    }

    /**
     * Get tarea
     *
     * @return string 
     */
    public function getTarea()
    {
        return $this->tarea;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return OfertaLaboral
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return OfertaLaboral
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
     * Set delegacion
     *
     * @param integer $delegacion
     * @return OfertaLaboral
     */
    public function setDelegacion($delegacion)
    {
        $this->delegacion = $delegacion;

        return $this;
    }

    /**
     * Get delegacion
     *
     * @return integer 
     */
    public function getDelegacion()
    {
        return $this->delegacion;
    }

    /**
     * Add cvPostulantes
     *
     * @param \Sistema\ClasificadoBundle\Entity\UserCurriculum $cvPostulantes
     * @return OfertaLaboral
     */
    public function addCvPostulante(\Sistema\ClasificadoBundle\Entity\UserCurriculum $cvPostulantes)
    {
        $this->cvPostulantes[] = $cvPostulantes;

        return $this;
    }

    /**
     * Remove cvPostulantes
     *
     * @param \Sistema\ClasificadoBundle\Entity\UserCurriculum $cvPostulantes
     */
    public function removeCvPostulante(\Sistema\ClasificadoBundle\Entity\UserCurriculum $cvPostulantes)
    {
        $this->cvPostulantes->removeElement($cvPostulantes);
    }

    /**
     * Get cvPostulantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCvPostulantes()
    {
        return $this->cvPostulantes;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return OfertaLaboral
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return OfertaLaboral
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
}
