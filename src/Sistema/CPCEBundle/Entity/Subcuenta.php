<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcuenta
 *
 * @ORM\Table(name="subcuenta")
 * @ORM\Entity
 */
class Subcuenta
{
    /**
     * @var string
     *
     * @ORM\Column(name="scu_titulo", type="string", length=2, nullable=false)
     */
    private $scuTitulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="scu_matricula", type="integer", nullable=false)
     */
    private $scuMatricula;

    /**
     * @var string
     *
     * @ORM\Column(name="scu_catant", type="string", length=6, nullable=false)
     */
    private $scuCatant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scu_vigencia", type="date", nullable=false)
     */
    private $scuVigencia;

    /**
     * @var string
     *
     * @ORM\Column(name="scu_nota1", type="string", length=50, nullable=false)
     */
    private $scuNota1;

    /**
     * @var string
     *
     * @ORM\Column(name="scu_nota2", type="string", length=50, nullable=false)
     */
    private $scuNota2;

    /**
     * @var string
     *
     * @ORM\Column(name="scu_note3", type="string", length=50, nullable=false)
     */
    private $scuNote3;

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
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $scuTipdoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="scu_nrodoc", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $scuNrodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="scu_categoria", type="string", length=6)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $scuCategoria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scu_fecha", type="datetime")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $scuFecha;



    /**
     * Set scuTitulo
     *
     * @param string $scuTitulo
     * @return Subcuenta
     */
    public function setScuTitulo($scuTitulo)
    {
        $this->scuTitulo = $scuTitulo;

        return $this;
    }

    /**
     * Get scuTitulo
     *
     * @return string 
     */
    public function getScuTitulo()
    {
        return $this->scuTitulo;
    }

    /**
     * Set scuMatricula
     *
     * @param integer $scuMatricula
     * @return Subcuenta
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
     * Set scuCatant
     *
     * @param string $scuCatant
     * @return Subcuenta
     */
    public function setScuCatant($scuCatant)
    {
        $this->scuCatant = $scuCatant;

        return $this;
    }

    /**
     * Get scuCatant
     *
     * @return string 
     */
    public function getScuCatant()
    {
        return $this->scuCatant;
    }

    /**
     * Set scuVigencia
     *
     * @param \DateTime $scuVigencia
     * @return Subcuenta
     */
    public function setScuVigencia($scuVigencia)
    {
        $this->scuVigencia = $scuVigencia;

        return $this;
    }

    /**
     * Get scuVigencia
     *
     * @return \DateTime 
     */
    public function getScuVigencia()
    {
        return $this->scuVigencia;
    }

    /**
     * Set scuNota1
     *
     * @param string $scuNota1
     * @return Subcuenta
     */
    public function setScuNota1($scuNota1)
    {
        $this->scuNota1 = $scuNota1;

        return $this;
    }

    /**
     * Get scuNota1
     *
     * @return string 
     */
    public function getScuNota1()
    {
        return $this->scuNota1;
    }

    /**
     * Set scuNota2
     *
     * @param string $scuNota2
     * @return Subcuenta
     */
    public function setScuNota2($scuNota2)
    {
        $this->scuNota2 = $scuNota2;

        return $this;
    }

    /**
     * Get scuNota2
     *
     * @return string 
     */
    public function getScuNota2()
    {
        return $this->scuNota2;
    }

    /**
     * Set scuNote3
     *
     * @param string $scuNote3
     * @return Subcuenta
     */
    public function setScuNote3($scuNote3)
    {
        $this->scuNote3 = $scuNote3;

        return $this;
    }

    /**
     * Get scuNote3
     *
     * @return string 
     */
    public function getScuNote3()
    {
        return $this->scuNote3;
    }

    /**
     * Set scuLote
     *
     * @param integer $scuLote
     * @return Subcuenta
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
     * Set scuTipdoc
     *
     * @param string $scuTipdoc
     * @return Subcuenta
     */
    public function setScuTipdoc($scuTipdoc)
    {
        $this->scuTipdoc = $scuTipdoc;

        return $this;
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

    /**
     * Set scuNrodoc
     *
     * @param integer $scuNrodoc
     * @return Subcuenta
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
     * Set scuCategoria
     *
     * @param string $scuCategoria
     * @return Subcuenta
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
     * Set scuFecha
     *
     * @param \DateTime $scuFecha
     * @return Subcuenta
     */
    public function setScuFecha($scuFecha)
    {
        $this->scuFecha = $scuFecha;

        return $this;
    }

    /**
     * Get scuFecha
     *
     * @return \DateTime 
     */
    public function getScuFecha()
    {
        return $this->scuFecha;
    }
}
