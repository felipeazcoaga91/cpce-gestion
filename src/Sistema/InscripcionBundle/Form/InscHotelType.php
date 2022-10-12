<?php

namespace Sistema\InscripcionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * InscHotelType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class InscHotelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, array(
                'attr'  => array(
                    'col'       => 'col-lg-6 col-md-6 col-sm-12',
                ),
            ))
            ->add('descripcion', 'textarea', array(
                'attr'  => array(
                    'col'       => 'col-lg-12 col-md-6 col-sm-12',
                    'cols' => '50', 
                    'rows' => '4'
                ),
            ))
            ->add('cupo', null, array(
                'attr'  => array(
                    'col'       => 'col-lg-4 col-md-6 col-sm-12',
                ),
            ))
            ->add('reservado', null, array(
                'attr'  => array(
                    'col'       => 'col-lg-4 col-md-6 col-sm-12',
                ),
            ))
            ->add('importeTotal', 'mwspeso', array(
                'attr'  => array(
                    'col'       => 'col-lg-6 col-md-6 col-sm-12',
                ),
            ))
            ->add('importeOtro', 'mwspeso', array(
                'label' => 'Otro importe',
                'attr'  => array(
                    'col'       => 'col-lg-6 col-md-6 col-sm-12',
                ),
            ))
            ->add('activo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\InscripcionBundle\Entity\InscHotel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_inscripcionbundle_inschotel';
    }
}
