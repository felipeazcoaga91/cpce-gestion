<?php

namespace Sistema\InscripcionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * InscMoldeType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class InscMoldeType extends AbstractType
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
                    'col'       => 'col-lg-12 col-md-12 col-sm-12',
                ),
            ))
            ->add('tipo', 'choice', array(
                'choices' => array(
                    'Seleccione un molde' => array(
                        'Olimpiadas' => 'olimpiadas',
                        'Peritos de la Justicia' => 'peritos',
                        'Asamblea' => 'asamblea',
                    ),
                ),
                'choices_as_values' => true,
                'attr'  => array(
                    'col'       => 'col-lg-12 col-md-12 col-sm-12',
                ),
            ))
            ->add('activo', null, array(
                'attr'  => array(
                    'col'       => 'col-lg-2 col-md-6 col-sm-12',
                ),
            ))
            ->add('descripcion', 'textarea', array(
                'attr'  => array(
                    'col'       => 'col-lg-12 col-md-6 col-sm-12',
                    'cols' => '50', 
                    'rows' => '4'
                ),
            ))
            ->add('contenido', 'textarea', array(
                'attr'  => array(
                    'col'       => 'col-lg-12 col-md-6 col-sm-12',
                    'cols' => '50', 
                    'rows' => '4'
                ),
            ))
            ->add('nota', null, array(
                'attr'  => array(
                    'col'       => 'col-lg-12 col-md-6 col-sm-12',
                ),
            ))
            ->add('importeTotal', 'mwspeso', array(
                'attr'  => array(
                    'col'       => 'col-lg-6 col-md-6 col-sm-12',
                ),
            ))
            ->add('importeSubTotal', 'mwspeso', array(
                'attr'  => array(
                    'col'       => 'col-lg-6 col-md-6 col-sm-12',
                ),
            ))
            ->add('controlCuentas', null, array(
                'attr'  => array(
                    'col'       => 'col-lg-12 col-md-6 col-sm-12',
                ),
            ))
            ->add('cuentas', 'collection', array(
                'type' => new InscCuentaType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\InscripcionBundle\Entity\InscMolde'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_inscripcionbundle_inscmolde';
    }
}
