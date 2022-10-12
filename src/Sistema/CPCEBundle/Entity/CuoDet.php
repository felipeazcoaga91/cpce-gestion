<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CuoDet
 *
 * @ORM\Table(name="cuo_det")
 * @ORM\Entity
 */
class CuoDet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="TIPO", type="integer", nullable=false)
     */
    private $tipo;

    /**
     * @var float
     *
     * @ORM\Column(name="TOTAL", type="float", precision=12, scale=2, nullable=false)
     */
    private $total;

    /**
     * @var float
     *
     * @ORM\Column(name="D1", type="float", precision=12, scale=2, nullable=false)
     */
    private $d1;

    /**
     * @var float
     *
     * @ORM\Column(name="D2", type="float", precision=12, scale=2, nullable=false)
     */
    private $d2;

    /**
     * @var float
     *
     * @ORM\Column(name="D3", type="float", precision=12, scale=2, nullable=false)
     */
    private $d3;

    /**
     * @var float
     *
     * @ORM\Column(name="C1", type="float", precision=12, scale=2, nullable=false)
     */
    private $c1;

    /**
     * @var float
     *
     * @ORM\Column(name="C2", type="float", precision=12, scale=2, nullable=false)
     */
    private $c2;

    /**
     * @var float
     *
     * @ORM\Column(name="C3", type="float", precision=12, scale=2, nullable=false)
     */
    private $c3;

    /**
     * @var float
     *
     * @ORM\Column(name="C4", type="float", precision=12, scale=2, nullable=false)
     */
    private $c4;

    /**
     * @var float
     *
     * @ORM\Column(name="C5", type="float", precision=12, scale=2, nullable=false)
     */
    private $c5;

    /**
     * @var float
     *
     * @ORM\Column(name="C6", type="float", precision=12, scale=2, nullable=false)
     */
    private $c6;

    /**
     * @var float
     *
     * @ORM\Column(name="C7", type="float", precision=12, scale=2, nullable=false)
     */
    private $c7;

    /**
     * @var float
     *
     * @ORM\Column(name="C8", type="float", precision=12, scale=2, nullable=false)
     */
    private $c8;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="F_ALTA", type="datetime", nullable=false)
     */
    private $fAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="F_VTO", type="datetime", nullable=false)
     */
    private $fVto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="F_PAGO", type="datetime", nullable=true)
     */
    private $fPago;

    /**
     * @var integer
     *
     * @ORM\Column(name="ASIENTO", type="bigint", nullable=true)
     */
    private $asiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="RECIBO", type="integer", nullable=true)
     */
    private $recibo;

    /**
     * @var integer
     *
     * @ORM\Column(name="NUMERO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="NCUOTA", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ncuota;

    /**
     * @var integer
     *
     * @ORM\Column(name="MATRICULA", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $matricula;



    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return CuoDet
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return CuoDet
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set d1
     *
     * @param float $d1
     * @return CuoDet
     */
    public function setD1($d1)
    {
        $this->d1 = $d1;

        return $this;
    }

    /**
     * Get d1
     *
     * @return float 
     */
    public function getD1()
    {
        return $this->d1;
    }

    /**
     * Set d2
     *
     * @param float $d2
     * @return CuoDet
     */
    public function setD2($d2)
    {
        $this->d2 = $d2;

        return $this;
    }

    /**
     * Get d2
     *
     * @return float 
     */
    public function getD2()
    {
        return $this->d2;
    }

    /**
     * Set d3
     *
     * @param float $d3
     * @return CuoDet
     */
    public function setD3($d3)
    {
        $this->d3 = $d3;

        return $this;
    }

    /**
     * Get d3
     *
     * @return float 
     */
    public function getD3()
    {
        return $this->d3;
    }

    /**
     * Set c1
     *
     * @param float $c1
     * @return CuoDet
     */
    public function setC1($c1)
    {
        $this->c1 = $c1;

        return $this;
    }

    /**
     * Get c1
     *
     * @return float 
     */
    public function getC1()
    {
        return $this->c1;
    }

    /**
     * Set c2
     *
     * @param float $c2
     * @return CuoDet
     */
    public function setC2($c2)
    {
        $this->c2 = $c2;

        return $this;
    }

    /**
     * Get c2
     *
     * @return float 
     */
    public function getC2()
    {
        return $this->c2;
    }

    /**
     * Set c3
     *
     * @param float $c3
     * @return CuoDet
     */
    public function setC3($c3)
    {
        $this->c3 = $c3;

        return $this;
    }

    /**
     * Get c3
     *
     * @return float 
     */
    public function getC3()
    {
        return $this->c3;
    }

    /**
     * Set c4
     *
     * @param float $c4
     * @return CuoDet
     */
    public function setC4($c4)
    {
        $this->c4 = $c4;

        return $this;
    }

    /**
     * Get c4
     *
     * @return float 
     */
    public function getC4()
    {
        return $this->c4;
    }

    /**
     * Set c5
     *
     * @param float $c5
     * @return CuoDet
     */
    public function setC5($c5)
    {
        $this->c5 = $c5;

        return $this;
    }

    /**
     * Get c5
     *
     * @return float 
     */
    public function getC5()
    {
        return $this->c5;
    }

    /**
     * Set c6
     *
     * @param float $c6
     * @return CuoDet
     */
    public function setC6($c6)
    {
        $this->c6 = $c6;

        return $this;
    }

    /**
     * Get c6
     *
     * @return float 
     */
    public function getC6()
    {
        return $this->c6;
    }

    /**
     * Set c7
     *
     * @param float $c7
     * @return CuoDet
     */
    public function setC7($c7)
    {
        $this->c7 = $c7;

        return $this;
    }

    /**
     * Get c7
     *
     * @return float 
     */
    public function getC7()
    {
        return $this->c7;
    }

    /**
     * Set c8
     *
     * @param float $c8
     * @return CuoDet
     */
    public function setC8($c8)
    {
        $this->c8 = $c8;

        return $this;
    }

    /**
     * Get c8
     *
     * @return float 
     */
    public function getC8()
    {
        return $this->c8;
    }

    /**
     * Set fAlta
     *
     * @param \DateTime $fAlta
     * @return CuoDet
     */
    public function setFAlta($fAlta)
    {
        $this->fAlta = $fAlta;

        return $this;
    }

    /**
     * Get fAlta
     *
     * @return \DateTime 
     */
    public function getFAlta()
    {
        return $this->fAlta;
    }

    /**
     * Set fVto
     *
     * @param \DateTime $fVto
     * @return CuoDet
     */
    public function setFVto($fVto)
    {
        $this->fVto = $fVto;

        return $this;
    }

    /**
     * Get fVto
     *
     * @return \DateTime 
     */
    public function getFVto()
    {
        return $this->fVto;
    }

    /**
     * Set fPago
     *
     * @param \DateTime $fPago
     * @return CuoDet
     */
    public function setFPago($fPago)
    {
        $this->fPago = $fPago;

        return $this;
    }

    /**
     * Get fPago
     *
     * @return \DateTime 
     */
    public function getFPago()
    {
        return $this->fPago;
    }

    /**
     * Set asiento
     *
     * @param integer $asiento
     * @return CuoDet
     */
    public function setAsiento($asiento)
    {
        $this->asiento = $asiento;

        return $this;
    }

    /**
     * Get asiento
     *
     * @return integer 
     */
    public function getAsiento()
    {
        return $this->asiento;
    }

    /**
     * Set recibo
     *
     * @param integer $recibo
     * @return CuoDet
     */
    public function setRecibo($recibo)
    {
        $this->recibo = $recibo;

        return $this;
    }

    /**
     * Get recibo
     *
     * @return integer 
     */
    public function getRecibo()
    {
        return $this->recibo;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return CuoDet
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set ncuota
     *
     * @param integer $ncuota
     * @return CuoDet
     */
    public function setNcuota($ncuota)
    {
        $this->ncuota = $ncuota;

        return $this;
    }

    /**
     * Get ncuota
     *
     * @return integer 
     */
    public function getNcuota()
    {
        return $this->ncuota;
    }

    /**
     * Set matricula
     *
     * @param integer $matricula
     * @return CuoDet
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return integer 
     */
    public function getMatricula()
    {
        return $this->matricula;
    }
}
