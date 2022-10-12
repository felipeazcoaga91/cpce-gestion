<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comitente
 *
 * @ORM\Table(name="comitente", indexes={@ORM\Index(name="afi_tipo_nombre", columns={"afi_tipo", "afi_nombre"})})
 * @ORM\Entity(repositoryClass="Sistema\CPCEBundle\Entity\AfiliadoRepository")
 */
class Comitente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="afi_nrodoc", type="integer", length=8)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $afiNrodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_nombre", type="string", length=100, nullable=false)
     */
    private $afiNombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afi_fecnac", type="date", nullable=false)
     */
    private $afiFecnac;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_tipo", type="string", length=1, nullable=false)
     */
    private $afiTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_titulo", type="string", length=2, nullable=false)
     */
    private $afiTitulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="afi_matricula", type="integer", nullable=false)
     */
    private $afiMatricula;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_direccion", type="string", length=100, nullable=false)
     */
    private $afiDireccion;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_localidad", type="string", length=20, nullable=false)
     */
    private $afiLocalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_provincia", type="string", length=50, nullable=false)
     */
    private $afiProvincia;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_zona", type="string", length=4, nullable=false)
     */
    private $afiZona;

    /**
     * @var integer
     *
     * @ORM\Column(name="afi_codpos", type="integer", nullable=false)
     */
    private $afiCodpos;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_telefono1", type="string", length=50, nullable=false)
     */
    private $afiTelefono1;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_telefono2", type="string", length=50, nullable=false)
     */
    private $afiCelular;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_mail", type="string", length=100, nullable=false)
     */
    private $afiMail;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_tipoiva", type="string", length=2, nullable=false)
     */
    private $afiTipoiva;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_cuit", type="string", length=15, nullable=false)
     */
    private $afiCuit;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_dgr", type="string", length=15, nullable=false)
     */
    private $afiDgr;

    /**
     * @var float
     *
     * @ORM\Column(name="afi_lote", type="float", precision=14, scale=0, nullable=false)
     */
    private $afiLote;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_tipdoc", type="string", length=3)
     */
    private $afiTipdoc;


    public function __toString()
    {
        return $this->getAfiNombre();
    }
    /**
     * Get getAfiZonaDelegacion
     *
     * @return string 
     */
    public function getAfiZonaDelegacion()
    {
        switch ($this->afiZona) {
            case '0001':
                $delegacion = "Resistencia";
                break;
            case '0002':
                $delegacion = "Saenz Peña";
                break;
            case '0003':
                $delegacion = "Villa Angela";
                break;
            case '0004':
                $delegacion = "Sudoeste";
                break;
            default:
                $delegacion = null;
                break;
        }
        return $delegacion;
    }
    /**
     * Get getAfiSexoString
     *
     * @return string 
     */
    public function getAfiSexoString()
    {
        switch ($this->afiSexo) {
            case 'F':
                $sexo = "Femenino";
                break;
            case 'M':
                $sexo = "Masculino";
                break;
            default:
                $sexo = null;
                break;
        }
        return $sexo;
    }
    /**
     * Get getAfiCivilEstado
     *
     * @return string 
     */
    public function getAfiCivilEstado()
    {
        $sexo        = "o/a";
        $estadocivil = null;

        if ($this->afiSexo == "F") {
            $sexo = "a";
        } else if ($this->afiSexo == "M") {
            $sexo = "o";
        } else {
            $sexo = "o/a";
        }

        switch ($this->afiCivil) {
            case 'S':
                $estadocivil = "Solter".$sexo;
                break;
            case 'C':
                $estadocivil = "Casad".$sexo;
                break;
            case 'V':
                $estadocivil = "Viud".$sexo;
                break;
            case 'D':
                $estadocivil = "Divorciad".$sexo;
                break;
            default:
                $estadocivil = null;
                break;
        }
        return $estadocivil;
    }
    /**
     * Get getAfiGananciasCondicionIva
     *
     * @return string 
     */
    public function getAfiGananciasCondicionIva()
    {
        if ($this->afiGanancias == "NO") {
            $condicioniva = "MONOTRIBUTO";
        } else if ($this->afiGanancias == "SI") {
            $condicioniva = "RESPONSABLE INSCRIPTO";
        } else {
            $condicioniva = null;
        }
        return $condicioniva;
    }

    public function getId()
    {
        return $this->getAfiTipdoc().$this->getAfiNrodoc();
    }

    /**
     * Set afiNombre
     *
     * @param string $afiNombre
     * @return Afiliado
     */
    public function setAfiNombre($afiNombre)
    {
        $this->afiNombre = $afiNombre;

        return $this;
    }

    /**
     * Get afiNombre
     *
     * @return string 
     */
    public function getAfiNombre()
    {
        return $this->afiNombre;
    }

    /**
     * Set afiFecnac
     *
     * @param \DateTime $afiFecnac
     * @return Afiliado
     */
    public function setAfiFecnac($afiFecnac)
    {
        $this->afiFecnac = $afiFecnac;

        return $this;
    }

    /**
     * Get afiFecnac
     *
     * @return \DateTime 
     */
    public function getAfiFecnac()
    {
        return $this->afiFecnac;
    }

    /**
     * Set afiTipo
     *
     * @param string $afiTipo
     * @return Afiliado
     */
    public function setAfiTipo($afiTipo)
    {
        $this->afiTipo = $afiTipo;

        return $this;
    }

    /**
     * Get afiTipo
     *
     * @return string 
     */
    public function getAfiTipo()
    {
        return $this->afiTipo;
    }

    /**
     * Set afiTitulo
     *
     * @param string $afiTitulo
     * @return Afiliado
     */
    public function setAfiTitulo($afiTitulo)
    {
        $this->afiTitulo = $afiTitulo;

        return $this;
    }

    /**
     * Get afiTitulo
     *
     * @return string 
     */
    public function getAfiTitulo()
    {
        return $this->afiTitulo;
    }

    /**
     * Set afiMatricula
     *
     * @param integer $afiMatricula
     * @return Afiliado
     */
    public function setAfiMatricula($afiMatricula)
    {
        $this->afiMatricula = $afiMatricula;

        return $this;
    }

    /**
     * Get afiMatricula
     *
     * @return integer 
     */
    public function getAfiMatricula()
    {
        return $this->afiMatricula;
    }

    /**
     * Set afiDireccion
     *
     * @param string $afiDireccion
     * @return Afiliado
     */
    public function setAfiDireccion($afiDireccion)
    {
        $this->afiDireccion = $afiDireccion;

        return $this;
    }

    /**
     * Get afiDireccion
     *
     * @return string 
     */
    public function getAfiDireccion()
    {
        return $this->afiDireccion;
    }

    /**
     * Set afiLocalidad
     *
     * @param string $afiLocalidad
     * @return Afiliado
     */
    public function setAfiLocalidad($afiLocalidad)
    {
        $this->afiLocalidad = $afiLocalidad;

        return $this;
    }

    /**
     * Get afiLocalidad
     *
     * @return string 
     */
    public function getAfiLocalidad()
    {
        return $this->afiLocalidad;
    }

    /**
     * Set afiProvincia
     *
     * @param string $afiProvincia
     * @return Afiliado
     */
    public function setAfiProvincia($afiProvincia)
    {
        $this->afiProvincia = $afiProvincia;

        return $this;
    }

    /**
     * Get afiProvincia
     *
     * @return string 
     */
    public function getAfiProvincia()
    {
        return $this->afiProvincia;
    }

    /**
     * Set afiZona
     *
     * @param string $afiZona
     * @return Afiliado
     */
    public function setAfiZona($afiZona)
    {
        $this->afiZona = $afiZona;

        return $this;
    }

    /**
     * Get afiZona
     *
     * @return string 
     */
    public function getAfiZona()
    {
        return $this->afiZona;
    }

    /**
     * Set afiCodpos
     *
     * @param integer $afiCodpos
     * @return Afiliado
     */
    public function setAfiCodpos($afiCodpos)
    {
        $this->afiCodpos = $afiCodpos;

        return $this;
    }

    /**
     * Get afiCodpos
     *
     * @return integer 
     */
    public function getAfiCodpos()
    {
        return $this->afiCodpos;
    }

    /**
     * Set afiTelefono1
     *
     * @param string $afiTelefono1
     * @return Afiliado
     */
    public function setAfiTelefono1($afiTelefono1)
    {
        $this->afiTelefono1 = $afiTelefono1;

        return $this;
    }

    /**
     * Get afiTelefono1
     *
     * @return string 
     */
    public function getAfiTelefono1()
    {
        return $this->afiTelefono1;
    }

    /**
     * Set afiCelular
     *
     * @param string $afiCelular
     * @return Afiliado
     */
    public function setAfiCelular($afiCelular)
    {
        $this->afiCelular = $afiCelular;

        return $this;
    }

    /**
     * Get afiCelular
     *
     * @return string 
     */
    public function getAfiCelular()
    {
        return $this->afiCelular;
    }

    /**
     * Set afiMail
     *
     * @param string $afiMail
     * @return Afiliado
     */
    public function setAfiMail($afiMail)
    {
        $this->afiMail = $afiMail;

        return $this;
    }

    /**
     * Get afiMail
     *
     * @return string 
     */
    public function getAfiMail()
    {
        return $this->afiMail;
    }

    /**
     * Set afiTipoiva
     *
     * @param string $afiTipoiva
     * @return Afiliado
     */
    public function setAfiTipoiva($afiTipoiva)
    {
        $this->afiTipoiva = $afiTipoiva;

        return $this;
    }

    /**
     * Get afiTipoiva
     *
     * @return string 
     */
    public function getAfiTipoiva()
    {
        return $this->afiTipoiva;
    }

    /**
     * Set afiCuit
     *
     * @param string $afiCuit
     * @return Afiliado
     */
    public function setAfiCuit($afiCuit)
    {
        $afiCuit = str_replace("-", "", $afiCuit);
        $this->afiCuit = $afiCuit;

        return $this;
    }

    /**
     * Get afiCuit
     *
     * @return string 
     */
    public function getAfiCuit()
    {
        return $this->afiCuit;
    }

    /**
     * Set afiDgr
     *
     * @param string $afiDgr
     * @return Afiliado
     */
    public function setAfiDgr($afiDgr)
    {
        $this->afiDgr = $afiDgr;

        return $this;
    }

    /**
     * Get afiDgr
     *
     * @return string 
     */
    public function getAfiDgr()
    {
        return $this->afiDgr;
    }

    /**
     * Set afiLote
     *
     * @param float $afiLote
     * @return Afiliado
     */
    public function setAfiLote($afiLote)
    {
        $this->afiLote = $afiLote;

        return $this;
    }

    /**
     * Get afiLote
     *
     * @return float 
     */
    public function getAfiLote()
    {
        return $this->afiLote;
    }

    /**
     * Set afiTipdoc
     *
     * @param string $afiTipdoc
     * @return Afiliado
     */
    public function setAfiTipdoc($afiTipdoc)
    {
        $this->afiTipdoc = $afiTipdoc;

        return $this;
    }

    /**
     * Get afiTipdoc
     *
     * @return string 
     */
    public function getAfiTipdoc()
    {
        return $this->afiTipdoc;
    }

    /**
     * Set afiNrodoc
     *
     * @param integer $afiNrodoc
     * @return Afiliado
     */
    public function setAfiNrodoc($afiNrodoc)
    {
        $this->afiNrodoc = $afiNrodoc;

        return $this;
    }

    /**
     * Get afiNrodoc
     *
     * @return integer 
     */
    public function getAfiNrodoc()
    {
        return $this->afiNrodoc;
    }
}