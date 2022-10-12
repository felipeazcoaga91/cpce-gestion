<?php

namespace Sistema\InscripcionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * InscPersonaType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class InscPersonaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('dni')
            ->add('fechaNac', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Fecha de Nacimiento',
                'label_attr' => array(
                    //'class' => 'col-lg-2 col-md-2 col-sm-2',
                    'col'   => 'col-lg-6 col-md-6 col-sm-6',
                ),
                'widget_type' => 'date',
            ))
            ->add('nacionalidad')
            ->add('hotel', 'select2', array(
                'class' => 'Sistema\InscripcionBundle\Entity\InscHotel',
                'url'   => 'inscripcion_autocomplete_hotel',
                'configs' => array(
                    'multiple' => false,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            ->add('transporte', 'select2', array(
                'class' => 'Sistema\InscripcionBundle\Entity\InscTransporte',
                'url'   => 'inscripcion_autocomplete_transporte',
                'configs' => array(
                    'multiple' => false,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\InscripcionBundle\Entity\InscPersona'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_inscripcionbundle_inscpersona';
    }
}
