<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Max Shtefec <max.shtefec@gmail.com>
 * InscMoldeCuenta
 *
 * @ORM\Table(name="insc_molde_cuenta")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscMoldeCuentaRepository")
 */
class InscMoldeCuenta
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="InscControlCuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="control_cuenta_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $controlCuenta;

    /**
     * @var integer
     *
     * @ORM\Column(name="importe", type="integer", nullable=true)
     */
    private $importe;

    /**
     * @ORM\ManyToOne(targetEntity="InscMolde", inversedBy="cuentas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="molde_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $molde;

    /**
     * Constructor.
     */
    public function __construct() { }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * Set controlCuenta.
     *
     * @param \Sistema\InscripcionBundle\Entity\InscControlCuenta $controlCuenta
     *
     * @return InscMoldeCuenta
     */
    public function setControlCuenta(\Sistema\InscripcionBundle\Entity\InscControlCuenta $controlCuenta)
    {
        $this->controlCuenta = $controlCuenta;

        return $this;
    }

    /**
     * Get controlCuenta.
     *
     * @return \Sistema\InscripcionBundle\Entity\InscControlCuenta
     */
    public function getControlCuenta()
    {
        return $this->controlCuenta;
    }

    /**
     * Set importe.
     *
     * @param integer $importe
     *
     * @return InscMoldeCuenta
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe.
     *
     * @return integer
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set molde.
     *
     * @param \Sistema\InscripcionBundle\Entity\InscMolde $molde
     *
     * @return InscMoldeCuenta
     */
    public function setMolde(\Sistema\InscripcionBundle\Entity\InscMolde $molde)
    {
        $this->molde = $molde;

        return $this;
    }

    /**
     * Get molde.
     *
     * @return \Sistema\InscripcionBundle\Entity\InscMolde
     */
    public function getMolde()
    {
        return $this->molde;
    }
}
