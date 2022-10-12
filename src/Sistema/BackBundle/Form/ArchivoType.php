<?php

namespace Sistema\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * ArchivoType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class ArchivoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activo', null, array(
                'attr' => array(
                    'col' => 'col-lg-12 col-md-12 col-sm-12',
                ),
            ))
            ->add('titulo', null, array(
                'attr' => array(
                    'col' => 'col-lg-12 col-md-12 col-sm-12',
                ),
            ))
            ->add('seccion', null, array(
                'attr' => array(
                    'col' => 'col-lg-12 col-md-12 col-sm-12',
                ),
            ))
            //->add('filePath')
            ->add('file', 'mws_field_file', array(
                'required'  => false,
                'file_path' => 'webPath',
                'label'     => 'Archivo',
                //'show_path' => true,
                //'preview_image' => true,
            ))
            /*
            ->add('createdAt', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Createdat',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'both',
            ))
            ->add('updatedAt', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Updatedat',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'both',
            ))
            */
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\BackBundle\Entity\Archivo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_backbundle_archivo';
    }
}
