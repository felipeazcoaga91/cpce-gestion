<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * InscDisciplina
 *
 * @ORM\Table(name="insc_disciplina")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscDisciplinaRepository")
 */
class InscDisciplina {
	
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
     * @var boolean
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @ORM\ManyToMany(targetEntity="InscFichaOlimpiada", mappedBy="disciplinas")
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
        $this->ficha = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return InscDisciplina
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
     * Set activo
     *
     * @param boolean $activo
     * @return InscDisciplina
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
     * Add ficha
     *
     * @param \Sistema\InscripcionBundle\Entity\InscFichaOlimpiada $ficha
     * @return InscDisciplina
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
