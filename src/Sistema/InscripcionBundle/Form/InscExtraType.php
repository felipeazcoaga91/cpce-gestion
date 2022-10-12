<?php

namespace Sistema\InscripcionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * InscExtraType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class InscExtraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activo')
            ->add('nombre', null, array(
                'attr'  => array(
                    'col'       => 'col-lg-12 col-md-6 col-sm-12',
                ),
            ))
            ->add('importe', 'mwspeso', array(
                'attr'  => array(
                    'col'       => 'col-lg-6 col-md-6 col-sm-12',
                ),
            ))
            ->add('stock', null, array(
                'attr'  => array(
                    'col'       => 'col-lg-4 col-md-6 col-sm-12',
                ),
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\InscripcionBundle\Entity\InscExtra'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_inscripcionbundle_inscextra';
    }
}
