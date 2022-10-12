<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Farcat
 *
 * @ORM\Table(name="farcat")
 * @ORM\Entity
 */
class Farcat
{
    /**
     * @var string
     *
     * @ORM\Column(name="far_activo", type="string", length=1, nullable=false)
     */
    private $farActivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="far_nrofar", type="integer", nullable=false)
     */
    private $farNrofar;

    /**
     * @var string
     *
     * @ORM\Column(name="far_nombre", type="string", length=40, nullable=false)
     */
    private $farNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="far_sucursal", type="string", length=30, nullable=false)
     */
    private $farSucursal;

    /**
     * @var string
     *
     * @ORM\Column(name="far_controlador", type="string", length=60, nullable=false)
     */
    private $farControlador;

    /**
     * @var string
     *
     * @ORM\Column(name="far_server", type="string", length=15, nullable=false)
     */
    private $farServer;

    /**
     * @var string
     *
     * @ORM\Column(name="far_usuario", type="string", length=15, nullable=false)
     */
    private $farUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="far_password", type="string", length=15, nullable=false)
     */
    private $farPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="far_basedatos", type="string", length=15, nullable=false)
     */
    private $farBasedatos;

    /**
     * @var string
     *
     * @ORM\Column(name="far_tipred", type="string", length=1, nullable=false)
     */
    private $farTipred;

    /**
     * @var string
     *
     * @ORM\Column(name="far_propia", type="string", length=1, nullable=false)
     */
    private $farPropia;

    /**
     * @var string
     *
     * @ORM\Column(name="far_margen", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $farMargen;

    /**
     * @var string
     *
     * @ORM\Column(name="far_raiz", type="string", length=60, nullable=false)
     */
    private $farRaiz;

    /**
     * @var string
     *
     * @ORM\Column(name="far_lugbak", type="string", length=60, nullable=false)
     */
    private $farLugbak;

    /**
     * @var integer
     *
     * @ORM\Column(name="far_lote", type="integer", nullable=false)
     */
    private $farLote;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="far_fecha", type="date", nullable=true)
     */
    private $farFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="far_hora", type="string", length=8, nullable=false)
     */
    private $farHora;

    /**
     * @var string
     *
     * @ORM\Column(name="far_estado", type="string", length=1, nullable=false)
     */
    private $farEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="far_errore", type="string", length=80, nullable=false)
     */
    private $farErrore;

    /**
     * @var integer
     *
     * @ORM\Column(name="far_codpos", type="integer", nullable=false)
     */
    private $farCodpos;

    /**
     * @var string
     *
     * @ORM\Column(name="far_coment", type="string", length=58, nullable=false)
     */
    private $farComent;

    /**
     * @var string
     *
     * @ORM\Column(name="far_tipoiva", type="string", length=2, nullable=false)
     */
    private $farTipoiva;

    /**
     * @var float
     *
     * @ORM\Column(name="far_porceiva", type="float", precision=5, scale=2, nullable=false)
     */
    private $farPorceiva;

    /**
     * @var string
     *
     * @ORM\Column(name="far_nrocui", type="string", length=13, nullable=false)
     */
    private $farNrocui;

    /**
     * @var string
     *
     * @ORM\Column(name="far_dgr", type="string", length=20, nullable=false)
     */
    private $farDgr;

    /**
     * @var string
     *
     * @ORM\Column(name="far_gan", type="string", length=20, nullable=false)
     */
    private $farGan;

    /**
     * @var string
     *
     * @ORM\Column(name="far_provin", type="string", length=20, nullable=false)
     */
    private $farProvin;

    /**
     * @var string
     *
     * @ORM\Column(name="far_locali", type="string", length=20, nullable=false)
     */
    private $farLocali;

    /**
     * @var string
     *
     * @ORM\Column(name="far_direcc", type="string", length=30, nullable=false)
     */
    private $farDirecc;

    /**
     * @var string
     *
     * @ORM\Column(name="far_telefo", type="string", length=30, nullable=false)
     */
    private $farTelefo;

    /**
     * @var string
     *
     * @ORM\Column(name="far_tope", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $farTope;

    /**
     * @var string
     *
     * @ORM\Column(name="far_cancuo", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $farCancuo;

    /**
     * @var integer
     *
     * @ORM\Column(name="far_atrazo", type="integer", nullable=false)
     */
    private $farAtrazo;

    /**
     * @var string
     *
     * @ORM\Column(name="far_impres", type="string", length=1, nullable=false)
     */
    private $farImpres;

    /**
     * @var string
     *
     * @ORM\Column(name="far_imcola", type="string", length=15, nullable=false)
     */
    private $farImcola;

    /**
     * @var string
     *
     * @ORM\Column(name="far_intere", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $farIntere;

    /**
     * @var string
     *
     * @ORM\Column(name="far_bonpe1", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $farBonpe1;

    /**
     * @var string
     *
     * @ORM\Column(name="far_bonpe2", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $farBonpe2;

    /**
     * @var string
     *
     * @ORM\Column(name="far_bonpe3", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $farBonpe3;

    /**
     * @var string
     *
     * @ORM\Column(name="far_tipimp", type="string", length=1, nullable=false)
     */
    private $farTipimp;

    /**
     * @var integer
     *
     * @ORM\Column(name="far_inventario", type="integer", nullable=true)
     */
    private $farInventario;

    /**
     * @var string
     *
     * @ORM\Column(name="far_connect", type="string", length=150, nullable=true)
     */
    private $farConnect;

    /**
     * @var float
     *
     * @ORM\Column(name="far_idmsjImed", type="float", precision=6, scale=0, nullable=false)
     */
    private $farIdmsjimed;

    /**
     * @var string
     *
     * @ORM\Column(name="far_convdefault", type="string", length=8, nullable=false)
     */
    private $farConvdefault;

    /**
     * @var integer
     *
     * @ORM\Column(name="far_unegos", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $farUnegos;

    /**
     * @var integer
     *
     * @ORM\Column(name="far_nrocli", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $farNrocli;



    /**
     * Set farActivo
     *
     * @param string $farActivo
     * @return Farcat
     */
    public function setFarActivo($farActivo)
    {
        $this->farActivo = $farActivo;

        return $this;
    }

    /**
     * Get farActivo
     *
     * @return string 
     */
    public function getFarActivo()
    {
        return $this->farActivo;
    }

    /**
     * Set farNrofar
     *
     * @param integer $farNrofar
     * @return Farcat
     */
    public function setFarNrofar($farNrofar)
    {
        $this->farNrofar = $farNrofar;

        return $this;
    }

    /**
     * Get farNrofar
     *
     * @return integer 
     */
    public function getFarNrofar()
    {
        return $this->farNrofar;
    }

    /**
     * Set farNombre
     *
     * @param string $farNombre
     * @return Farcat
     */
    public function setFarNombre($farNombre)
    {
        $this->farNombre = $farNombre;

        return $this;
    }

    /**
     * Get farNombre
     *
     * @return string 
     */
    public function getFarNombre()
    {
        return $this->farNombre;
    }

    /**
     * Set farSucursal
     *
     * @param string $farSucursal
     * @return Farcat
     */
    public function setFarSucursal($farSucursal)
    {
        $this->farSucursal = $farSucursal;

        return $this;
    }

    /**
     * Get farSucursal
     *
     * @return string 
     */
    public function getFarSucursal()
    {
        return $this->farSucursal;
    }

    /**
     * Set farControlador
     *
     * @param string $farControlador
     * @return Farcat
     */
    public function setFarControlador($farControlador)
    {
        $this->farControlador = $farControlador;

        return $this;
    }

    /**
     * Get farControlador
     *
     * @return string 
     */
    public function getFarControlador()
    {
        return $this->farControlador;
    }

    /**
     * Set farServer
     *
     * @param string $farServer
     * @return Farcat
     */
    public function setFarServer($farServer)
    {
        $this->farServer = $farServer;

        return $this;
    }

    /**
     * Get farServer
     *
     * @return string 
     */
    public function getFarServer()
    {
        return $this->farServer;
    }

    /**
     * Set farUsuario
     *
     * @param string $farUsuario
     * @return Farcat
     */
    public function setFarUsuario($farUsuario)
    {
        $this->farUsuario = $farUsuario;

        return $this;
    }

    /**
     * Get farUsuario
     *
     * @return string 
     */
    public function getFarUsuario()
    {
        return $this->farUsuario;
    }

    /**
     * Set farPassword
     *
     * @param string $farPassword
     * @return Farcat
     */
    public function setFarPassword($farPassword)
    {
        $this->farPassword = $farPassword;

        return $this;
    }

    /**
     * Get farPassword
     *
     * @return string 
     */
    public function getFarPassword()
    {
        return $this->farPassword;
    }

    /**
     * Set farBasedatos
     *
     * @param string $farBasedatos
     * @return Farcat
     */
    public function setFarBasedatos($farBasedatos)
    {
        $this->farBasedatos = $farBasedatos;

        return $this;
    }

    /**
     * Get farBasedatos
     *
     * @return string 
     */
    public function getFarBasedatos()
    {
        return $this->farBasedatos;
    }

    /**
     * Set farTipred
     *
     * @param string $farTipred
     * @return Farcat
     */
    public function setFarTipred($farTipred)
    {
        $this->farTipred = $farTipred;

        return $this;
    }

    /**
     * Get farTipred
     *
     * @return string 
     */
    public function getFarTipred()
    {
        return $this->farTipred;
    }

    /**
     * Set farPropia
     *
     * @param string $farPropia
     * @return Farcat
     */
    public function setFarPropia($farPropia)
    {
        $this->farPropia = $farPropia;

        return $this;
    }

    /**
     * Get farPropia
     *
     * @return string 
     */
    public function getFarPropia()
    {
        return $this->farPropia;
    }

    /**
     * Set farMargen
     *
     * @param string $farMargen
     * @return Farcat
     */
    public function setFarMargen($farMargen)
    {
        $this->farMargen = $farMargen;

        return $this;
    }

    /**
     * Get farMargen
     *
     * @return string 
     */
    public function getFarMargen()
    {
        return $this->farMargen;
    }

    /**
     * Set farRaiz
     *
     * @param string $farRaiz
     * @return Farcat
     */
    public function setFarRaiz($farRaiz)
    {
        $this->farRaiz = $farRaiz;

        return $this;
    }

    /**
     * Get farRaiz
     *
     * @return string 
     */
    public function getFarRaiz()
    {
        return $this->farRaiz;
    }

    /**
     * Set farLugbak
     *
     * @param string $farLugbak
     * @return Farcat
     */
    public function setFarLugbak($farLugbak)
    {
        $this->farLugbak = $farLugbak;

        return $this;
    }

    /**
     * Get farLugbak
     *
     * @return string 
     */
    public function getFarLugbak()
    {
        return $this->farLugbak;
    }

    /**
     * Set farLote
     *
     * @param integer $farLote
     * @return Farcat
     */
    public function setFarLote($farLote)
    {
        $this->farLote = $farLote;

        return $this;
    }

    /**
     * Get farLote
     *
     * @return integer 
     */
    public function getFarLote()
    {
        return $this->farLote;
    }

    /**
     * Set farFecha
     *
     * @param \DateTime $farFecha
     * @return Farcat
     */
    public function setFarFecha($farFecha)
    {
        $this->farFecha = $farFecha;

        return $this;
    }

    /**
     * Get farFecha
     *
     * @return \DateTime 
     */
    public function getFarFecha()
    {
        return $this->farFecha;
    }

    /**
     * Set farHora
     *
     * @param string $farHora
     * @return Farcat
     */
    public function setFarHora($farHora)
    {
        $this->farHora = $farHora;

        return $this;
    }

    /**
     * Get farHora
     *
     * @return string 
     */
    public function getFarHora()
    {
        return $this->farHora;
    }

    /**
     * Set farEstado
     *
     * @param string $farEstado
     * @return Farcat
     */
    public function setFarEstado($farEstado)
    {
        $this->farEstado = $farEstado;

        return $this;
    }

    /**
     * Get farEstado
     *
     * @return string 
     */
    public function getFarEstado()
    {
        return $this->farEstado;
    }

    /**
     * Set farErrore
     *
     * @param string $farErrore
     * @return Farcat
     */
    public function setFarErrore($farErrore)
    {
        $this->farErrore = $farErrore;

        return $this;
    }

    /**
     * Get farErrore
     *
     * @return string 
     */
    public function getFarErrore()
    {
        return $this->farErrore;
    }

    /**
     * Set farCodpos
     *
     * @param integer $farCodpos
     * @return Farcat
     */
    public function setFarCodpos($farCodpos)
    {
        $this->farCodpos = $farCodpos;

        return $this;
    }

    /**
     * Get farCodpos
     *
     * @return integer 
     */
    public function getFarCodpos()
    {
        return $this->farCodpos;
    }

    /**
     * Set farComent
     *
     * @param string $farComent
     * @return Farcat
     */
    public function setFarComent($farComent)
    {
        $this->farComent = $farComent;

        return $this;
    }

    /**
     * Get farComent
     *
     * @return string 
     */
    public function getFarComent()
    {
        return $this->farComent;
    }

    /**
     * Set farTipoiva
     *
     * @param string $farTipoiva
     * @return Farcat
     */
    public function setFarTipoiva($farTipoiva)
    {
        $this->farTipoiva = $farTipoiva;

        return $this;
    }

    /**
     * Get farTipoiva
     *
     * @return string 
     */
    public function getFarTipoiva()
    {
        return $this->farTipoiva;
    }

    /**
     * Set farPorceiva
     *
     * @param float $farPorceiva
     * @return Farcat
     */
    public function setFarPorceiva($farPorceiva)
    {
        $this->farPorceiva = $farPorceiva;

        return $this;
    }

    /**
     * Get farPorceiva
     *
     * @return float 
     */
    public function getFarPorceiva()
    {
        return $this->farPorceiva;
    }

    /**
     * Set farNrocui
     *
     * @param string $farNrocui
     * @return Farcat
     */
    public function setFarNrocui($farNrocui)
    {
        $this->farNrocui = $farNrocui;

        return $this;
    }

    /**
     * Get farNrocui
     *
     * @return string 
     */
    public function getFarNrocui()
    {
        return $this->farNrocui;
    }

    /**
     * Set farDgr
     *
     * @param string $farDgr
     * @return Farcat
     */
    public function setFarDgr($farDgr)
    {
        $this->farDgr = $farDgr;

        return $this;
    }

    /**
     * Get farDgr
     *
     * @return string 
     */
    public function getFarDgr()
    {
        return $this->farDgr;
    }

    /**
     * Set farGan
     *
     * @param string $farGan
     * @return Farcat
     */
    public function setFarGan($farGan)
    {
        $this->farGan = $farGan;

        return $this;
    }

    /**
     * Get farGan
     *
     * @return string 
     */
    public function getFarGan()
    {
        return $this->farGan;
    }

    /**
     * Set farProvin
     *
     * @param string $farProvin
     * @return Farcat
     */
    public function setFarProvin($farProvin)
    {
        $this->farProvin = $farProvin;

        return $this;
    }

    /**
     * Get farProvin
     *
     * @return string 
     */
    public function getFarProvin()
    {
        return $this->farProvin;
    }

    /**
     * Set farLocali
     *
     * @param string $farLocali
     * @return Farcat
     */
    public function setFarLocali($farLocali)
    {
        $this->farLocali = $farLocali;

        return $this;
    }

    /**
     * Get farLocali
     *
     * @return string 
     */
    public function getFarLocali()
    {
        return $this->farLocali;
    }

    /**
     * Set farDirecc
     *
     * @param string $farDirecc
     * @return Farcat
     */
    public function setFarDirecc($farDirecc)
    {
        $this->farDirecc = $farDirecc;

        return $this;
    }

    /**
     * Get farDirecc
     *
     * @return string 
     */
    public function getFarDirecc()
    {
        return $this->farDirecc;
    }

    /**
     * Set farTelefo
     *
     * @param string $farTelefo
     * @return Farcat
     */
    public function setFarTelefo($farTelefo)
    {
        $this->farTelefo = $farTelefo;

        return $this;
    }

    /**
     * Get farTelefo
     *
     * @return string 
     */
    public function getFarTelefo()
    {
        return $this->farTelefo;
    }

    /**
     * Set farTope
     *
     * @param string $farTope
     * @return Farcat
     */
    public function setFarTope($farTope)
    {
        $this->farTope = $farTope;

        return $this;
    }

    /**
     * Get farTope
     *
     * @return string 
     */
    public function getFarTope()
    {
        return $this->farTope;
    }

    /**
     * Set farCancuo
     *
     * @param string $farCancuo
     * @return Farcat
     */
    public function setFarCancuo($farCancuo)
    {
        $this->farCancuo = $farCancuo;

        return $this;
    }

    /**
     * Get farCancuo
     *
     * @return string 
     */
    public function getFarCancuo()
    {
        return $this->farCancuo;
    }

    /**
     * Set farAtrazo
     *
     * @param integer $farAtrazo
     * @return Farcat
     */
    public function setFarAtrazo($farAtrazo)
    {
        $this->farAtrazo = $farAtrazo;

        return $this;
    }

    /**
     * Get farAtrazo
     *
     * @return integer 
     */
    public function getFarAtrazo()
    {
        return $this->farAtrazo;
    }

    /**
     * Set farImpres
     *
     * @param string $farImpres
     * @return Farcat
     */
    public function setFarImpres($farImpres)
    {
        $this->farImpres = $farImpres;

        return $this;
    }

    /**
     * Get farImpres
     *
     * @return string 
     */
    public function getFarImpres()
    {
        return $this->farImpres;
    }

    /**
     * Set farImcola
     *
     * @param string $farImcola
     * @return Farcat
     */
    public function setFarImcola($farImcola)
    {
        $this->farImcola = $farImcola;

        return $this;
    }

    /**
     * Get farImcola
     *
     * @return string 
     */
    public function getFarImcola()
    {
        return $this->farImcola;
    }

    /**
     * Set farIntere
     *
     * @param string $farIntere
     * @return Farcat
     */
    public function setFarIntere($farIntere)
    {
        $this->farIntere = $farIntere;

        return $this;
    }

    /**
     * Get farIntere
     *
     * @return string 
     */
    public function getFarIntere()
    {
        return $this->farIntere;
    }

    /**
     * Set farBonpe1
     *
     * @param string $farBonpe1
     * @return Farcat
     */
    public function setFarBonpe1($farBonpe1)
    {
        $this->farBonpe1 = $farBonpe1;

        return $this;
    }

    /**
     * Get farBonpe1
     *
     * @return string 
     */
    public function getFarBonpe1()
    {
        return $this->farBonpe1;
    }

    /**
     * Set farBonpe2
     *
     * @param string $farBonpe2
     * @return Farcat
     */
    public function setFarBonpe2($farBonpe2)
    {
        $this->farBonpe2 = $farBonpe2;

        return $this;
    }

    /**
     * Get farBonpe2
     *
     * @return string 
     */
    public function getFarBonpe2()
    {
        return $this->farBonpe2;
    }

    /**
     * Set farBonpe3
     *
     * @param string $farBonpe3
     * @return Farcat
     */
    public function setFarBonpe3($farBonpe3)
    {
        $this->farBonpe3 = $farBonpe3;

        return $this;
    }

    /**
     * Get farBonpe3
     *
     * @return string 
     */
    public function getFarBonpe3()
    {
        return $this->farBonpe3;
    }

    /**
     * Set farTipimp
     *
     * @param string $farTipimp
     * @return Farcat
     */
    public function setFarTipimp($farTipimp)
    {
        $this->farTipimp = $farTipimp;

        return $this;
    }

    /**
     * Get farTipimp
     *
     * @return string 
     */
    public function getFarTipimp()
    {
        return $this->farTipimp;
    }

    /**
     * Set farInventario
     *
     * @param integer $farInventario
     * @return Farcat
     */
    public function setFarInventario($farInventario)
    {
        $this->farInventario = $farInventario;

        return $this;
    }

    /**
     * Get farInventario
     *
     * @return integer 
     */
    public function getFarInventario()
    {
        return $this->farInventario;
    }

    /**
     * Set farConnect
     *
     * @param string $farConnect
     * @return Farcat
     */
    public function setFarConnect($farConnect)
    {
        $this->farConnect = $farConnect;

        return $this;
    }

    /**
     * Get farConnect
     *
     * @return string 
     */
    public function getFarConnect()
    {
        return $this->farConnect;
    }

    /**
     * Set farIdmsjimed
     *
     * @param float $farIdmsjimed
     * @return Farcat
     */
    public function setFarIdmsjimed($farIdmsjimed)
    {
        $this->farIdmsjimed = $farIdmsjimed;

        return $this;
    }

    /**
     * Get farIdmsjimed
     *
     * @return float 
     */
    public function getFarIdmsjimed()
    {
        return $this->farIdmsjimed;
    }

    /**
     * Set farConvdefault
     *
     * @param string $farConvdefault
     * @return Farcat
     */
    public function setFarConvdefault($farConvdefault)
    {
        $this->farConvdefault = $farConvdefault;

        return $this;
    }

    /**
     * Get farConvdefault
     *
     * @return string 
     */
    public function getFarConvdefault()
    {
        return $this->farConvdefault;
    }

    /**
     * Set farUnegos
     *
     * @param integer $farUnegos
     * @return Farcat
     */
    public function setFarUnegos($farUnegos)
    {
        $this->farUnegos = $farUnegos;

        return $this;
    }

    /**
     * Get farUnegos
     *
     * @return integer 
     */
    public function getFarUnegos()
    {
        return $this->farUnegos;
    }

    /**
     * Set farNrocli
     *
     * @param integer $farNrocli
     * @return Farcat
     */
    public function setFarNrocli($farNrocli)
    {
        $this->farNrocli = $farNrocli;

        return $this;
    }

    /**
     * Get farNrocli
     *
     * @return integer 
     */
    public function getFarNrocli()
    {
        return $this->farNrocli;
    }
}
