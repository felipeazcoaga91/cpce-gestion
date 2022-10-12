<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listados
 *
 * @ORM\Table(name="listados")
 * @ORM\Entity
 */
class Listados
{
    /**
     * @var string
     *
     * @ORM\Column(name="lis_titulo", type="string", length=500, nullable=false)
     */
    private $lisTitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="lis_condicion", type="string", length=800, nullable=false)
     */
    private $lisCondicion;

    /**
     * @var string
     *
     * @ORM\Column(name="lis_cuentas", type="string", length=255, nullable=false)
     */
    private $lisCuentas;

    /**
     * @var string
     *
     * @ORM\Column(name="lis_campos", type="string", length=1000, nullable=false)
     */
    private $lisCampos;

    /**
     * @var string
     *
     * @ORM\Column(name="lis_relaciones", type="string", length=1000, nullable=true)
     */
    private $lisRelaciones;

    /**
     * @var integer
     *
     * @ORM\Column(name="lis_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lisCodigo;



    /**
     * Set lisTitulo
     *
     * @param string $lisTitulo
     * @return Listados
     */
    public function setLisTitulo($lisTitulo)
    {
        $this->lisTitulo = $lisTitulo;

        return $this;
    }

    /**
     * Get lisTitulo
     *
     * @return string 
     */
    public function getLisTitulo()
    {
        return $this->lisTitulo;
    }

    /**
     * Set lisCondicion
     *
     * @param string $lisCondicion
     * @return Listados
     */
    public function setLisCondicion($lisCondicion)
    {
        $this->lisCondicion = $lisCondicion;

        return $this;
    }

    /**
     * Get lisCondicion
     *
     * @return string 
     */
    public function getLisCondicion()
    {
        return $this->lisCondicion;
    }

    /**
     * Set lisCuentas
     *
     * @param string $lisCuentas
     * @return Listados
     */
    public function setLisCuentas($lisCuentas)
    {
        $this->lisCuentas = $lisCuentas;

        return $this;
    }

    /**
     * Get lisCuentas
     *
     * @return string 
     */
    public function getLisCuentas()
    {
        return $this->lisCuentas;
    }

    /**
     * Set lisCampos
     *
     * @param string $lisCampos
     * @return Listados
     */
    public function setLisCampos($lisCampos)
    {
        $this->lisCampos = $lisCampos;

        return $this;
    }

    /**
     * Get lisCampos
     *
     * @return string 
     */
    public function getLisCampos()
    {
        return $this->lisCampos;
    }

    /**
     * Set lisRelaciones
     *
     * @param string $lisRelaciones
     * @return Listados
     */
    public function setLisRelaciones($lisRelaciones)
    {
        $this->lisRelaciones = $lisRelaciones;

        return $this;
    }

    /**
     * Get lisRelaciones
     *
     * @return string 
     */
    public function getLisRelaciones()
    {
        return $this->lisRelaciones;
    }

    /**
     * Get lisCodigo
     *
     * @return integer 
     */
    public function getLisCodigo()
    {
        return $this->lisCodigo;
    }
}
