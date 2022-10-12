<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bloqueos
 *
 * @ORM\Table(name="bloqueos")
 * @ORM\Entity
 */
class Bloqueos
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="proceso", type="string", length=20, nullable=false)
     */
    private $proceso;

    /**
     * @var array
     *
     * @ORM\Column(name="bloqueo", type="simple_array", nullable=true)
     */
    private $bloqueo;

    /**
     * @var string
     *
     * @ORM\Column(name="terminal", type="string", length=15)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $terminal;


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Bloqueos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set proceso
     *
     * @param string $proceso
     * @return Bloqueos
     */
    public function setProceso($proceso)
    {
        $this->proceso = $proceso;

        return $this;
    }

    /**
     * Get proceso
     *
     * @return string 
     */
    public function getProceso()
    {
        return $this->proceso;
    }

    /**
     * Set bloqueo
     *
     * @param array $bloqueo
     * @return Bloqueos
     */
    public function setBloqueo($bloqueo)
    {
        $this->bloqueo = $bloqueo;

        return $this;
    }

    /**
     * Get bloqueo
     *
     * @return array 
     */
    public function getBloqueo()
    {
        return $this->bloqueo;
    }

    /**
     * Get terminal
     *
     * @return string 
     */
    public function getTerminal()
    {
        return $this->terminal;
    }
}
