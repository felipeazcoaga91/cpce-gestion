<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plancuen
 *
 * @ORM\Table(name="plancuen")
 * @ORM\Entity
 */
class Plancuen
{
    /**
     * @var string
     *
     * @ORM\Column(name="pla_grupo", type="string", length=6, nullable=false)
     */
    private $plaGrupo;

    /**
     * @var integer
     *
     * @ORM\Column(name="pla_nrorap", type="integer", nullable=false)
     */
    private $plaNrorap;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_nombre", type="string", length=45, nullable=false)
     */
    private $plaNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_nomcorto", type="string", length=40, nullable=false)
     */
    private $plaNomcorto;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_madre", type="string", length=8, nullable=false)
     */
    private $plaMadre;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_acumul", type="string", length=8, nullable=false)
     */
    private $plaAcumul;

    /**
     * @var integer
     *
     * @ORM\Column(name="pla_column", type="integer", nullable=false)
     */
    private $plaColumn;

    /**
     * @var integer
     *
     * @ORM\Column(name="pla_posici", type="integer", nullable=false)
     */
    private $plaPosici;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_imputa", type="string", length=2, nullable=false)
     */
    private $plaImputa;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_servicio", type="string", length=2, nullable=false)
     */
    private $plaServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_categoria", type="string", length=2, nullable=false)
     */
    private $plaCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_marca", type="string", length=1, nullable=false)
     */
    private $plaMarca;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_caja", type="string", length=2, nullable=false)
     */
    private $plaCaja;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_desagrega", type="string", length=1, nullable=false)
     */
    private $plaDesagrega;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_cuotas", type="string", length=2, nullable=false)
     */
    private $plaCuotas;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_subcta", type="string", length=20, nullable=false)
     */
    private $plaSubcta;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_refund", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $plaRefund;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_moneda", type="string", length=1, nullable=false)
     */
    private $plaMoneda;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_cajachica", type="string", length=2, nullable=false)
     */
    private $plaCajachica;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pla_fecha", type="date", nullable=true)
     */
    private $plaFecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="pla_lote", type="integer", nullable=false)
     */
    private $plaLote;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_hora", type="string", length=8, nullable=false)
     */
    private $plaHora;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_debeanterior", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $plaDebeanterior;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_haberanterior", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $plaHaberanterior;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_debe", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $plaDebe;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_haber", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $plaHaber;

    /**
     * @var integer
     *
     * @ORM\Column(name="pla_coddebito", type="integer", nullable=false)
     */
    private $plaCoddebito;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_debito", type="string", length=2, nullable=false)
     */
    private $plaDebito;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pla_muestraweb", type="boolean", nullable=false)
     */
    private $plaMuestraweb;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pla_permitewebimprimir", type="boolean", nullable=false)
     */
    private $plaPermitewebimprimir;

    /**
     * @var string
     *
     * @ORM\Column(name="pla_nropla", type="string", length=8)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $plaNropla;



    /**
     * Set plaGrupo
     *
     * @param string $plaGrupo
     * @return Plancuen
     */
    public function setPlaGrupo($plaGrupo)
    {
        $this->plaGrupo = $plaGrupo;

        return $this;
    }

    /**
     * Get plaGrupo
     *
     * @return string 
     */
    public function getPlaGrupo()
    {
        return $this->plaGrupo;
    }

    /**
     * Set plaNrorap
     *
     * @param integer $plaNrorap
     * @return Plancuen
     */
    public function setPlaNrorap($plaNrorap)
    {
        $this->plaNrorap = $plaNrorap;

        return $this;
    }

    /**
     * Get plaNrorap
     *
     * @return integer 
     */
    public function getPlaNrorap()
    {
        return $this->plaNrorap;
    }

    /**
     * Set plaNombre
     *
     * @param string $plaNombre
     * @return Plancuen
     */
    public function setPlaNombre($plaNombre)
    {
        $this->plaNombre = $plaNombre;

        return $this;
    }

    /**
     * Get plaNombre
     *
     * @return string 
     */
    public function getPlaNombre()
    {
        return $this->plaNombre;
    }

    /**
     * Set plaNomcorto
     *
     * @param string $plaNomcorto
     * @return Plancuen
     */
    public function setPlaNomcorto($plaNomcorto)
    {
        $this->plaNomcorto = $plaNomcorto;

        return $this;
    }

    /**
     * Get plaNomcorto
     *
     * @return string 
     */
    public function getPlaNomcorto()
    {
        return $this->plaNomcorto;
    }

    /**
     * Set plaMadre
     *
     * @param string $plaMadre
     * @return Plancuen
     */
    public function setPlaMadre($plaMadre)
    {
        $this->plaMadre = $plaMadre;

        return $this;
    }

    /**
     * Get plaMadre
     *
     * @return string 
     */
    public function getPlaMadre()
    {
        return $this->plaMadre;
    }

    /**
     * Set plaAcumul
     *
     * @param string $plaAcumul
     * @return Plancuen
     */
    public function setPlaAcumul($plaAcumul)
    {
        $this->plaAcumul = $plaAcumul;

        return $this;
    }

    /**
     * Get plaAcumul
     *
     * @return string 
     */
    public function getPlaAcumul()
    {
        return $this->plaAcumul;
    }

    /**
     * Set plaColumn
     *
     * @param integer $plaColumn
     * @return Plancuen
     */
    public function setPlaColumn($plaColumn)
    {
        $this->plaColumn = $plaColumn;

        return $this;
    }

    /**
     * Get plaColumn
     *
     * @return integer 
     */
    public function getPlaColumn()
    {
        return $this->plaColumn;
    }

    /**
     * Set plaPosici
     *
     * @param integer $plaPosici
     * @return Plancuen
     */
    public function setPlaPosici($plaPosici)
    {
        $this->plaPosici = $plaPosici;

        return $this;
    }

    /**
     * Get plaPosici
     *
     * @return integer 
     */
    public function getPlaPosici()
    {
        return $this->plaPosici;
    }

    /**
     * Set plaImputa
     *
     * @param string $plaImputa
     * @return Plancuen
     */
    public function setPlaImputa($plaImputa)
    {
        $this->plaImputa = $plaImputa;

        return $this;
    }

    /**
     * Get plaImputa
     *
     * @return string 
     */
    public function getPlaImputa()
    {
        return $this->plaImputa;
    }

    /**
     * Set plaServicio
     *
     * @param string $plaServicio
     * @return Plancuen
     */
    public function setPlaServicio($plaServicio)
    {
        $this->plaServicio = $plaServicio;

        return $this;
    }

    /**
     * Get plaServicio
     *
     * @return string 
     */
    public function getPlaServicio()
    {
        return $this->plaServicio;
    }

    /**
     * Set plaCategoria
     *
     * @param string $plaCategoria
     * @return Plancuen
     */
    public function setPlaCategoria($plaCategoria)
    {
        $this->plaCategoria = $plaCategoria;

        return $this;
    }

    /**
     * Get plaCategoria
     *
     * @return string 
     */
    public function getPlaCategoria()
    {
        return $this->plaCategoria;
    }

    /**
     * Set plaMarca
     *
     * @param string $plaMarca
     * @return Plancuen
     */
    public function setPlaMarca($plaMarca)
    {
        $this->plaMarca = $plaMarca;

        return $this;
    }

    /**
     * Get plaMarca
     *
     * @return string 
     */
    public function getPlaMarca()
    {
        return $this->plaMarca;
    }

    /**
     * Set plaCaja
     *
     * @param string $plaCaja
     * @return Plancuen
     */
    public function setPlaCaja($plaCaja)
    {
        $this->plaCaja = $plaCaja;

        return $this;
    }

    /**
     * Get plaCaja
     *
     * @return string 
     */
    public function getPlaCaja()
    {
        return $this->plaCaja;
    }

    /**
     * Set plaDesagrega
     *
     * @param string $plaDesagrega
     * @return Plancuen
     */
    public function setPlaDesagrega($plaDesagrega)
    {
        $this->plaDesagrega = $plaDesagrega;

        return $this;
    }

    /**
     * Get plaDesagrega
     *
     * @return string 
     */
    public function getPlaDesagrega()
    {
        return $this->plaDesagrega;
    }

    /**
     * Set plaCuotas
     *
     * @param string $plaCuotas
     * @return Plancuen
     */
    public function setPlaCuotas($plaCuotas)
    {
        $this->plaCuotas = $plaCuotas;

        return $this;
    }

    /**
     * Get plaCuotas
     *
     * @return string 
     */
    public function getPlaCuotas()
    {
        return $this->plaCuotas;
    }

    /**
     * Set plaSubcta
     *
     * @param string $plaSubcta
     * @return Plancuen
     */
    public function setPlaSubcta($plaSubcta)
    {
        $this->plaSubcta = $plaSubcta;

        return $this;
    }

    /**
     * Get plaSubcta
     *
     * @return string 
     */
    public function getPlaSubcta()
    {
        return $this->plaSubcta;
    }

    /**
     * Set plaRefund
     *
     * @param string $plaRefund
     * @return Plancuen
     */
    public function setPlaRefund($plaRefund)
    {
        $this->plaRefund = $plaRefund;

        return $this;
    }

    /**
     * Get plaRefund
     *
     * @return string 
     */
    public function getPlaRefund()
    {
        return $this->plaRefund;
    }

    /**
     * Set plaMoneda
     *
     * @param string $plaMoneda
     * @return Plancuen
     */
    public function setPlaMoneda($plaMoneda)
    {
        $this->plaMoneda = $plaMoneda;

        return $this;
    }

    /**
     * Get plaMoneda
     *
     * @return string 
     */
    public function getPlaMoneda()
    {
        return $this->plaMoneda;
    }

    /**
     * Set plaCajachica
     *
     * @param string $plaCajachica
     * @return Plancuen
     */
    public function setPlaCajachica($plaCajachica)
    {
        $this->plaCajachica = $plaCajachica;

        return $this;
    }

    /**
     * Get plaCajachica
     *
     * @return string 
     */
    public function getPlaCajachica()
    {
        return $this->plaCajachica;
    }

    /**
     * Set plaFecha
     *
     * @param \DateTime $plaFecha
     * @return Plancuen
     */
    public function setPlaFecha($plaFecha)
    {
        $this->plaFecha = $plaFecha;

        return $this;
    }

    /**
     * Get plaFecha
     *
     * @return \DateTime 
     */
    public function getPlaFecha()
    {
        return $this->plaFecha;
    }

    /**
     * Set plaLote
     *
     * @param integer $plaLote
     * @return Plancuen
     */
    public function setPlaLote($plaLote)
    {
        $this->plaLote = $plaLote;

        return $this;
    }

    /**
     * Get plaLote
     *
     * @return integer 
     */
    public function getPlaLote()
    {
        return $this->plaLote;
    }

    /**
     * Set plaHora
     *
     * @param string $plaHora
     * @return Plancuen
     */
    public function setPlaHora($plaHora)
    {
        $this->plaHora = $plaHora;

        return $this;
    }

    /**
     * Get plaHora
     *
     * @return string 
     */
    public function getPlaHora()
    {
        return $this->plaHora;
    }

    /**
     * Set plaDebeanterior
     *
     * @param string $plaDebeanterior
     * @return Plancuen
     */
    public function setPlaDebeanterior($plaDebeanterior)
    {
        $this->plaDebeanterior = $plaDebeanterior;

        return $this;
    }

    /**
     * Get plaDebeanterior
     *
     * @return string 
     */
    public function getPlaDebeanterior()
    {
        return $this->plaDebeanterior;
    }

    /**
     * Set plaHaberanterior
     *
     * @param string $plaHaberanterior
     * @return Plancuen
     */
    public function setPlaHaberanterior($plaHaberanterior)
    {
        $this->plaHaberanterior = $plaHaberanterior;

        return $this;
    }

    /**
     * Get plaHaberanterior
     *
     * @return string 
     */
    public function getPlaHaberanterior()
    {
        return $this->plaHaberanterior;
    }

    /**
     * Set plaDebe
     *
     * @param string $plaDebe
     * @return Plancuen
     */
    public function setPlaDebe($plaDebe)
    {
        $this->plaDebe = $plaDebe;

        return $this;
    }

    /**
     * Get plaDebe
     *
     * @return string 
     */
    public function getPlaDebe()
    {
        return $this->plaDebe;
    }

    /**
     * Set plaHaber
     *
     * @param string $plaHaber
     * @return Plancuen
     */
    public function setPlaHaber($plaHaber)
    {
        $this->plaHaber = $plaHaber;

        return $this;
    }

    /**
     * Get plaHaber
     *
     * @return string 
     */
    public function getPlaHaber()
    {
        return $this->plaHaber;
    }

    /**
     * Set plaCoddebito
     *
     * @param integer $plaCoddebito
     * @return Plancuen
     */
    public function setPlaCoddebito($plaCoddebito)
    {
        $this->plaCoddebito = $plaCoddebito;

        return $this;
    }

    /**
     * Get plaCoddebito
     *
     * @return integer 
     */
    public function getPlaCoddebito()
    {
        return $this->plaCoddebito;
    }

    /**
     * Set plaDebito
     *
     * @param string $plaDebito
     * @return Plancuen
     */
    public function setPlaDebito($plaDebito)
    {
        $this->plaDebito = $plaDebito;

        return $this;
    }

    /**
     * Get plaDebito
     *
     * @return string 
     */
    public function getPlaDebito()
    {
        return $this->plaDebito;
    }

    /**
     * Set plaMuestraweb
     *
     * @param boolean $plaMuestraweb
     * @return Plancuen
     */
    public function setPlaMuestraweb($plaMuestraweb)
    {
        $this->plaMuestraweb = $plaMuestraweb;

        return $this;
    }

    /**
     * Get plaMuestraweb
     *
     * @return boolean 
     */
    public function getPlaMuestraweb()
    {
        return $this->plaMuestraweb;
    }

    /**
     * Set plaPermitewebimprimir
     *
     * @param boolean $plaPermitewebimprimir
     * @return Plancuen
     */
    public function setPlaPermitewebimprimir($plaPermitewebimprimir)
    {
        $this->plaPermitewebimprimir = $plaPermitewebimprimir;

        return $this;
    }

    /**
     * Get plaPermitewebimprimir
     *
     * @return boolean 
     */
    public function getPlaPermitewebimprimir()
    {
        return $this->plaPermitewebimprimir;
    }

    /**
     * Get plaNropla
     *
     * @return string 
     */
    public function getPlaNropla()
    {
        return $this->plaNropla;
    }
}