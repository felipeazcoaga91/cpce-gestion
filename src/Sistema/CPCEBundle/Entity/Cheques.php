<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cheques
 *
 * @ORM\Table(name="cheques")
 * @ORM\Entity
 */
class Cheques
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="COMPROB", type="integer", nullable=true)
     */
    private $comprob;

    /**
     * @var string
     *
     * @ORM\Column(name="PROCESO", type="string", length=6, nullable=true)
     */
    private $proceso;

    /**
     * @var string
     *
     * @ORM\Column(name="CHEQUE", type="string", length=12, nullable=true)
     */
    private $cheque;

    /**
     * @var string
     *
     * @ORM\Column(name="BANCO", type="string", length=20, nullable=true)
     */
    private $banco;

    /**
     * @var string
     *
     * @ORM\Column(name="SUCURSAL", type="string", length=15, nullable=true)
     */
    private $sucursal;

    /**
     * @var string
     *
     * @ORM\Column(name="CUENTA", type="string", length=10, nullable=true)
     */
    private $cuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="PLAZO", type="string", length=2, nullable=true)
     */
    private $plazo;

    /**
     * @var float
     *
     * @ORM\Column(name="IMPORTE", type="float", precision=24, scale=2, nullable=true)
     */
    private $importe;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COLUMNA", type="boolean", nullable=false)
     */
    private $columna;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="EFECTIVIZA", type="datetime", nullable=true)
     */
    private $efectiviza;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=1, nullable=true)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FPDCHEQ", type="datetime", nullable=true)
     */
    private $fpdcheq;

    /**
     * @var string
     *
     * @ORM\Column(name="MATRICULA", type="string", length=5, nullable=true)
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="ORIGEN", type="string", length=1, nullable=true)
     */
    private $origen;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPO", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="INSTIT", type="string", length=2, nullable=true)
     */
    private $instit;

    /**
     * @var float
     *
     * @ORM\Column(name="ASIENTO", type="float", precision=53, scale=0, nullable=true)
     */
    private $asiento;

    /**
     * @var string
     *
     * @ORM\Column(name="ZONA", type="string", length=4, nullable=true)
     */
    private $zona;

    /**
     * @var string
     *
     * @ORM\Column(name="CAMPO1", type="string", length=1, nullable=true)
     */
    private $campo1;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Cheques
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set comprob
     *
     * @param integer $comprob
     * @return Cheques
     */
    public function setComprob($comprob)
    {
        $this->comprob = $comprob;

        return $this;
    }

    /**
     * Get comprob
     *
     * @return integer 
     */
    public function getComprob()
    {
        return $this->comprob;
    }

    /**
     * Set proceso
     *
     * @param string $proceso
     * @return Cheques
     */
    public function setProceso($proceso)
    {
        $this->proceso = $proceso;

        return $this;
    }

    /**
     * Get proceso
     *
     * @return string 
     */
    public function getProceso()
    {
        return $this->proceso;
    }

    /**
     * Set cheque
     *
     * @param string $cheque
     * @return Cheques
     */
    public function setCheque($cheque)
    {
        $this->cheque = $cheque;

        return $this;
    }

    /**
     * Get cheque
     *
     * @return string 
     */
    public function getCheque()
    {
        return $this->cheque;
    }

    /**
     * Set banco
     *
     * @param string $banco
     * @return Cheques
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get banco
     *
     * @return string 
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * Set sucursal
     *
     * @param string $sucursal
     * @return Cheques
     */
    public function setSucursal($sucursal)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return string 
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     * @return Cheques
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return string 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set plazo
     *
     * @param string $plazo
     * @return Cheques
     */
    public function setPlazo($plazo)
    {
        $this->plazo = $plazo;

        return $this;
    }

    /**
     * Get plazo
     *
     * @return string 
     */
    public function getPlazo()
    {
        return $this->plazo;
    }

    /**
     * Set importe
     *
     * @param float $importe
     * @return Cheques
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return float 
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set columna
     *
     * @param boolean $columna
     * @return Cheques
     */
    public function setColumna($columna)
    {
        $this->columna = $columna;

        return $this;
    }

    /**
     * Get columna
     *
     * @return boolean 
     */
    public function getColumna()
    {
        return $this->columna;
    }

    /**
     * Set efectiviza
     *
     * @param \DateTime $efectiviza
     * @return Cheques
     */
    public function setEfectiviza($efectiviza)
    {
        $this->efectiviza = $efectiviza;

        return $this;
    }

    /**
     * Get efectiviza
     *
     * @return \DateTime 
     */
    public function getEfectiviza()
    {
        return $this->efectiviza;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Cheques
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fpdcheq
     *
     * @param \DateTime $fpdcheq
     * @return Cheques
     */
    public function setFpdcheq($fpdcheq)
    {
        $this->fpdcheq = $fpdcheq;

        return $this;
    }

    /**
     * Get fpdcheq
     *
     * @return \DateTime 
     */
    public function getFpdcheq()
    {
        return $this->fpdcheq;
    }

    /**
     * Set matricula
     *
     * @param string $matricula
     * @return Cheques
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return string 
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set origen
     *
     * @param string $origen
     * @return Cheques
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get origen
     *
     * @return string 
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Cheques
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set instit
     *
     * @param string $instit
     * @return Cheques
     */
    public function setInstit($instit)
    {
        $this->instit = $instit;

        return $this;
    }

    /**
     * Get instit
     *
     * @return string 
     */
    public function getInstit()
    {
        return $this->instit;
    }

    /**
     * Set asiento
     *
     * @param float $asiento
     * @return Cheques
     */
    public function setAsiento($asiento)
    {
        $this->asiento = $asiento;

        return $this;
    }

    /**
     * Get asiento
     *
     * @return float 
     */
    public function getAsiento()
    {
        return $this->asiento;
    }

    /**
     * Set zona
     *
     * @param string $zona
     * @return Cheques
     */
    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }

    /**
     * Get zona
     *
     * @return string 
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * Set campo1
     *
     * @param string $campo1
     * @return Cheques
     */
    public function setCampo1($campo1)
    {
        $this->campo1 = $campo1;

        return $this;
    }

    /**
     * Get campo1
     *
     * @return string 
     */
    public function getCampo1()
    {
        return $this->campo1;
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
