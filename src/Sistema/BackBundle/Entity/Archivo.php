<?php

namespace Sistema\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\AdminCrudBundle\Entity\BaseFile;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Archivo
 *
 * @ORM\Table(name="archivo")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Sistema\BackBundle\Entity\ArchivoRepository")
 */
class Archivo extends BaseFile
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
     * @var boolean
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="seccion", type="string", length=255, nullable=false)
     */
    private $seccion;

    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    /**
     * @Assert\File(
     *     maxSize = "20M",
     *     mimeTypes={ "application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/msword", "application/vnd.ms-excel" },
     *     maxSizeMessage="Error, El archivo supera los 20Mb.",
     *     mimeTypesMessage="Por Favor, pruebe con un formato soportado PDF - DOC - DOCX - XLS."
     * )
     */
    protected $file;

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
     * Set activo
     *
     * @param boolean $activo
     * @return OfertaLaboral
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
     * Set titulo
     *
     * @param string $titulo
     * @return OfertaLaboral
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @ORM\PreFlush()
     */
    public function preUpload()
    {
        if (!is_null($this->getFile())) {
            // do whatever you want to generate a unique name
            $fileName = md5(uniqid()) .'.'. $this->getFile()->guessExtension();
            $this->filePath = $fileName;
        }
    }

    public function getUploadDir()
    {
        $this->uploadDir = '../app/varios';
        return $this->uploadDir;
    }

    /**
     * Set seccion
     *
     * @param string $seccion
     * @return Archivo
     */
    public function setSeccion($seccion)
    {
        $this->seccion = $seccion;

        return $this;
    }

    /**
     * Get seccion
     *
     * @return string 
     */
    public function getSeccion()
    {
        return $this->seccion;
    }
}
