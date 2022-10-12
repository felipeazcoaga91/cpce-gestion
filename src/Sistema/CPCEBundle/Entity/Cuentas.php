<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cuentas
 *
 * @ORM\Table(name="cuentas", indexes={@ORM\Index(name="skmatricula", columns={"cue_titulo", "cue_matricula"})})
 * @ORM\Entity
 */
class Cuentas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cue_matricula", type="integer", nullable=false)
     */
    private $cueMatricula;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cue_fecalt", type="date", nullable=false)
     */
    private $cueFecalt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cue_fecgraduacion", type="date", nullable=false)
     */
    private $cueFecgraduacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cue_fecdiploma", type="date", nullable=false)
     */
    private $cueFecdiploma;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cue_fecmatricula", type="date", nullable=false)
     */
    private $cueFecmatricula;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cue_fecficha", type="date", nullable=false)
     */
    private $cueFecficha;

    /**
     * @var string
     *
     * @ORM\Column(name="cue_categoria", type="string", length=6, nullable=false)
     */
    private $cueCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="cue_activa", type="string", length=1, nullable=false)
     */
    private $cueActiva;

    /**
     * @var integer
     *
     * @ORM\Column(name="cue_lote", type="bigint", nullable=false)
     */
    private $cueLote;

    /**
     * @var string
     *
     * @ORM\Column(name="cue_tipdoc", type="string", length=3)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cueTipdoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="cue_nrodoc", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cueNrodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="cue_titulo", type="string", length=2)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cueTitulo;



    /**
     * Set cueMatricula
     *
     * @param integer $cueMatricula
     * @return Cuentas
     */
    public function setCueMatricula($cueMatricula)
    {
        $this->cueMatricula = $cueMatricula;

        return $this;
    }

    /**
     * Get cueMatricula
     *
     * @return integer 
     */
    public function getCueMatricula()
    {
        return $this->cueMatricula;
    }

    /**
     * Set cueFecalt
     *
     * @param \DateTime $cueFecalt
     * @return Cuentas
     */
    public function setCueFecalt($cueFecalt)
    {
        $this->cueFecalt = $cueFecalt;

        return $this;
    }

    /**
     * Get cueFecalt
     *
     * @return \DateTime 
     */
    public function getCueFecalt()
    {
        return $this->cueFecalt;
    }

    /**
     * Set cueFecgraduacion
     *
     * @param \DateTime $cueFecgraduacion
     * @return Cuentas
     */
    public function setCueFecgraduacion($cueFecgraduacion)
    {
        $this->cueFecgraduacion = $cueFecgraduacion;

        return $this;
    }

    /**
     * Get cueFecgraduacion
     *
     * @return \DateTime 
     */
    public function getCueFecgraduacion()
    {
        return $this->cueFecgraduacion;
    }

    /**
     * Set cueFecdiploma
     *
     * @param \DateTime $cueFecdiploma
     * @return Cuentas
     */
    public function setCueFecdiploma($cueFecdiploma)
    {
        $this->cueFecdiploma = $cueFecdiploma;

        return $this;
    }

    /**
     * Get cueFecdiploma
     *
     * @return \DateTime 
     */
    public function getCueFecdiploma()
    {
        return $this->cueFecdiploma;
    }

    /**
     * Set cueFecmatricula
     *
     * @param \DateTime $cueFecmatricula
     * @return Cuentas
     */
    public function setCueFecmatricula($cueFecmatricula)
    {
        $this->cueFecmatricula = $cueFecmatricula;

        return $this;
    }

    /**
     * Get cueFecmatricula
     *
     * @return \DateTime 
     */
    public function getCueFecmatricula()
    {
        return $this->cueFecmatricula;
    }

    /**
     * Set cueFecficha
     *
     * @param \DateTime $cueFecficha
     * @return Cuentas
     */
    public function setCueFecficha($cueFecficha)
    {
        $this->cueFecficha = $cueFecficha;

        return $this;
    }

    /**
     * Get cueFecficha
     *
     * @return \DateTime 
     */
    public function getCueFecficha()
    {
        return $this->cueFecficha;
    }

    /**
     * Set cueCategoria
     *
     * @param string $cueCategoria
     * @return Cuentas
     */
    public function setCueCategoria($cueCategoria)
    {
        $this->cueCategoria = $cueCategoria;

        return $this;
    }

    /**
     * Get cueCategoria
     *
     * @return string 
     */
    public function getCueCategoria()
    {
        return $this->cueCategoria;
    }

    /**
     * Set cueActiva
     *
     * @param string $cueActiva
     * @return Cuentas
     */
    public function setCueActiva($cueActiva)
    {
        $this->cueActiva = $cueActiva;

        return $this;
    }

    /**
     * Get cueActiva
     *
     * @return string 
     */
    public function getCueActiva()
    {
        return $this->cueActiva;
    }

    /**
     * Set cueLote
     *
     * @param integer $cueLote
     * @return Cuentas
     */
    public function setCueLote($cueLote)
    {
        $this->cueLote = $cueLote;

        return $this;
    }

    /**
     * Get cueLote
     *
     * @return integer 
     */
    public function getCueLote()
    {
        return $this->cueLote;
    }

    /**
     * Set cueTipdoc
     *
     * @param string $cueTipdoc
     * @return Cuentas
     */
    public function setCueTipdoc($cueTipdoc)
    {
        $this->cueTipdoc = $cueTipdoc;

        return $this;
    }

    /**
     * Get cueTipdoc
     *
     * @return string 
     */
    public function getCueTipdoc()
    {
        return $this->cueTipdoc;
    }

    /**
     * Set cueNrodoc
     *
     * @param integer $cueNrodoc
     * @return Cuentas
     */
    public function setCueNrodoc($cueNrodoc)
    {
        $this->cueNrodoc = $cueNrodoc;

        return $this;
    }

    /**
     * Get cueNrodoc
     *
     * @return integer 
     */
    public function getCueNrodoc()
    {
        return $this->cueNrodoc;
    }

    /**
     * Set cueTitulo
     *
     * @param string $cueTitulo
     * @return Cuentas
     */
    public function setCueTitulo($cueTitulo)
    {
        $this->cueTitulo = $cueTitulo;

        return $this;
    }

    /**
     * Get cueTitulo
     *
     * @return string 
     */
    public function getCueTitulo()
    {
        return $this->cueTitulo;
    }
}
