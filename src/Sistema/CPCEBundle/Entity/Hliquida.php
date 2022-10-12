<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hliquida
 *
 * @ORM\Table(name="hliquida")
 * @ORM\Entity
 */
class Hliquida
{
    /**
     * @var float
     *
     * @ORM\Column(name="LIQ_NUMERO", type="float", precision=24, scale=0, nullable=false)
     */
    private $liqNumero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_LIQ", type="datetime", nullable=false)
     */
    private $fechaLiq;

    /**
     * @var integer
     *
     * @ORM\Column(name="MATRICULA", type="integer", nullable=false)
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="PROFESIONA", type="string", length=30, nullable=false)
     */
    private $profesiona;

    /**
     * @var string
     *
     * @ORM\Column(name="GANANCIA", type="string", length=3, nullable=true)
     */
    private $ganancia;

    /**
     * @var string
     *
     * @ORM\Column(name="COMITENTE", type="string", length=100, nullable=true)
     */
    private $comitente;

    /**
     * @var string
     *
     * @ORM\Column(name="TRABNRO", type="string", length=20, nullable=true)
     */
    private $trabnro;

    /**
     * @var string
     *
     * @ORM\Column(name="TRABDESC", type="string", length=200, nullable=true)
     */
    private $trabdesc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BCO_FECHA", type="datetime", nullable=false)
     */
    private $bcoFecha;

    /**
     * @var float
     *
     * @ORM\Column(name="BCO_IMPORT", type="float", precision=12, scale=2, nullable=false)
     */
    private $bcoImport;

    /**
     * @var float
     *
     * @ORM\Column(name="BCO_NUMERO", type="float", precision=12, scale=2, nullable=false)
     */
    private $bcoNumero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="REC_FECHA", type="datetime", nullable=false)
     */
    private $recFecha;

    /**
     * @var float
     *
     * @ORM\Column(name="REC_IMPORT", type="float", precision=12, scale=2, nullable=false)
     */
    private $recImport;

    /**
     * @var float
     *
     * @ORM\Column(name="REC_NUMERO", type="float", precision=12, scale=2, nullable=false)
     */
    private $recNumero;

    /**
     * @var float
     *
     * @ORM\Column(name="REC_MONTO", type="float", precision=12, scale=2, nullable=false)
     */
    private $recMonto;

    /**
     * @var float
     *
     * @ORM\Column(name="REC_IVA", type="float", precision=12, scale=2, nullable=false)
     */
    private $recIva;

    /**
     * @var string
     *
     * @ORM\Column(name="BANCO", type="string", length=3, nullable=false)
     */
    private $banco;

    /**
     * @var float
     *
     * @ORM\Column(name="HC", type="float", precision=12, scale=2, nullable=false)
     */
    private $hc;

    /**
     * @var string
     *
     * @ORM\Column(name="BONIFICA", type="string", length=3, nullable=false)
     */
    private $bonifica;

    /**
     * @var float
     *
     * @ORM\Column(name="HC_NETO", type="float", precision=12, scale=2, nullable=false)
     */
    private $hcNeto;

    /**
     * @var float
     *
     * @ORM\Column(name="IDTAREA", type="float", precision=12, scale=2, nullable=false)
     */
    private $idtarea;

    /**
     * @var float
     *
     * @ORM\Column(name="TOTALBC", type="float", precision=12, scale=2, nullable=false)
     */
    private $totalbc;

    /**
     * @var float
     *
     * @ORM\Column(name="C141SOBRE", type="float", precision=12, scale=2, nullable=false)
     */
    private $c141sobre;

    /**
     * @var float
     *
     * @ORM\Column(name="C141PORC", type="float", precision=12, scale=2, nullable=false)
     */
    private $c141porc;

    /**
     * @var float
     *
     * @ORM\Column(name="C141MONTO", type="float", precision=12, scale=2, nullable=false)
     */
    private $c141monto;

    /**
     * @var float
     *
     * @ORM\Column(name="C142SOBRE", type="float", precision=12, scale=2, nullable=false)
     */
    private $c142sobre;

    /**
     * @var float
     *
     * @ORM\Column(name="C142PORC", type="float", precision=12, scale=2, nullable=false)
     */
    private $c142porc;

    /**
     * @var float
     *
     * @ORM\Column(name="C142MONTO", type="float", precision=12, scale=2, nullable=false)
     */
    private $c142monto;

    /**
     * @var float
     *
     * @ORM\Column(name="C143SOBRE", type="float", precision=12, scale=2, nullable=false)
     */
    private $c143sobre;

    /**
     * @var float
     *
     * @ORM\Column(name="C143PORC", type="float", precision=12, scale=2, nullable=false)
     */
    private $c143porc;

    /**
     * @var float
     *
     * @ORM\Column(name="C143MONTO", type="float", precision=12, scale=2, nullable=false)
     */
    private $c143monto;

    /**
     * @var float
     *
     * @ORM\Column(name="C144SOBRE", type="float", precision=12, scale=2, nullable=false)
     */
    private $c144sobre;

    /**
     * @var float
     *
     * @ORM\Column(name="C144PORC", type="float", precision=12, scale=2, nullable=false)
     */
    private $c144porc;

    /**
     * @var float
     *
     * @ORM\Column(name="C144MONTO", type="float", precision=12, scale=2, nullable=false)
     */
    private $c144monto;

    /**
     * @var float
     *
     * @ORM\Column(name="REINTPEN", type="float", precision=12, scale=2, nullable=false)
     */
    private $reintpen;

    /**
     * @var float
     *
     * @ORM\Column(name="ASI_BCO", type="float", precision=12, scale=0, nullable=true)
     */
    private $asiBco;

    /**
     * @var float
     *
     * @ORM\Column(name="PORCRED", type="float", precision=12, scale=2, nullable=false)
     */
    private $porcred;

    /**
     * @var float
     *
     * @ORM\Column(name="OP_ASIENTO", type="float", precision=12, scale=0, nullable=true)
     */
    private $opAsiento;

    /**
     * @var string
     *
     * @ORM\Column(name="CHEQUE", type="string", length=12, nullable=true)
     */
    private $cheque;

    /**
     * @var float
     *
     * @ORM\Column(name="GASTO", type="float", precision=12, scale=2, nullable=true)
     */
    private $gasto;

    /**
     * @var float
     *
     * @ORM\Column(name="ASIENTO", type="float")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $asiento;



    /**
     * Set liqNumero
     *
     * @param float $liqNumero
     * @return Hliquida
     */
    public function setLiqNumero($liqNumero)
    {
        $this->liqNumero = $liqNumero;

        return $this;
    }

    /**
     * Get liqNumero
     *
     * @return float 
     */
    public function getLiqNumero()
    {
        return $this->liqNumero;
    }

    /**
     * Set fechaLiq
     *
     * @param \DateTime $fechaLiq
     * @return Hliquida
     */
    public function setFechaLiq($fechaLiq)
    {
        $this->fechaLiq = $fechaLiq;

        return $this;
    }

    /**
     * Get fechaLiq
     *
     * @return \DateTime 
     */
    public function getFechaLiq()
    {
        return $this->fechaLiq;
    }

    /**
     * Set matricula
     *
     * @param integer $matricula
     * @return Hliquida
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

    /**
     * Set profesiona
     *
     * @param string $profesiona
     * @return Hliquida
     */
    public function setProfesiona($profesiona)
    {
        $this->profesiona = $profesiona;

        return $this;
    }

    /**
     * Get profesiona
     *
     * @return string 
     */
    public function getProfesiona()
    {
        return $this->profesiona;
    }

    /**
     * Set ganancia
     *
     * @param string $ganancia
     * @return Hliquida
     */
    public function setGanancia($ganancia)
    {
        $this->ganancia = $ganancia;

        return $this;
    }

    /**
     * Get ganancia
     *
     * @return string 
     */
    public function getGanancia()
    {
        return $this->ganancia;
    }

    /**
     * Set comitente
     *
     * @param string $comitente
     * @return Hliquida
     */
    public function setComitente($comitente)
    {
        $this->comitente = $comitente;

        return $this;
    }

    /**
     * Get comitente
     *
     * @return string 
     */
    public function getComitente()
    {
        return $this->comitente;
    }

    /**
     * Set trabnro
     *
     * @param string $trabnro
     * @return Hliquida
     */
    public function setTrabnro($trabnro)
    {
        $this->trabnro = $trabnro;

        return $this;
    }

    /**
     * Get trabnro
     *
     * @return string 
     */
    public function getTrabnro()
    {
        return $this->trabnro;
    }

    /**
     * Set trabdesc
     *
     * @param string $trabdesc
     * @return Hliquida
     */
    public function setTrabdesc($trabdesc)
    {
        $this->trabdesc = $trabdesc;

        return $this;
    }

    /**
     * Get trabdesc
     *
     * @return string 
     */
    public function getTrabdesc()
    {
        return $this->trabdesc;
    }

    /**
     * Set bcoFecha
     *
     * @param \DateTime $bcoFecha
     * @return Hliquida
     */
    public function setBcoFecha($bcoFecha)
    {
        $this->bcoFecha = $bcoFecha;

        return $this;
    }

    /**
     * Get bcoFecha
     *
     * @return \DateTime 
     */
    public function getBcoFecha()
    {
        return $this->bcoFecha;
    }

    /**
     * Set bcoImport
     *
     * @param float $bcoImport
     * @return Hliquida
     */
    public function setBcoImport($bcoImport)
    {
        $this->bcoImport = $bcoImport;

        return $this;
    }

    /**
     * Get bcoImport
     *
     * @return float 
     */
    public function getBcoImport()
    {
        return $this->bcoImport;
    }

    /**
     * Set bcoNumero
     *
     * @param float $bcoNumero
     * @return Hliquida
     */
    public function setBcoNumero($bcoNumero)
    {
        $this->bcoNumero = $bcoNumero;

        return $this;
    }

    /**
     * Get bcoNumero
     *
     * @return float 
     */
    public function getBcoNumero()
    {
        return $this->bcoNumero;
    }

    /**
     * Set recFecha
     *
     * @param \DateTime $recFecha
     * @return Hliquida
     */
    public function setRecFecha($recFecha)
    {
        $this->recFecha = $recFecha;

        return $this;
    }

    /**
     * Get recFecha
     *
     * @return \DateTime 
     */
    public function getRecFecha()
    {
        return $this->recFecha;
    }

    /**
     * Set recImport
     *
     * @param float $recImport
     * @return Hliquida
     */
    public function setRecImport($recImport)
    {
        $this->recImport = $recImport;

        return $this;
    }

    /**
     * Get recImport
     *
     * @return float 
     */
    public function getRecImport()
    {
        return $this->recImport;
    }

    /**
     * Set recNumero
     *
     * @param float $recNumero
     * @return Hliquida
     */
    public function setRecNumero($recNumero)
    {
        $this->recNumero = $recNumero;

        return $this;
    }

    /**
     * Get recNumero
     *
     * @return float 
     */
    public function getRecNumero()
    {
        return $this->recNumero;
    }

    /**
     * Set recMonto
     *
     * @param float $recMonto
     * @return Hliquida
     */
    public function setRecMonto($recMonto)
    {
        $this->recMonto = $recMonto;

        return $this;
    }

    /**
     * Get recMonto
     *
     * @return float 
     */
    public function getRecMonto()
    {
        return $this->recMonto;
    }

    /**
     * Set recIva
     *
     * @param float $recIva
     * @return Hliquida
     */
    public function setRecIva($recIva)
    {
        $this->recIva = $recIva;

        return $this;
    }

    /**
     * Get recIva
     *
     * @return float 
     */
    public function getRecIva()
    {
        return $this->recIva;
    }

    /**
     * Set banco
     *
     * @param string $banco
     * @return Hliquida
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
     * Set hc
     *
     * @param float $hc
     * @return Hliquida
     */
    public function setHc($hc)
    {
        $this->hc = $hc;

        return $this;
    }

    /**
     * Get hc
     *
     * @return float 
     */
    public function getHc()
    {
        return $this->hc;
    }

    /**
     * Set bonifica
     *
     * @param string $bonifica
     * @return Hliquida
     */
    public function setBonifica($bonifica)
    {
        $this->bonifica = $bonifica;

        return $this;
    }

    /**
     * Get bonifica
     *
     * @return string 
     */
    public function getBonifica()
    {
        return $this->bonifica;
    }

    /**
     * Set hcNeto
     *
     * @param float $hcNeto
     * @return Hliquida
     */
    public function setHcNeto($hcNeto)
    {
        $this->hcNeto = $hcNeto;

        return $this;
    }

    /**
     * Get hcNeto
     *
     * @return float 
     */
    public function getHcNeto()
    {
        return $this->hcNeto;
    }

    /**
     * Set idtarea
     *
     * @param float $idtarea
     * @return Hliquida
     */
    public function setIdtarea($idtarea)
    {
        $this->idtarea = $idtarea;

        return $this;
    }

    /**
     * Get idtarea
     *
     * @return float 
     */
    public function getIdtarea()
    {
        return $this->idtarea;
    }

    /**
     * Set totalbc
     *
     * @param float $totalbc
     * @return Hliquida
     */
    public function setTotalbc($totalbc)
    {
        $this->totalbc = $totalbc;

        return $this;
    }

    /**
     * Get totalbc
     *
     * @return float 
     */
    public function getTotalbc()
    {
        return $this->totalbc;
    }

    /**
     * Set c141sobre
     *
     * @param float $c141sobre
     * @return Hliquida
     */
    public function setC141sobre($c141sobre)
    {
        $this->c141sobre = $c141sobre;

        return $this;
    }

    /**
     * Get c141sobre
     *
     * @return float 
     */
    public function getC141sobre()
    {
        return $this->c141sobre;
    }

    /**
     * Set c141porc
     *
     * @param float $c141porc
     * @return Hliquida
     */
    public function setC141porc($c141porc)
    {
        $this->c141porc = $c141porc;

        return $this;
    }

    /**
     * Get c141porc
     *
     * @return float 
     */
    public function getC141porc()
    {
        return $this->c141porc;
    }

    /**
     * Set c141monto
     *
     * @param float $c141monto
     * @return Hliquida
     */
    public function setC141monto($c141monto)
    {
        $this->c141monto = $c141monto;

        return $this;
    }

    /**
     * Get c141monto
     *
     * @return float 
     */
    public function getC141monto()
    {
        return $this->c141monto;
    }

    /**
     * Set c142sobre
     *
     * @param float $c142sobre
     * @return Hliquida
     */
    public function setC142sobre($c142sobre)
    {
        $this->c142sobre = $c142sobre;

        return $this;
    }

    /**
     * Get c142sobre
     *
     * @return float 
     */
    public function getC142sobre()
    {
        return $this->c142sobre;
    }

    /**
     * Set c142porc
     *
     * @param float $c142porc
     * @return Hliquida
     */
    public function setC142porc($c142porc)
    {
        $this->c142porc = $c142porc;

        return $this;
    }

    /**
     * Get c142porc
     *
     * @return float 
     */
    public function getC142porc()
    {
        return $this->c142porc;
    }

    /**
     * Set c142monto
     *
     * @param float $c142monto
     * @return Hliquida
     */
    public function setC142monto($c142monto)
    {
        $this->c142monto = $c142monto;

        return $this;
    }

    /**
     * Get c142monto
     *
     * @return float 
     */
    public function getC142monto()
    {
        return $this->c142monto;
    }

    /**
     * Set c143sobre
     *
     * @param float $c143sobre
     * @return Hliquida
     */
    public function setC143sobre($c143sobre)
    {
        $this->c143sobre = $c143sobre;

        return $this;
    }

    /**
     * Get c143sobre
     *
     * @return float 
     */
    public function getC143sobre()
    {
        return $this->c143sobre;
    }

    /**
     * Set c143porc
     *
     * @param float $c143porc
     * @return Hliquida
     */
    public function setC143porc($c143porc)
    {
        $this->c143porc = $c143porc;

        return $this;
    }

    /**
     * Get c143porc
     *
     * @return float 
     */
    public function getC143porc()
    {
        return $this->c143porc;
    }

    /**
     * Set c143monto
     *
     * @param float $c143monto
     * @return Hliquida
     */
    public function setC143monto($c143monto)
    {
        $this->c143monto = $c143monto;

        return $this;
    }

    /**
     * Get c143monto
     *
     * @return float 
     */
    public function getC143monto()
    {
        return $this->c143monto;
    }

    /**
     * Set c144sobre
     *
     * @param float $c144sobre
     * @return Hliquida
     */
    public function setC144sobre($c144sobre)
    {
        $this->c144sobre = $c144sobre;

        return $this;
    }

    /**
     * Get c144sobre
     *
     * @return float 
     */
    public function getC144sobre()
    {
        return $this->c144sobre;
    }

    /**
     * Set c144porc
     *
     * @param float $c144porc
     * @return Hliquida
     */
    public function setC144porc($c144porc)
    {
        $this->c144porc = $c144porc;

        return $this;
    }

    /**
     * Get c144porc
     *
     * @return float 
     */
    public function getC144porc()
    {
        return $this->c144porc;
    }

    /**
     * Set c144monto
     *
     * @param float $c144monto
     * @return Hliquida
     */
    public function setC144monto($c144monto)
    {
        $this->c144monto = $c144monto;

        return $this;
    }

    /**
     * Get c144monto
     *
     * @return float 
     */
    public function getC144monto()
    {
        return $this->c144monto;
    }

    /**
     * Set reintpen
     *
     * @param float $reintpen
     * @return Hliquida
     */
    public function setReintpen($reintpen)
    {
        $this->reintpen = $reintpen;

        return $this;
    }

    /**
     * Get reintpen
     *
     * @return float 
     */
    public function getReintpen()
    {
        return $this->reintpen;
    }

    /**
     * Set asiBco
     *
     * @param float $asiBco
     * @return Hliquida
     */
    public function setAsiBco($asiBco)
    {
        $this->asiBco = $asiBco;

        return $this;
    }

    /**
     * Get asiBco
     *
     * @return float 
     */
    public function getAsiBco()
    {
        return $this->asiBco;
    }

    /**
     * Set porcred
     *
     * @param float $porcred
     * @return Hliquida
     */
    public function setPorcred($porcred)
    {
        $this->porcred = $porcred;

        return $this;
    }

    /**
     * Get porcred
     *
     * @return float 
     */
    public function getPorcred()
    {
        return $this->porcred;
    }

    /**
     * Set opAsiento
     *
     * @param float $opAsiento
     * @return Hliquida
     */
    public function setOpAsiento($opAsiento)
    {
        $this->opAsiento = $opAsiento;

        return $this;
    }

    /**
     * Get opAsiento
     *
     * @return float 
     */
    public function getOpAsiento()
    {
        return $this->opAsiento;
    }

    /**
     * Set cheque
     *
     * @param string $cheque
     * @return Hliquida
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
     * Set gasto
     *
     * @param float $gasto
     * @return Hliquida
     */
    public function setGasto($gasto)
    {
        $this->gasto = $gasto;

        return $this;
    }

    /**
     * Get gasto
     *
     * @return float 
     */
    public function getGasto()
    {
        return $this->gasto;
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
}
