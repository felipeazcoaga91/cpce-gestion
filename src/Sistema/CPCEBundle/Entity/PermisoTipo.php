<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PermisoTipo
 *
 * @ORM\Table(name="permiso_tipo")
 * @ORM\Entity
 */
class PermisoTipo
{
    /**
     * @var string
     *
     * @ORM\Column(name="pet_nombre", type="string", length=255, nullable=false)
     */
    private $petNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="pet_tipo", type="string", length=8, nullable=false)
     */
    private $petTipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set petNombre
     *
     * @param string $petNombre
     * @return PermisoTipo
     */
    public function setPetNombre($petNombre)
    {
        $this->petNombre = $petNombre;

        return $this;
    }

    /**
     * Get petNombre
     *
     * @return string 
     */
    public function getPetNombre()
    {
        return $this->petNombre;
    }

    /**
     * Set petTipo
     *
     * @param string $petTipo
     * @return PermisoTipo
     */
    public function setPetTipo($petTipo)
    {
        $this->petTipo = $petTipo;

        return $this;
    }

    /**
     * Get petTipo
     *
     * @return string 
     */
    public function getPetTipo()
    {
        return $this->petTipo;
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
}
