<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operador
 *
 * @ORM\Table(name="operador")
 * @ORM\Entity
 */
class Operador
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ope_nrocli", type="integer", nullable=false)
     */
    private $opeNrocli;

    /**
     * @var string
     *
     * @ORM\Column(name="ope_tipdoc", type="string", length=3, nullable=false)
     */
    private $opeTipdoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="ope_nrodoc", type="integer", nullable=false)
     */
    private $opeNrodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="ope_client", type="string", length=40, nullable=false)
     */
    private $opeClient;

    /**
     * @var string
     *
     * @ORM\Column(name="ope_nombre", type="string", length=10, nullable=false)
     */
    private $opeNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ope_clave", type="string", length=250, nullable=false)
     */
    private $opeClave;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ope_alta", type="date", nullable=true)
     */
    private $opeAlta;

    /**
     * @var integer
     *
     * @ORM\Column(name="ope_lote", type="integer", nullable=false)
     */
    private $opeLote;

    /**
     * @var string
     *
     * @ORM\Column(name="ope_nivel", type="string", length=1, nullable=false)
     */
    private $opeNivel;

    /**
     * @var string
     *
     * @ORM\Column(name="ope_comis1", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $opeComis1;

    /**
     * @var string
     *
     * @ORM\Column(name="ope_comis2", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $opeComis2;

    /**
     * @var string
     *
     * @ORM\Column(name="ope_encven", type="string", length=1, nullable=false)
     */
    private $opeEncven;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ope_fecha", type="date", nullable=true)
     */
    private $opeFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="ope_accmod", type="string", length=90, nullable=false)
     */
    private $opeAccmod;

    /**
     * @var integer
     *
     * @ORM\Column(name="ope_nroope", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $opeNroope;



    /**
     * Set opeNrocli
     *
     * @param integer $opeNrocli
     * @return Operador
     */
    public function setOpeNrocli($opeNrocli)
    {
        $this->opeNrocli = $opeNrocli;

        return $this;
    }

    /**
     * Get opeNrocli
     *
     * @return integer 
     */
    public function getOpeNrocli()
    {
        return $this->opeNrocli;
    }

    /**
     * Set opeTipdoc
     *
     * @param string $opeTipdoc
     * @return Operador
     */
    public function setOpeTipdoc($opeTipdoc)
    {
        $this->opeTipdoc = $opeTipdoc;

        return $this;
    }

    /**
     * Get opeTipdoc
     *
     * @return string 
     */
    public function getOpeTipdoc()
    {
        return $this->opeTipdoc;
    }

    /**
     * Set opeNrodoc
     *
     * @param integer $opeNrodoc
     * @return Operador
     */
    public function setOpeNrodoc($opeNrodoc)
    {
        $this->opeNrodoc = $opeNrodoc;

        return $this;
    }

    /**
     * Get opeNrodoc
     *
     * @return integer 
     */
    public function getOpeNrodoc()
    {
        return $this->opeNrodoc;
    }

    /**
     * Set opeClient
     *
     * @param string $opeClient
     * @return Operador
     */
    public function setOpeClient($opeClient)
    {
        $this->opeClient = $opeClient;

        return $this;
    }

    /**
     * Get opeClient
     *
     * @return string 
     */
    public function getOpeClient()
    {
        return $this->opeClient;
    }

    /**
     * Set opeNombre
     *
     * @param string $opeNombre
     * @return Operador
     */
    public function setOpeNombre($opeNombre)
    {
        $this->opeNombre = $opeNombre;

        return $this;
    }

    /**
     * Get opeNombre
     *
     * @return string 
     */
    public function getOpeNombre()
    {
        return $this->opeNombre;
    }

    /**
     * Set opeClave
     *
     * @param string $opeClave
     * @return Operador
     */
    public function setOpeClave($opeClave)
    {
        $this->opeClave = $opeClave;

        return $this;
    }

    /**
     * Get opeClave
     *
     * @return string 
     */
    public function getOpeClave()
    {
        return $this->opeClave;
    }

    /**
     * Set opeAlta
     *
     * @param \DateTime $opeAlta
     * @return Operador
     */
    public function setOpeAlta($opeAlta)
    {
        $this->opeAlta = $opeAlta;

        return $this;
    }

    /**
     * Get opeAlta
     *
     * @return \DateTime 
     */
    public function getOpeAlta()
    {
        return $this->opeAlta;
    }

    /**
     * Set opeLote
     *
     * @param integer $opeLote
     * @return Operador
     */
    public function setOpeLote($opeLote)
    {
        $this->opeLote = $opeLote;

        return $this;
    }

    /**
     * Get opeLote
     *
     * @return integer 
     */
    public function getOpeLote()
    {
        return $this->opeLote;
    }

    /**
     * Set opeNivel
     *
     * @param string $opeNivel
     * @return Operador
     */
    public function setOpeNivel($opeNivel)
    {
        $this->opeNivel = $opeNivel;

        return $this;
    }

    /**
     * Get opeNivel
     *
     * @return string 
     */
    public function getOpeNivel()
    {
        return $this->opeNivel;
    }

    /**
     * Set opeComis1
     *
     * @param string $opeComis1
     * @return Operador
     */
    public function setOpeComis1($opeComis1)
    {
        $this->opeComis1 = $opeComis1;

        return $this;
    }

    /**
     * Get opeComis1
     *
     * @return string 
     */
    public function getOpeComis1()
    {
        return $this->opeComis1;
    }

    /**
     * Set opeComis2
     *
     * @param string $opeComis2
     * @return Operador
     */
    public function setOpeComis2($opeComis2)
    {
        $this->opeComis2 = $opeComis2;

        return $this;
    }

    /**
     * Get opeComis2
     *
     * @return string 
     */
    public function getOpeComis2()
    {
        return $this->opeComis2;
    }

    /**
     * Set opeEncven
     *
     * @param string $opeEncven
     * @return Operador
     */
    public function setOpeEncven($opeEncven)
    {
        $this->opeEncven = $opeEncven;

        return $this;
    }

    /**
     * Get opeEncven
     *
     * @return string 
     */
    public function getOpeEncven()
    {
        return $this->opeEncven;
    }

    /**
     * Set opeFecha
     *
     * @param \DateTime $opeFecha
     * @return Operador
     */
    public function setOpeFecha($opeFecha)
    {
        $this->opeFecha = $opeFecha;

        return $this;
    }

    /**
     * Get opeFecha
     *
     * @return \DateTime 
     */
    public function getOpeFecha()
    {
        return $this->opeFecha;
    }

    /**
     * Set opeAccmod
     *
     * @param string $opeAccmod
     * @return Operador
     */
    public function setOpeAccmod($opeAccmod)
    {
        $this->opeAccmod = $opeAccmod;

        return $this;
    }

    /**
     * Get opeAccmod
     *
     * @return string 
     */
    public function getOpeAccmod()
    {
        return $this->opeAccmod;
    }

    /**
     * Get opeNroope
     *
     * @return integer 
     */
    public function getOpeNroope()
    {
        return $this->opeNroope;
    }
}
