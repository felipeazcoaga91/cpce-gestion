<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Afiliado
 *
 * @ORM\Table(name="afiliado", uniqueConstraints={@ORM\UniqueConstraint(name="afiliado_garante", columns={"afi_garante_tipdoc", "afi_garante_nrodoc"}), @ORM\UniqueConstraint(name="afiliado_garantede", columns={"afi_garantede_tipdoc", "afi_garantede_nrodoc"})}, indexes={@ORM\Index(name="SkMatricula", columns={"afi_titulo", "afi_matricula"})})
 * @ORM\Entity(repositoryClass="Sistema\CPCEBundle\Entity\AfiliadoRepository")
 */
class Afiliado
{
    /**
     * @var string
     *
     * @ORM\Column(name="afi_nombre", type="string", length=100, nullable=false)
     */
    private $afiNombre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_fs1", type="boolean", nullable=false)
     */
    private $afiBenefFs1;

     /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_fs2", type="boolean", nullable=false)
     */
    private $afiBenefFs2;

     /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_fs3", type="boolean", nullable=false)
     */
    private $afiBenefFs3;

     /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_fs4", type="boolean", nullable=false)
     */
    private $afiBenefFs4;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_fs5", type="boolean", nullable=false)
     */
    private $afiBenefFs5;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_fs6", type="boolean", nullable=false)
     */
    private $afiBenefFs6;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_sv1", type="boolean", nullable=false)
     */
    private $afiBenefSv1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_sv2", type="boolean", nullable=false)
     */
    private $afiBenefSv2;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_sv3", type="boolean", nullable=false)
     */
    private $afiBenefSv3;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_sv4", type="boolean", nullable=false)
     */
    private $afiBenefSv4;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_sv5", type="boolean", nullable=false)
     */
    private $afiBenefSv5;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_sv6", type="boolean", nullable=false)
     */
    private $afiBenefSv6;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_cap1", type="boolean", nullable=false)
     */
    private $afiBenefCap1;

     /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_cap2", type="boolean", nullable=false)
     */
    private $afiBenefCap2;

     /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_cap3", type="boolean", nullable=false)
     */
    private $afiBenefCap3;

     /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_cap4", type="boolean", nullable=false)
     */
    private $afiBenefCap4;

     /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_cap5", type="boolean", nullable=false)
     */
    private $afiBenefCap5;

     /**
     * @var boolean
     *
     * @ORM\Column(name="afi_benef_cap6", type="boolean", nullable=false)
     */
    private $afiBenefCap6;
    
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
     * @Assert\Regex("/\d/")
     */
    private $afiTelefono1;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_telefono2", type="string", length=50, nullable=false)
     * @Assert\Regex("/\d/")
     */
    private $afiCelular;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_mail", type="string", length=100, nullable=false)
     * @Assert\Email(
     *     checkMX = true
     * )
     */
    private $afiMail;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_mail_alternativo", type="string", length=50, nullable=true)
     * @Assert\Email(
     *     checkMX = true
     * )
     */
    private $afiMailAlternativo;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_civil", type="string", length=2, nullable=false)
     */
    private $afiCivil;

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
     * @var string
     *
     * @ORM\Column(name="afi_categoria", type="string", length=6, nullable=false)
     */
    private $afiCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_ficha", type="string", length=1, nullable=false)
     */
    private $afiFicha;

    /**
     * @var float
     *
     * @ORM\Column(name="afi_ejprof", type="float", precision=12, scale=2, nullable=false)
     */
    private $afiEjprof;

    /**
     * @var float
     *
     * @ORM\Column(name="afi_asoc", type="float", precision=12, scale=2, nullable=false)
     */
    private $afiAsoc;

    /**
     * @var float
     *
     * @ORM\Column(name="afi_monto", type="float", precision=12, scale=2, nullable=false)
     */
    private $afiMonto;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_sexo", type="string", length=1, nullable=false)
     */
    private $afiSexo;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_garante", type="string", length=60, nullable=false)
     */
    private $afiGarante;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_doc1", type="string", length=8, nullable=true)
     * @Assert\Regex("/^[0-9]+$/")
     */
    private $afiDoc1;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_aut1", type="string", length=35, nullable=true)
     */
    private $afiAut1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afi_nac1", type="date", nullable=true)
     */
    private $afiNac1;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_sex1", type="string", length=1, nullable=true)
     */
    private $afiSex1;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_fil1", type="string", length=1, nullable=true)
     */
    private $afiFil1;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_doc2", type="string", length=8, nullable=true)
     * @Assert\Regex("/^[0-9]+$/")
     */
    private $afiDoc2;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_aut2", type="string", length=35, nullable=true)
     */
    private $afiAut2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afi_nac2", type="date", nullable=true)
     */
    private $afiNac2;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_sex2", type="string", length=1, nullable=true)
     */
    private $afiSex2;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_fil2", type="string", length=1, nullable=true)
     */
    private $afiFil2;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_doc3", type="string", length=8, nullable=true)
     * @Assert\Regex("/^[0-9]+$/")
     */
    private $afiDoc3;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_aut3", type="string", length=35, nullable=true)
     */
    private $afiAut3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afi_nac3", type="date", nullable=true)
     */
    private $afiNac3;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_sex3", type="string", length=1, nullable=true)
     */
    private $afiSex3;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_fil3", type="string", length=1, nullable=true)
     */
    private $afiFil3;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_doc4", type="string", length=8, nullable=true)
     * @Assert\Regex("/^[0-9]+$/")
     */
    private $afiDoc4;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_aut4", type="string", length=35, nullable=true)
     */
    private $afiAut4;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afi_nac4", type="date", nullable=true)
     */
    private $afiNac4;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_sex4", type="string", length=1, nullable=true)
     */
    private $afiSex4;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_fil4", type="string", length=1, nullable=true)
     */
    private $afiFil4;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_doc5", type="string", length=8, nullable=true)
     * @Assert\Regex("/^[0-9]+$/")
     */
    private $afiDoc5;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_aut5", type="string", length=35, nullable=true)
     */
    private $afiAut5;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afi_nac5", type="date", nullable=true)
     */
    private $afiNac5;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_sex5", type="string", length=1, nullable=true)
     */
    private $afiSex5;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_fil5", type="string", length=1, nullable=true)
     */
    private $afiFil5;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_doc6", type="string", length=8, nullable=true)
     * @Assert\Regex("/^[0-9]+$/")
     */
    private $afiDoc6;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_aut6", type="string", length=35, nullable=true)
     */
    private $afiAut6;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afi_nac6", type="date", nullable=true)
     */
    private $afiNac6;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_sex6", type="string", length=1, nullable=true)
     */
    private $afiSex6;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_fil6", type="string", length=1, nullable=true)
     */
    private $afiFil6;

    /**
     * @var float
     *
     * @ORM\Column(name="afi_dgralic", type="float", precision=12, scale=2, nullable=false)
     */
    private $afiDgralic;

    /**
     * @var integer
     *
     * @ORM\Column(name="afi_cuota", type="integer", nullable=false)
     */
    private $afiCuota;

    /**
     * @var float
     *
     * @ORM\Column(name="afi_debitos", type="float", precision=16, scale=2, nullable=false)
     */
    private $afiDebitos;

    /**
     * @var float
     *
     * @ORM\Column(name="afi_creditos", type="float", precision=16, scale=2, nullable=false)
     */
    private $afiCreditos;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_ganancias", type="string", length=2, nullable=false)
     */
    private $afiGanancias;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_iva", type="string", length=1, nullable=false)
     */
    private $afiIva;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afi_dgrexcep", type="date", nullable=false)
     */
    private $afiDgrexcep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="afi_dgiexcep", type="date", nullable=false)
     */
    private $afiDgiexcep;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_cbu", type="string", length=22, nullable=false)
     */
    private $afiCbu;

    /**
     * @var string
     *
     * @ORM\Column(name="afi_cbu_credito", type="string", length=22, nullable=true)
     */
    private $afiCbuCredito;

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

    /**
     * @var integer
     *
     * @ORM\Column(name="afi_nrodoc", type="integer", length=8)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $afiNrodoc;

    /**
     * @var \Sistema\CPCEBundle\Entity\Afiliado
     *
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Afiliado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="afi_garantede_tipdoc", referencedColumnName="afi_tipdoc"),
     *   @ORM\JoinColumn(name="afi_garantede_nrodoc", referencedColumnName="afi_nrodoc")
     * })
     */
    private $afiGarantedeTipdoc;

    /**
     * @var \Sistema\CPCEBundle\Entity\Afiliado
     *
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Afiliado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="afi_garante_tipdoc", referencedColumnName="afi_tipdoc"),
     *   @ORM\JoinColumn(name="afi_garante_nrodoc", referencedColumnName="afi_nrodoc")
     * })
     */
    private $afiGaranteTipdoc;


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
     * Set afiMailAlternativo
     *
     * @param string $afiMailAlternativo
     * @return Afiliado
     */
    public function setAfiMailAlternativo($afiMailAlternativo)
    {
        $this->afiMailAlternativo = $afiMailAlternativo;

        return $this;
    }

    /**
     * Get afiMailAlternativo
     *
     * @return string 
     */
    public function getAfiMailAlternativo()
    {
        return $this->afiMailAlternativo;
    }

    /**
     * Set afiCivil
     *
     * @param string $afiCivil
     * @return Afiliado
     */
    public function setAfiCivil($afiCivil)
    {
        $this->afiCivil = $afiCivil;

        return $this;
    }

    /**
     * Get afiCivil
     *
     * @return string 
     */
    public function getAfiCivil()
    {
        return $this->afiCivil;
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
     * Set afiCategoria
     *
     * @param string $afiCategoria
     * @return Afiliado
     */
    public function setAfiCategoria($afiCategoria)
    {
        $this->afiCategoria = $afiCategoria;

        return $this;
    }

    /**
     * Get afiCategoria
     *
     * @return string 
     */
    public function getAfiCategoria()
    {
        return $this->afiCategoria;
    }

    /**
     * Set afiFicha
     *
     * @param string $afiFicha
     * @return Afiliado
     */
    public function setAfiFicha($afiFicha)
    {
        $this->afiFicha = $afiFicha;

        return $this;
    }

    /**
     * Get afiFicha
     *
     * @return string 
     */
    public function getAfiFicha()
    {
        return $this->afiFicha;
    }

    /**
     * Set afiEjprof
     *
     * @param float $afiEjprof
     * @return Afiliado
     */
    public function setAfiEjprof($afiEjprof)
    {
        $this->afiEjprof = $afiEjprof;

        return $this;
    }

    /**
     * Get afiEjprof
     *
     * @return float 
     */
    public function getAfiEjprof()
    {
        return $this->afiEjprof;
    }

    /**
     * Set afiAsoc
     *
     * @param float $afiAsoc
     * @return Afiliado
     */
    public function setAfiAsoc($afiAsoc)
    {
        $this->afiAsoc = $afiAsoc;

        return $this;
    }

    /**
     * Get afiAsoc
     *
     * @return float 
     */
    public function getAfiAsoc()
    {
        return $this->afiAsoc;
    }

    /**
     * Set afiMonto
     *
     * @param float $afiMonto
     * @return Afiliado
     */
    public function setAfiMonto($afiMonto)
    {
        $this->afiMonto = $afiMonto;

        return $this;
    }

    /**
     * Get afiMonto
     *
     * @return float 
     */
    public function getAfiMonto()
    {
        return $this->afiMonto;
    }

    /**
     * Set afiSexo
     *
     * @param string $afiSexo
     * @return Afiliado
     */
    public function setAfiSexo($afiSexo)
    {
        $this->afiSexo = $afiSexo;

        return $this;
    }

    /**
     * Get afiSexo
     *
     * @return string 
     */
    public function getAfiSexo()
    {
        return $this->afiSexo;
    }

    /**
     * Set afiGarante
     *
     * @param string $afiGarante
     * @return Afiliado
     */
    public function setAfiGarante($afiGarante)
    {
        $this->afiGarante = $afiGarante;

        return $this;
    }

    /**
     * Get afiGarante
     *
     * @return string 
     */
    public function getAfiGarante()
    {
        return $this->afiGarante;
    }

    /**
     * Set afiDoc1
     *
     * @param string $afiDoc1
     * @return Afiliado
     */
    public function setAfiDoc1($afiDoc1)
    {
        $this->afiDoc1 = $afiDoc1;

        return $this;
    }

    /**
     * Get afiDoc1
     *
     * @return string 
     */
    public function getAfiDoc1()
    {
        return $this->afiDoc1;
    }

    /**
     * Set afiAut1
     *
     * @param string $afiAut1
     * @return Afiliado
     */
    public function setAfiAut1($afiAut1)
    {
        $this->afiAut1 = $afiAut1;

        return $this;
    }

    /**
     * Get afiAut1
     *
     * @return string 
     */
    public function getAfiAut1()
    {
        return $this->afiAut1;
    }

    /**
     * Set afiNac1
     *
     * @param \DateTime $afiNac1
     * @return Afiliado
     */
    public function setAfiNac1($afiNac1)
    {
        $this->afiNac1 = $afiNac1;

        return $this;
    }

    /**
     * Get afiNac1
     *
     * @return \DateTime 
     */
    public function getAfiNac1()
    {
        return $this->afiNac1;
    }

    /**
     * Set afiSex1
     *
     * @param string $afiSex1
     * @return Afiliado
     */
    public function setAfiSex1($afiSex1)
    {
        $this->afiSex1 = $afiSex1;

        return $this;
    }

    /**
     * Get afiSex1
     *
     * @return string 
     */
    public function getAfiSex1()
    {
        return $this->afiSex1;
    }

    /**
     * Set afiFil1
     *
     * @param string $afiFil1
     * @return Afiliado
     */
    public function setAfiFil1($afiFil1)
    {
        $this->afiFil1 = $afiFil1;

        return $this;
    }

    /**
     * Get afiFil1
     *
     * @return string 
     */
    public function getAfiFil1()
    {
        return $this->afiFil1;
    }

    /**
     * Set afiDoc2
     *
     * @param string $afiDoc2
     * @return Afiliado
     */
    public function setAfiDoc2($afiDoc2)
    {
        $this->afiDoc2 = $afiDoc2;

        return $this;
    }

    /**
     * Get afiDoc2
     *
     * @return string 
     */
    public function getAfiDoc2()
    {
        return $this->afiDoc2;
    }

    /**
     * Set afiAut2
     *
     * @param string $afiAut2
     * @return Afiliado
     */
    public function setAfiAut2($afiAut2)
    {
        $this->afiAut2 = $afiAut2;

        return $this;
    }

    /**
     * Get afiAut2
     *
     * @return string 
     */
    public function getAfiAut2()
    {
        return $this->afiAut2;
    }

    /**
     * Set afiNac2
     *
     * @param \DateTime $afiNac2
     * @return Afiliado
     */
    public function setAfiNac2($afiNac2)
    {
        $this->afiNac2 = $afiNac2;

        return $this;
    }

    /**
     * Get afiNac2
     *
     * @return \DateTime 
     */
    public function getAfiNac2()
    {
        return $this->afiNac2;
    }

    /**
     * Set afiSex2
     *
     * @param string $afiSex2
     * @return Afiliado
     */
    public function setAfiSex2($afiSex2)
    {
        $this->afiSex2 = $afiSex2;

        return $this;
    }

    /**
     * Get afiSex2
     *
     * @return string 
     */
    public function getAfiSex2()
    {
        return $this->afiSex2;
    }

    /**
     * Set afiFil2
     *
     * @param string $afiFil2
     * @return Afiliado
     */
    public function setAfiFil2($afiFil2)
    {
        $this->afiFil2 = $afiFil2;

        return $this;
    }

    /**
     * Get afiFil2
     *
     * @return string 
     */
    public function getAfiFil2()
    {
        return $this->afiFil2;
    }

    /**
     * Set afiDoc3
     *
     * @param string $afiDoc3
     * @return Afiliado
     */
    public function setAfiDoc3($afiDoc3)
    {
        $this->afiDoc3 = $afiDoc3;

        return $this;
    }

    /**
     * Get afiDoc3
     *
     * @return string 
     */
    public function getAfiDoc3()
    {
        return $this->afiDoc3;
    }

    /**
     * Set afiAut3
     *
     * @param string $afiAut3
     * @return Afiliado
     */
    public function setAfiAut3($afiAut3)
    {
        $this->afiAut3 = $afiAut3;

        return $this;
    }

    /**
     * Get afiAut3
     *
     * @return string 
     */
    public function getAfiAut3()
    {
        return $this->afiAut3;
    }

    /**
     * Set afiNac3
     *
     * @param \DateTime $afiNac3
     * @return Afiliado
     */
    public function setAfiNac3($afiNac3)
    {
        $this->afiNac3 = $afiNac3;

        return $this;
    }

    /**
     * Get afiNac3
     *
     * @return \DateTime 
     */
    public function getAfiNac3()
    {
        return $this->afiNac3;
    }

    /**
     * Set afiSex3
     *
     * @param string $afiSex3
     * @return Afiliado
     */
    public function setAfiSex3($afiSex3)
    {
        $this->afiSex3 = $afiSex3;

        return $this;
    }

    /**
     * Get afiSex3
     *
     * @return string 
     */
    public function getAfiSex3()
    {
        return $this->afiSex3;
    }

    /**
     * Set afiFil3
     *
     * @param string $afiFil3
     * @return Afiliado
     */
    public function setAfiFil3($afiFil3)
    {
        $this->afiFil3 = $afiFil3;

        return $this;
    }

    /**
     * Get afiFil3
     *
     * @return string 
     */
    public function getAfiFil3()
    {
        return $this->afiFil3;
    }

    /**
     * Set afiDoc4
     *
     * @param string $afiDoc4
     * @return Afiliado
     */
    public function setAfiDoc4($afiDoc4)
    {
        $this->afiDoc4 = $afiDoc4;

        return $this;
    }

    /**
     * Get afiDoc4
     *
     * @return string 
     */
    public function getAfiDoc4()
    {
        return $this->afiDoc4;
    }

    /**
     * Set afiAut4
     *
     * @param string $afiAut4
     * @return Afiliado
     */
    public function setAfiAut4($afiAut4)
    {
        $this->afiAut4 = $afiAut4;

        return $this;
    }

    /**
     * Get afiAut4
     *
     * @return string 
     */
    public function getAfiAut4()
    {
        return $this->afiAut4;
    }

    /**
     * Set afiNac4
     *
     * @param \DateTime $afiNac4
     * @return Afiliado
     */
    public function setAfiNac4($afiNac4)
    {
        $this->afiNac4 = $afiNac4;

        return $this;
    }

    /**
     * Get afiNac4
     *
     * @return \DateTime 
     */
    public function getAfiNac4()
    {
        return $this->afiNac4;
    }

    /**
     * Set afiSex4
     *
     * @param string $afiSex4
     * @return Afiliado
     */
    public function setAfiSex4($afiSex4)
    {
        $this->afiSex4 = $afiSex4;

        return $this;
    }

    /**
     * Get afiSex4
     *
     * @return string 
     */
    public function getAfiSex4()
    {
        return $this->afiSex4;
    }

    /**
     * Set afiFil4
     *
     * @param string $afiFil4
     * @return Afiliado
     */
    public function setAfiFil4($afiFil4)
    {
        $this->afiFil4 = $afiFil4;

        return $this;
    }

    /**
     * Get afiFil4
     *
     * @return string 
     */
    public function getAfiFil4()
    {
        return $this->afiFil4;
    }

    /**
     * Set afiDoc5
     *
     * @param string $afiDoc5
     * @return Afiliado
     */
    public function setAfiDoc5($afiDoc5)
    {
        $this->afiDoc5 = $afiDoc5;

        return $this;
    }

    /**
     * Get afiDoc5
     *
     * @return string 
     */
    public function getAfiDoc5()
    {
        return $this->afiDoc5;
    }

    /**
     * Set afiAut5
     *
     * @param string $afiAut5
     * @return Afiliado
     */
    public function setAfiAut5($afiAut5)
    {
        $this->afiAut5 = $afiAut5;

        return $this;
    }

    /**
     * Get afiAut5
     *
     * @return string 
     */
    public function getAfiAut5()
    {
        return $this->afiAut5;
    }

    /**
     * Set afiNac5
     *
     * @param \DateTime $afiNac5
     * @return Afiliado
     */
    public function setAfiNac5($afiNac5)
    {
        $this->afiNac5 = $afiNac5;

        return $this;
    }

    /**
     * Get afiNac5
     *
     * @return \DateTime 
     */
    public function getAfiNac5()
    {
        return $this->afiNac5;
    }

    /**
     * Set afiSex5
     *
     * @param string $afiSex5
     * @return Afiliado
     */
    public function setAfiSex5($afiSex5)
    {
        $this->afiSex5 = $afiSex5;

        return $this;
    }

    /**
     * Get afiSex5
     *
     * @return string 
     */
    public function getAfiSex5()
    {
        return $this->afiSex5;
    }

    /**
     * Set afiFil5
     *
     * @param string $afiFil5
     * @return Afiliado
     */
    public function setAfiFil5($afiFil5)
    {
        $this->afiFil5 = $afiFil5;

        return $this;
    }

    /**
     * Get afiFil5
     *
     * @return string 
     */
    public function getAfiFil5()
    {
        return $this->afiFil5;
    }

    /**
     * Set afiDoc6
     *
     * @param string $afiDoc6
     * @return Afiliado
     */
    public function setAfiDoc6($afiDoc6)
    {
        $this->afiDoc6 = $afiDoc6;

        return $this;
    }

    /**
     * Get afiDoc6
     *
     * @return string 
     */
    public function getAfiDoc6()
    {
        return $this->afiDoc6;
    }

    /**
     * Set afiAut6
     *
     * @param string $afiAut6
     * @return Afiliado
     */
    public function setAfiAut6($afiAut6)
    {
        $this->afiAut6 = $afiAut6;

        return $this;
    }

    /**
     * Get afiAut6
     *
     * @return string 
     */
    public function getAfiAut6()
    {
        return $this->afiAut6;
    }

    /**
     * Set afiNac6
     *
     * @param \DateTime $afiNac6
     * @return Afiliado
     */
    public function setAfiNac6($afiNac6)
    {
        $this->afiNac6 = $afiNac6;

        return $this;
    }

    /**
     * Get afiNac6
     *
     * @return \DateTime 
     */
    public function getAfiNac6()
    {
        return $this->afiNac6;
    }

    /**
     * Set afiSex6
     *
     * @param string $afiSex6
     * @return Afiliado
     */
    public function setAfiSex6($afiSex6)
    {
        $this->afiSex6 = $afiSex6;

        return $this;
    }

    /**
     * Get afiSex6
     *
     * @return string 
     */
    public function getAfiSex6()
    {
        return $this->afiSex6;
    }

    /**
     * Set afiFil6
     *
     * @param string $afiFil6
     * @return Afiliado
     */
    public function setAfiFil6($afiFil6)
    {
        $this->afiFil6 = $afiFil6;

        return $this;
    }

    /**
     * Get afiFil6
     *
     * @return string 
     */
    public function getAfiFil6()
    {
        return $this->afiFil6;
    }

    /**
     * Set afiDgralic
     *
     * @param float $afiDgralic
     * @return Afiliado
     */
    public function setAfiDgralic($afiDgralic)
    {
        $this->afiDgralic = $afiDgralic;

        return $this;
    }

    /**
     * Get afiDgralic
     *
     * @return float 
     */
    public function getAfiDgralic()
    {
        return $this->afiDgralic;
    }

    /**
     * Set afiCuota
     *
     * @param integer $afiCuota
     * @return Afiliado
     */
    public function setAfiCuota($afiCuota)
    {
        $this->afiCuota = $afiCuota;

        return $this;
    }

    /**
     * Get afiCuota
     *
     * @return integer 
     */
    public function getAfiCuota()
    {
        return $this->afiCuota;
    }

    /**
     * Set afiDebitos
     *
     * @param float $afiDebitos
     * @return Afiliado
     */
    public function setAfiDebitos($afiDebitos)
    {
        $this->afiDebitos = $afiDebitos;

        return $this;
    }

    /**
     * Get afiDebitos
     *
     * @return float 
     */
    public function getAfiDebitos()
    {
        return $this->afiDebitos;
    }

    /**
     * Set afiCreditos
     *
     * @param float $afiCreditos
     * @return Afiliado
     */
    public function setAfiCreditos($afiCreditos)
    {
        $this->afiCreditos = $afiCreditos;

        return $this;
    }

    /**
     * Get afiCreditos
     *
     * @return float 
     */
    public function getAfiCreditos()
    {
        return $this->afiCreditos;
    }

    /**
     * Set afiGanancias
     *
     * @param string $afiGanancias
     * @return Afiliado
     */
    public function setAfiGanancias($afiGanancias)
    {
        $this->afiGanancias = $afiGanancias;

        return $this;
    }

    /**
     * Get afiGanancias
     *
     * @return string 
     */
    public function getAfiGanancias()
    {
        return $this->afiGanancias;
    }

    /**
     * Set afiIva
     *
     * @param string $afiIva
     * @return Afiliado
     */
    public function setAfiIva($afiIva)
    {
        $this->afiIva = $afiIva;

        return $this;
    }

    /**
     * Get afiIva
     *
     * @return string 
     */
    public function getAfiIva()
    {
        return $this->afiIva;
    }

    /**
     * Set afiDgrexcep
     *
     * @param \DateTime $afiDgrexcep
     * @return Afiliado
     */
    public function setAfiDgrexcep($afiDgrexcep)
    {
        $this->afiDgrexcep = $afiDgrexcep;

        return $this;
    }

    /**
     * Get afiDgrexcep
     *
     * @return \DateTime 
     */
    public function getAfiDgrexcep()
    {
        return $this->afiDgrexcep;
    }

    /**
     * Set afiDgiexcep
     *
     * @param \DateTime $afiDgiexcep
     * @return Afiliado
     */
    public function setAfiDgiexcep($afiDgiexcep)
    {
        $this->afiDgiexcep = $afiDgiexcep;

        return $this;
    }

    /**
     * Get afiDgiexcep
     *
     * @return \DateTime 
     */
    public function getAfiDgiexcep()
    {
        return $this->afiDgiexcep;
    }

    /**
     * Set afiCbu
     *
     * @param string $afiCbu
     * @return Afiliado
     */
    public function setAfiCbu($afiCbu)
    {
        $this->afiCbu = $afiCbu;

        return $this;
    }

    /**
     * Get afiCbu
     *
     * @return string 
     */
    public function getAfiCbu()
    {
        return $this->afiCbu;
    }

    /**
     * Set afiCbuCredito
     *
     * @param string $afiCbuCredito
     * @return Afiliado
     */
    public function setAfiCbuCredito($afiCbuCredito)
    {
        $this->afiCbuCredito = $afiCbuCredito;

        return $this;
    }

    /**
     * Get afiCbuCredito
     *
     * @return string 
     */
    public function getAfiCbuCredito()
    {
        return $this->afiCbuCredito;
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

    /**
     * Set afiGarantedeTipdoc
     *
     * @param \Sistema\CPCEBundle\Entity\Afiliado $afiGarantedeTipdoc
     * @return Afiliado
     */
    public function setAfiGarantedeTipdoc(\Sistema\CPCEBundle\Entity\Afiliado $afiGarantedeTipdoc = null)
    {
        $this->afiGarantedeTipdoc = $afiGarantedeTipdoc;

        return $this;
    }

    /**
     * Get afiGarantedeTipdoc
     *
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function getAfiGarantedeTipdoc()
    {
        return $this->afiGarantedeTipdoc;
    }

    /**
     * Set afiGaranteTipdoc
     *
     * @param \Sistema\CPCEBundle\Entity\Afiliado $afiGaranteTipdoc
     * @return Afiliado
     */
    public function setAfiGaranteTipdoc(\Sistema\CPCEBundle\Entity\Afiliado $afiGaranteTipdoc = null)
    {
        $this->afiGaranteTipdoc = $afiGaranteTipdoc;

        return $this;
    }

    /**
     * Get afiGaranteTipdoc
     *
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function getAfiGaranteTipdoc()
    {
        return $this->afiGaranteTipdoc;
    }

      /**
     * Set afiBenefCap1
     *
     * @param boolean $afiBenefCap1
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefCap1($afiBenefCap1)
    {
        $this->afiBenefCap1 = $afiBenefCap1;

        return $this;
    }

    /**
     * Get afiBenefCap1
     *
     * @return boolean 
     */
    public function getAfiBenefCap1()
    {
        return $this->afiBenefCap1;
    }

    /**
     * Set afiBenefCap2
     *
     * @param boolean $afiBenefCap2
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefCap2($afiBenefCap2)
    {
        $this->afiBenefCap2 = $afiBenefCap2;

        return $this;
    }

    /**
     * Get afiBenefCap2
     *
     * @return boolean 
     */
    public function getAfiBenefCap2()
    {
        return $this->afiBenefCap2;
    }

    /**
     * Set afiBenefCap3
     *
     * @param boolean $afiBenefCap3
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefCap3($afiBenefCap3)
    {
        $this->afiBenefCap3 = $afiBenefCap3;

        return $this;
    }

    /**
     * Get afiBenefCap3
     *
     * @return boolean 
     */
    public function getAfiBenefCap3()
    {
        return $this->afiBenefCap3;
    }

    /**
     * Set afiBenefCap4
     *
     * @param boolean $afiBenefCap4
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefCap4($afiBenefCap4)
    {
        $this->afiBenefCap4 = $afiBenefCap4;

        return $this;
    }

    /**
     * Get afiBenefCap4
     *
     * @return boolean 
     */
    public function getAfiBenefCap4()
    {
        return $this->afiBenefCap4;
    }

    /**
     * Set afiBenefCap5
     *
     * @param boolean $afiBenefCap5
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefCap5($afiBenefCap5)
    {
        $this->afiBenefCap5 = $afiBenefCap5;

        return $this;
    }

    /**
     * Get afiBenefCap5
     *
     * @return boolean 
     */
    public function getAfiBenefCap5()
    {
        return $this->afiBenefCap5;
    }

    /**
     * Set afiBenefCap6
     *
     * @param boolean $afiBenefCap6
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefCap6($afiBenefCap6)
    {
        $this->afiBenefCap6 = $afiBenefCap6;

        return $this;
    }

    /**
     * Get afiBenefCap6
     *
     * @return boolean 
     */
    public function getAfiBenefCap6()
    {
        return $this->afiBenefCap6;
    }

    /**
     * Set afiBenefFs1
     *
     * @param boolean $afiBenefFs1
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefFs1($afiBenefFs1)
    {
        $this->afiBenefFs1 = $afiBenefFs1;

        return $this;
    }

    /**
     * Get afiBenefFs1
     *
     * @return boolean 
     */
    public function getAfiBenefFs1()
    {
        return $this->afiBenefFs1;
    }

    /**
     * Set afiBenefFs2
     *
     * @param boolean $afiBenefFs2
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefFs2($afiBenefFs2)
    {
        $this->afiBenefFs2 = $afiBenefFs2;

        return $this;
    }

    /**
     * Get afiBenefFs2
     *
     * @return boolean 
     */
    public function getAfiBenefFs2()
    {
        return $this->afiBenefFs2;
    }

    /**
     * Set afiBenefFs3
     *
     * @param boolean $afiBenefFs3
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefFs3($afiBenefFs3)
    {
        $this->afiBenefFs3 = $afiBenefFs3;

        return $this;
    }

    /**
     * Get afiBenefFs3
     *
     * @return boolean 
     */
    public function getAfiBenefFs3()
    {
        return $this->afiBenefFs3;
    }

    /**
     * Set afiBenefFs4
     *
     * @param boolean $afiBenefFs4
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefFs4($afiBenefFs4)
    {
        $this->afiBenefFs4 = $afiBenefFs4;

        return $this;
    }

    /**
     * Get afiBenefFs4
     *
     * @return boolean 
     */
    public function getAfiBenefFs4()
    {
        return $this->afiBenefFs4;
    }

    /**
     * Set afiBenefFs5
     *
     * @param boolean $afiBenefFs5
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefFs5($afiBenefFs5)
    {
        $this->afiBenefFs5 = $afiBenefFs5;

        return $this;
    }

    /**
     * Get afiBenefFs5
     *
     * @return boolean 
     */
    public function getAfiBenefFs5()
    {
        return $this->afiBenefFs5;
    }

    /**
     * Set afiBenefFs6
     *
     * @param boolean $afiBenefFs6
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefFs6($afiBenefFs6)
    {
        $this->afiBenefFs6 = $afiBenefFs6;

        return $this;
    }

    /**
     * Get afiBenefFs6
     *
     * @return boolean 
     */
    public function getAfiBenefFs6()
    {
        return $this->afiBenefFs6;
    }

    /**
     * Set afiBenefSv1
     *
     * @param boolean $afiBenefSv1
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefSv1($afiBenefSv1)
    {
        $this->afiBenefSv1 = $afiBenefSv1;

        return $this;
    }

    /**
     * Get afiBenefSv1
     *
     * @return boolean 
     */
    public function getAfiBenefSv1()
    {
        return $this->afiBenefSv1;
    }

       /**
     * Set afiBenefSv2
     *
     * @param boolean $afiBenefSv2
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefSv2($afiBenefSv2)
    {
        $this->afiBenefSv2 = $afiBenefSv2;

        return $this;
    }

    /**
     * Get afiBenefSv2
     *
     * @return boolean 
     */
    public function getAfiBenefSv2()
    {
        return $this->afiBenefSv2;
    }

    /**
     * Set afiBenefSv3
     *
     * @param boolean $afiBenefSv3
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefSv3($afiBenefSv3)
    {
        $this->afiBenefSv3 = $afiBenefSv3;

        return $this;
    }

    /**
     * Get afiBenefSv3
     *
     * @return boolean 
     */
    public function getAfiBenefSv3()
    {
        return $this->afiBenefSv3;
    }

    /**
     * Set afiBenefSv4
     *
     * @param boolean $afiBenefSv4
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefSv4($afiBenefSv4)
    {
        $this->afiBenefSv4 = $afiBenefSv4;

        return $this;
    }

    /**
     * Get afiBenefSv4
     *
     * @return boolean 
     */
    public function getAfiBenefSv4()
    {
        return $this->afiBenefSv4;
    }

    /**
     * Set afiBenefSv5
     *
     * @param boolean $afiBenefSv5
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefSv5($afiBenefSv5)
    {
        $this->afiBenefSv5 = $afiBenefSv5;

        return $this;
    }

    /**
     * Get afiBenefSv5
     *
     * @return boolean 
     */
    public function getAfiBenefSv5()
    {
        return $this->afiBenefSv5;
    }

    /**
     * Set afiBenefSv6
     *
     * @param boolean $afiBenefSv6
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function setAfiBenefSv6($afiBenefSv6)
    {
        $this->afiBenefSv6 = $afiBenefSv6;

        return $this;
    }

    /**
     * Get afiBenefSv6
     *
     * @return boolean 
     */
    public function getAfiBenefSv6()
    {
        return $this->afiBenefSv6;
    }

}
