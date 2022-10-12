<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modulo
 *
 * @ORM\Table(name="modulo", uniqueConstraints={@ORM\UniqueConstraint(name="mod_numero_UNIQUE", columns={"mod_numero"})})
 * @ORM\Entity
 */
class Modulo
{
    /**
     * @var string
     *
     * @ORM\Column(name="mod_nombre", type="string", length=255, nullable=false)
     */
    private $modNombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="mod_numero", type="smallint", nullable=false)
     */
    private $modNumero;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set modNombre
     *
     * @param string $modNombre
     * @return Modulo
     */
    public function setModNombre($modNombre)
    {
        $this->modNombre = $modNombre;

        return $this;
    }

    /**
     * Get modNombre
     *
     * @return string 
     */
    public function getModNombre()
    {
        return $this->modNombre;
    }

    /**
     * Set modNumero
     *
     * @param integer $modNumero
     * @return Modulo
     */
    public function setModNumero($modNumero)
    {
        $this->modNumero = $modNumero;

        return $this;
    }

    /**
     * Get modNumero
     *
     * @return integer 
     */
    public function getModNumero()
    {
        return $this->modNumero;
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
