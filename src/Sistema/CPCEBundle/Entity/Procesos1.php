<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Procesos1
 *
 * @ORM\Table(name="procesos1")
 * @ORM\Entity
 */
class Procesos1
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
     * @ORM\Column(name="CTA1", type="string", length=8, nullable=true)
     */
    private $cta1;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR1", type="string", length=30, nullable=true)
     */
    private $for1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL1", type="boolean", nullable=false)
     */
    private $col1;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA2", type="string", length=8, nullable=true)
     */
    private $cta2;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR2", type="string", length=30, nullable=true)
     */
    private $for2;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL2", type="boolean", nullable=false)
     */
    private $col2;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA3", type="string", length=8, nullable=true)
     */
    private $cta3;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR3", type="string", length=30, nullable=true)
     */
    private $for3;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL3", type="boolean", nullable=false)
     */
    private $col3;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA4", type="string", length=8, nullable=true)
     */
    private $cta4;

    /**
     * @var string
     *
     * @ORM\Column(name="GOR4", type="string", length=30, nullable=true)
     */
    private $gor4;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL4", type="boolean", nullable=false)
     */
    private $col4;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA5", type="string", length=8, nullable=true)
     */
    private $cta5;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR5", type="string", length=30, nullable=true)
     */
    private $for5;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL5", type="boolean", nullable=false)
     */
    private $col5;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA6", type="string", length=8, nullable=true)
     */
    private $cta6;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR6", type="string", length=30, nullable=true)
     */
    private $for6;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL6", type="boolean", nullable=false)
     */
    private $col6;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA7", type="string", length=8, nullable=true)
     */
    private $cta7;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR7", type="string", length=30, nullable=true)
     */
    private $for7;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL7", type="boolean", nullable=false)
     */
    private $col7;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA8", type="string", length=8, nullable=true)
     */
    private $cta8;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR8", type="string", length=30, nullable=true)
     */
    private $for8;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL8", type="boolean", nullable=false)
     */
    private $col8;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA9", type="string", length=8, nullable=true)
     */
    private $cta9;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR9", type="string", length=30, nullable=true)
     */
    private $for9;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL9", type="boolean", nullable=false)
     */
    private $col9;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA10", type="string", length=8, nullable=true)
     */
    private $cta10;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR10", type="string", length=30, nullable=true)
     */
    private $for10;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL10", type="boolean", nullable=false)
     */
    private $col10;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA11", type="string", length=8, nullable=true)
     */
    private $cta11;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR11", type="string", length=30, nullable=true)
     */
    private $for11;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL11", type="boolean", nullable=false)
     */
    private $col11;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA12", type="string", length=8, nullable=true)
     */
    private $cta12;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR12", type="string", length=30, nullable=true)
     */
    private $for12;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL12", type="boolean", nullable=false)
     */
    private $col12;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA13", type="string", length=8, nullable=true)
     */
    private $cta13;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR13", type="string", length=30, nullable=true)
     */
    private $for13;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL13", type="boolean", nullable=false)
     */
    private $col13;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA14", type="string", length=8, nullable=true)
     */
    private $cta14;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR14", type="string", length=30, nullable=true)
     */
    private $for14;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL14", type="boolean", nullable=false)
     */
    private $col14;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA15", type="string", length=8, nullable=true)
     */
    private $cta15;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR15", type="string", length=30, nullable=true)
     */
    private $for15;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL15", type="boolean", nullable=false)
     */
    private $col15;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA16", type="string", length=8, nullable=true)
     */
    private $cta16;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR16", type="string", length=90, nullable=true)
     */
    private $for16;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL16", type="boolean", nullable=false)
     */
    private $col16;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA17", type="string", length=8, nullable=true)
     */
    private $cta17;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR17", type="string", length=90, nullable=true)
     */
    private $for17;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL17", type="boolean", nullable=false)
     */
    private $col17;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA18", type="string", length=8, nullable=true)
     */
    private $cta18;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR18", type="string", length=120, nullable=true)
     */
    private $for18;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL18", type="boolean", nullable=false)
     */
    private $col18;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA19", type="string", length=8, nullable=true)
     */
    private $cta19;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR19", type="string", length=120, nullable=true)
     */
    private $for19;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL19", type="boolean", nullable=false)
     */
    private $col19;

    /**
     * @var string
     *
     * @ORM\Column(name="CTA20", type="string", length=8, nullable=true)
     */
    private $cta20;

    /**
     * @var string
     *
     * @ORM\Column(name="FOR20", type="string", length=90, nullable=true)
     */
    private $for20;

    /**
     * @var boolean
     *
     * @ORM\Column(name="COL20", type="boolean", nullable=false)
     */
    private $col20;

    /**
     * @var string
     *
     * @ORM\Column(name="OPERACION", type="string", length=30, nullable=true)
     */
    private $operacion;

    /**
     * @var string
     *
     * @ORM\Column(name="NUMERADOR", type="string", length=8, nullable=true)
     */
    private $numerador;

    /**
     * @var string
     *
     * @ORM\Column(name="LEYENDA1", type="string", length=30, nullable=true)
     */
    private $leyenda1;

    /**
     * @var string
     *
     * @ORM\Column(name="LEYENDA2", type="string", length=30, nullable=true)
     */
    private $leyenda2;

    /**
     * @var string
     *
     * @ORM\Column(name="LEYENDA3", type="string", length=60, nullable=true)
     */
    private $leyenda3;

    /**
     * @var string
     *
     * @ORM\Column(name="LEYENDA4", type="string", length=60, nullable=true)
     */
    private $leyenda4;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ESTADO_CTA", type="boolean", nullable=false)
     */
    private $estadoCta;

    /**
     * @var string
     *
     * @ORM\Column(name="CPTO1", type="string", length=70, nullable=true)
     */
    private $cpto1;

    /**
     * @var string
     *
     * @ORM\Column(name="CPTO2", type="string", length=70, nullable=true)
     */
    private $cpto2;

    /**
     * @var string
     *
     * @ORM\Column(name="CPTO3", type="string", length=70, nullable=true)
     */
    private $cpto3;

    /**
     * @var float
     *
     * @ORM\Column(name="COPIAS", type="float", precision=53, scale=0, nullable=true)
     */
    private $copias;

    /**
     * @var boolean
     *
     * @ORM\Column(name="BUSCAF", type="boolean", nullable=false)
     */
    private $buscaf;

    /**
     * @var string
     *
     * @ORM\Column(name="INSTIT", type="string", length=2, nullable=true)
     */
    private $instit;

    /**
     * @var float
     *
     * @ORM\Column(name="COPIAS2", type="float", precision=53, scale=0, nullable=true)
     */
    private $copias2;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPO", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="BLOQFECH", type="boolean", nullable=false)
     */
    private $bloqfech;

    /**
     * @var string
     *
     * @ORM\Column(name="LEYENDA", type="string", length=20, nullable=true)
     */
    private $leyenda;

    /**
     * @var boolean
     *
     * @ORM\Column(name="C1", type="boolean", nullable=false)
     */
    private $c1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="C2", type="boolean", nullable=false)
     */
    private $c2;

    /**
     * @var boolean
     *
     * @ORM\Column(name="C3", type="boolean", nullable=false)
     */
    private $c3;

    /**
     * @var boolean
     *
     * @ORM\Column(name="C4", type="boolean", nullable=false)
     */
    private $c4;

    /**
     * @var boolean
     *
     * @ORM\Column(name="PREIMPRESO", type="boolean", nullable=false)
     */
    private $preimpreso;

    /**
     * @var boolean
     *
     * @ORM\Column(name="PREIMPRE2", type="boolean", nullable=false)
     */
    private $preimpre2;

    /**
     * @var string
     *
     * @ORM\Column(name="CATEXCL", type="string", length=70, nullable=true)
     */
    private $catexcl;

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
     * @return Procesos1
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
     * Set cta1
     *
     * @param string $cta1
     * @return Procesos1
     */
    public function setCta1($cta1)
    {
        $this->cta1 = $cta1;

        return $this;
    }

    /**
     * Get cta1
     *
     * @return string 
     */
    public function getCta1()
    {
        return $this->cta1;
    }

    /**
     * Set for1
     *
     * @param string $for1
     * @return Procesos1
     */
    public function setFor1($for1)
    {
        $this->for1 = $for1;

        return $this;
    }

    /**
     * Get for1
     *
     * @return string 
     */
    public function getFor1()
    {
        return $this->for1;
    }

    /**
     * Set col1
     *
     * @param boolean $col1
     * @return Procesos1
     */
    public function setCol1($col1)
    {
        $this->col1 = $col1;

        return $this;
    }

    /**
     * Get col1
     *
     * @return boolean 
     */
    public function getCol1()
    {
        return $this->col1;
    }

    /**
     * Set cta2
     *
     * @param string $cta2
     * @return Procesos1
     */
    public function setCta2($cta2)
    {
        $this->cta2 = $cta2;

        return $this;
    }

    /**
     * Get cta2
     *
     * @return string 
     */
    public function getCta2()
    {
        return $this->cta2;
    }

    /**
     * Set for2
     *
     * @param string $for2
     * @return Procesos1
     */
    public function setFor2($for2)
    {
        $this->for2 = $for2;

        return $this;
    }

    /**
     * Get for2
     *
     * @return string 
     */
    public function getFor2()
    {
        return $this->for2;
    }

    /**
     * Set col2
     *
     * @param boolean $col2
     * @return Procesos1
     */
    public function setCol2($col2)
    {
        $this->col2 = $col2;

        return $this;
    }

    /**
     * Get col2
     *
     * @return boolean 
     */
    public function getCol2()
    {
        return $this->col2;
    }

    /**
     * Set cta3
     *
     * @param string $cta3
     * @return Procesos1
     */
    public function setCta3($cta3)
    {
        $this->cta3 = $cta3;

        return $this;
    }

    /**
     * Get cta3
     *
     * @return string 
     */
    public function getCta3()
    {
        return $this->cta3;
    }

    /**
     * Set for3
     *
     * @param string $for3
     * @return Procesos1
     */
    public function setFor3($for3)
    {
        $this->for3 = $for3;

        return $this;
    }

    /**
     * Get for3
     *
     * @return string 
     */
    public function getFor3()
    {
        return $this->for3;
    }

    /**
     * Set col3
     *
     * @param boolean $col3
     * @return Procesos1
     */
    public function setCol3($col3)
    {
        $this->col3 = $col3;

        return $this;
    }

    /**
     * Get col3
     *
     * @return boolean 
     */
    public function getCol3()
    {
        return $this->col3;
    }

    /**
     * Set cta4
     *
     * @param string $cta4
     * @return Procesos1
     */
    public function setCta4($cta4)
    {
        $this->cta4 = $cta4;

        return $this;
    }

    /**
     * Get cta4
     *
     * @return string 
     */
    public function getCta4()
    {
        return $this->cta4;
    }

    /**
     * Set gor4
     *
     * @param string $gor4
     * @return Procesos1
     */
    public function setGor4($gor4)
    {
        $this->gor4 = $gor4;

        return $this;
    }

    /**
     * Get gor4
     *
     * @return string 
     */
    public function getGor4()
    {
        return $this->gor4;
    }

    /**
     * Set col4
     *
     * @param boolean $col4
     * @return Procesos1
     */
    public function setCol4($col4)
    {
        $this->col4 = $col4;

        return $this;
    }

    /**
     * Get col4
     *
     * @return boolean 
     */
    public function getCol4()
    {
        return $this->col4;
    }

    /**
     * Set cta5
     *
     * @param string $cta5
     * @return Procesos1
     */
    public function setCta5($cta5)
    {
        $this->cta5 = $cta5;

        return $this;
    }

    /**
     * Get cta5
     *
     * @return string 
     */
    public function getCta5()
    {
        return $this->cta5;
    }

    /**
     * Set for5
     *
     * @param string $for5
     * @return Procesos1
     */
    public function setFor5($for5)
    {
        $this->for5 = $for5;

        return $this;
    }

    /**
     * Get for5
     *
     * @return string 
     */
    public function getFor5()
    {
        return $this->for5;
    }

    /**
     * Set col5
     *
     * @param boolean $col5
     * @return Procesos1
     */
    public function setCol5($col5)
    {
        $this->col5 = $col5;

        return $this;
    }

    /**
     * Get col5
     *
     * @return boolean 
     */
    public function getCol5()
    {
        return $this->col5;
    }

    /**
     * Set cta6
     *
     * @param string $cta6
     * @return Procesos1
     */
    public function setCta6($cta6)
    {
        $this->cta6 = $cta6;

        return $this;
    }

    /**
     * Get cta6
     *
     * @return string 
     */
    public function getCta6()
    {
        return $this->cta6;
    }

    /**
     * Set for6
     *
     * @param string $for6
     * @return Procesos1
     */
    public function setFor6($for6)
    {
        $this->for6 = $for6;

        return $this;
    }

    /**
     * Get for6
     *
     * @return string 
     */
    public function getFor6()
    {
        return $this->for6;
    }

    /**
     * Set col6
     *
     * @param boolean $col6
     * @return Procesos1
     */
    public function setCol6($col6)
    {
        $this->col6 = $col6;

        return $this;
    }

    /**
     * Get col6
     *
     * @return boolean 
     */
    public function getCol6()
    {
        return $this->col6;
    }

    /**
     * Set cta7
     *
     * @param string $cta7
     * @return Procesos1
     */
    public function setCta7($cta7)
    {
        $this->cta7 = $cta7;

        return $this;
    }

    /**
     * Get cta7
     *
     * @return string 
     */
    public function getCta7()
    {
        return $this->cta7;
    }

    /**
     * Set for7
     *
     * @param string $for7
     * @return Procesos1
     */
    public function setFor7($for7)
    {
        $this->for7 = $for7;

        return $this;
    }

    /**
     * Get for7
     *
     * @return string 
     */
    public function getFor7()
    {
        return $this->for7;
    }

    /**
     * Set col7
     *
     * @param boolean $col7
     * @return Procesos1
     */
    public function setCol7($col7)
    {
        $this->col7 = $col7;

        return $this;
    }

    /**
     * Get col7
     *
     * @return boolean 
     */
    public function getCol7()
    {
        return $this->col7;
    }

    /**
     * Set cta8
     *
     * @param string $cta8
     * @return Procesos1
     */
    public function setCta8($cta8)
    {
        $this->cta8 = $cta8;

        return $this;
    }

    /**
     * Get cta8
     *
     * @return string 
     */
    public function getCta8()
    {
        return $this->cta8;
    }

    /**
     * Set for8
     *
     * @param string $for8
     * @return Procesos1
     */
    public function setFor8($for8)
    {
        $this->for8 = $for8;

        return $this;
    }

    /**
     * Get for8
     *
     * @return string 
     */
    public function getFor8()
    {
        return $this->for8;
    }

    /**
     * Set col8
     *
     * @param boolean $col8
     * @return Procesos1
     */
    public function setCol8($col8)
    {
        $this->col8 = $col8;

        return $this;
    }

    /**
     * Get col8
     *
     * @return boolean 
     */
    public function getCol8()
    {
        return $this->col8;
    }

    /**
     * Set cta9
     *
     * @param string $cta9
     * @return Procesos1
     */
    public function setCta9($cta9)
    {
        $this->cta9 = $cta9;

        return $this;
    }

    /**
     * Get cta9
     *
     * @return string 
     */
    public function getCta9()
    {
        return $this->cta9;
    }

    /**
     * Set for9
     *
     * @param string $for9
     * @return Procesos1
     */
    public function setFor9($for9)
    {
        $this->for9 = $for9;

        return $this;
    }

    /**
     * Get for9
     *
     * @return string 
     */
    public function getFor9()
    {
        return $this->for9;
    }

    /**
     * Set col9
     *
     * @param boolean $col9
     * @return Procesos1
     */
    public function setCol9($col9)
    {
        $this->col9 = $col9;

        return $this;
    }

    /**
     * Get col9
     *
     * @return boolean 
     */
    public function getCol9()
    {
        return $this->col9;
    }

    /**
     * Set cta10
     *
     * @param string $cta10
     * @return Procesos1
     */
    public function setCta10($cta10)
    {
        $this->cta10 = $cta10;

        return $this;
    }

    /**
     * Get cta10
     *
     * @return string 
     */
    public function getCta10()
    {
        return $this->cta10;
    }

    /**
     * Set for10
     *
     * @param string $for10
     * @return Procesos1
     */
    public function setFor10($for10)
    {
        $this->for10 = $for10;

        return $this;
    }

    /**
     * Get for10
     *
     * @return string 
     */
    public function getFor10()
    {
        return $this->for10;
    }

    /**
     * Set col10
     *
     * @param boolean $col10
     * @return Procesos1
     */
    public function setCol10($col10)
    {
        $this->col10 = $col10;

        return $this;
    }

    /**
     * Get col10
     *
     * @return boolean 
     */
    public function getCol10()
    {
        return $this->col10;
    }

    /**
     * Set cta11
     *
     * @param string $cta11
     * @return Procesos1
     */
    public function setCta11($cta11)
    {
        $this->cta11 = $cta11;

        return $this;
    }

    /**
     * Get cta11
     *
     * @return string 
     */
    public function getCta11()
    {
        return $this->cta11;
    }

    /**
     * Set for11
     *
     * @param string $for11
     * @return Procesos1
     */
    public function setFor11($for11)
    {
        $this->for11 = $for11;

        return $this;
    }

    /**
     * Get for11
     *
     * @return string 
     */
    public function getFor11()
    {
        return $this->for11;
    }

    /**
     * Set col11
     *
     * @param boolean $col11
     * @return Procesos1
     */
    public function setCol11($col11)
    {
        $this->col11 = $col11;

        return $this;
    }

    /**
     * Get col11
     *
     * @return boolean 
     */
    public function getCol11()
    {
        return $this->col11;
    }

    /**
     * Set cta12
     *
     * @param string $cta12
     * @return Procesos1
     */
    public function setCta12($cta12)
    {
        $this->cta12 = $cta12;

        return $this;
    }

    /**
     * Get cta12
     *
     * @return string 
     */
    public function getCta12()
    {
        return $this->cta12;
    }

    /**
     * Set for12
     *
     * @param string $for12
     * @return Procesos1
     */
    public function setFor12($for12)
    {
        $this->for12 = $for12;

        return $this;
    }

    /**
     * Get for12
     *
     * @return string 
     */
    public function getFor12()
    {
        return $this->for12;
    }

    /**
     * Set col12
     *
     * @param boolean $col12
     * @return Procesos1
     */
    public function setCol12($col12)
    {
        $this->col12 = $col12;

        return $this;
    }

    /**
     * Get col12
     *
     * @return boolean 
     */
    public function getCol12()
    {
        return $this->col12;
    }

    /**
     * Set cta13
     *
     * @param string $cta13
     * @return Procesos1
     */
    public function setCta13($cta13)
    {
        $this->cta13 = $cta13;

        return $this;
    }

    /**
     * Get cta13
     *
     * @return string 
     */
    public function getCta13()
    {
        return $this->cta13;
    }

    /**
     * Set for13
     *
     * @param string $for13
     * @return Procesos1
     */
    public function setFor13($for13)
    {
        $this->for13 = $for13;

        return $this;
    }

    /**
     * Get for13
     *
     * @return string 
     */
    public function getFor13()
    {
        return $this->for13;
    }

    /**
     * Set col13
     *
     * @param boolean $col13
     * @return Procesos1
     */
    public function setCol13($col13)
    {
        $this->col13 = $col13;

        return $this;
    }

    /**
     * Get col13
     *
     * @return boolean 
     */
    public function getCol13()
    {
        return $this->col13;
    }

    /**
     * Set cta14
     *
     * @param string $cta14
     * @return Procesos1
     */
    public function setCta14($cta14)
    {
        $this->cta14 = $cta14;

        return $this;
    }

    /**
     * Get cta14
     *
     * @return string 
     */
    public function getCta14()
    {
        return $this->cta14;
    }

    /**
     * Set for14
     *
     * @param string $for14
     * @return Procesos1
     */
    public function setFor14($for14)
    {
        $this->for14 = $for14;

        return $this;
    }

    /**
     * Get for14
     *
     * @return string 
     */
    public function getFor14()
    {
        return $this->for14;
    }

    /**
     * Set col14
     *
     * @param boolean $col14
     * @return Procesos1
     */
    public function setCol14($col14)
    {
        $this->col14 = $col14;

        return $this;
    }

    /**
     * Get col14
     *
     * @return boolean 
     */
    public function getCol14()
    {
        return $this->col14;
    }

    /**
     * Set cta15
     *
     * @param string $cta15
     * @return Procesos1
     */
    public function setCta15($cta15)
    {
        $this->cta15 = $cta15;

        return $this;
    }

    /**
     * Get cta15
     *
     * @return string 
     */
    public function getCta15()
    {
        return $this->cta15;
    }

    /**
     * Set for15
     *
     * @param string $for15
     * @return Procesos1
     */
    public function setFor15($for15)
    {
        $this->for15 = $for15;

        return $this;
    }

    /**
     * Get for15
     *
     * @return string 
     */
    public function getFor15()
    {
        return $this->for15;
    }

    /**
     * Set col15
     *
     * @param boolean $col15
     * @return Procesos1
     */
    public function setCol15($col15)
    {
        $this->col15 = $col15;

        return $this;
    }

    /**
     * Get col15
     *
     * @return boolean 
     */
    public function getCol15()
    {
        return $this->col15;
    }

    /**
     * Set cta16
     *
     * @param string $cta16
     * @return Procesos1
     */
    public function setCta16($cta16)
    {
        $this->cta16 = $cta16;

        return $this;
    }

    /**
     * Get cta16
     *
     * @return string 
     */
    public function getCta16()
    {
        return $this->cta16;
    }

    /**
     * Set for16
     *
     * @param string $for16
     * @return Procesos1
     */
    public function setFor16($for16)
    {
        $this->for16 = $for16;

        return $this;
    }

    /**
     * Get for16
     *
     * @return string 
     */
    public function getFor16()
    {
        return $this->for16;
    }

    /**
     * Set col16
     *
     * @param boolean $col16
     * @return Procesos1
     */
    public function setCol16($col16)
    {
        $this->col16 = $col16;

        return $this;
    }

    /**
     * Get col16
     *
     * @return boolean 
     */
    public function getCol16()
    {
        return $this->col16;
    }

    /**
     * Set cta17
     *
     * @param string $cta17
     * @return Procesos1
     */
    public function setCta17($cta17)
    {
        $this->cta17 = $cta17;

        return $this;
    }

    /**
     * Get cta17
     *
     * @return string 
     */
    public function getCta17()
    {
        return $this->cta17;
    }

    /**
     * Set for17
     *
     * @param string $for17
     * @return Procesos1
     */
    public function setFor17($for17)
    {
        $this->for17 = $for17;

        return $this;
    }

    /**
     * Get for17
     *
     * @return string 
     */
    public function getFor17()
    {
        return $this->for17;
    }

    /**
     * Set col17
     *
     * @param boolean $col17
     * @return Procesos1
     */
    public function setCol17($col17)
    {
        $this->col17 = $col17;

        return $this;
    }

    /**
     * Get col17
     *
     * @return boolean 
     */
    public function getCol17()
    {
        return $this->col17;
    }

    /**
     * Set cta18
     *
     * @param string $cta18
     * @return Procesos1
     */
    public function setCta18($cta18)
    {
        $this->cta18 = $cta18;

        return $this;
    }

    /**
     * Get cta18
     *
     * @return string 
     */
    public function getCta18()
    {
        return $this->cta18;
    }

    /**
     * Set for18
     *
     * @param string $for18
     * @return Procesos1
     */
    public function setFor18($for18)
    {
        $this->for18 = $for18;

        return $this;
    }

    /**
     * Get for18
     *
     * @return string 
     */
    public function getFor18()
    {
        return $this->for18;
    }

    /**
     * Set col18
     *
     * @param boolean $col18
     * @return Procesos1
     */
    public function setCol18($col18)
    {
        $this->col18 = $col18;

        return $this;
    }

    /**
     * Get col18
     *
     * @return boolean 
     */
    public function getCol18()
    {
        return $this->col18;
    }

    /**
     * Set cta19
     *
     * @param string $cta19
     * @return Procesos1
     */
    public function setCta19($cta19)
    {
        $this->cta19 = $cta19;

        return $this;
    }

    /**
     * Get cta19
     *
     * @return string 
     */
    public function getCta19()
    {
        return $this->cta19;
    }

    /**
     * Set for19
     *
     * @param string $for19
     * @return Procesos1
     */
    public function setFor19($for19)
    {
        $this->for19 = $for19;

        return $this;
    }

    /**
     * Get for19
     *
     * @return string 
     */
    public function getFor19()
    {
        return $this->for19;
    }

    /**
     * Set col19
     *
     * @param boolean $col19
     * @return Procesos1
     */
    public function setCol19($col19)
    {
        $this->col19 = $col19;

        return $this;
    }

    /**
     * Get col19
     *
     * @return boolean 
     */
    public function getCol19()
    {
        return $this->col19;
    }

    /**
     * Set cta20
     *
     * @param string $cta20
     * @return Procesos1
     */
    public function setCta20($cta20)
    {
        $this->cta20 = $cta20;

        return $this;
    }

    /**
     * Get cta20
     *
     * @return string 
     */
    public function getCta20()
    {
        return $this->cta20;
    }

    /**
     * Set for20
     *
     * @param string $for20
     * @return Procesos1
     */
    public function setFor20($for20)
    {
        $this->for20 = $for20;

        return $this;
    }

    /**
     * Get for20
     *
     * @return string 
     */
    public function getFor20()
    {
        return $this->for20;
    }

    /**
     * Set col20
     *
     * @param boolean $col20
     * @return Procesos1
     */
    public function setCol20($col20)
    {
        $this->col20 = $col20;

        return $this;
    }

    /**
     * Get col20
     *
     * @return boolean 
     */
    public function getCol20()
    {
        return $this->col20;
    }

    /**
     * Set operacion
     *
     * @param string $operacion
     * @return Procesos1
     */
    public function setOperacion($operacion)
    {
        $this->operacion = $operacion;

        return $this;
    }

    /**
     * Get operacion
     *
     * @return string 
     */
    public function getOperacion()
    {
        return $this->operacion;
    }

    /**
     * Set numerador
     *
     * @param string $numerador
     * @return Procesos1
     */
    public function setNumerador($numerador)
    {
        $this->numerador = $numerador;

        return $this;
    }

    /**
     * Get numerador
     *
     * @return string 
     */
    public function getNumerador()
    {
        return $this->numerador;
    }

    /**
     * Set leyenda1
     *
     * @param string $leyenda1
     * @return Procesos1
     */
    public function setLeyenda1($leyenda1)
    {
        $this->leyenda1 = $leyenda1;

        return $this;
    }

    /**
     * Get leyenda1
     *
     * @return string 
     */
    public function getLeyenda1()
    {
        return $this->leyenda1;
    }

    /**
     * Set leyenda2
     *
     * @param string $leyenda2
     * @return Procesos1
     */
    public function setLeyenda2($leyenda2)
    {
        $this->leyenda2 = $leyenda2;

        return $this;
    }

    /**
     * Get leyenda2
     *
     * @return string 
     */
    public function getLeyenda2()
    {
        return $this->leyenda2;
    }

    /**
     * Set leyenda3
     *
     * @param string $leyenda3
     * @return Procesos1
     */
    public function setLeyenda3($leyenda3)
    {
        $this->leyenda3 = $leyenda3;

        return $this;
    }

    /**
     * Get leyenda3
     *
     * @return string 
     */
    public function getLeyenda3()
    {
        return $this->leyenda3;
    }

    /**
     * Set leyenda4
     *
     * @param string $leyenda4
     * @return Procesos1
     */
    public function setLeyenda4($leyenda4)
    {
        $this->leyenda4 = $leyenda4;

        return $this;
    }

    /**
     * Get leyenda4
     *
     * @return string 
     */
    public function getLeyenda4()
    {
        return $this->leyenda4;
    }

    /**
     * Set estadoCta
     *
     * @param boolean $estadoCta
     * @return Procesos1
     */
    public function setEstadoCta($estadoCta)
    {
        $this->estadoCta = $estadoCta;

        return $this;
    }

    /**
     * Get estadoCta
     *
     * @return boolean 
     */
    public function getEstadoCta()
    {
        return $this->estadoCta;
    }

    /**
     * Set cpto1
     *
     * @param string $cpto1
     * @return Procesos1
     */
    public function setCpto1($cpto1)
    {
        $this->cpto1 = $cpto1;

        return $this;
    }

    /**
     * Get cpto1
     *
     * @return string 
     */
    public function getCpto1()
    {
        return $this->cpto1;
    }

    /**
     * Set cpto2
     *
     * @param string $cpto2
     * @return Procesos1
     */
    public function setCpto2($cpto2)
    {
        $this->cpto2 = $cpto2;

        return $this;
    }

    /**
     * Get cpto2
     *
     * @return string 
     */
    public function getCpto2()
    {
        return $this->cpto2;
    }

    /**
     * Set cpto3
     *
     * @param string $cpto3
     * @return Procesos1
     */
    public function setCpto3($cpto3)
    {
        $this->cpto3 = $cpto3;

        return $this;
    }

    /**
     * Get cpto3
     *
     * @return string 
     */
    public function getCpto3()
    {
        return $this->cpto3;
    }

    /**
     * Set copias
     *
     * @param float $copias
     * @return Procesos1
     */
    public function setCopias($copias)
    {
        $this->copias = $copias;

        return $this;
    }

    /**
     * Get copias
     *
     * @return float 
     */
    public function getCopias()
    {
        return $this->copias;
    }

    /**
     * Set buscaf
     *
     * @param boolean $buscaf
     * @return Procesos1
     */
    public function setBuscaf($buscaf)
    {
        $this->buscaf = $buscaf;

        return $this;
    }

    /**
     * Get buscaf
     *
     * @return boolean 
     */
    public function getBuscaf()
    {
        return $this->buscaf;
    }

    /**
     * Set instit
     *
     * @param string $instit
     * @return Procesos1
     */
    public function setInstit($instit)
    {
        $this->instit = $instit;

        return $this;
    }

    /**
     * Get instit
     *
     * @return string 
     */
    public function getInstit()
    {
        return $this->instit;
    }

    /**
     * Set copias2
     *
     * @param float $copias2
     * @return Procesos1
     */
    public function setCopias2($copias2)
    {
        $this->copias2 = $copias2;

        return $this;
    }

    /**
     * Get copias2
     *
     * @return float 
     */
    public function getCopias2()
    {
        return $this->copias2;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Procesos1
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
     * Set bloqfech
     *
     * @param boolean $bloqfech
     * @return Procesos1
     */
    public function setBloqfech($bloqfech)
    {
        $this->bloqfech = $bloqfech;

        return $this;
    }

    /**
     * Get bloqfech
     *
     * @return boolean 
     */
    public function getBloqfech()
    {
        return $this->bloqfech;
    }

    /**
     * Set leyenda
     *
     * @param string $leyenda
     * @return Procesos1
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
     * Set c1
     *
     * @param boolean $c1
     * @return Procesos1
     */
    public function setC1($c1)
    {
        $this->c1 = $c1;

        return $this;
    }

    /**
     * Get c1
     *
     * @return boolean 
     */
    public function getC1()
    {
        return $this->c1;
    }

    /**
     * Set c2
     *
     * @param boolean $c2
     * @return Procesos1
     */
    public function setC2($c2)
    {
        $this->c2 = $c2;

        return $this;
    }

    /**
     * Get c2
     *
     * @return boolean 
     */
    public function getC2()
    {
        return $this->c2;
    }

    /**
     * Set c3
     *
     * @param boolean $c3
     * @return Procesos1
     */
    public function setC3($c3)
    {
        $this->c3 = $c3;

        return $this;
    }

    /**
     * Get c3
     *
     * @return boolean 
     */
    public function getC3()
    {
        return $this->c3;
    }

    /**
     * Set c4
     *
     * @param boolean $c4
     * @return Procesos1
     */
    public function setC4($c4)
    {
        $this->c4 = $c4;

        return $this;
    }

    /**
     * Get c4
     *
     * @return boolean 
     */
    public function getC4()
    {
        return $this->c4;
    }

    /**
     * Set preimpreso
     *
     * @param boolean $preimpreso
     * @return Procesos1
     */
    public function setPreimpreso($preimpreso)
    {
        $this->preimpreso = $preimpreso;

        return $this;
    }

    /**
     * Get preimpreso
     *
     * @return boolean 
     */
    public function getPreimpreso()
    {
        return $this->preimpreso;
    }

    /**
     * Set preimpre2
     *
     * @param boolean $preimpre2
     * @return Procesos1
     */
    public function setPreimpre2($preimpre2)
    {
        $this->preimpre2 = $preimpre2;

        return $this;
    }

    /**
     * Get preimpre2
     *
     * @return boolean 
     */
    public function getPreimpre2()
    {
        return $this->preimpre2;
    }

    /**
     * Set catexcl
     *
     * @param string $catexcl
     * @return Procesos1
     */
    public function setCatexcl($catexcl)
    {
        $this->catexcl = $catexcl;

        return $this;
    }

    /**
     * Get catexcl
     *
     * @return string 
     */
    public function getCatexcl()
    {
        return $this->catexcl;
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
