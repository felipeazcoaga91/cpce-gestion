<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Procesos
 *
 * @ORM\Table(name="procesos")
 * @ORM\Entity
 */
class Procesos
{
    /**
     * @var string
     *
     * @ORM\Column(name="pro_nombre", type="string", length=60, nullable=false)
     */
    private $proNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_impresion", type="string", length=50, nullable=false)
     */
    private $proImpresion;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_operacion", type="string", length=30, nullable=false)
     */
    private $proOperacion;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_numerador", type="string", length=8, nullable=false)
     */
    private $proNumerador;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_leyenda1", type="string", length=30, nullable=false)
     */
    private $proLeyenda1;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_leyenda2", type="string", length=30, nullable=false)
     */
    private $proLeyenda2;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_leyenda3", type="string", length=60, nullable=false)
     */
    private $proLeyenda3;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_leyenda4", type="string", length=60, nullable=false)
     */
    private $proLeyenda4;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_cpto1", type="string", length=70, nullable=false)
     */
    private $proCpto1;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_cpto2", type="string", length=70, nullable=false)
     */
    private $proCpto2;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_cpto3", type="string", length=70, nullable=false)
     */
    private $proCpto3;

    /**
     * @var integer
     *
     * @ORM\Column(name="pro_copias", type="integer", nullable=false)
     */
    private $proCopias;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_buscaf", type="string", length=2, nullable=false)
     */
    private $proBuscaf;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_cajachica", type="string", length=2, nullable=false)
     */
    private $proCajachica;

    /**
     * @var integer
     *
     * @ORM\Column(name="pro_instit", type="integer", nullable=false)
     */
    private $proInstit;

    /**
     * @var integer
     *
     * @ORM\Column(name="pro_copias2", type="integer", nullable=false)
     */
    private $proCopias2;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_procancela", type="string", length=6, nullable=false)
     */
    private $proProcancela;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPO", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_bloqfech", type="string", length=2, nullable=false)
     */
    private $proBloqfech;

    /**
     * @var string
     *
     * @ORM\Column(name="LEYENDA", type="string", length=20, nullable=true)
     */
    private $leyenda;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_catexcl", type="string", length=70, nullable=true)
     */
    private $proCatexcl;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_reporte", type="string", length=50, nullable=false)
     */
    private $proReporte;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_destinatario", type="string", length=2, nullable=false)
     */
    private $proDestinatario;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_codigo", type="string", length=6)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $proCodigo;



    /**
     * Set proNombre
     *
     * @param string $proNombre
     * @return Procesos
     */
    public function setProNombre($proNombre)
    {
        $this->proNombre = $proNombre;

        return $this;
    }

    /**
     * Get proNombre
     *
     * @return string 
     */
    public function getProNombre()
    {
        return $this->proNombre;
    }

    /**
     * Set proImpresion
     *
     * @param string $proImpresion
     * @return Procesos
     */
    public function setProImpresion($proImpresion)
    {
        $this->proImpresion = $proImpresion;

        return $this;
    }

    /**
     * Get proImpresion
     *
     * @return string 
     */
    public function getProImpresion()
    {
        return $this->proImpresion;
    }

    /**
     * Set proOperacion
     *
     * @param string $proOperacion
     * @return Procesos
     */
    public function setProOperacion($proOperacion)
    {
        $this->proOperacion = $proOperacion;

        return $this;
    }

    /**
     * Get proOperacion
     *
     * @return string 
     */
    public function getProOperacion()
    {
        return $this->proOperacion;
    }

    /**
     * Set proNumerador
     *
     * @param string $proNumerador
     * @return Procesos
     */
    public function setProNumerador($proNumerador)
    {
        $this->proNumerador = $proNumerador;

        return $this;
    }

    /**
     * Get proNumerador
     *
     * @return string 
     */
    public function getProNumerador()
    {
        return $this->proNumerador;
    }

    /**
     * Set proLeyenda1
     *
     * @param string $proLeyenda1
     * @return Procesos
     */
    public function setProLeyenda1($proLeyenda1)
    {
        $this->proLeyenda1 = $proLeyenda1;

        return $this;
    }

    /**
     * Get proLeyenda1
     *
     * @return string 
     */
    public function getProLeyenda1()
    {
        return $this->proLeyenda1;
    }

    /**
     * Set proLeyenda2
     *
     * @param string $proLeyenda2
     * @return Procesos
     */
    public function setProLeyenda2($proLeyenda2)
    {
        $this->proLeyenda2 = $proLeyenda2;

        return $this;
    }

    /**
     * Get proLeyenda2
     *
     * @return string 
     */
    public function getProLeyenda2()
    {
        return $this->proLeyenda2;
    }

    /**
     * Set proLeyenda3
     *
     * @param string $proLeyenda3
     * @return Procesos
     */
    public function setProLeyenda3($proLeyenda3)
    {
        $this->proLeyenda3 = $proLeyenda3;

        return $this;
    }

    /**
     * Get proLeyenda3
     *
     * @return string 
     */
    public function getProLeyenda3()
    {
        return $this->proLeyenda3;
    }

    /**
     * Set proLeyenda4
     *
     * @param string $proLeyenda4
     * @return Procesos
     */
    public function setProLeyenda4($proLeyenda4)
    {
        $this->proLeyenda4 = $proLeyenda4;

        return $this;
    }

    /**
     * Get proLeyenda4
     *
     * @return string 
     */
    public function getProLeyenda4()
    {
        return $this->proLeyenda4;
    }

    /**
     * Set proCpto1
     *
     * @param string $proCpto1
     * @return Procesos
     */
    public function setProCpto1($proCpto1)
    {
        $this->proCpto1 = $proCpto1;

        return $this;
    }

    /**
     * Get proCpto1
     *
     * @return string 
     */
    public function getProCpto1()
    {
        return $this->proCpto1;
    }

    /**
     * Set proCpto2
     *
     * @param string $proCpto2
     * @return Procesos
     */
    public function setProCpto2($proCpto2)
    {
        $this->proCpto2 = $proCpto2;

        return $this;
    }

    /**
     * Get proCpto2
     *
     * @return string 
     */
    public function getProCpto2()
    {
        return $this->proCpto2;
    }

    /**
     * Set proCpto3
     *
     * @param string $proCpto3
     * @return Procesos
     */
    public function setProCpto3($proCpto3)
    {
        $this->proCpto3 = $proCpto3;

        return $this;
    }

    /**
     * Get proCpto3
     *
     * @return string 
     */
    public function getProCpto3()
    {
        return $this->proCpto3;
    }

    /**
     * Set proCopias
     *
     * @param integer $proCopias
     * @return Procesos
     */
    public function setProCopias($proCopias)
    {
        $this->proCopias = $proCopias;

        return $this;
    }

    /**
     * Get proCopias
     *
     * @return integer 
     */
    public function getProCopias()
    {
        return $this->proCopias;
    }

    /**
     * Set proBuscaf
     *
     * @param string $proBuscaf
     * @return Procesos
     */
    public function setProBuscaf($proBuscaf)
    {
        $this->proBuscaf = $proBuscaf;

        return $this;
    }

    /**
     * Get proBuscaf
     *
     * @return string 
     */
    public function getProBuscaf()
    {
        return $this->proBuscaf;
    }

    /**
     * Set proCajachica
     *
     * @param string $proCajachica
     * @return Procesos
     */
    public function setProCajachica($proCajachica)
    {
        $this->proCajachica = $proCajachica;

        return $this;
    }

    /**
     * Get proCajachica
     *
     * @return string 
     */
    public function getProCajachica()
    {
        return $this->proCajachica;
    }

    /**
     * Set proInstit
     *
     * @param integer $proInstit
     * @return Procesos
     */
    public function setProInstit($proInstit)
    {
        $this->proInstit = $proInstit;

        return $this;
    }

    /**
     * Get proInstit
     *
     * @return integer 
     */
    public function getProInstit()
    {
        return $this->proInstit;
    }

    /**
     * Set proCopias2
     *
     * @param integer $proCopias2
     * @return Procesos
     */
    public function setProCopias2($proCopias2)
    {
        $this->proCopias2 = $proCopias2;

        return $this;
    }

    /**
     * Get proCopias2
     *
     * @return integer 
     */
    public function getProCopias2()
    {
        return $this->proCopias2;
    }

    /**
     * Set proProcancela
     *
     * @param string $proProcancela
     * @return Procesos
     */
    public function setProProcancela($proProcancela)
    {
        $this->proProcancela = $proProcancela;

        return $this;
    }

    /**
     * Get proProcancela
     *
     * @return string 
     */
    public function getProProcancela()
    {
        return $this->proProcancela;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Procesos
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set proBloqfech
     *
     * @param string $proBloqfech
     * @return Procesos
     */
    public function setProBloqfech($proBloqfech)
    {
        $this->proBloqfech = $proBloqfech;

        return $this;
    }

    /**
     * Get proBloqfech
     *
     * @return string 
     */
    public function getProBloqfech()
    {
        return $this->proBloqfech;
    }

    /**
     * Set leyenda
     *
     * @param string $leyenda
     * @return Procesos
     */
    public function setLeyenda($leyenda)
    {
        $this->leyenda = $leyenda;

        return $this;
    }

    /**
     * Get leyenda
     *
     * @return string 
     */
    public function getLeyenda()
    {
        return $this->leyenda;
    }

    /**
     * Set proCatexcl
     *
     * @param string $proCatexcl
     * @return Procesos
     */
    public function setProCatexcl($proCatexcl)
    {
        $this->proCatexcl = $proCatexcl;

        return $this;
    }

    /**
     * Get proCatexcl
     *
     * @return string 
     */
    public function getProCatexcl()
    {
        return $this->proCatexcl;
    }

    /**
     * Set proReporte
     *
     * @param string $proReporte
     * @return Procesos
     */
    public function setProReporte($proReporte)
    {
        $this->proReporte = $proReporte;

        return $this;
    }

    /**
     * Get proReporte
     *
     * @return string 
     */
    public function getProReporte()
    {
        return $this->proReporte;
    }

    /**
     * Set proDestinatario
     *
     * @param string $proDestinatario
     * @return Procesos
     */
    public function setProDestinatario($proDestinatario)
    {
        $this->proDestinatario = $proDestinatario;

        return $this;
    }

    /**
     * Get proDestinatario
     *
     * @return string 
     */
    public function getProDestinatario()
    {
        return $this->proDestinatario;
    }

    /**
     * Get proCodigo
     *
     * @return string 
     */
    public function getProCodigo()
    {
        return $this->proCodigo;
    }
}
