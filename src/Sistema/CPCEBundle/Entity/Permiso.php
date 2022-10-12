<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permiso
 *
 * @ORM\Table(name="permiso", indexes={@ORM\Index(name="permiso_operador", columns={"per_operador"}), @ORM\Index(name="permiso_modulo", columns={"per_modulo"}), @ORM\Index(name="permiso_accion", columns={"per_accion"}), @ORM\Index(name="permiso_tipo", columns={"per_permisos"})})
 * @ORM\Entity
 */
class Permiso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Sistema\CPCEBundle\Entity\PermisoTipo
     *
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\PermisoTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="per_permisos", referencedColumnName="Id")
     * })
     */
    private $perPermisos;

    /**
     * @var \Sistema\CPCEBundle\Entity\Operador
     *
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Operador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="per_operador", referencedColumnName="ope_nroope")
     * })
     */
    private $perOperador;

    /**
     * @var \Sistema\CPCEBundle\Entity\Modulo
     *
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Modulo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="per_modulo", referencedColumnName="Id")
     * })
     */
    private $perModulo;

    /**
     * @var \Sistema\CPCEBundle\Entity\Accion
     *
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Accion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="per_accion", referencedColumnName="Id")
     * })
     */
    private $perAccion;



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
     * Set perPermisos
     *
     * @param \Sistema\CPCEBundle\Entity\PermisoTipo $perPermisos
     * @return Permiso
     */
    public function setPerPermisos(\Sistema\CPCEBundle\Entity\PermisoTipo $perPermisos = null)
    {
        $this->perPermisos = $perPermisos;

        return $this;
    }

    /**
     * Get perPermisos
     *
     * @return \Sistema\CPCEBundle\Entity\PermisoTipo 
     */
    public function getPerPermisos()
    {
        return $this->perPermisos;
    }

    /**
     * Set perOperador
     *
     * @param \Sistema\CPCEBundle\Entity\Operador $perOperador
     * @return Permiso
     */
    public function setPerOperador(\Sistema\CPCEBundle\Entity\Operador $perOperador = null)
    {
        $this->perOperador = $perOperador;

        return $this;
    }

    /**
     * Get perOperador
     *
     * @return \Sistema\CPCEBundle\Entity\Operador 
     */
    public function getPerOperador()
    {
        return $this->perOperador;
    }

    /**
     * Set perModulo
     *
     * @param \Sistema\CPCEBundle\Entity\Modulo $perModulo
     * @return Permiso
     */
    public function setPerModulo(\Sistema\CPCEBundle\Entity\Modulo $perModulo = null)
    {
        $this->perModulo = $perModulo;

        return $this;
    }

    /**
     * Get perModulo
     *
     * @return \Sistema\CPCEBundle\Entity\Modulo 
     */
    public function getPerModulo()
    {
        return $this->perModulo;
    }

    /**
     * Set perAccion
     *
     * @param \Sistema\CPCEBundle\Entity\Accion $perAccion
     * @return Permiso
     */
    public function setPerAccion(\Sistema\CPCEBundle\Entity\Accion $perAccion = null)
    {
        $this->perAccion = $perAccion;

        return $this;
    }

    /**
     * Get perAccion
     *
     * @return \Sistema\CPCEBundle\Entity\Accion 
     */
    public function getPerAccion()
    {
        return $this->perAccion;
    }
}
