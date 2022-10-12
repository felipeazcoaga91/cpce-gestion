<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrabajoEstado
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sistema\CPCEBundle\Entity\TrabajoEstadoRepository")
 */
class TrabajoEstado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100)
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;


    public function __toString()
    {
        if ($this->id == 1) {
            $estado = '<span class="label label-warning">'.$this->nombre.'</span>';
        } elseif ($this->id == 2) {
            $estado = '<span class="label label-warning">'.$this->nombre.'</span>';
        } elseif ($this->id == 3) {
            $estado = '<span class="label label-info">'.$this->nombre.'</span>';
        } elseif ($this->id == 5) {
            $estado = '<span class="label label-primary">'.$this->nombre.'</span>';
        } elseif ($this->id == 7) {
            $estado = '<span class="label label-default">'.$this->nombre.'</span><br><span class="label label-default">REINTEGRO</span>';
        } elseif ($this->id == 8) {
            $estado = '<span class="label label-success">'.$this->nombre.'</span><br><span class="label label-success">A DISPOSICIÓN</span><br><span class="label label-success">EN 48HS</span>';
        } elseif ($this->id == 15) {
            $estado = '<span class="label label-success">'.$this->nombre.'</span>';
        } elseif ($this->id == 20) {
            $estado = '<span class="label label-danger">'.$this->nombre.'</span>';
        } else {
            $estado = null;
        }

        return $estado;
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
     * @return TrabajoEstado
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
     * @return TrabajoEstado
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
     * @return TrabajoEstado
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
}
