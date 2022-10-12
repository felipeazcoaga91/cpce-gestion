<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cateproce
 *
 * @ORM\Table(name="cateproce")
 * @ORM\Entity
 */
class Cateproce
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cap_fecalt", type="datetime", nullable=false)
     */
    private $capFecalt;

    /**
     * @var integer
     *
     * @ORM\Column(name="cap_nroope", type="integer", nullable=false)
     */
    private $capNroope;

    /**
     * @var integer
     *
     * @ORM\Column(name="cap_lote", type="bigint", nullable=false)
     */
    private $capLote;

    /**
     * @var string
     *
     * @ORM\Column(name="cap_categoria", type="string", length=6)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $capCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="cap_proceso", type="string", length=6)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $capProceso;



    /**
     * Set capFecalt
     *
     * @param \DateTime $capFecalt
     * @return Cateproce
     */
    public function setCapFecalt($capFecalt)
    {
        $this->capFecalt = $capFecalt;

        return $this;
    }

    /**
     * Get capFecalt
     *
     * @return \DateTime 
     */
    public function getCapFecalt()
    {
        return $this->capFecalt;
    }

    /**
     * Set capNroope
     *
     * @param integer $capNroope
     * @return Cateproce
     */
    public function setCapNroope($capNroope)
    {
        $this->capNroope = $capNroope;

        return $this;
    }

    /**
     * Get capNroope
     *
     * @return integer 
     */
    public function getCapNroope()
    {
        return $this->capNroope;
    }

    /**
     * Set capLote
     *
     * @param integer $capLote
     * @return Cateproce
     */
    public function setCapLote($capLote)
    {
        $this->capLote = $capLote;

        return $this;
    }

    /**
     * Get capLote
     *
     * @return integer 
     */
    public function getCapLote()
    {
        return $this->capLote;
    }

    /**
     * Set capCategoria
     *
     * @param string $capCategoria
     * @return Cateproce
     */
    public function setCapCategoria($capCategoria)
    {
        $this->capCategoria = $capCategoria;

        return $this;
    }

    /**
     * Get capCategoria
     *
     * @return string 
     */
    public function getCapCategoria()
    {
        return $this->capCategoria;
    }

    /**
     * Set capProceso
     *
     * @param string $capProceso
     * @return Cateproce
     */
    public function setCapProceso($capProceso)
    {
        $this->capProceso = $capProceso;

        return $this;
    }

    /**
     * Get capProceso
     *
     * @return string 
     */
    public function getCapProceso()
    {
        return $this->capProceso;
    }
}
