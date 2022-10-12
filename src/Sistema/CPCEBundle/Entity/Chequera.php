<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chequera
 *
 * @ORM\Table(name="chequera", indexes={@ORM\Index(name="sklote", columns={"cha_lote"})})
 * @ORM\Entity
 */
class Chequera
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cha_nrocli", type="integer", nullable=false)
     */
    private $chaNrocli;

    /**
     * @var string
     *
     * @ORM\Column(name="cha_tipbco", type="string", length=3, nullable=false)
     */
    private $chaTipbco;

    /**
     * @var integer
     *
     * @ORM\Column(name="cha_nrobco", type="integer", nullable=false)
     */
    private $chaNrobco;

    /**
     * @var string
     *
     * @ORM\Column(name="cha_tipo", type="string", length=1, nullable=false)
     */
    private $chaTipo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cha_fecha", type="date", nullable=false)
     */
    private $chaFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="cha_serie", type="string", length=1, nullable=false)
     */
    private $chaSerie;

    /**
     * @var integer
     *
     * @ORM\Column(name="cha_cheini", type="integer", nullable=false)
     */
    private $chaCheini;

    /**
     * @var integer
     *
     * @ORM\Column(name="cha_chefin", type="integer", nullable=false)
     */
    private $chaChefin;

    /**
     * @var integer
     *
     * @ORM\Column(name="cha_lote", type="bigint", nullable=false)
     */
    private $chaLote;

    /**
     * @var string
     *
     * @ORM\Column(name="cha_cuebco", type="string", length=8)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $chaCuebco;

    /**
     * @var integer
     *
     * @ORM\Column(name="cha_nrotal", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $chaNrotal;



    /**
     * Set chaNrocli
     *
     * @param integer $chaNrocli
     * @return Chequera
     */
    public function setChaNrocli($chaNrocli)
    {
        $this->chaNrocli = $chaNrocli;

        return $this;
    }

    /**
     * Get chaNrocli
     *
     * @return integer 
     */
    public function getChaNrocli()
    {
        return $this->chaNrocli;
    }

    /**
     * Set chaTipbco
     *
     * @param string $chaTipbco
     * @return Chequera
     */
    public function setChaTipbco($chaTipbco)
    {
        $this->chaTipbco = $chaTipbco;

        return $this;
    }

    /**
     * Get chaTipbco
     *
     * @return string 
     */
    public function getChaTipbco()
    {
        return $this->chaTipbco;
    }

    /**
     * Set chaNrobco
     *
     * @param integer $chaNrobco
     * @return Chequera
     */
    public function setChaNrobco($chaNrobco)
    {
        $this->chaNrobco = $chaNrobco;

        return $this;
    }

    /**
     * Get chaNrobco
     *
     * @return integer 
     */
    public function getChaNrobco()
    {
        return $this->chaNrobco;
    }

    /**
     * Set chaTipo
     *
     * @param string $chaTipo
     * @return Chequera
     */
    public function setChaTipo($chaTipo)
    {
        $this->chaTipo = $chaTipo;

        return $this;
    }

    /**
     * Get chaTipo
     *
     * @return string 
     */
    public function getChaTipo()
    {
        return $this->chaTipo;
    }

    /**
     * Set chaFecha
     *
     * @param \DateTime $chaFecha
     * @return Chequera
     */
    public function setChaFecha($chaFecha)
    {
        $this->chaFecha = $chaFecha;

        return $this;
    }

    /**
     * Get chaFecha
     *
     * @return \DateTime 
     */
    public function getChaFecha()
    {
        return $this->chaFecha;
    }

    /**
     * Set chaSerie
     *
     * @param string $chaSerie
     * @return Chequera
     */
    public function setChaSerie($chaSerie)
    {
        $this->chaSerie = $chaSerie;

        return $this;
    }

    /**
     * Get chaSerie
     *
     * @return string 
     */
    public function getChaSerie()
    {
        return $this->chaSerie;
    }

    /**
     * Set chaCheini
     *
     * @param integer $chaCheini
     * @return Chequera
     */
    public function setChaCheini($chaCheini)
    {
        $this->chaCheini = $chaCheini;

        return $this;
    }

    /**
     * Get chaCheini
     *
     * @return integer 
     */
    public function getChaCheini()
    {
        return $this->chaCheini;
    }

    /**
     * Set chaChefin
     *
     * @param integer $chaChefin
     * @return Chequera
     */
    public function setChaChefin($chaChefin)
    {
        $this->chaChefin = $chaChefin;

        return $this;
    }

    /**
     * Get chaChefin
     *
     * @return integer 
     */
    public function getChaChefin()
    {
        return $this->chaChefin;
    }

    /**
     * Set chaLote
     *
     * @param integer $chaLote
     * @return Chequera
     */
    public function setChaLote($chaLote)
    {
        $this->chaLote = $chaLote;

        return $this;
    }

    /**
     * Get chaLote
     *
     * @return integer 
     */
    public function getChaLote()
    {
        return $this->chaLote;
    }

    /**
     * Set chaCuebco
     *
     * @param string $chaCuebco
     * @return Chequera
     */
    public function setChaCuebco($chaCuebco)
    {
        $this->chaCuebco = $chaCuebco;

        return $this;
    }

    /**
     * Get chaCuebco
     *
     * @return string 
     */
    public function getChaCuebco()
    {
        return $this->chaCuebco;
    }

    /**
     * Set chaNrotal
     *
     * @param integer $chaNrotal
     * @return Chequera
     */
    public function setChaNrotal($chaNrotal)
    {
        $this->chaNrotal = $chaNrotal;

        return $this;
    }

    /**
     * Get chaNrotal
     *
     * @return integer 
     */
    public function getChaNrotal()
    {
        return $this->chaNrotal;
    }
}
