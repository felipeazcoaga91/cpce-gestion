<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Procetote
 *
 * @ORM\Table(name="procetote")
 * @ORM\Entity
 */
class Procetote
{
    /**
     * @var string
     *
     * @ORM\Column(name="pto_nropla", type="string", length=9, nullable=false)
     */
    private $ptoNropla;

    /**
     * @var string
     *
     * @ORM\Column(name="pto_tipmov", type="string", length=1, nullable=false)
     */
    private $ptoTipmov;

    /**
     * @var float
     *
     * @ORM\Column(name="pto_debe", type="float", precision=12, scale=2, nullable=false)
     */
    private $ptoDebe;

    /**
     * @var float
     *
     * @ORM\Column(name="pto_haber", type="float", precision=12, scale=2, nullable=false)
     */
    private $ptoHaber;

    /**
     * @var string
     *
     * @ORM\Column(name="pto_tabla", type="string", length=15, nullable=false)
     */
    private $ptoTabla;

    /**
     * @var string
     *
     * @ORM\Column(name="pto_campo", type="string", length=20, nullable=false)
     */
    private $ptoCampo;

    /**
     * @var string
     *
     * @ORM\Column(name="pto_tipcam", type="string", length=1, nullable=false)
     */
    private $ptoTipcam;

    /**
     * @var float
     *
     * @ORM\Column(name="pto_valor", type="float", precision=12, scale=2, nullable=false)
     */
    private $ptoValor;

    /**
     * @var string
     *
     * @ORM\Column(name="pto_formula", type="string", length=120, nullable=false)
     */
    private $ptoFormula;

    /**
     * @var integer
     *
     * @ORM\Column(name="pto_lote", type="bigint", nullable=false)
     */
    private $ptoLote;

    /**
     * @var string
     *
     * @ORM\Column(name="pto_codpro", type="string", length=6)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ptoCodpro;

    /**
     * @var integer
     *
     * @ORM\Column(name="pto_item", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ptoItem;



    /**
     * Set ptoNropla
     *
     * @param string $ptoNropla
     * @return Procetote
     */
    public function setPtoNropla($ptoNropla)
    {
        $this->ptoNropla = $ptoNropla;

        return $this;
    }

    /**
     * Get ptoNropla
     *
     * @return string 
     */
    public function getPtoNropla()
    {
        return $this->ptoNropla;
    }

    /**
     * Set ptoTipmov
     *
     * @param string $ptoTipmov
     * @return Procetote
     */
    public function setPtoTipmov($ptoTipmov)
    {
        $this->ptoTipmov = $ptoTipmov;

        return $this;
    }

    /**
     * Get ptoTipmov
     *
     * @return string 
     */
    public function getPtoTipmov()
    {
        return $this->ptoTipmov;
    }

    /**
     * Set ptoDebe
     *
     * @param float $ptoDebe
     * @return Procetote
     */
    public function setPtoDebe($ptoDebe)
    {
        $this->ptoDebe = $ptoDebe;

        return $this;
    }

    /**
     * Get ptoDebe
     *
     * @return float 
     */
    public function getPtoDebe()
    {
        return $this->ptoDebe;
    }

    /**
     * Set ptoHaber
     *
     * @param float $ptoHaber
     * @return Procetote
     */
    public function setPtoHaber($ptoHaber)
    {
        $this->ptoHaber = $ptoHaber;

        return $this;
    }

    /**
     * Get ptoHaber
     *
     * @return float 
     */
    public function getPtoHaber()
    {
        return $this->ptoHaber;
    }

    /**
     * Set ptoTabla
     *
     * @param string $ptoTabla
     * @return Procetote
     */
    public function setPtoTabla($ptoTabla)
    {
        $this->ptoTabla = $ptoTabla;

        return $this;
    }

    /**
     * Get ptoTabla
     *
     * @return string 
     */
    public function getPtoTabla()
    {
        return $this->ptoTabla;
    }

    /**
     * Set ptoCampo
     *
     * @param string $ptoCampo
     * @return Procetote
     */
    public function setPtoCampo($ptoCampo)
    {
        $this->ptoCampo = $ptoCampo;

        return $this;
    }

    /**
     * Get ptoCampo
     *
     * @return string 
     */
    public function getPtoCampo()
    {
        return $this->ptoCampo;
    }

    /**
     * Set ptoTipcam
     *
     * @param string $ptoTipcam
     * @return Procetote
     */
    public function setPtoTipcam($ptoTipcam)
    {
        $this->ptoTipcam = $ptoTipcam;

        return $this;
    }

    /**
     * Get ptoTipcam
     *
     * @return string 
     */
    public function getPtoTipcam()
    {
        return $this->ptoTipcam;
    }

    /**
     * Set ptoValor
     *
     * @param float $ptoValor
     * @return Procetote
     */
    public function setPtoValor($ptoValor)
    {
        $this->ptoValor = $ptoValor;

        return $this;
    }

    /**
     * Get ptoValor
     *
     * @return float 
     */
    public function getPtoValor()
    {
        return $this->ptoValor;
    }

    /**
     * Set ptoFormula
     *
     * @param string $ptoFormula
     * @return Procetote
     */
    public function setPtoFormula($ptoFormula)
    {
        $this->ptoFormula = $ptoFormula;

        return $this;
    }

    /**
     * Get ptoFormula
     *
     * @return string 
     */
    public function getPtoFormula()
    {
        return $this->ptoFormula;
    }

    /**
     * Set ptoLote
     *
     * @param integer $ptoLote
     * @return Procetote
     */
    public function setPtoLote($ptoLote)
    {
        $this->ptoLote = $ptoLote;

        return $this;
    }

    /**
     * Get ptoLote
     *
     * @return integer 
     */
    public function getPtoLote()
    {
        return $this->ptoLote;
    }

    /**
     * Set ptoCodpro
     *
     * @param string $ptoCodpro
     * @return Procetote
     */
    public function setPtoCodpro($ptoCodpro)
    {
        $this->ptoCodpro = $ptoCodpro;

        return $this;
    }

    /**
     * Get ptoCodpro
     *
     * @return string 
     */
    public function getPtoCodpro()
    {
        return $this->ptoCodpro;
    }

    /**
     * Set ptoItem
     *
     * @param integer $ptoItem
     * @return Procetote
     */
    public function setPtoItem($ptoItem)
    {
        $this->ptoItem = $ptoItem;

        return $this;
    }

    /**
     * Get ptoItem
     *
     * @return integer 
     */
    public function getPtoItem()
    {
        return $this->ptoItem;
    }
}
