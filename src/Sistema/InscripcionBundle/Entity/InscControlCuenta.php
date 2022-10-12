<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Max Shtefec <max.shtefec@gmail.com>
 * InscControlCuenta
 *
 * @ORM\Table(name="insc_control_cuenta")
 * @ORM\Entity(repositoryClass="Sistema\InscripcionBundle\Entity\InscControlCuentaRepository")
 */
class InscControlCuenta
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
     * @var integer
     *
     * @ORM\Column(name="codigo", type="integer", nullable=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_cuota", type="float", nullable=true)
     */
    private $montoCuota;

    /**
     * @var integer
     *
     * @ORM\Column(name="cuenta_madre", type="integer", nullable=true)
     */
    private $cuentaMadre;

    /**
     * Constructor.
     */
    public function __construct() { }

    public function __toString() {
        return $this->nombre;
    }

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
     * Set codigo.
     *
     * @param integer $codigo
     *
     * @return Control
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo.
     *
     * @return integer
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return Control
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set montoCuota.
     *
     * @param float $montoCuota
     *
     * @return Control
     */
    public function setMontoCuota($montoCuota)
    {
        $this->montoCuota = $montoCuota;

        return $this;
    }

    /**
     * Get montoCuota.
     *
     * @return float
     */
    public function getMontoCuota()
    {
        return $this->montoCuota;
    }

    /**
     * Set cuentaMadre.
     *
     * @param integer $cuentaMadre
     *
     * @return Control
     */
    public function setCuentaMadre($cuentaMadre)
    {
        $this->cuentaMadre = $cuentaMadre;

        return $this;
    }

    /**
     * Get cuentaMadre.
     *
     * @return integer
     */
    public function getCuentaMadre()
    {
        return $this->cuentaMadre;
    }
}
