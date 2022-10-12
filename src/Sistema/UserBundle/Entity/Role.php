<?php
namespace Sistema\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Sistema\UserBundle\Controller\Slug;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_role")
 */
class Role implements RoleInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    protected $url;

    /**
     * @var boolean
     *
     * @ORM\Column(name="acceso", type="boolean", nullable=true)
     */
    protected $acceso;

    /**
     * @ORM\Column(name="role_nombre", type="string", length=255)
     */
    protected $role_name;

    public function __toString()
    {
        return $this->getName();
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

    public function getRole()
    {
        return $this->getName();
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName()
    {
        $this->name = "ROLE_" . Slug::slugify($this->getRoleName());
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        /*
         * ! Don't serialize $users field !
         */

        return \serialize(array(
            $this->id,
            $this->name
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->name
        ) = \unserialize($serialized);
    }

    /**
     * Set role_name
     *
     * @param  string $roleName
     * @return Role
     */
    public function setRoleName($roleName)
    {
        $this->role_name = strtoupper($roleName);
        $this->setName();

        return $this;
    }

    /**
     * Get role_name
     *
     * @return string
     */
    public function getRoleName()
    {
        return $this->role_name;
    }

    /**
     * Set url
     *
     * @param  string $url
     * @return Role
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set acceso
     *
     * @param  boolean $acceso
     * @return Role
     */
    public function setAcceso($acceso)
    {
        $this->acceso = $acceso;

        return $this;
    }

    /**
     * Get acceso
     *
     * @return boolean
     */
    public function getAcceso()
    {
        return $this->acceso;
    }
}
