<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Debito
 *
 * @ORM\Table(name="debito", uniqueConstraints={@ORM\UniqueConstraint(name="afiliado_plancuen_unique", columns={"deb_tipdoc", "deb_nrodoc", "deb_nropla"})}, indexes={@ORM\Index(name="debito_afiliado", columns={"deb_tipdoc", "deb_nrodoc"})})
 * @ORM\Entity
 */
class Debito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Sistema\CPCEBundle\Entity\Afiliado
     *
     * @ORM\ManyToOne(targetEntity="Sistema\CPCEBundle\Entity\Afiliado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="deb_tipdoc", referencedColumnName="afi_tipdoc"),
     *   @ORM\JoinColumn(name="deb_nrodoc", referencedColumnName="afi_nrodoc")
     * })
     */
    private $debTipdoc;

    /**
     * @var string
     *
     * @ORM\Column(name="deb_nropla", type="string", length=8, nullable=false)
     */
    private $debNropla;


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
     * Set debNropla
     *
     * @param string $debNropla
     * @return Debito
     */
    public function setDebNropla($debNropla)
    {
        $this->debNropla = $debNropla;

        return $this;
    }

    /**
     * Get debNropla
     *
     * @return string 
     */
    public function getDebNropla()
    {
        return $this->debNropla;
    }

    /**
     * Set debTipdoc
     *
     * @param \Sistema\CPCEBundle\Entity\Afiliado $debTipdoc
     * @return Debito
     */
    public function setDebTipdoc(\Sistema\CPCEBundle\Entity\Afiliado $debTipdoc = null)
    {
        $this->debTipdoc = $debTipdoc;

        return $this;
    }

    /**
     * Get debTipdoc
     *
     * @return \Sistema\CPCEBundle\Entity\Afiliado 
     */
    public function getDebTipdoc()
    {
        return $this->debTipdoc;
    }
}
