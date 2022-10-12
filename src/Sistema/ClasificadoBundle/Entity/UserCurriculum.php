<?php

namespace Sistema\ClasificadoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\AdminCrudBundle\Entity\BaseFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * UserCurriculum
 *
 * @ORM\Table(name="user_curriculum")
 * @ORM\Entity
 * @UniqueEntity(
 *     fields={"usercv"},
 *     message="Ya existe un CV para este usuario."
 * )
 * @ORM\HasLifecycleCallbacks
 */
class UserCurriculum extends BaseFile
{
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    /**
     * @Assert\File(
     *     maxSize = "2048k",
     *     mimeTypes={ "application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/msword" },
     *     maxSizeMessage="Error, El archivo supera los 2Mb.",
     *     mimeTypesMessage="Por Favor, pruebe con un formato soportado PDF - DOC - DOCX."
     * )
     */
    protected $file;

	/**
     * @ORM\OneToOne(targetEntity="Sistema\UserBundle\Entity\User", inversedBy="userCurriculum")
     * @ORM\JoinColumn(name="usercv_id", referencedColumnName="id")
     */
    protected $usercv;

    /**
     * @ORM\ManyToMany(targetEntity="Sistema\ClasificadoBundle\Entity\OfertaLaboral", mappedBy="cvPostulantes")
     */
    private $ofertaLaborals;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ofertaLaborals = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getUsercv()->getUsername() . ' Email: ' . $this->getUsercv()->getEmail();
    }

    /**
     * @ORM\PreFlush()
     */
    public function preUpload()
    {
        if (!is_null($this->getFile())) {
            // do whatever you want to generate a unique name
            $random = rand(00,99);
            $filename = "CV_" . $this->getUsercv()->getId();
            $this->filePath = $filename . "_" . (string)$random . '.' . $this->getFile()->guessExtension();
        }
    }

    public function getUploadDir()
    {
        $this->uploadDir = '../app/archivos';
        return $this->uploadDir;
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

    /**
     * Set usercv
     *
     * @param \Sistema\UserBundle\Entity\User $usercv
     * @return UserCurriculum
     */
    public function setUsercv(\Sistema\UserBundle\Entity\User $usercv = null)
    {
        $this->usercv = $usercv;

        return $this;
    }

    /**
     * Get usercv
     *
     * @return \Sistema\UserBundle\Entity\User
     */
    public function getUsercv()
    {
        return $this->usercv;
    }

    /**
     * Add ofertaLaborals
     *
     * @param \Sistema\ClasificadoBundle\Entity\OfertaLaboral $ofertaLaborals
     * @return UserCurriculum
     */
    public function addOfertaLaboral(\Sistema\ClasificadoBundle\Entity\OfertaLaboral $ofertaLaborals)
    {
        $this->ofertaLaborals[] = $ofertaLaborals;

        return $this;
    }

    /**
     * Remove ofertaLaborals
     *
     * @param \Sistema\ClasificadoBundle\Entity\OfertaLaboral $ofertaLaborals
     */
    public function removeOfertaLaboral(\Sistema\ClasificadoBundle\Entity\OfertaLaboral $ofertaLaborals)
    {
        $this->ofertaLaborals->removeElement($ofertaLaborals);
    }

    /**
     * Get ofertaLaborals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOfertaLaborals()
    {
        return $this->ofertaLaborals;
    }
}
