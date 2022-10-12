<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcuenta1
 *
 * @ORM\Table(name="subcuenta1")
 * @ORM\Entity
 */
class Subcuenta1
{
    /**
     * @var integer
     *
     * @ORM\Column(name="scu_nrodoc", type="integer", nullable=false)
     */
    private $scuNrodoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="scu_matricula", type="integer", nullable=false)
     */
    private $scuMatricula;

    /**
     * @var string
     *
     * @ORM\Column(name="scu_categoria", type="string", length=6, nullable=false)
     */
    private $scuCategoria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scu_fecini", type="date", nullable=false)
     */
    private $scuFecini;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scu_fecfin", type="date", nullable=false)
     */
    private $scuFecfin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scu_fecalt", type="datetime", nullable=false)
     */
    private $scuFecalt;

    /**
     * @var integer
     *
     * @ORM\Column(name="scu_nroope", type="integer", nullable=false)
     */
    private $scuNroope;

    /**
     * @var integer
     *
     * @ORM\Column(name="scu_lote", type="bigint", nullable=false)
     */
    private $scuLote;

    /**
     * @var string
     *
     * @ORM\Column(name="scu_tipdoc", type="string", length=3)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $scuTipdoc;



    /**
     * Set scuNrodoc
     *
     * @param integer $scuNrodoc
     * @return Subcuenta1
     */
    public function setScuNrodoc($scuNrodoc)
    {
        $this->scuNrodoc = $scuNrodoc;

        return $this;
    }

    /**
     * Get scuNrodoc
     *
     * @return integer 
     */
    public function getScuNrodoc()
    {
        return $this->scuNrodoc;
    }

    /**
     * Set scuMatricula
     *
     * @param integer $scuMatricula
     * @return Subcuenta1
     */
    public function setScuMatricula($scuMatricula)
    {
        $this->scuMatricula = $scuMatricula;

        return $this;
    }

    /**
     * Get scuMatricula
     *
     * @return integer 
     */
    public function getScuMatricula()
    {
        return $this->scuMatricula;
    }

    /**
     * Set scuCategoria
     *
     * @param string $scuCategoria
     * @return Subcuenta1
     */
    public function setScuCategoria($scuCategoria)
    {
        $this->scuCategoria = $scuCategoria;

        return $this;
    }

    /**
     * Get scuCategoria
     *
     * @return string 
     */
    public function getScuCategoria()
    {
        return $this->scuCategoria;
    }

    /**
     * Set scuFecini
     *
     * @param \DateTime $scuFecini
     * @return Subcuenta1
     */
    public function setScuFecini($scuFecini)
    {
        $this->scuFecini = $scuFecini;

        return $this;
    }

    /**
     * Get scuFecini
     *
     * @return \DateTime 
     */
    public function getScuFecini()
    {
        return $this->scuFecini;
    }

    /**
     * Set scuFecfin
     *
     * @param \DateTime $scuFecfin
     * @return Subcuenta1
     */
    public function setScuFecfin($scuFecfin)
    {
        $this->scuFecfin = $scuFecfin;

        return $this;
    }

    /**
     * Get scuFecfin
     *
     * @return \DateTime 
     */
    public function getScuFecfin()
    {
        return $this->scuFecfin;
    }

    /**
     * Set scuFecalt
     *
     * @param \DateTime $scuFecalt
     * @return Subcuenta1
     */
    public function setScuFecalt($scuFecalt)
    {
        $this->scuFecalt = $scuFecalt;

        return $this;
    }

    /**
     * Get scuFecalt
     *
     * @return \DateTime 
     */
    public function getScuFecalt()
    {
        return $this->scuFecalt;
    }

    /**
     * Set scuNroope
     *
     * @param integer $scuNroope
     * @return Subcuenta1
     */
    public function setScuNroope($scuNroope)
    {
        $this->scuNroope = $scuNroope;

        return $this;
    }

    /**
     * Get scuNroope
     *
     * @return integer 
     */
    public function getScuNroope()
    {
        return $this->scuNroope;
    }

    /**
     * Set scuLote
     *
     * @param integer $scuLote
     * @return Subcuenta1
     */
    public function setScuLote($scuLote)
    {
        $this->scuLote = $scuLote;

        return $this;
    }

    /**
     * Get scuLote
     *
     * @return integer 
     */
    public function getScuLote()
    {
        return $this->scuLote;
    }

    /**
     * Get scuTipdoc
     *
     * @return string 
     */
    public function getScuTipdoc()
    {
        return $this->scuTipdoc;
    }
}
