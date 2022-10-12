<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permisos
 *
 * @ORM\Table(name="permisos")
 * @ORM\Entity
 */
class Permisos
{
    /**
     * @var string
     *
     * @ORM\Column(name="per_permitido", type="string", nullable=false)
     */
    private $perPermitido;

    /**
     * @var integer
     *
     * @ORM\Column(name="per_nrocli", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $perNrocli;

    /**
     * @var integer
     *
     * @ORM\Column(name="per_operador", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $perOperador;

    /**
     * @var integer
     *
     * @ORM\Column(name="per_acceso", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $perAcceso;



    /**
     * Set perPermitido
     *
     * @param string $perPermitido
     * @return Permisos
     */
    public function setPerPermitido($perPermitido)
    {
        $this->perPermitido = $perPermitido;

        return $this;
    }

    /**
     * Get perPermitido
     *
     * @return string 
     */
    public function getPerPermitido()
    {
        return $this->perPermitido;
    }

    /**
     * Set perNrocli
     *
     * @param integer $perNrocli
     * @return Permisos
     */
    public function setPerNrocli($perNrocli)
    {
        $this->perNrocli = $perNrocli;

        return $this;
    }

    /**
     * Get perNrocli
     *
     * @return integer 
     */
    public function getPerNrocli()
    {
        return $this->perNrocli;
    }

    /**
     * Set perOperador
     *
     * @param integer $perOperador
     * @return Permisos
     */
    public function setPerOperador($perOperador)
    {
        $this->perOperador = $perOperador;

        return $this;
    }

    /**
     * Get perOperador
     *
     * @return integer 
     */
    public function getPerOperador()
    {
        return $this->perOperador;
    }

    /**
     * Set perAcceso
     *
     * @param integer $perAcceso
     * @return Permisos
     */
    public function setPerAcceso($perAcceso)
    {
        $this->perAcceso = $perAcceso;

        return $this;
    }

    /**
     * Get perAcceso
     *
     * @return integer 
     */
    public function getPerAcceso()
    {
        return $this->perAcceso;
    }
}
