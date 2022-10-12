<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cajas
 *
 * @ORM\Table(name="cajas", indexes={@ORM\Index(name="SKLOTE", columns={"caj_lote"})})
 * @ORM\Entity
 */
class Cajas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="caj_encarg", type="integer", nullable=false)
     */
    private $cajEncarg;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_cajact", type="string", length=1, nullable=false)
     */
    private $cajCajact;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_turno", type="string", length=1, nullable=false)
     */
    private $cajTurno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="caj_fecven", type="date", nullable=false)
     */
    private $cajFecven;

    /**
     * @var integer
     *
     * @ORM\Column(name="caj_opeape", type="integer", nullable=false)
     */
    private $cajOpeape;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="caj_fecape", type="datetime", nullable=false)
     */
    private $cajFecape;

    /**
     * @var integer
     *
     * @ORM\Column(name="caj_opecie", type="integer", nullable=false)
     */
    private $cajOpecie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="caj_feccie", type="datetime", nullable=false)
     */
    private $cajFeccie;

    /**
     * @var float
     *
     * @ORM\Column(name="caj_lote", type="float", precision=14, scale=0, nullable=false)
     */
    private $cajLote;

    /**
     * @var integer
     *
     * @ORM\Column(name="caj_canope", type="integer", nullable=false)
     */
    private $cajCanope;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_cfbcdo", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajCfbcdo;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_ifbcdo", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajIfbcdo;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_cfbcta", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajCfbcta;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_ifbcta", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajIfbcta;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_cfbtar", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajCfbtar;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_ifbtar", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajIfbtar;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_cnccdo", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajCnccdo;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_inccta", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajInccta;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_cnctar", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajCnctar;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_efeini", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajEfeini;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acubru", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcubru;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acudes", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcudes;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acunet", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcunet;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acuefe", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcuefe;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acucre", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcucre;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acutar", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcutar;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acucta", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcucta;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acucos", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcucos;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acuobr", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcuobr;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acusin", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcusin;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acucon", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcucon;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_acuuni", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajAcuuni;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_dpt_01", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajDpt01;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_dpt_02", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajDpt02;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_dpt_03", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajDpt03;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_dpt_04", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajDpt04;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_dpt_05", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajDpt05;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_dpt_06", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajDpt06;

    /**
     * @var string
     *
     * @ORM\Column(name="caj_dpt_07", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cajDpt07;

    /**
     * @var integer
     *
     * @ORM\Column(name="caj_regope", type="integer", nullable=false)
     */
    private $cajRegope;

    /**
     * @var integer
     *
     * @ORM\Column(name="caj_nrocli", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cajNrocli;

    /**
     * @var integer
     *
     * @ORM\Column(name="caj_caja", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cajCaja;

    /**
     * @var integer
     *
     * @ORM\Column(name="caj_zeta", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cajZeta;



    /**
     * Set cajEncarg
     *
     * @param integer $cajEncarg
     * @return Cajas
     */
    public function setCajEncarg($cajEncarg)
    {
        $this->cajEncarg = $cajEncarg;

        return $this;
    }

    /**
     * Get cajEncarg
     *
     * @return integer 
     */
    public function getCajEncarg()
    {
        return $this->cajEncarg;
    }

    /**
     * Set cajCajact
     *
     * @param string $cajCajact
     * @return Cajas
     */
    public function setCajCajact($cajCajact)
    {
        $this->cajCajact = $cajCajact;

        return $this;
    }

    /**
     * Get cajCajact
     *
     * @return string 
     */
    public function getCajCajact()
    {
        return $this->cajCajact;
    }

    /**
     * Set cajTurno
     *
     * @param string $cajTurno
     * @return Cajas
     */
    public function setCajTurno($cajTurno)
    {
        $this->cajTurno = $cajTurno;

        return $this;
    }

    /**
     * Get cajTurno
     *
     * @return string 
     */
    public function getCajTurno()
    {
        return $this->cajTurno;
    }

    /**
     * Set cajFecven
     *
     * @param \DateTime $cajFecven
     * @return Cajas
     */
    public function setCajFecven($cajFecven)
    {
        $this->cajFecven = $cajFecven;

        return $this;
    }

    /**
     * Get cajFecven
     *
     * @return \DateTime 
     */
    public function getCajFecven()
    {
        return $this->cajFecven;
    }

    /**
     * Set cajOpeape
     *
     * @param integer $cajOpeape
     * @return Cajas
     */
    public function setCajOpeape($cajOpeape)
    {
        $this->cajOpeape = $cajOpeape;

        return $this;
    }

    /**
     * Get cajOpeape
     *
     * @return integer 
     */
    public function getCajOpeape()
    {
        return $this->cajOpeape;
    }

    /**
     * Set cajFecape
     *
     * @param \DateTime $cajFecape
     * @return Cajas
     */
    public function setCajFecape($cajFecape)
    {
        $this->cajFecape = $cajFecape;

        return $this;
    }

    /**
     * Get cajFecape
     *
     * @return \DateTime 
     */
    public function getCajFecape()
    {
        return $this->cajFecape;
    }

    /**
     * Set cajOpecie
     *
     * @param integer $cajOpecie
     * @return Cajas
     */
    public function setCajOpecie($cajOpecie)
    {
        $this->cajOpecie = $cajOpecie;

        return $this;
    }

    /**
     * Get cajOpecie
     *
     * @return integer 
     */
    public function getCajOpecie()
    {
        return $this->cajOpecie;
    }

    /**
     * Set cajFeccie
     *
     * @param \DateTime $cajFeccie
     * @return Cajas
     */
    public function setCajFeccie($cajFeccie)
    {
        $this->cajFeccie = $cajFeccie;

        return $this;
    }

    /**
     * Get cajFeccie
     *
     * @return \DateTime 
     */
    public function getCajFeccie()
    {
        return $this->cajFeccie;
    }

    /**
     * Set cajLote
     *
     * @param float $cajLote
     * @return Cajas
     */
    public function setCajLote($cajLote)
    {
        $this->cajLote = $cajLote;

        return $this;
    }

    /**
     * Get cajLote
     *
     * @return float 
     */
    public function getCajLote()
    {
        return $this->cajLote;
    }

    /**
     * Set cajCanope
     *
     * @param integer $cajCanope
     * @return Cajas
     */
    public function setCajCanope($cajCanope)
    {
        $this->cajCanope = $cajCanope;

        return $this;
    }

    /**
     * Get cajCanope
     *
     * @return integer 
     */
    public function getCajCanope()
    {
        return $this->cajCanope;
    }

    /**
     * Set cajCfbcdo
     *
     * @param string $cajCfbcdo
     * @return Cajas
     */
    public function setCajCfbcdo($cajCfbcdo)
    {
        $this->cajCfbcdo = $cajCfbcdo;

        return $this;
    }

    /**
     * Get cajCfbcdo
     *
     * @return string 
     */
    public function getCajCfbcdo()
    {
        return $this->cajCfbcdo;
    }

    /**
     * Set cajIfbcdo
     *
     * @param string $cajIfbcdo
     * @return Cajas
     */
    public function setCajIfbcdo($cajIfbcdo)
    {
        $this->cajIfbcdo = $cajIfbcdo;

        return $this;
    }

    /**
     * Get cajIfbcdo
     *
     * @return string 
     */
    public function getCajIfbcdo()
    {
        return $this->cajIfbcdo;
    }

    /**
     * Set cajCfbcta
     *
     * @param string $cajCfbcta
     * @return Cajas
     */
    public function setCajCfbcta($cajCfbcta)
    {
        $this->cajCfbcta = $cajCfbcta;

        return $this;
    }

    /**
     * Get cajCfbcta
     *
     * @return string 
     */
    public function getCajCfbcta()
    {
        return $this->cajCfbcta;
    }

    /**
     * Set cajIfbcta
     *
     * @param string $cajIfbcta
     * @return Cajas
     */
    public function setCajIfbcta($cajIfbcta)
    {
        $this->cajIfbcta = $cajIfbcta;

        return $this;
    }

    /**
     * Get cajIfbcta
     *
     * @return string 
     */
    public function getCajIfbcta()
    {
        return $this->cajIfbcta;
    }

    /**
     * Set cajCfbtar
     *
     * @param string $cajCfbtar
     * @return Cajas
     */
    public function setCajCfbtar($cajCfbtar)
    {
        $this->cajCfbtar = $cajCfbtar;

        return $this;
    }

    /**
     * Get cajCfbtar
     *
     * @return string 
     */
    public function getCajCfbtar()
    {
        return $this->cajCfbtar;
    }

    /**
     * Set cajIfbtar
     *
     * @param string $cajIfbtar
     * @return Cajas
     */
    public function setCajIfbtar($cajIfbtar)
    {
        $this->cajIfbtar = $cajIfbtar;

        return $this;
    }

    /**
     * Get cajIfbtar
     *
     * @return string 
     */
    public function getCajIfbtar()
    {
        return $this->cajIfbtar;
    }

    /**
     * Set cajCnccdo
     *
     * @param string $cajCnccdo
     * @return Cajas
     */
    public function setCajCnccdo($cajCnccdo)
    {
        $this->cajCnccdo = $cajCnccdo;

        return $this;
    }

    /**
     * Get cajCnccdo
     *
     * @return string 
     */
    public function getCajCnccdo()
    {
        return $this->cajCnccdo;
    }

    /**
     * Set cajInccta
     *
     * @param string $cajInccta
     * @return Cajas
     */
    public function setCajInccta($cajInccta)
    {
        $this->cajInccta = $cajInccta;

        return $this;
    }

    /**
     * Get cajInccta
     *
     * @return string 
     */
    public function getCajInccta()
    {
        return $this->cajInccta;
    }

    /**
     * Set cajCnctar
     *
     * @param string $cajCnctar
     * @return Cajas
     */
    public function setCajCnctar($cajCnctar)
    {
        $this->cajCnctar = $cajCnctar;

        return $this;
    }

    /**
     * Get cajCnctar
     *
     * @return string 
     */
    public function getCajCnctar()
    {
        return $this->cajCnctar;
    }

    /**
     * Set cajEfeini
     *
     * @param string $cajEfeini
     * @return Cajas
     */
    public function setCajEfeini($cajEfeini)
    {
        $this->cajEfeini = $cajEfeini;

        return $this;
    }

    /**
     * Get cajEfeini
     *
     * @return string 
     */
    public function getCajEfeini()
    {
        return $this->cajEfeini;
    }

    /**
     * Set cajAcubru
     *
     * @param string $cajAcubru
     * @return Cajas
     */
    public function setCajAcubru($cajAcubru)
    {
        $this->cajAcubru = $cajAcubru;

        return $this;
    }

    /**
     * Get cajAcubru
     *
     * @return string 
     */
    public function getCajAcubru()
    {
        return $this->cajAcubru;
    }

    /**
     * Set cajAcudes
     *
     * @param string $cajAcudes
     * @return Cajas
     */
    public function setCajAcudes($cajAcudes)
    {
        $this->cajAcudes = $cajAcudes;

        return $this;
    }

    /**
     * Get cajAcudes
     *
     * @return string 
     */
    public function getCajAcudes()
    {
        return $this->cajAcudes;
    }

    /**
     * Set cajAcunet
     *
     * @param string $cajAcunet
     * @return Cajas
     */
    public function setCajAcunet($cajAcunet)
    {
        $this->cajAcunet = $cajAcunet;

        return $this;
    }

    /**
     * Get cajAcunet
     *
     * @return string 
     */
    public function getCajAcunet()
    {
        return $this->cajAcunet;
    }

    /**
     * Set cajAcuefe
     *
     * @param string $cajAcuefe
     * @return Cajas
     */
    public function setCajAcuefe($cajAcuefe)
    {
        $this->cajAcuefe = $cajAcuefe;

        return $this;
    }

    /**
     * Get cajAcuefe
     *
     * @return string 
     */
    public function getCajAcuefe()
    {
        return $this->cajAcuefe;
    }

    /**
     * Set cajAcucre
     *
     * @param string $cajAcucre
     * @return Cajas
     */
    public function setCajAcucre($cajAcucre)
    {
        $this->cajAcucre = $cajAcucre;

        return $this;
    }

    /**
     * Get cajAcucre
     *
     * @return string 
     */
    public function getCajAcucre()
    {
        return $this->cajAcucre;
    }

    /**
     * Set cajAcutar
     *
     * @param string $cajAcutar
     * @return Cajas
     */
    public function setCajAcutar($cajAcutar)
    {
        $this->cajAcutar = $cajAcutar;

        return $this;
    }

    /**
     * Get cajAcutar
     *
     * @return string 
     */
    public function getCajAcutar()
    {
        return $this->cajAcutar;
    }

    /**
     * Set cajAcucta
     *
     * @param string $cajAcucta
     * @return Cajas
     */
    public function setCajAcucta($cajAcucta)
    {
        $this->cajAcucta = $cajAcucta;

        return $this;
    }

    /**
     * Get cajAcucta
     *
     * @return string 
     */
    public function getCajAcucta()
    {
        return $this->cajAcucta;
    }

    /**
     * Set cajAcucos
     *
     * @param string $cajAcucos
     * @return Cajas
     */
    public function setCajAcucos($cajAcucos)
    {
        $this->cajAcucos = $cajAcucos;

        return $this;
    }

    /**
     * Get cajAcucos
     *
     * @return string 
     */
    public function getCajAcucos()
    {
        return $this->cajAcucos;
    }

    /**
     * Set cajAcuobr
     *
     * @param string $cajAcuobr
     * @return Cajas
     */
    public function setCajAcuobr($cajAcuobr)
    {
        $this->cajAcuobr = $cajAcuobr;

        return $this;
    }

    /**
     * Get cajAcuobr
     *
     * @return string 
     */
    public function getCajAcuobr()
    {
        return $this->cajAcuobr;
    }

    /**
     * Set cajAcusin
     *
     * @param string $cajAcusin
     * @return Cajas
     */
    public function setCajAcusin($cajAcusin)
    {
        $this->cajAcusin = $cajAcusin;

        return $this;
    }

    /**
     * Get cajAcusin
     *
     * @return string 
     */
    public function getCajAcusin()
    {
        return $this->cajAcusin;
    }

    /**
     * Set cajAcucon
     *
     * @param string $cajAcucon
     * @return Cajas
     */
    public function setCajAcucon($cajAcucon)
    {
        $this->cajAcucon = $cajAcucon;

        return $this;
    }

    /**
     * Get cajAcucon
     *
     * @return string 
     */
    public function getCajAcucon()
    {
        return $this->cajAcucon;
    }

    /**
     * Set cajAcuuni
     *
     * @param string $cajAcuuni
     * @return Cajas
     */
    public function setCajAcuuni($cajAcuuni)
    {
        $this->cajAcuuni = $cajAcuuni;

        return $this;
    }

    /**
     * Get cajAcuuni
     *
     * @return string 
     */
    public function getCajAcuuni()
    {
        return $this->cajAcuuni;
    }

    /**
     * Set cajDpt01
     *
     * @param string $cajDpt01
     * @return Cajas
     */
    public function setCajDpt01($cajDpt01)
    {
        $this->cajDpt01 = $cajDpt01;

        return $this;
    }

    /**
     * Get cajDpt01
     *
     * @return string 
     */
    public function getCajDpt01()
    {
        return $this->cajDpt01;
    }

    /**
     * Set cajDpt02
     *
     * @param string $cajDpt02
     * @return Cajas
     */
    public function setCajDpt02($cajDpt02)
    {
        $this->cajDpt02 = $cajDpt02;

        return $this;
    }

    /**
     * Get cajDpt02
     *
     * @return string 
     */
    public function getCajDpt02()
    {
        return $this->cajDpt02;
    }

    /**
     * Set cajDpt03
     *
     * @param string $cajDpt03
     * @return Cajas
     */
    public function setCajDpt03($cajDpt03)
    {
        $this->cajDpt03 = $cajDpt03;

        return $this;
    }

    /**
     * Get cajDpt03
     *
     * @return string 
     */
    public function getCajDpt03()
    {
        return $this->cajDpt03;
    }

    /**
     * Set cajDpt04
     *
     * @param string $cajDpt04
     * @return Cajas
     */
    public function setCajDpt04($cajDpt04)
    {
        $this->cajDpt04 = $cajDpt04;

        return $this;
    }

    /**
     * Get cajDpt04
     *
     * @return string 
     */
    public function getCajDpt04()
    {
        return $this->cajDpt04;
    }

    /**
     * Set cajDpt05
     *
     * @param string $cajDpt05
     * @return Cajas
     */
    public function setCajDpt05($cajDpt05)
    {
        $this->cajDpt05 = $cajDpt05;

        return $this;
    }

    /**
     * Get cajDpt05
     *
     * @return string 
     */
    public function getCajDpt05()
    {
        return $this->cajDpt05;
    }

    /**
     * Set cajDpt06
     *
     * @param string $cajDpt06
     * @return Cajas
     */
    public function setCajDpt06($cajDpt06)
    {
        $this->cajDpt06 = $cajDpt06;

        return $this;
    }

    /**
     * Get cajDpt06
     *
     * @return string 
     */
    public function getCajDpt06()
    {
        return $this->cajDpt06;
    }

    /**
     * Set cajDpt07
     *
     * @param string $cajDpt07
     * @return Cajas
     */
    public function setCajDpt07($cajDpt07)
    {
        $this->cajDpt07 = $cajDpt07;

        return $this;
    }

    /**
     * Get cajDpt07
     *
     * @return string 
     */
    public function getCajDpt07()
    {
        return $this->cajDpt07;
    }

    /**
     * Set cajRegope
     *
     * @param integer $cajRegope
     * @return Cajas
     */
    public function setCajRegope($cajRegope)
    {
        $this->cajRegope = $cajRegope;

        return $this;
    }

    /**
     * Get cajRegope
     *
     * @return integer 
     */
    public function getCajRegope()
    {
        return $this->cajRegope;
    }

    /**
     * Set cajNrocli
     *
     * @param integer $cajNrocli
     * @return Cajas
     */
    public function setCajNrocli($cajNrocli)
    {
        $this->cajNrocli = $cajNrocli;

        return $this;
    }

    /**
     * Get cajNrocli
     *
     * @return integer 
     */
    public function getCajNrocli()
    {
        return $this->cajNrocli;
    }

    /**
     * Set cajCaja
     *
     * @param integer $cajCaja
     * @return Cajas
     */
    public function setCajCaja($cajCaja)
    {
        $this->cajCaja = $cajCaja;

        return $this;
    }

    /**
     * Get cajCaja
     *
     * @return integer 
     */
    public function getCajCaja()
    {
        return $this->cajCaja;
    }

    /**
     * Set cajZeta
     *
     * @param integer $cajZeta
     * @return Cajas
     */
    public function setCajZeta($cajZeta)
    {
        $this->cajZeta = $cajZeta;

        return $this;
    }

    /**
     * Get cajZeta
     *
     * @return integer 
     */
    public function getCajZeta()
    {
        return $this->cajZeta;
    }
}
