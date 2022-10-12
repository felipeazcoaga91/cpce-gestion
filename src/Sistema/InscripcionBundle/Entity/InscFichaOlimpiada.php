<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * InscFichaOlimpiada
 *
 * @ORM\Table(name="insc_ficha_olimpiada")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscFichaOlimpiadaRepository")
 */
class InscFichaOlimpiada {
    
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
     * @ORM\ManyToOne(targetEntity="InscHotel", inversedBy="ficha")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id", nullable=true)
     */
    private $hotel;

    /**
     * @ORM\ManyToOne(targetEntity="InscTransporte", inversedBy="ficha")
     * @ORM\JoinColumn(name="transporte_id", referencedColumnName="id", nullable=true)
     */
    private $transporte;

    /**
     * @ORM\ManyToMany(targetEntity="InscPersona", inversedBy="ficha", cascade={"persist"})
     * @ORM\JoinTable(name="insc_ficha_persona")
     */
    private $personas;

    /**
     * @ORM\ManyToMany(targetEntity="InscDisciplina", inversedBy="ficha")
     * @ORM\JoinTable(name="insc_ficha_disciplina")
     */
    private $disciplinas;

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
        $this->personas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->disciplinas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return InscFichaOlimpiada
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
     * @return InscFichaOlimpiada
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
     * @return InscFichaOlimpiada
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
     * @return InscFichaOlimpiada
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
     * Set hotel
     *
     * @param \Sistema\InscripcionBundle\Entity\InscHotel $hotel
     * @return InscFichaOlimpiada
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
     * @return InscFichaOlimpiada
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
     * Set importeTotal
     *
     * @param float $importeTotal
     * @return InscFichaOlimpiada
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
     * @return InscFichaOlimpiada
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
     * Add personas
     *
     * @param \Sistema\InscripcionBundle\Entity\InscPersona $personas
     * @return InscFichaOlimpiada
     */
    public function addPersona(\Sistema\InscripcionBundle\Entity\InscPersona $personas)
    {
        $this->personas[] = $personas;

        return $this;
    }

    /**
     * Remove personas
     *
     * @param \Sistema\InscripcionBundle\Entity\InscPersona $personas
     */
    public function removePersona(\Sistema\InscripcionBundle\Entity\InscPersona $personas)
    {
        $this->personas->removeElement($personas);
    }

    /**
     * Get personas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    /**
     * Add disciplinas
     *
     * @param \Sistema\InscripcionBundle\Entity\InscDisciplina $disciplinas
     * @return InscFichaOlimpiada
     */
    public function addDisciplina(\Sistema\InscripcionBundle\Entity\InscDisciplina $disciplinas)
    {
        $this->disciplinas[] = $disciplinas;

        return $this;
    }

    /**
     * Remove disciplinas
     *
     * @param \Sistema\InscripcionBundle\Entity\InscDisciplina $disciplinas
     */
    public function removeDisciplina(\Sistema\InscripcionBundle\Entity\InscDisciplina $disciplinas)
    {
        $this->disciplinas->removeElement($disciplinas);
    }

    /**
     * Get disciplinas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDisciplinas()
    {
        return $this->disciplinas;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return InscFichaOlimpiada
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
