<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Totales
 *
 * @ORM\Table(name="totales", indexes={@ORM\Index(name="skmayor", columns={"tot_nropla", "tot_fecha", "tot_unegos"}), @ORM\Index(name="skcuenta", columns={"tot_nropla", "tot_tipdoc", "tot_nrodoc", "tot_fecha"}), @ORM\Index(name="skcaja", columns={"tot_nrocli", "tot_caja", "tot_zeta"}), @ORM\Index(name="skfecha", columns={"tot_fecha", "tot_unegos", "tot_nrocli"}), @ORM\Index(name="skproceso", columns={"tot_proceso", "tot_tipdoc", "tot_nrodoc", "tot_fecha"}), @ORM\Index(name="skcomproba", columns={"tot_unegos", "tot_proceso", "tot_nrocli", "tot_nrocom", "tot_item", "tot_nrocuo"}), @ORM\Index(name="skdocumento", columns={"tot_tipdoc", "tot_nrodoc", "tot_fecha"}), @ORM\Index(name="skcheques", columns={"tot_nrocheque"}), @ORM\Index(name="sklegalizacion", columns={"tot_nrolegali"})})
 * @ORM\Entity(repositoryClass="Sistema\CPCEBundle\Entity\TotalesRepository")
 */
class Totales
{
    /**
     * @var string
     *
     * @ORM\Column(name="tot_proceso", type="string", length=6, nullable=false)
     */
    private $totProceso;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nrocom", type="integer", nullable=false)
     */
    private $totNrocom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tot_fecha", type="datetime", nullable=false)
     */
    private $totFecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tot_fecven", type="date", nullable=false)
     */
    private $totFecven;

    /**
     * @var string
     *
     * @ORM\Column(name="tot_forpag", type="string", length=8, nullable=false)
     */
    private $totForpag;

    /**
     * @var float
     *
     * @ORM\Column(name="tot_debe", type="float", precision=12, scale=2, nullable=false)
     */
    private $totDebe;

    /**
     * @var float
     *
     * @ORM\Column(name="tot_haber", type="float", precision=12, scale=2, nullable=false)
     */
    private $totHaber;

    /**
     * @ORM\ManyToOne(targetEntity="Plancuen")
     * @ORM\JoinColumn(name="tot_nropla", referencedColumnName="pla_nropla")
     */
    private $totNropla;

    /**
     * @var string
     *
     * @ORM\Column(name="tot_subpla", type="string", length=20, nullable=false)
     */
    private $totSubpla;

    /**
     * @var string
     *
     * @ORM\Column(name="tot_tipdoc", type="string", length=3, nullable=false)
     */
    private $totTipdoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nrodoc", type="integer", nullable=false)
     */
    private $totNrodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="tot_titulo", type="string", length=2, nullable=false)
     */
    private $totTitulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_matricula", type="integer", nullable=false)
     */
    private $totMatricula;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nroope", type="integer", nullable=false)
     */
    private $totNroope;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nroreg", type="integer", nullable=false)
     */
    private $totNroreg;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_caja", type="integer", nullable=false)
     */
    private $totCaja;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_zeta", type="integer", nullable=false)
     */
    private $totZeta;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nrolegali", type="integer", nullable=false)
     */
    private $totNrolegali;

    /**
     * @var string
     *
     * @ORM\Column(name="tot_concepto", type="string", length=50, nullable=false)
     */
    private $totConcepto;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_lote", type="bigint", nullable=false)
     */
    private $totLote;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_asiant", type="bigint", nullable=false)
     */
    private $totAsiant;

    /**
     * @var string
     *
     * @ORM\Column(name="tot_estado", type="string", length=1, nullable=false)
     */
    private $totEstado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tot_fecconcilia", type="datetime", nullable=false)
     */
    private $totFecconcilia;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_opeconcilia", type="integer", nullable=false)
     */
    private $totOpeconcilia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tot_fecvta", type="date", nullable=false)
     */
    private $totFecvta;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_asicancel", type="bigint", nullable=false)
     */
    private $totAsicancel;

    /**
     * @var string
     *
     * @ORM\Column(name="tot_imppag", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $totImppag;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_codretencion", type="integer", nullable=false)
     */
    private $totCodretencion;

    /**
     * @var float
     *
     * @ORM\Column(name="tot_bonifica", type="float", precision=10, scale=2, nullable=false)
     */
    private $totBonifica;

    /**
     * @var float
     *
     * @ORM\Column(name="tot_porcentaje", type="float", precision=7, scale=2, nullable=false)
     */
    private $totPorcentaje;

    /**
     * @var float
     *
     * @ORM\Column(name="tot_sobre", type="float", precision=10, scale=2, nullable=false)
     */
    private $totSobre;

    /**
     * @var float
     *
     * @ORM\Column(name="tot_iva", type="float", precision=10, scale=2, nullable=false)
     */
    private $totIva;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nrochequera", type="integer", nullable=false)
     */
    private $totNrochequera;

    /**
     * @var string
     *
     * @ORM\Column(name="tot_letcheque", type="string", length=1, nullable=false)
     */
    private $totLetcheque;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nrocheque", type="integer", nullable=false)
     */
    private $totNrocheque;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tot_fecche", type="date", nullable=false)
     */
    private $totFecche;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tot_fecdif", type="date", nullable=false)
     */
    private $totFecdif;

    /**
     * @var string
     *
     * @ORM\Column(name="tot_tipdes", type="string", length=3, nullable=false)
     */
    private $totTipdes;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nrodes", type="integer", nullable=false)
     */
    private $totNrodes;

    /**
     * @var string
     *
     * @ORM\Column(name="tot_estche", type="string", length=1, nullable=false)
     */
    private $totEstche;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_asigrupal", type="bigint", nullable=false)
     */
    private $totAsigrupal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tot_fecalt", type="date", nullable=false)
     */
    private $totFecalt;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nroasi", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $totNroasi;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nrocli", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $totNrocli;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_unegos", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $totUnegos;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_item", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $totItem;

    /**
     * @var integer
     *
     * @ORM\Column(name="tot_nrocuo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $totNrocuo;


    public function __toString()
    {
        return ' ';
    }

    /**
     * Set totProceso
     *
     * @param string $totProceso
     * @return Totales
     */
    public function setTotProceso($totProceso)
    {
        $this->totProceso = $totProceso;

        return $this;
    }

    /**
     * Get totProceso
     *
     * @return string 
     */
    public function getTotProceso()
    {
        return $this->totProceso;
    }

    /**
     * Set totNrocom
     *
     * @param integer $totNrocom
     * @return Totales
     */
    public function setTotNrocom($totNrocom)
    {
        $this->totNrocom = $totNrocom;

        return $this;
    }

    /**
     * Get totNrocom
     *
     * @return integer 
     */
    public function getTotNrocom()
    {
        return $this->totNrocom;
    }

    /**
     * Set totFecha
     *
     * @param \DateTime $totFecha
     * @return Totales
     */
    public function setTotFecha($totFecha)
    {
        $this->totFecha = $totFecha;

        return $this;
    }

    /**
     * Get totFecha
     *
     * @return \DateTime 
     */
    public function getTotFecha()
    {
        return $this->totFecha;
    }

    /**
     * Set totFecven
     *
     * @param \DateTime $totFecven
     * @return Totales
     */
    public function setTotFecven($totFecven)
    {
        $this->totFecven = $totFecven;

        return $this;
    }

    /**
     * Get totFecven
     *
     * @return \DateTime 
     */
    public function getTotFecven()
    {
        return $this->totFecven;
    }

    /**
     * Set totForpag
     *
     * @param string $totForpag
     * @return Totales
     */
    public function setTotForpag($totForpag)
    {
        $this->totForpag = $totForpag;

        return $this;
    }

    /**
     * Get totForpag
     *
     * @return string 
     */
    public function getTotForpag()
    {
        return $this->totForpag;
    }

    /**
     * Set totDebe
     *
     * @param float $totDebe
     * @return Totales
     */
    public function setTotDebe($totDebe)
    {
        $this->totDebe = $totDebe;

        return $this;
    }

    /**
     * Get totDebe
     *
     * @return float 
     */
    public function getTotDebe()
    {
        return $this->totDebe;
    }

    /**
     * Set totHaber
     *
     * @param float $totHaber
     * @return Totales
     */
    public function setTotHaber($totHaber)
    {
        $this->totHaber = $totHaber;

        return $this;
    }

    /**
     * Get totHaber
     *
     * @return float 
     */
    public function getTotHaber()
    {
        return $this->totHaber;
    }

    /**
     * Set totNropla
     *
     * @param string $totNropla
     * @return Totales
     */
    public function setTotNropla($totNropla)
    {
        $this->totNropla = $totNropla;

        return $this;
    }

    /**
     * Get totNropla
     *
     * @return string 
     */
    public function getTotNropla()
    {
        return $this->totNropla;
    }

    /**
     * Set totSubpla
     *
     * @param string $totSubpla
     * @return Totales
     */
    public function setTotSubpla($totSubpla)
    {
        $this->totSubpla = $totSubpla;

        return $this;
    }

    /**
     * Get totSubpla
     *
     * @return string 
     */
    public function getTotSubpla()
    {
        return $this->totSubpla;
    }

    /**
     * Set totTipdoc
     *
     * @param string $totTipdoc
     * @return Totales
     */
    public function setTotTipdoc($totTipdoc)
    {
        $this->totTipdoc = $totTipdoc;

        return $this;
    }

    /**
     * Get totTipdoc
     *
     * @return string 
     */
    public function getTotTipdoc()
    {
        return $this->totTipdoc;
    }

    /**
     * Set totNrodoc
     *
     * @param integer $totNrodoc
     * @return Totales
     */
    public function setTotNrodoc($totNrodoc)
    {
        $this->totNrodoc = $totNrodoc;

        return $this;
    }

    /**
     * Get totNrodoc
     *
     * @return integer 
     */
    public function getTotNrodoc()
    {
        return $this->totNrodoc;
    }

    /**
     * Set totTitulo
     *
     * @param string $totTitulo
     * @return Totales
     */
    public function setTotTitulo($totTitulo)
    {
        $this->totTitulo = $totTitulo;

        return $this;
    }

    /**
     * Get totTitulo
     *
     * @return string 
     */
    public function getTotTitulo()
    {
        return $this->totTitulo;
    }

    /**
     * Set totMatricula
     *
     * @param integer $totMatricula
     * @return Totales
     */
    public function setTotMatricula($totMatricula)
    {
        $this->totMatricula = $totMatricula;

        return $this;
    }

    /**
     * Get totMatricula
     *
     * @return integer 
     */
    public function getTotMatricula()
    {
        return $this->totMatricula;
    }

    /**
     * Set totNroope
     *
     * @param integer $totNroope
     * @return Totales
     */
    public function setTotNroope($totNroope)
    {
        $this->totNroope = $totNroope;

        return $this;
    }

    /**
     * Get totNroope
     *
     * @return integer 
     */
    public function getTotNroope()
    {
        return $this->totNroope;
    }

    /**
     * Set totNroreg
     *
     * @param integer $totNroreg
     * @return Totales
     */
    public function setTotNroreg($totNroreg)
    {
        $this->totNroreg = $totNroreg;

        return $this;
    }

    /**
     * Get totNroreg
     *
     * @return integer 
     */
    public function getTotNroreg()
    {
        return $this->totNroreg;
    }

    /**
     * Set totCaja
     *
     * @param integer $totCaja
     * @return Totales
     */
    public function setTotCaja($totCaja)
    {
        $this->totCaja = $totCaja;

        return $this;
    }

    /**
     * Get totCaja
     *
     * @return integer 
     */
    public function getTotCaja()
    {
        return $this->totCaja;
    }

    /**
     * Set totZeta
     *
     * @param integer $totZeta
     * @return Totales
     */
    public function setTotZeta($totZeta)
    {
        $this->totZeta = $totZeta;

        return $this;
    }

    /**
     * Get totZeta
     *
     * @return integer 
     */
    public function getTotZeta()
    {
        return $this->totZeta;
    }

    /**
     * Set totNrolegali
     *
     * @param integer $totNrolegali
     * @return Totales
     */
    public function setTotNrolegali($totNrolegali)
    {
        $this->totNrolegali = $totNrolegali;

        return $this;
    }

    /**
     * Get totNrolegali
     *
     * @return integer 
     */
    public function getTotNrolegali()
    {
        return $this->totNrolegali;
    }

    /**
     * Set totConcepto
     *
     * @param string $totConcepto
     * @return Totales
     */
    public function setTotConcepto($totConcepto)
    {
        $this->totConcepto = $totConcepto;

        return $this;
    }

    /**
     * Get totConcepto
     *
     * @return string 
     */
    public function getTotConcepto()
    {
        return $this->totConcepto;
    }

    /**
     * Set totLote
     *
     * @param integer $totLote
     * @return Totales
     */
    public function setTotLote($totLote)
    {
        $this->totLote = $totLote;

        return $this;
    }

    /**
     * Get totLote
     *
     * @return integer 
     */
    public function getTotLote()
    {
        return $this->totLote;
    }

    /**
     * Set totAsiant
     *
     * @param integer $totAsiant
     * @return Totales
     */
    public function setTotAsiant($totAsiant)
    {
        $this->totAsiant = $totAsiant;

        return $this;
    }

    /**
     * Get totAsiant
     *
     * @return integer 
     */
    public function getTotAsiant()
    {
        return $this->totAsiant;
    }

    /**
     * Set totEstado
     *
     * @param string $totEstado
     * @return Totales
     */
    public function setTotEstado($totEstado)
    {
        $this->totEstado = $totEstado;

        return $this;
    }

    /**
     * Get totEstado
     *
     * @return string 
     */
    public function getTotEstado()
    {
        return $this->totEstado;
    }

    /**
     * Set totFecconcilia
     *
     * @param \DateTime $totFecconcilia
     * @return Totales
     */
    public function setTotFecconcilia($totFecconcilia)
    {
        $this->totFecconcilia = $totFecconcilia;

        return $this;
    }

    /**
     * Get totFecconcilia
     *
     * @return \DateTime 
     */
    public function getTotFecconcilia()
    {
        return $this->totFecconcilia;
    }

    /**
     * Set totOpeconcilia
     *
     * @param integer $totOpeconcilia
     * @return Totales
     */
    public function setTotOpeconcilia($totOpeconcilia)
    {
        $this->totOpeconcilia = $totOpeconcilia;

        return $this;
    }

    /**
     * Get totOpeconcilia
     *
     * @return integer 
     */
    public function getTotOpeconcilia()
    {
        return $this->totOpeconcilia;
    }

    /**
     * Set totFecvta
     *
     * @param \DateTime $totFecvta
     * @return Totales
     */
    public function setTotFecvta($totFecvta)
    {
        $this->totFecvta = $totFecvta;

        return $this;
    }

    /**
     * Get totFecvta
     *
     * @return \DateTime 
     */
    public function getTotFecvta()
    {
        return $this->totFecvta;
    }

    /**
     * Set totAsicancel
     *
     * @param integer $totAsicancel
     * @return Totales
     */
    public function setTotAsicancel($totAsicancel)
    {
        $this->totAsicancel = $totAsicancel;

        return $this;
    }

    /**
     * Get totAsicancel
     *
     * @return integer 
     */
    public function getTotAsicancel()
    {
        return $this->totAsicancel;
    }

    /**
     * Set totImppag
     *
     * @param string $totImppag
     * @return Totales
     */
    public function setTotImppag($totImppag)
    {
        $this->totImppag = $totImppag;

        return $this;
    }

    /**
     * Get totImppag
     *
     * @return string 
     */
    public function getTotImppag()
    {
        return $this->totImppag;
    }

    /**
     * Set totCodretencion
     *
     * @param integer $totCodretencion
     * @return Totales
     */
    public function setTotCodretencion($totCodretencion)
    {
        $this->totCodretencion = $totCodretencion;

        return $this;
    }

    /**
     * Get totCodretencion
     *
     * @return integer 
     */
    public function getTotCodretencion()
    {
        return $this->totCodretencion;
    }

    /**
     * Set totBonifica
     *
     * @param float $totBonifica
     * @return Totales
     */
    public function setTotBonifica($totBonifica)
    {
        $this->totBonifica = $totBonifica;

        return $this;
    }

    /**
     * Get totBonifica
     *
     * @return float 
     */
    public function getTotBonifica()
    {
        return $this->totBonifica;
    }

    /**
     * Set totPorcentaje
     *
     * @param float $totPorcentaje
     * @return Totales
     */
    public function setTotPorcentaje($totPorcentaje)
    {
        $this->totPorcentaje = $totPorcentaje;

        return $this;
    }

    /**
     * Get totPorcentaje
     *
     * @return float 
     */
    public function getTotPorcentaje()
    {
        return $this->totPorcentaje;
    }

    /**
     * Set totSobre
     *
     * @param float $totSobre
     * @return Totales
     */
    public function setTotSobre($totSobre)
    {
        $this->totSobre = $totSobre;

        return $this;
    }

    /**
     * Get totSobre
     *
     * @return float 
     */
    public function getTotSobre()
    {
        return $this->totSobre;
    }

    /**
     * Set totIva
     *
     * @param float $totIva
     * @return Totales
     */
    public function setTotIva($totIva)
    {
        $this->totIva = $totIva;

        return $this;
    }

    /**
     * Get totIva
     *
     * @return float 
     */
    public function getTotIva()
    {
        return $this->totIva;
    }

    /**
     * Set totNrochequera
     *
     * @param integer $totNrochequera
     * @return Totales
     */
    public function setTotNrochequera($totNrochequera)
    {
        $this->totNrochequera = $totNrochequera;

        return $this;
    }

    /**
     * Get totNrochequera
     *
     * @return integer 
     */
    public function getTotNrochequera()
    {
        return $this->totNrochequera;
    }

    /**
     * Set totLetcheque
     *
     * @param string $totLetcheque
     * @return Totales
     */
    public function setTotLetcheque($totLetcheque)
    {
        $this->totLetcheque = $totLetcheque;

        return $this;
    }

    /**
     * Get totLetcheque
     *
     * @return string 
     */
    public function getTotLetcheque()
    {
        return $this->totLetcheque;
    }

    /**
     * Set totNrocheque
     *
     * @param integer $totNrocheque
     * @return Totales
     */
    public function setTotNrocheque($totNrocheque)
    {
        $this->totNrocheque = $totNrocheque;

        return $this;
    }

    /**
     * Get totNrocheque
     *
     * @return integer 
     */
    public function getTotNrocheque()
    {
        return $this->totNrocheque;
    }

    /**
     * Set totFecche
     *
     * @param \DateTime $totFecche
     * @return Totales
     */
    public function setTotFecche($totFecche)
    {
        $this->totFecche = $totFecche;

        return $this;
    }

    /**
     * Get totFecche
     *
     * @return \DateTime 
     */
    public function getTotFecche()
    {
        return $this->totFecche;
    }

    /**
     * Set totFecdif
     *
     * @param \DateTime $totFecdif
     * @return Totales
     */
    public function setTotFecdif($totFecdif)
    {
        $this->totFecdif = $totFecdif;

        return $this;
    }

    /**
     * Get totFecdif
     *
     * @return \DateTime 
     */
    public function getTotFecdif()
    {
        return $this->totFecdif;
    }

    /**
     * Set totTipdes
     *
     * @param string $totTipdes
     * @return Totales
     */
    public function setTotTipdes($totTipdes)
    {
        $this->totTipdes = $totTipdes;

        return $this;
    }

    /**
     * Get totTipdes
     *
     * @return string 
     */
    public function getTotTipdes()
    {
        return $this->totTipdes;
    }

    /**
     * Set totNrodes
     *
     * @param integer $totNrodes
     * @return Totales
     */
    public function setTotNrodes($totNrodes)
    {
        $this->totNrodes = $totNrodes;

        return $this;
    }

    /**
     * Get totNrodes
     *
     * @return integer 
     */
    public function getTotNrodes()
    {
        return $this->totNrodes;
    }

    /**
     * Set totEstche
     *
     * @param string $totEstche
     * @return Totales
     */
    public function setTotEstche($totEstche)
    {
        $this->totEstche = $totEstche;

        return $this;
    }

    /**
     * Get totEstche
     *
     * @return string 
     */
    public function getTotEstche()
    {
        return $this->totEstche;
    }

    /**
     * Set totAsigrupal
     *
     * @param integer $totAsigrupal
     * @return Totales
     */
    public function setTotAsigrupal($totAsigrupal)
    {
        $this->totAsigrupal = $totAsigrupal;

        return $this;
    }

    /**
     * Get totAsigrupal
     *
     * @return integer 
     */
    public function getTotAsigrupal()
    {
        return $this->totAsigrupal;
    }

    /**
     * Set totFecalt
     *
     * @param \DateTime $totFecalt
     * @return Totales
     */
    public function setTotFecalt($totFecalt)
    {
        $this->totFecalt = $totFecalt;

        return $this;
    }

    /**
     * Get totFecalt
     *
     * @return \DateTime 
     */
    public function getTotFecalt()
    {
        return $this->totFecalt;
    }

    /**
     * Set totNroasi
     *
     * @param integer $totNroasi
     * @return Totales
     */
    public function setTotNroasi($totNroasi)
    {
        $this->totNroasi = $totNroasi;

        return $this;
    }

    /**
     * Get totNroasi
     *
     * @return integer 
     */
    public function getTotNroasi()
    {
        return $this->totNroasi;
    }

    /**
     * Set totNrocli
     *
     * @param integer $totNrocli
     * @return Totales
     */
    public function setTotNrocli($totNrocli)
    {
        $this->totNrocli = $totNrocli;

        return $this;
    }

    /**
     * Get totNrocli
     *
     * @return integer 
     */
    public function getTotNrocli()
    {
        return $this->totNrocli;
    }

    /**
     * Set totUnegos
     *
     * @param integer $totUnegos
     * @return Totales
     */
    public function setTotUnegos($totUnegos)
    {
        $this->totUnegos = $totUnegos;

        return $this;
    }

    /**
     * Get totUnegos
     *
     * @return integer 
     */
    public function getTotUnegos()
    {
        return $this->totUnegos;
    }

    /**
     * Set totItem
     *
     * @param integer $totItem
     * @return Totales
     */
    public function setTotItem($totItem)
    {
        $this->totItem = $totItem;

        return $this;
    }

    /**
     * Get totItem
     *
     * @return integer 
     */
    public function getTotItem()
    {
        return $this->totItem;
    }

    /**
     * Set totNrocuo
     *
     * @param integer $totNrocuo
     * @return Totales
     */
    public function setTotNrocuo($totNrocuo)
    {
        $this->totNrocuo = $totNrocuo;

        return $this;
    }

    /**
     * Get totNrocuo
     *
     * @return integer 
     */
    public function getTotNrocuo()
    {
        return $this->totNrocuo;
    }
}
