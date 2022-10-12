<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titulos
 *
 * @ORM\Table(name="titulos")
 * @ORM\Entity
 */
class Titulos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tit_matricula", type="integer", nullable=false)
     */
    private $titMatricula;

    /**
     * @var string
     *
     * @ORM\Column(name="tit_descripcion", type="string", length=50, nullable=false)
     */
    private $titDescripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="tit_tipdoc", type="string", length=3, nullable=false)
     */
    private $titTipdoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="tit_lote", type="bigint", nullable=false)
     */
    private $titLote;

    /**
     * @var string
     *
     * @ORM\Column(name="tit_idtitulo", type="string", length=2)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $titIdtitulo;



    /**
     * Set titMatricula
     *
     * @param integer $titMatricula
     * @return Titulos
     */
    public function setTitMatricula($titMatricula)
    {
        $this->titMatricula = $titMatricula;

        return $this;
    }

    /**
     * Get titMatricula
     *
     * @return integer 
     */
    public function getTitMatricula()
    {
        return $this->titMatricula;
    }

    /**
     * Set titDescripcion
     *
     * @param string $titDescripcion
     * @return Titulos
     */
    public function setTitDescripcion($titDescripcion)
    {
        $this->titDescripcion = $titDescripcion;

        return $this;
    }

    /**
     * Get titDescripcion
     *
     * @return string 
     */
    public function getTitDescripcion()
    {
        return $this->titDescripcion;
    }

    /**
     * Set titTipdoc
     *
     * @param string $titTipdoc
     * @return Titulos
     */
    public function setTitTipdoc($titTipdoc)
    {
        $this->titTipdoc = $titTipdoc;

        return $this;
    }

    /**
     * Get titTipdoc
     *
     * @return string 
     */
    public function getTitTipdoc()
    {
        return $this->titTipdoc;
    }

    /**
     * Set titLote
     *
     * @param integer $titLote
     * @return Titulos
     */
    public function setTitLote($titLote)
    {
        $this->titLote = $titLote;

        return $this;
    }

    /**
     * Get titLote
     *
     * @return integer 
     */
    public function getTitLote()
    {
        return $this->titLote;
    }

    /**
     * Get titIdtitulo
     *
     * @return string 
     */
    public function getTitIdtitulo()
    {
        return $this->titIdtitulo;
    }
}
