<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Obleas
 *
 * @ORM\Table(name="obleas", indexes={@ORM\Index(name="skFecha", columns={"obl_fecha"})})
 * @ORM\Entity
 */
class Obleas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="obl_nrooblea", type="integer", nullable=false)
     */
    private $oblNrooblea;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="obl_fecha", type="datetime", nullable=false)
     */
    private $oblFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="obl_tipPro", type="string", length=3, nullable=false)
     */
    private $oblTippro;

    /**
     * @var integer
     *
     * @ORM\Column(name="obl_nropro", type="integer", nullable=false)
     */
    private $oblNropro;

    /**
     * @var string
     *
     * @ORM\Column(name="obl_tipimp", type="string", length=3, nullable=false)
     */
    private $oblTipimp;

    /**
     * @var integer
     *
     * @ORM\Column(name="obl_nroimp", type="integer", nullable=false)
     */
    private $oblNroimp;

    /**
     * @var string
     *
     * @ORM\Column(name="obl_tipcte", type="string", length=3, nullable=false)
     */
    private $oblTipcte;

    /**
     * @var integer
     *
     * @ORM\Column(name="obl_nrocte", type="integer", nullable=false)
     */
    private $oblNrocte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="obl_fectrab", type="date", nullable=false)
     */
    private $oblFectrab;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="obl_feccert", type="date", nullable=false)
     */
    private $oblFeccert;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="obl_fecotor", type="date", nullable=false)
     */
    private $oblFecotor;

    /**
     * @var integer
     *
     * @ORM\Column(name="obl_tarea", type="integer", nullable=false)
     */
    private $oblTarea;

    /**
     * @var integer
     *
     * @ORM\Column(name="obl_copias", type="integer", nullable=false)
     */
    private $oblCopias;

    /**
     * @var string
     *
     * @ORM\Column(name="obl_estado", type="string", length=1, nullable=false)
     */
    private $oblEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="obl_nroope", type="integer", nullable=false)
     */
    private $oblNroope;

    /**
     * @var integer
     *
     * @ORM\Column(name="obl_asiento", type="bigint", nullable=false)
     */
    private $oblAsiento;

    /**
     * @var float
     *
     * @ORM\Column(name="obl_lote", type="float", precision=14, scale=0, nullable=false)
     */
    private $oblLote;

    /**
     * @var boolean
     *
     * @ORM\Column(name="obl_ejemplaradicional", type="boolean", nullable=true)
     */
    private $oblEjemplaradicional;

    /**
     * @var integer
     *
     * @ORM\Column(name="obl_nrocli", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $oblNrocli;

    /**
     * @var integer
     *
     * @ORM\Column(name="obl_nrolegali", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $oblNrolegali;

    /**
     * @var integer
     *
     * @ORM\Column(name="obl_item", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $oblItem;



    /**
     * Set oblNrooblea
     *
     * @param integer $oblNrooblea
     * @return Obleas
     */
    public function setOblNrooblea($oblNrooblea)
    {
        $this->oblNrooblea = $oblNrooblea;

        return $this;
    }

    /**
     * Get oblNrooblea
     *
     * @return integer 
     */
    public function getOblNrooblea()
    {
        return $this->oblNrooblea;
    }

    /**
     * Set oblFecha
     *
     * @param \DateTime $oblFecha
     * @return Obleas
     */
    public function setOblFecha($oblFecha)
    {
        $this->oblFecha = $oblFecha;

        return $this;
    }

    /**
     * Get oblFecha
     *
     * @return \DateTime 
     */
    public function getOblFecha()
    {
        return $this->oblFecha;
    }

    /**
     * Set oblTippro
     *
     * @param string $oblTippro
     * @return Obleas
     */
    public function setOblTippro($oblTippro)
    {
        $this->oblTippro = $oblTippro;

        return $this;
    }

    /**
     * Get oblTippro
     *
     * @return string 
     */
    public function getOblTippro()
    {
        return $this->oblTippro;
    }

    /**
     * Set oblNropro
     *
     * @param integer $oblNropro
     * @return Obleas
     */
    public function setOblNropro($oblNropro)
    {
        $this->oblNropro = $oblNropro;

        return $this;
    }

    /**
     * Get oblNropro
     *
     * @return integer 
     */
    public function getOblNropro()
    {
        return $this->oblNropro;
    }

    /**
     * Set oblTipimp
     *
     * @param string $oblTipimp
     * @return Obleas
     */
    public function setOblTipimp($oblTipimp)
    {
        $this->oblTipimp = $oblTipimp;

        return $this;
    }

    /**
     * Get oblTipimp
     *
     * @return string 
     */
    public function getOblTipimp()
    {
        return $this->oblTipimp;
    }

    /**
     * Set oblNroimp
     *
     * @param integer $oblNroimp
     * @return Obleas
     */
    public function setOblNroimp($oblNroimp)
    {
        $this->oblNroimp = $oblNroimp;

        return $this;
    }

    /**
     * Get oblNroimp
     *
     * @return integer 
     */
    public function getOblNroimp()
    {
        return $this->oblNroimp;
    }

    /**
     * Set oblTipcte
     *
     * @param string $oblTipcte
     * @return Obleas
     */
    public function setOblTipcte($oblTipcte)
    {
        $this->oblTipcte = $oblTipcte;

        return $this;
    }

    /**
     * Get oblTipcte
     *
     * @return string 
     */
    public function getOblTipcte()
    {
        return $this->oblTipcte;
    }

    /**
     * Set oblNrocte
     *
     * @param integer $oblNrocte
     * @return Obleas
     */
    public function setOblNrocte($oblNrocte)
    {
        $this->oblNrocte = $oblNrocte;

        return $this;
    }

    /**
     * Get oblNrocte
     *
     * @return integer 
     */
    public function getOblNrocte()
    {
        return $this->oblNrocte;
    }

    /**
     * Set oblFectrab
     *
     * @param \DateTime $oblFectrab
     * @return Obleas
     */
    public function setOblFectrab($oblFectrab)
    {
        $this->oblFectrab = $oblFectrab;

        return $this;
    }

    /**
     * Get oblFectrab
     *
     * @return \DateTime 
     */
    public function getOblFectrab()
    {
        return $this->oblFectrab;
    }

    /**
     * Set oblFeccert
     *
     * @param \DateTime $oblFeccert
     * @return Obleas
     */
    public function setOblFeccert($oblFeccert)
    {
        $this->oblFeccert = $oblFeccert;

        return $this;
    }

    /**
     * Get oblFeccert
     *
     * @return \DateTime 
     */
    public function getOblFeccert()
    {
        return $this->oblFeccert;
    }

    /**
     * Set oblFecotor
     *
     * @param \DateTime $oblFecotor
     * @return Obleas
     */
    public function setOblFecotor($oblFecotor)
    {
        $this->oblFecotor = $oblFecotor;

        return $this;
    }

    /**
     * Get oblFecotor
     *
     * @return \DateTime 
     */
    public function getOblFecotor()
    {
        return $this->oblFecotor;
    }

    /**
     * Set oblTarea
     *
     * @param integer $oblTarea
     * @return Obleas
     */
    public function setOblTarea($oblTarea)
    {
        $this->oblTarea = $oblTarea;

        return $this;
    }

    /**
     * Get oblTarea
     *
     * @return integer 
     */
    public function getOblTarea()
    {
        return $this->oblTarea;
    }

    /**
     * Set oblCopias
     *
     * @param integer $oblCopias
     * @return Obleas
     */
    public function setOblCopias($oblCopias)
    {
        $this->oblCopias = $oblCopias;

        return $this;
    }

    /**
     * Get oblCopias
     *
     * @return integer 
     */
    public function getOblCopias()
    {
        return $this->oblCopias;
    }

    /**
     * Set oblEstado
     *
     * @param string $oblEstado
     * @return Obleas
     */
    public function setOblEstado($oblEstado)
    {
        $this->oblEstado = $oblEstado;

        return $this;
    }

    /**
     * Get oblEstado
     *
     * @return string 
     */
    public function getOblEstado()
    {
        return $this->oblEstado;
    }

    /**
     * Set oblNroope
     *
     * @param integer $oblNroope
     * @return Obleas
     */
    public function setOblNroope($oblNroope)
    {
        $this->oblNroope = $oblNroope;

        return $this;
    }

    /**
     * Get oblNroope
     *
     * @return integer 
     */
    public function getOblNroope()
    {
        return $this->oblNroope;
    }

    /**
     * Set oblAsiento
     *
     * @param integer $oblAsiento
     * @return Obleas
     */
    public function setOblAsiento($oblAsiento)
    {
        $this->oblAsiento = $oblAsiento;

        return $this;
    }

    /**
     * Get oblAsiento
     *
     * @return integer 
     */
    public function getOblAsiento()
    {
        return $this->oblAsiento;
    }

    /**
     * Set oblLote
     *
     * @param float $oblLote
     * @return Obleas
     */
    public function setOblLote($oblLote)
    {
        $this->oblLote = $oblLote;

        return $this;
    }

    /**
     * Get oblLote
     *
     * @return float 
     */
    public function getOblLote()
    {
        return $this->oblLote;
    }

    /**
     * Set oblEjemplaradicional
     *
     * @param boolean $oblEjemplaradicional
     * @return Obleas
     */
    public function setOblEjemplaradicional($oblEjemplaradicional)
    {
        $this->oblEjemplaradicional = $oblEjemplaradicional;

        return $this;
    }

    /**
     * Get oblEjemplaradicional
     *
     * @return boolean 
     */
    public function getOblEjemplaradicional()
    {
        return $this->oblEjemplaradicional;
    }

    /**
     * Set oblNrocli
     *
     * @param integer $oblNrocli
     * @return Obleas
     */
    public function setOblNrocli($oblNrocli)
    {
        $this->oblNrocli = $oblNrocli;

        return $this;
    }

    /**
     * Get oblNrocli
     *
     * @return integer 
     */
    public function getOblNrocli()
    {
        return $this->oblNrocli;
    }

    /**
     * Set oblNrolegali
     *
     * @param integer $oblNrolegali
     * @return Obleas
     */
    public function setOblNrolegali($oblNrolegali)
    {
        $this->oblNrolegali = $oblNrolegali;

        return $this;
    }

    /**
     * Get oblNrolegali
     *
     * @return integer 
     */
    public function getOblNrolegali()
    {
        return $this->oblNrolegali;
    }

    /**
     * Set oblItem
     *
     * @param integer $oblItem
     * @return Obleas
     */
    public function setOblItem($oblItem)
    {
        $this->oblItem = $oblItem;

        return $this;
    }

    /**
     * Get oblItem
     *
     * @return integer 
     */
    public function getOblItem()
    {
        return $this->oblItem;
    }
}
