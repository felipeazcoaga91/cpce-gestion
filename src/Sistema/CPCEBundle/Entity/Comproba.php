<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comproba
 *
 * @ORM\Table(name="comproba", indexes={@ORM\Index(name="SKLOTE", columns={"com_lote"}), @ORM\Index(name="SKPREIMPRESO", columns={"com_preimpreso"}), @ORM\Index(name="SKFECHA", columns={"com_fecha", "com_unegos", "com_nrocli"}), @ORM\Index(name="SKCOMPROBA", columns={"com_unegos", "com_proceso", "com_nrocli", "com_nrocom"}), @ORM\Index(name="SKGRUPAL", columns={"com_asigrupal"})})
 * @ORM\Entity(repositoryClass="Sistema\CPCEBundle\Entity\ComprobaRepository")
 */
class Comproba
{
    /**
     * @var integer
     *
     * @ORM\Column(name="com_nrodeleg", type="integer", nullable=false)
     */
    private $comNrodeleg;

    /**
     * @var string
     *
     * @ORM\Column(name="com_proceso", type="string", length=6, nullable=false)
     */
    private $comProceso;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nrocom", type="integer", nullable=false)
     */
    private $comNrocom;

    /**
     * @var string
     *
     * @ORM\Column(name="com_preimpreso", type="string", length=13, nullable=false)
     */
    private $comPreimpreso;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nroope", type="integer", nullable=false)
     */
    private $comNroope;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="com_fecha", type="datetime", nullable=false)
     */
    private $comFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="com_titulo", type="string", length=2, nullable=false)
     */
    private $comTitulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_matricula", type="integer", nullable=false)
     */
    private $comMatricula;

    /**
     * @var string
     *
     * @ORM\Column(name="com_subcuenta", type="string", length=20, nullable=false)
     */
    private $comSubcuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="com_tipdoc", type="string", length=3, nullable=false)
     */
    private $comTipdoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nrodoc", type="integer", nullable=false)
     */
    private $comNrodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="com_tipcmt", type="string", length=3, nullable=false)
     */
    private $comTipcmt;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nrocmt", type="integer", nullable=false)
     */
    private $comNrocmt;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nrocuo", type="integer", nullable=false)
     */
    private $comNrocuo;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nropre", type="integer", nullable=false)
     */
    private $comNropre;

    /**
     * @var string
     *
     * @ORM\Column(name="com_tipo", type="string", length=1, nullable=false)
     */
    private $comTipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_lote", type="bigint", nullable=false)
     */
    private $comLote;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_caja", type="integer", nullable=false)
     */
    private $comCaja;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nroreg", type="integer", nullable=false)
     */
    private $comNroreg;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_zeta", type="integer", nullable=false)
     */
    private $comZeta;

    /**
     * @var float
     *
     * @ORM\Column(name="com_total", type="float", precision=14, scale=2, nullable=false)
     */
    private $comTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="com_tipanu", type="string", length=2, nullable=false)
     */
    private $comTipanu;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_punanu", type="integer", nullable=false)
     */
    private $comPunanu;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nroanu", type="integer", nullable=false)
     */
    private $comNroanu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="com_fecalt", type="date", nullable=false)
     */
    private $comFecalt;

    /**
     * @var string
     *
     * @ORM\Column(name="com_estado", type="string", length=1, nullable=false)
     */
    private $comEstado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="com_fecven", type="date", nullable=false)
     */
    private $comFecven;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="com_fecpag", type="date", nullable=false)
     */
    private $comFecpag;

    /**
     * @var float
     *
     * @ORM\Column(name="com_imppag", type="float", precision=14, scale=2, nullable=false)
     */
    private $comImppag;

    /**
     * @var string
     *
     * @ORM\Column(name="com_tipmov", type="string", length=1, nullable=false)
     */
    private $comTipmov;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_coeficiente", type="integer", nullable=false)
     */
    private $comCoeficiente;

    /**
     * @var string
     *
     * @ORM\Column(name="com_concepto1", type="string", length=100, nullable=false)
     */
    private $comConcepto1;

    /**
     * @var string
     *
     * @ORM\Column(name="com_concepto2", type="string", length=100, nullable=false)
     */
    private $comConcepto2;

    /**
     * @var string
     *
     * @ORM\Column(name="com_concepto3", type="string", length=100, nullable=false)
     */
    private $comConcepto3;

    /**
     * @var string
     *
     * @ORM\Column(name="com_leyenda", type="string", length=100, nullable=false)
     */
    private $comLeyenda;

    /**
     * @var string
     *
     * @ORM\Column(name="com_refano", type="string", length=4, nullable=false)
     */
    private $comRefano;

    /**
     * @var string
     *
     * @ORM\Column(name="com_refmes", type="string", length=2, nullable=false)
     */
    private $comRefmes;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_asiant", type="bigint", nullable=false)
     */
    private $comAsiant;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_tarea", type="integer", nullable=false)
     */
    private $comTarea;

    /**
     * @var string
     *
     * @ORM\Column(name="com_nrotrabajo", type="string", length=20, nullable=false)
     */
    private $comNrotrabajo;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_asigrupal", type="bigint", nullable=false)
     */
    private $comAsigrupal;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nrolegali", type="integer", nullable=false)
     */
    private $comNrolegali;

    /**
     * @var string
     *
     * @ORM\Column(name="com_destinatario", type="string", length=255, nullable=true)
     */
    private $comDestinatario;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nroasi", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $comNroasi;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_nrocli", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $comNrocli;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_unegos", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $comUnegos;



    /**
     * Set comNrodeleg
     *
     * @param integer $comNrodeleg
     * @return Comproba
     */
    public function setComNrodeleg($comNrodeleg)
    {
        $this->comNrodeleg = $comNrodeleg;

        return $this;
    }

    /**
     * Get comNrodeleg
     *
     * @return integer 
     */
    public function getComNrodeleg()
    {
        return $this->comNrodeleg;
    }

    /**
     * Set comProceso
     *
     * @param string $comProceso
     * @return Comproba
     */
    public function setComProceso($comProceso)
    {
        $this->comProceso = $comProceso;

        return $this;
    }

    /**
     * Get comProceso
     *
     * @return string 
     */
    public function getComProceso()
    {
        return $this->comProceso;
    }

    /**
     * Set comNrocom
     *
     * @param integer $comNrocom
     * @return Comproba
     */
    public function setComNrocom($comNrocom)
    {
        $this->comNrocom = $comNrocom;

        return $this;
    }

    /**
     * Get comNrocom
     *
     * @return integer 
     */
    public function getComNrocom()
    {
        return $this->comNrocom;
    }

    /**
     * Set comPreimpreso
     *
     * @param string $comPreimpreso
     * @return Comproba
     */
    public function setComPreimpreso($comPreimpreso)
    {
        $this->comPreimpreso = $comPreimpreso;

        return $this;
    }

    /**
     * Get comPreimpreso
     *
     * @return string 
     */
    public function getComPreimpreso()
    {
        return $this->comPreimpreso;
    }

    /**
     * Set comNroope
     *
     * @param integer $comNroope
     * @return Comproba
     */
    public function setComNroope($comNroope)
    {
        $this->comNroope = $comNroope;

        return $this;
    }

    /**
     * Get comNroope
     *
     * @return integer 
     */
    public function getComNroope()
    {
        return $this->comNroope;
    }

    /**
     * Set comFecha
     *
     * @param \DateTime $comFecha
     * @return Comproba
     */
    public function setComFecha($comFecha)
    {
        $this->comFecha = $comFecha;

        return $this;
    }

    /**
     * Get comFecha
     *
     * @return \DateTime 
     */
    public function getComFecha()
    {
        return $this->comFecha;
    }

    /**
     * Set comTitulo
     *
     * @param string $comTitulo
     * @return Comproba
     */
    public function setComTitulo($comTitulo)
    {
        $this->comTitulo = $comTitulo;

        return $this;
    }

    /**
     * Get comTitulo
     *
     * @return string 
     */
    public function getComTitulo()
    {
        return $this->comTitulo;
    }

    /**
     * Set comMatricula
     *
     * @param integer $comMatricula
     * @return Comproba
     */
    public function setComMatricula($comMatricula)
    {
        $this->comMatricula = $comMatricula;

        return $this;
    }

    /**
     * Get comMatricula
     *
     * @return integer 
     */
    public function getComMatricula()
    {
        return $this->comMatricula;
    }

    /**
     * Set comSubcuenta
     *
     * @param string $comSubcuenta
     * @return Comproba
     */
    public function setComSubcuenta($comSubcuenta)
    {
        $this->comSubcuenta = $comSubcuenta;

        return $this;
    }

    /**
     * Get comSubcuenta
     *
     * @return string 
     */
    public function getComSubcuenta()
    {
        return $this->comSubcuenta;
    }

    /**
     * Set comTipdoc
     *
     * @param string $comTipdoc
     * @return Comproba
     */
    public function setComTipdoc($comTipdoc)
    {
        $this->comTipdoc = $comTipdoc;

        return $this;
    }

    /**
     * Get comTipdoc
     *
     * @return string 
     */
    public function getComTipdoc()
    {
        return $this->comTipdoc;
    }

    /**
     * Set comNrodoc
     *
     * @param integer $comNrodoc
     * @return Comproba
     */
    public function setComNrodoc($comNrodoc)
    {
        $this->comNrodoc = $comNrodoc;

        return $this;
    }

    /**
     * Get comNrodoc
     *
     * @return integer 
     */
    public function getComNrodoc()
    {
        return $this->comNrodoc;
    }

    /**
     * Set comTipcmt
     *
     * @param string $comTipcmt
     * @return Comproba
     */
    public function setComTipcmt($comTipcmt)
    {
        $this->comTipcmt = $comTipcmt;

        return $this;
    }

    /**
     * Get comTipcmt
     *
     * @return string 
     */
    public function getComTipcmt()
    {
        return $this->comTipcmt;
    }

    /**
     * Set comNrocmt
     *
     * @param integer $comNrocmt
     * @return Comproba
     */
    public function setComNrocmt($comNrocmt)
    {
        $this->comNrocmt = $comNrocmt;

        return $this;
    }

    /**
     * Get comNrocmt
     *
     * @return integer 
     */
    public function getComNrocmt()
    {
        return $this->comNrocmt;
    }

    /**
     * Set comNrocuo
     *
     * @param integer $comNrocuo
     * @return Comproba
     */
    public function setComNrocuo($comNrocuo)
    {
        $this->comNrocuo = $comNrocuo;

        return $this;
    }

    /**
     * Get comNrocuo
     *
     * @return integer 
     */
    public function getComNrocuo()
    {
        return $this->comNrocuo;
    }

    /**
     * Set comNropre
     *
     * @param integer $comNropre
     * @return Comproba
     */
    public function setComNropre($comNropre)
    {
        $this->comNropre = $comNropre;

        return $this;
    }

    /**
     * Get comNropre
     *
     * @return integer 
     */
    public function getComNropre()
    {
        return $this->comNropre;
    }

    /**
     * Set comTipo
     *
     * @param string $comTipo
     * @return Comproba
     */
    public function setComTipo($comTipo)
    {
        $this->comTipo = $comTipo;

        return $this;
    }

    /**
     * Get comTipo
     *
     * @return string 
     */
    public function getComTipo()
    {
        return $this->comTipo;
    }

    /**
     * Set comLote
     *
     * @param integer $comLote
     * @return Comproba
     */
    public function setComLote($comLote)
    {
        $this->comLote = $comLote;

        return $this;
    }

    /**
     * Get comLote
     *
     * @return integer 
     */
    public function getComLote()
    {
        return $this->comLote;
    }

    /**
     * Set comCaja
     *
     * @param integer $comCaja
     * @return Comproba
     */
    public function setComCaja($comCaja)
    {
        $this->comCaja = $comCaja;

        return $this;
    }

    /**
     * Get comCaja
     *
     * @return integer 
     */
    public function getComCaja()
    {
        return $this->comCaja;
    }

    /**
     * Set comNroreg
     *
     * @param integer $comNroreg
     * @return Comproba
     */
    public function setComNroreg($comNroreg)
    {
        $this->comNroreg = $comNroreg;

        return $this;
    }

    /**
     * Get comNroreg
     *
     * @return integer 
     */
    public function getComNroreg()
    {
        return $this->comNroreg;
    }

    /**
     * Set comZeta
     *
     * @param integer $comZeta
     * @return Comproba
     */
    public function setComZeta($comZeta)
    {
        $this->comZeta = $comZeta;

        return $this;
    }

    /**
     * Get comZeta
     *
     * @return integer 
     */
    public function getComZeta()
    {
        return $this->comZeta;
    }

    /**
     * Set comTotal
     *
     * @param float $comTotal
     * @return Comproba
     */
    public function setComTotal($comTotal)
    {
        $this->comTotal = $comTotal;

        return $this;
    }

    /**
     * Get comTotal
     *
     * @return float 
     */
    public function getComTotal()
    {
        return $this->comTotal;
    }

    /**
     * Set comTipanu
     *
     * @param string $comTipanu
     * @return Comproba
     */
    public function setComTipanu($comTipanu)
    {
        $this->comTipanu = $comTipanu;

        return $this;
    }

    /**
     * Get comTipanu
     *
     * @return string 
     */
    public function getComTipanu()
    {
        return $this->comTipanu;
    }

    /**
     * Set comPunanu
     *
     * @param integer $comPunanu
     * @return Comproba
     */
    public function setComPunanu($comPunanu)
    {
        $this->comPunanu = $comPunanu;

        return $this;
    }

    /**
     * Get comPunanu
     *
     * @return integer 
     */
    public function getComPunanu()
    {
        return $this->comPunanu;
    }

    /**
     * Set comNroanu
     *
     * @param integer $comNroanu
     * @return Comproba
     */
    public function setComNroanu($comNroanu)
    {
        $this->comNroanu = $comNroanu;

        return $this;
    }

    /**
     * Get comNroanu
     *
     * @return integer 
     */
    public function getComNroanu()
    {
        return $this->comNroanu;
    }

    /**
     * Set comFecalt
     *
     * @param \DateTime $comFecalt
     * @return Comproba
     */
    public function setComFecalt($comFecalt)
    {
        $this->comFecalt = $comFecalt;

        return $this;
    }

    /**
     * Get comFecalt
     *
     * @return \DateTime 
     */
    public function getComFecalt()
    {
        return $this->comFecalt;
    }

    /**
     * Set comEstado
     *
     * @param string $comEstado
     * @return Comproba
     */
    public function setComEstado($comEstado)
    {
        $this->comEstado = $comEstado;

        return $this;
    }

    /**
     * Get comEstado
     *
     * @return string 
     */
    public function getComEstado()
    {
        return $this->comEstado;
    }

    /**
     * Set comFecven
     *
     * @param \DateTime $comFecven
     * @return Comproba
     */
    public function setComFecven($comFecven)
    {
        $this->comFecven = $comFecven;

        return $this;
    }

    /**
     * Get comFecven
     *
     * @return \DateTime 
     */
    public function getComFecven()
    {
        return $this->comFecven;
    }

    /**
     * Set comFecpag
     *
     * @param \DateTime $comFecpag
     * @return Comproba
     */
    public function setComFecpag($comFecpag)
    {
        $this->comFecpag = $comFecpag;

        return $this;
    }

    /**
     * Get comFecpag
     *
     * @return \DateTime 
     */
    public function getComFecpag()
    {
        return $this->comFecpag;
    }

    /**
     * Set comImppag
     *
     * @param float $comImppag
     * @return Comproba
     */
    public function setComImppag($comImppag)
    {
        $this->comImppag = $comImppag;

        return $this;
    }

    /**
     * Get comImppag
     *
     * @return float 
     */
    public function getComImppag()
    {
        return $this->comImppag;
    }

    /**
     * Set comTipmov
     *
     * @param string $comTipmov
     * @return Comproba
     */
    public function setComTipmov($comTipmov)
    {
        $this->comTipmov = $comTipmov;

        return $this;
    }

    /**
     * Get comTipmov
     *
     * @return string 
     */
    public function getComTipmov()
    {
        return $this->comTipmov;
    }

    /**
     * Set comCoeficiente
     *
     * @param integer $comCoeficiente
     * @return Comproba
     */
    public function setComCoeficiente($comCoeficiente)
    {
        $this->comCoeficiente = $comCoeficiente;

        return $this;
    }

    /**
     * Get comCoeficiente
     *
     * @return integer 
     */
    public function getComCoeficiente()
    {
        return $this->comCoeficiente;
    }

    /**
     * Set comConcepto1
     *
     * @param string $comConcepto1
     * @return Comproba
     */
    public function setComConcepto1($comConcepto1)
    {
        $this->comConcepto1 = $comConcepto1;

        return $this;
    }

    /**
     * Get comConcepto1
     *
     * @return string 
     */
    public function getComConcepto1()
    {
        return $this->comConcepto1;
    }

    /**
     * Set comConcepto2
     *
     * @param string $comConcepto2
     * @return Comproba
     */
    public function setComConcepto2($comConcepto2)
    {
        $this->comConcepto2 = $comConcepto2;

        return $this;
    }

    /**
     * Get comConcepto2
     *
     * @return string 
     */
    public function getComConcepto2()
    {
        return $this->comConcepto2;
    }

    /**
     * Set comConcepto3
     *
     * @param string $comConcepto3
     * @return Comproba
     */
    public function setComConcepto3($comConcepto3)
    {
        $this->comConcepto3 = $comConcepto3;

        return $this;
    }

    /**
     * Get comConcepto3
     *
     * @return string 
     */
    public function getComConcepto3()
    {
        return $this->comConcepto3;
    }

    /**
     * Set comLeyenda
     *
     * @param string $comLeyenda
     * @return Comproba
     */
    public function setComLeyenda($comLeyenda)
    {
        $this->comLeyenda = $comLeyenda;

        return $this;
    }

    /**
     * Get comLeyenda
     *
     * @return string 
     */
    public function getComLeyenda()
    {
        return $this->comLeyenda;
    }

    /**
     * Set comRefano
     *
     * @param string $comRefano
     * @return Comproba
     */
    public function setComRefano($comRefano)
    {
        $this->comRefano = $comRefano;

        return $this;
    }

    /**
     * Get comRefano
     *
     * @return string 
     */
    public function getComRefano()
    {
        return $this->comRefano;
    }

    /**
     * Set comRefmes
     *
     * @param string $comRefmes
     * @return Comproba
     */
    public function setComRefmes($comRefmes)
    {
        $this->comRefmes = $comRefmes;

        return $this;
    }

    /**
     * Get comRefmes
     *
     * @return string 
     */
    public function getComRefmes()
    {
        return $this->comRefmes;
    }

    /**
     * Set comAsiant
     *
     * @param integer $comAsiant
     * @return Comproba
     */
    public function setComAsiant($comAsiant)
    {
        $this->comAsiant = $comAsiant;

        return $this;
    }

    /**
     * Get comAsiant
     *
     * @return integer 
     */
    public function getComAsiant()
    {
        return $this->comAsiant;
    }

    /**
     * Set comTarea
     *
     * @param integer $comTarea
     * @return Comproba
     */
    public function setComTarea($comTarea)
    {
        $this->comTarea = $comTarea;

        return $this;
    }

    /**
     * Get comTarea
     *
     * @return integer 
     */
    public function getComTarea()
    {
        return $this->comTarea;
    }

    /**
     * Set comNrotrabajo
     *
     * @param string $comNrotrabajo
     * @return Comproba
     */
    public function setComNrotrabajo($comNrotrabajo)
    {
        $this->comNrotrabajo = $comNrotrabajo;

        return $this;
    }

    /**
     * Get comNrotrabajo
     *
     * @return string 
     */
    public function getComNrotrabajo()
    {
        return $this->comNrotrabajo;
    }

    /**
     * Set comAsigrupal
     *
     * @param integer $comAsigrupal
     * @return Comproba
     */
    public function setComAsigrupal($comAsigrupal)
    {
        $this->comAsigrupal = $comAsigrupal;

        return $this;
    }

    /**
     * Get comAsigrupal
     *
     * @return integer 
     */
    public function getComAsigrupal()
    {
        return $this->comAsigrupal;
    }

    /**
     * Set comNrolegali
     *
     * @param integer $comNrolegali
     * @return Comproba
     */
    public function setComNrolegali($comNrolegali)
    {
        $this->comNrolegali = $comNrolegali;

        return $this;
    }

    /**
     * Get comNrolegali
     *
     * @return integer 
     */
    public function getComNrolegali()
    {
        return $this->comNrolegali;
    }

    /**
     * Set comDestinatario
     *
     * @param string $comDestinatario
     * @return Comproba
     */
    public function setComDestinatario($comDestinatario)
    {
        $this->comDestinatario = $comDestinatario;

        return $this;
    }

    /**
     * Get comDestinatario
     *
     * @return string 
     */
    public function getComDestinatario()
    {
        return $this->comDestinatario;
    }

    /**
     * Set comNroasi
     *
     * @param integer $comNroasi
     * @return Comproba
     */
    public function setComNroasi($comNroasi)
    {
        $this->comNroasi = $comNroasi;

        return $this;
    }

    /**
     * Get comNroasi
     *
     * @return integer 
     */
    public function getComNroasi()
    {
        return $this->comNroasi;
    }

    /**
     * Set comNrocli
     *
     * @param integer $comNrocli
     * @return Comproba
     */
    public function setComNrocli($comNrocli)
    {
        $this->comNrocli = $comNrocli;

        return $this;
    }

    /**
     * Get comNrocli
     *
     * @return integer 
     */
    public function getComNrocli()
    {
        return $this->comNrocli;
    }

    /**
     * Set comUnegos
     *
     * @param integer $comUnegos
     * @return Comproba
     */
    public function setComUnegos($comUnegos)
    {
        $this->comUnegos = $comUnegos;

        return $this;
    }

    /**
     * Get comUnegos
     *
     * @return integer 
     */
    public function getComUnegos()
    {
        return $this->comUnegos;
    }
}
