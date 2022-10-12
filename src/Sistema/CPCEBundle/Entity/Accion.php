<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accion
 *
 * @ORM\Table(name="accion", uniqueConstraints={@ORM\UniqueConstraint(name="acc_modulo_numero_UNIQUE", columns={"acc_modulo", "acc_numero"})}, indexes={@ORM\Index(name="acceso_modulo_idx", columns={"acc_modulo"})})
 * @ORM\Entity
 */
class Accion
{
    /**
     * @var string
     *
     * @ORM\Column(name="acc_nombre", type="string", length=255, nullable=false)
     */
    private $accNombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="acc_numero", type="smallint", nullable=false)
     */
    private $accNumero;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Sistema\CPCEBundle\Entity\Modulo
     *
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Modulo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acc_modulo", referencedColumnName="Id")
     * })
     */
    private $accModulo;



    /**
     * Set accNombre
     *
     * @param string $accNombre
     * @return Accion
     */
    public function setAccNombre($accNombre)
    {
        $this->accNombre = $accNombre;

        return $this;
    }

    /**
     * Get accNombre
     *
     * @return string 
     */
    public function getAccNombre()
    {
        return $this->accNombre;
    }

    /**
     * Set accNumero
     *
     * @param integer $accNumero
     * @return Accion
     */
    public function setAccNumero($accNumero)
    {
        $this->accNumero = $accNumero;

        return $this;
    }

    /**
     * Get accNumero
     *
     * @return integer 
     */
    public function getAccNumero()
    {
        return $this->accNumero;
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
     * Set accModulo
     *
     * @param \Sistema\CPCEBundle\Entity\Modulo $accModulo
     * @return Accion
     */
    public function setAccModulo(\Sistema\CPCEBundle\Entity\Modulo $accModulo = null)
    {
        $this->accModulo = $accModulo;

        return $this;
    }

    /**
     * Get accModulo
     *
     * @return \Sistema\CPCEBundle\Entity\Modulo 
     */
    public function getAccModulo()
    {
        return $this->accModulo;
    }
}
