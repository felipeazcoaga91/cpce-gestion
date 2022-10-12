<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
// DON'T forget this use statement!!!
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Trabajo
 *
 * @ORM\Table(name="trabajo")
 * @ORM\Entity(repositoryClass="Sistema\CPCEBundle\Entity\TrabajoRepository")
 * @UniqueEntity("nroAsiento")
 * @UniqueEntity("nroLegalizacion")
 */
class Trabajo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Sistema\UserBundle\Entity\User", inversedBy="trabajos")
     * @ORM\JoinColumn(name="tra_user_id", referencedColumnName="id", nullable=false)
     * @Assert\NotNull()
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_clientecomitente", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $clienteComitente;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_comitentecuit", type="string", length=15)
     * @Assert\Regex("/\d/")
     */
    private $comitenteCuit;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_comitentedomicilio", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $comitenteDomicilio;

    /**
     * @var integer
     *
     * @ORM\Column(name="tra_cantidad", type="integer")
     * @Assert\GreaterThan(
     *     value = 0
     * )
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tra_fecha_informe", type="date")
     */
    private $fechaInforme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tra_fecha_cierre", type="date")
     */
    private $fechaCierre;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_profesional", type="string", length=100)
     */
    private $profesional;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_matricula", type="string", length=10)
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_domicilio", type="string", length=50)
     */
    private $domicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_telefono", type="string", length=50)
     * @Assert\Regex("/\d/")
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_celular", type="string", length=50)
     * @Assert\Regex("/\d/")
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_correo", type="string", length=50)
     * @Assert\Email(
     *     checkMX = true
     * )
     */
    private $correo;

    /**
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Tareas")
     * @ORM\JoinColumn(name="tra_tarea_id", referencedColumnName="tar_codigo", nullable=false)
     * @Assert\NotNull()
     */
    private $servicio;

    /**
     * @var float
     *
     * @ORM\Column(name="tra_importe1", type="float")
     * @Assert\Type(type="numeric")
     */
    private $importe1;

    /**
     * @var float
     *
     * @ORM\Column(name="tra_importe2", type="float")
     * @Assert\Type(type="numeric")
     */
    private $importe2;

    /**
     * @var float
     *
     * @ORM\Column(name="tra_activo", type="float")
     * @Assert\Type(type="numeric")
     */
    private $activo;

    /**
     * @var float
     *
     * @ORM\Column(name="tra_pasivo", type="float")
     * @Assert\Type(type="numeric")
     */
    private $pasivo;

    /**
     * @var float
     *
     * @ORM\Column(name="tra_honorariominimo", type="float")
     * @Assert\Type(type="numeric")
     */
    private $honorarioMinimo;

    /**
     * @var float
     *
     * @ORM\Column(name="tra_monto_iva", type="float", nullable=true)
     * @Assert\Type(type="numeric")
     */
    private $montoIva;

    /**
     * @var float
     *
     * @ORM\Column(name="tra_monto_aporte", type="float", nullable=true)
     * @Assert\Type(type="numeric")
     */
    private $montoAporte;

    /**
     * @var float
     *
     * @ORM\Column(name="tra_monto", type="float")
     * @Assert\Type(type="numeric")
     */
    private $monto;

    /**
     * @var float
     *
     * @ORM\Column(name="tra_monto_deposito", type="float")
     * @Assert\Type(type="numeric")
     */
    private $montoDeposito;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_condicioniva", type="string", length=2)
     */
    private $condicionIva;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_cuit", type="string", length=15)
     */
    private $cuit;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_cbu", type="string", length=22, nullable=true)
     * @Assert\Regex("/\d/")
     */
    private $cbu;

    /**
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\TrabajoEstado")
     * @ORM\JoinColumn(name="tra_estado", referencedColumnName="id", nullable=false)
     * @Assert\NotNull()
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_certificado", type="string", length=1, nullable=true)
     */
    private $certificado;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_tipo_reintegro", type="string", length=100, nullable=true)
     */
    private $tipoReintegro;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_auditoria_tipo", type="string", length=3, nullable=true)
     */
    private $auditoriaTipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="tra_nroasi", type="bigint", nullable=true, unique=true)
     */
    private $nroAsiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="tra_nrolegali", type="integer", nullable=true, unique=true)
     */
    private $nroLegalizacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="tra_nroasi_liquidacion", type="bigint", nullable=true, unique=true)
     */
    private $nroAsientoLiquidacion;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_esauditor", type="string", length=2, nullable=true)
     * @Assert\Choice(choices = {"SI", "NO"}, message = "Seleccione un valor válido.")
     */
    private $esAuditor;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_meses", type="string", length=2, nullable=true)
     */
    private $meses;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tra_porcentaje_sindico", type="decimal", precision=5, scale=2, nullable=true, options={"default":0})
      * @Assert\Range(
     *      min = 0,
     *      max = 100,
     *      minMessage = "Min % is 0",
     *      maxMessage = "Max % is 100"
     * )
     */
    private $porcentajeSindico;

    /**
     * @var float
     *
     * @ORM\Column(name="tra_importe_periodo", type="float", nullable=true, options={"default":0})
     * @Assert\Type(type="numeric")
     */
    private $importePeriodo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tra_acreditar", type="boolean", nullable=false)
     */
    private $acreditar;

    /**
     * Constructor
     */
    public function __construct($partialTrabajoEstado = null)
    {
        $this->fechaInforme = new \DateTime('Today');
        $this->fechaCierre  = new \DateTime('Today');
        $this->cantidad     = 1;
        if (!is_null($partialTrabajoEstado)) {
            $this->setEstado($partialTrabajoEstado);
        }
    }

    /**
     * @Assert\True(message = "El Monto a depositar no supera el monto mínimo de Honorarios")
     */
    public function isMontoDepositoValid()
    {
        if ((float)$this->getMontoDeposito() >= $this->getHonorarioMinimoSegunServicio()) {
            $res = true;
        } else {
            $res = false;
        }

        return $res;
    }

    /**
     * Get arancelMinimo segun Servicio
     *
     * @return float 
     */
    public function getHonorarioMinimoSegunServicio()
    {
        if (is_null($this->getServicio())) {
            $honorarioMinimoSegunServicio = 0;
        } else {
            $honorarioMinimoSegunServicio = $this->getPorcentaje() * $this->getHonorarioMinimo();
        }

        return (float)$honorarioMinimoSegunServicio;
    }
    /**
     * Obtiene el porcentaje para el calculo
     * Segun el codigo de servicio en el primer tramo osea de 0 a por ej. 12400 el importe fijo no calcula el porcentaje.
     */
    private function getPorcentaje()
    {
        $codigoServicio     = $this->getServicio()->getTarCodigo();
        //por defecto es el porcentaje del servicio
        $porcentajeServicio = $this->getServicio()->getTarPorcentajehonorario();

        if ($codigoServicio == 16 || $codigoServicio == 18) {
            $porcentajeServicio = 1;
        } elseif ($codigoServicio == 1) {
            $tarMinimo = $this->getServicio()->getTarMinimo();
            //Si el honorario minimo divido 2 es mayor al minimo del servicio tar_minimo
            if (($this->getHonorarioMinimo() / 2) <= $tarMinimo) {
                // //CON FINES DE LUCRO
                // if ($this->getAuditoriaTipo() == "CFL") {
                //     //En estos trabajos si el monto esta en el primer rango se toma como minimo 1270
                //     $porcentajeServicio = 1;
                // }
                //SIN FINES DE LUCRO
                if ($this->getAuditoriaTipo() == "SFL") {
                    //En estos trabajos si el monto esta en el primer rango se toma como minimo 500
                    $tarMinimo = $this->getHonorarioMinimo() / 2;
                	if	($tarMinimo < 7500) {
                    	$tarMinimo = 7500;
                    }
                }
                //Siempre debe ser el honorario minimo mayor o igual al tar_minimo (EXCEPTO SFL)
                $this->setHonorarioMinimo($tarMinimo);
                $porcentajeServicio = 1;
            //} else {
                //SIN FINES DE LUCRO
                //if ($this->getAuditoriaTipo() == "SFL") {
                    //En estos trabajos si el monto esta en el primer rango se toma como minimo 500
                    //$porcentajeServicio = 0.25;
                //}
            }
        } elseif ($codigoServicio == 3 || $codigoServicio == 6 || $codigoServicio == 9 || $codigoServicio == 11) {
            if ($this->getHonorarioMinimo() <= $this->getServicio()->getTarMinimo()) {
                //Siempre debe ser el honorario minimo mayor o igual al tar_minimo
                $this->setHonorarioMinimo($this->getServicio()->getTarMinimo());
                $porcentajeServicio = 1;
            }
            // //ES EL MISMO AUDITOR Y SINDICO
            // if ($this->getEsAuditor() == "SI") {
            //     //CORRESPONDE EL 50% DE LA MITAD DEL HONORARIO MINIMO
            //     $porcentajeServicio = 0.25;
            // } else {
            //     //CORRESPONDE EL 50% DEL HONORARIO MINIMO
            //     $porcentajeServicio = 0.50;
            // }
            //SI ES PERIODO INTERMEDIO
            if ($codigoServicio == 6 || $codigoServicio == 9 || $codigoServicio == 11) {
                $porcentajeServicio = $porcentajeServicio / 12 * $this->getMeses();
            }
        }
        //Si es 0.40 y NO es Periodo Intermedio entonces es Informe Especial
        //antes puse honorarioMinimo en $550 por eso defino el % en 1
        if ($porcentajeServicio == 0.40 && $codigoServicio != 6 && $codigoServicio != 9 && $codigoServicio != 11) {
            $porcentajeServicio = 1;
        }

        return $porcentajeServicio;
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

    /**
     * Set id para el form filter
     *
     * @return integer 
     */
    public function setId($id)
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \Sistema\UserBundle\Entity\User $user
     * @return Trabajo
     */
    public function setUser(\Sistema\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Sistema\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set clienteComitente
     *
     * @param string $clienteComitente
     * @return Trabajo
     */
    public function setClienteComitente($clienteComitente)
    {
        $this->clienteComitente = $clienteComitente;

        return $this;
    }

    /**
     * Get clienteComitente
     *
     * @return string 
     */
    public function getClienteComitente()
    {
        return $this->clienteComitente;
    }

    /**
     * Set comitenteCuit
     *
     * @param string $comitenteCuit
     * @return Trabajo
     */
    public function setComitenteCuit($comitenteCuit)
    {
        $this->comitenteCuit = $comitenteCuit;

        return $this;
    }

    /**
     * Get comitenteCuit
     *
     * @return string 
     */
    public function getComitenteCuit()
    {
        return $this->comitenteCuit;
    }

    /**
     * Set domicilio
     *
     * @param string $comitenteDomicilio
     * @return Trabajo
     */
    public function setComitenteDomicilio($comitenteDomicilio)
    {
        $this->comitenteDomicilio = $comitenteDomicilio;

        return $this;
    }

    /**
     * Get comitenteDomicilio
     *
     * @return string 
     */
    public function getComitenteDomicilio()
    {
        return $this->comitenteDomicilio;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Trabajo
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fechaInforme
     *
     * @param \DateTime $fechaInforme
     * @return Trabajo
     */
    public function setFechaInforme($fechaInforme)
    {
        $this->fechaInforme = $fechaInforme;

        return $this;
    }

    /**
     * Get fechaInforme
     *
     * @return \DateTime 
     */
    public function getFechaInforme()
    {
        return $this->fechaInforme;
    }

    /**
     * Set fechaCierre
     *
     * @param \DateTime $fechaCierre
     * @return Trabajo
     */
    public function setFechaCierre($fechaCierre)
    {
        $this->fechaCierre = $fechaCierre;

        return $this;
    }

    /**
     * Get fechaCierre
     *
     * @return \DateTime 
     */
    public function getFechaCierre()
    {
        return $this->fechaCierre;
    }

    /**
     * Set profesional
     *
     * @param string $profesional
     * @return Trabajo
     */
    public function setProfesional($profesional)
    {
        $this->profesional = $profesional;

        return $this;
    }

    /**
     * Get profesional
     *
     * @return string 
     */
    public function getProfesional()
    {
        return $this->profesional;
    }

    /**
     * Set matricula
     *
     * @param string $matricula
     * @return Trabajo
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
     * Set domicilio
     *
     * @param string $domicilio
     * @return Trabajo
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Trabajo
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Trabajo
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Trabajo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set servicio
     *
     * @param \Sistema\CPCEBundle\Entity\Tareas $servicio
     * @return Trabajo
     */
    public function setServicio(\Sistema\CPCEBundle\Entity\Tareas $servicio = null)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return \Sistema\CPCEBundle\Entity\Tareas 
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Set condicionIva
     *
     * @param string $condicionIva
     * @return Trabajo
     */
    public function setCondicionIva($condicionIva)
    {
        $this->condicionIva = $condicionIva;

        return $this;
    }

    /**
     * Get condicionIva
     *
     * @return string 
     */
    public function getCondicionIvaString()
    {
        if ($this->condicionIva == "SI") {
            return 'RESPONSABLE INSCRIPTO';
        } else {
            return 'MONOTRIBUTO';
        }
    }

    /**
     * Get condicionIva
     *
     * @return string 
     */
    public function getCondicionIva()
    {
        return $this->condicionIva;
    }

    /**
     * Set cuit
     *
     * @param string $cuit
     * @return Trabajo
     */
    public function setCuit($cuit)
    {
        $cuit = str_replace("-", "", $cuit);
        $this->cuit = $cuit;

        return $this;
    }

    /**
     * Get cuit
     *
     * @return string 
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set cbu
     *
     * @param string $cbu
     * @return Trabajo
     */
    public function setCbu($cbu)
    {
        $cbu = str_replace("-", "", $cbu);
        $this->cbu = $cbu;

        return $this;
    }

    /**
     * Get cbu
     *
     * @return string 
     */
    public function getCbu()
    {
        return $this->cbu;
    }

    /**
     * Set importe1
     *
     * @param float $importe1
     * @return Trabajo
     */
    public function setImporte1($importe1)
    {
        $this->importe1 = $importe1;

        return $this;
    }

    /**
     * Get importe1
     *
     * @return float 
     */
    public function getImporte1()
    {
        return $this->importe1;
    }

    /**
     * Set importe2
     *
     * @param float $importe2
     * @return Trabajo
     */
    public function setImporte2($importe2)
    {
        $this->importe2 = $importe2;

        return $this;
    }

    /**
     * Get importe2
     *
     * @return float 
     */
    public function getImporte2()
    {
        return $this->importe2;
    }

    /**
     * Set activo
     *
     * @param float $activo
     * @return Trabajo
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return float 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set pasivo
     *
     * @param float $pasivo
     * @return Trabajo
     */
    public function setPasivo($pasivo)
    {
        $this->pasivo = $pasivo;

        return $this;
    }

    /**
     * Get pasivo
     *
     * @return float 
     */
    public function getPasivo()
    {
        return $this->pasivo;
    }

    /**
     * Set honorarioMinimo
     *
     * @param float $honorarioMinimo
     * @return Trabajo
     */
    public function setHonorarioMinimo($honorarioMinimo)
    {
        $this->honorarioMinimo = $honorarioMinimo;

        return $this;
    }

    /**
     * Get honorarioMinimo
     *
     * @return float 
     */
    public function getHonorarioMinimo()
    {
        return $this->honorarioMinimo;
    }

    /**
     * Set montoIva
     *
     * @param float $montoIva
     * @return Trabajo
     */
    public function setMontoIva($montoIva)
    {
        $this->montoIva = $montoIva;

        return $this;
    }

    /**
     * Get montoIva
     *
     * @return float 
     */
    public function getMontoIva()
    {
        return $this->montoIva;
    }

    /**
     * Set montoAporte
     *
     * @param float $montoAporte
     * @return Trabajo
     */
    public function setMontoAporte($montoAporte)
    {
        $this->montoAporte = $montoAporte;

        return $this;
    }

    /**
     * Get montoAporte
     *
     * @return float 
     */
    public function getMontoAporte()
    {
        return $this->montoAporte;
    }

    /**
     * Set monto
     *
     * @param float $monto
     * @return Trabajo
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return float 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set montoDeposito
     *
     * @param float $montoDeposito
     * @return Trabajo
     */
    public function setMontoDeposito($montoDeposito)
    {
        $this->montoDeposito = $montoDeposito;

        return $this;
    }

    /**
     * Get montoDeposito
     *
     * @return float 
     */
    public function getMontoDeposito()
    {
        return $this->montoDeposito;
    }

    /**
     * Set estado
     *
     * @param \Sistema\CPCEBundle\Entity\TrabajoEstado $estado
     * @return Trabajo
     */
    public function setEstado(\Sistema\CPCEBundle\Entity\TrabajoEstado $estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \Sistema\CPCEBundle\Entity\TrabajoEstado 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set certificado
     *
     * @param string $certificado
     * @return Trabajo
     */
    public function setCertificado($certificado)
    {
        $this->certificado = $certificado;

        return $this;
    }

    /**
     * Get certificado
     *
     * @return string 
     */
    public function getCertificado()
    {
        return $this->certificado;
    }

    /**
     * Get certificadoString
     *
     * @return string 
     */
    public function getCertificadoString()
    {
        if ($this->certificado == 1) {
            $certificado = '<span class="label label-success">FINALIZADO</span>';
        } else {
            $certificado = null;
        }

        return $certificado;
    }

    /**
     * Set tipoReintegro
     *
     * @param string $tipoReintegro
     * @return Trabajo
     */
    public function setTipoReintegro($tipoReintegro)
    {
        $this->tipoReintegro = $tipoReintegro;

        return $this;
    }

    /**
     * Get tipoReintegro
     *
     * @return string 
     */
    public function getTipoReintegro()
    {
        return $this->tipoReintegro;
    }

    /**
     * Set auditoriaTipo
     *
     * @param string $auditoriaTipo
     * @return Trabajo
     */
    public function setAuditoriaTipo($auditoriaTipo)
    {
        $this->auditoriaTipo = $auditoriaTipo;

        return $this;
    }

    /**
     * Get auditoriaTipo
     *
     * @return string 
     */
    public function getAuditoriaTipo()
    {
        return $this->auditoriaTipo;
    }

    /**
     * Set nroAsiento
     *
     * @param integer $nroAsiento
     * @return Trabajo
     */
    public function setNroAsiento($nroAsiento)
    {
        $this->nroAsiento = $nroAsiento;

        return $this;
    }

    /**
     * Get nroAsiento
     *
     * @return integer 
     */
    public function getNroAsiento()
    {
        return $this->nroAsiento;
    }

    /**
     * Set nroLegalizacion
     *
     * @param integer $nroLegalizacion
     * @return Trabajo
     */
    public function setNroLegalizacion($nroLegalizacion)
    {
        $this->nroLegalizacion = $nroLegalizacion;

        return $this;
    }

    /**
     * Get nroLegalizacion
     *
     * @return integer 
     */
    public function getNroLegalizacion()
    {
        return $this->nroLegalizacion;
    }

    /**
     * Set nroAsientoLiquidacion
     *
     * @param integer $nroAsientoLiquidacion
     * @return Trabajo
     */
    public function setNroAsientoLiquidacion($nroAsientoLiquidacion)
    {
        $this->nroAsientoLiquidacion = $nroAsientoLiquidacion;

        return $this;
    }

    /**
     * Get nroAsientoLiquidacion
     *
     * @return integer 
     */
    public function getNroAsientoLiquidacion()
    {
        return $this->nroAsientoLiquidacion;
    }

    /**
     * Set esAuditor
     *
     * @param string $esAuditor
     * @return Trabajo
     */
    public function setEsAuditor($esAuditor)
    {
        $this->esAuditor = $esAuditor;

        return $this;
    }

    /**
     * Get esAuditor
     *
     * @return string 
     */
    public function getEsAuditor()
    {
        return $this->esAuditor;
    }

    /**
     * Set meses
     *
     * @param integer $meses
     * @return Trabajo
     */
    public function setMeses($meses)
    {
        $this->meses = $meses;

        return $this;
    }

    /**
     * Get meses
     *
     * @return integer 
     */
    public function getMeses()
    {
        return $this->meses;
    }

    /**
     * Set porcentajeSindico
     *
     * @param float $porcentajeSindico
     * @return Trabajo
     */
    public function setPorcentajeSindico($porcentajeSindico)
    {
        $this->porcentajeSindico = $porcentajeSindico;

        return $this;
    }

    /**
     * Get porcentajeSindico
     *
     * @return float 
     */
    public function getPorcentajeSindico()
    {
        return $this->porcentajeSindico;
    }

    /**
     * Set importePeriodo
     *
     * @param float $importePeriodo
     * @return Trabajo
     */
    public function setImportePeriodo($importePeriodo)
    {
        $this->importePeriodo = $importePeriodo;

        return $this;
    }

    /**
     * Get importePeriodo
     *
     * @return float 
     */
    public function getImportePeriodo()
    {
        return $this->importePeriodo;
    }
    
    /**
     * Set acreditar
     *
     * @param boolean $acreditar
     * @return Trabajo
     */
    public function setAcreditar($acreditar)
    {
        $this->acreditar = $acreditar;

        return $this;
    }

    /**
     * Get acreditar
     *
     * @return boolean 
     */
    public function getAcreditar()
    {
        return $this->acreditar;
    }
}