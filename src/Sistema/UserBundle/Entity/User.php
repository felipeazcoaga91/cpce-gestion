<?php

namespace Sistema\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
// DON'T forget this use statement!!!
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use MWSimple\Bundle\ForoBundle\Model\FosUserSubjectInterface;

/**
 * @ORM\Table(name="fos_user")
 * @ORM\Entity()
 */
class User extends BaseUser implements FosUserSubjectInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="fos_user_role")
     */
    protected $user_roles;

    /**
     * @var boolean
     *
     * @ORM\Column(name="usr_activo", type="boolean", nullable=true)
     */
    protected $activo;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_tipdoc", type="string", length=3)
     */
    protected $tipdoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="usr_nrodoc", type="integer")
     * @Assert\Regex("/\d/")
     */
    protected $nrodoc;

    /**
     * @ORM\OneToMany(targetEntity="Sistema\CPCEBundle\Entity\Trabajo", mappedBy="user")
     */
    protected $trabajos;

    /**
     * @ORM\OneToOne(targetEntity="Sistema\ClasificadoBundle\Entity\UserCurriculum", mappedBy="usercv")
     */
    protected $userCurriculum;


    public function __construct() {
        parent::__construct();
        $this->user_roles = new ArrayCollection();
        $this->trabajos   = new ArrayCollection();
    }

    /**
     * Set saltString
     *
     * @param string $saltString
     * @return User
     */
    public function setSaltString($saltString)
    {
        $this->salt = $saltString;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Returns an ARRAY of Role objects with the default Role object appended.
     * @return array
     */
    public function getRoles() {
        $roles = $this->user_roles->toArray();
        array_push($roles, "ROLE_USER");
        return $roles;
    }

    /**
     * Returns the true ArrayCollection of Roles.
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function getRolesCollection() {
        return $this->user_roles;
    }

    /**
     * Pass a string, get the desired Role object or null.
     * @param  string    $role
     * @return Role|null
     */
    public function getRole($role) {
        foreach ($this->getRoles() as $roleItem) {
            if ($role == $roleItem) {
                return $roleItem;
            }
        }

        return null;
    }

    /**
     * Pass a string, checks if we have that Role. Same functionality as getRole() except returns a real boolean.
     * @param  string  $role
     * @return boolean
     */
    public function hasRole($role) {
        if ($this->getRole($role)) {
            return true;
        }

        return false;
    }

    /**
     * Adds a Role OBJECT to the ArrayCollection. Can't type hint due to interface so throws Exception.
     * @throws Exception
     * @param  Role      $role
     */
    public function addRole($role) {
        if (!$role instanceof Role) {
            throw new \Exception("addRole takes a Role object as the parameter");
        }

        if (!$this->hasRole($role->getRole())) {
            $this->user_roles->add($role);
        }
    }

    /**
     * Pass a string, remove the Role object from collection.
     * @param string $role
     */
    public function removeRole($role) {
        $roleElement = $this->getRole($role);
        if ($roleElement) {
            $this->user_roles->removeElement($roleElement);
        }
    }

    /**
     * Pass an ARRAY of Role objects and will clear the collection and re-set it with new Roles.
     * Type hinted array due to interface.
     * @param array $user_roles Of Role objects.
     */
    public function setRoles(array $user_roles) {
        $this->user_roles->clear();
        foreach ($user_roles as $role) {
            $this->addRole($role);
        }
    }

    /**
     * Directly set the ArrayCollection of Roles. Type hinted as Collection which is the parent of (Array|Persistent)Collection.
     * @param Doctrine\Common\Collections\Collection $role
     */
    public function setRolesCollection(Collection $collection) {
        $this->user_roles = $collection;
    }

    /**
     * Add user_roles
     *
     * @param  \Sistema\UserBundle\Entity\Role $userRoles
     * @return User
     */
    public function addUserRole(\Sistema\UserBundle\Entity\Role $userRoles) {
        $this->user_roles[] = $userRoles;

        return $this;
    }

    /**
     * Remove user_roles
     *
     * @param \Sistema\UserBundle\Entity\Role $userRoles
     */
    public function removeUserRole(\Sistema\UserBundle\Entity\Role $userRoles) {
        $this->user_roles->removeElement($userRoles);
    }

    /**
     * Get user_roles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserRoles() {
        return $this->user_roles;
    }

    /**
     * Set activo
     *
     * @param  boolean $activo
     * @return User
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set tipdoc
     *
     * @param string $tipdoc
     * @return User
     */
    public function setTipdoc($tipdoc)
    {
        $this->tipdoc = $tipdoc;

        return $this;
    }

    /**
     * Get tipdoc
     *
     * @return string 
     */
    public function getTipdoc()
    {
        return $this->tipdoc;
    }

    /**
     * Set nrodoc
     *
     * @param integer $nrodoc
     * @return User
     */
    public function setNrodoc($nrodoc)
    {
        $this->nrodoc = $nrodoc;

        return $this;
    }

    /**
     * Get nrodoc
     *
     * @return integer 
     */
    public function getNrodoc()
    {
        return $this->nrodoc;
    }

    /**
     * Add trabajos
     *
     * @param \Sistema\CPCEBundle\Entity\Trabajo $trabajos
     * @return User
     */
    public function addTrabajo(\Sistema\CPCEBundle\Entity\Trabajo $trabajos)
    {
        $this->trabajos[] = $trabajos;

        return $this;
    }

    /**
     * Remove trabajos
     *
     * @param \Sistema\CPCEBundle\Entity\Trabajo $trabajos
     */
    public function removeTrabajo(\Sistema\CPCEBundle\Entity\Trabajo $trabajos)
    {
        $this->trabajos->removeElement($trabajos);
    }

    /**
     * Get trabajos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTrabajos()
    {
        return $this->trabajos;
    }

    /**
     * Set userCurriculum
     *
     * @param \Sistema\ClasificadoBundle\Entity\UserCurriculum $userCurriculum
     * @return User
     */
    public function setUserCurriculum(\Sistema\ClasificadoBundle\Entity\UserCurriculum $userCurriculum = null)
    {
        $this->userCurriculum = $userCurriculum;

        return $this;
    }

    /**
     * Get userCurriculum
     *
     * @return \Sistema\ClasificadoBundle\Entity\UserCurriculum 
     */
    public function getUserCurriculum()
    {
        return $this->userCurriculum;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->username;
    }    

}
