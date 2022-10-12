<?php

namespace Sistema\ClasificadoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * OfertaLaboralType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class OfertaLaboralType extends AbstractType
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
            ->add('requiere', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('puesto', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('requisito', null, array(
                'label'=> 'Requisitos',
                'attr' => array(
                    'col' => 'col-lg-12 col-md-12 col-sm-12',
                ),
            ))
            ->add('tarea', null, array(
                'label'=> 'Tareas',
                'attr' => array(
                    'col' => 'col-lg-12 col-md-12 col-sm-12',
                ),
            ))
            ->add('delegacion', 'choice', array(
                'required' => true,
                'choices' => array(
                    1 => 'Sede Central',
                    2 => 'Saenz Peña',
                    3 => 'Villa Angela',
                    4 => 'Sudoeste',
                ),
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('fechaFin', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Finaliza',
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
                'widget_type' => 'date',
            ))
            ->add('solicitante', null, array(
                'label' => 'Responsable',
                'attr' => array(
                    'col' => 'col-lg-4 col-md-4 col-sm-4',
                ),
            ))
            ->add('email', null, array(
                'attr' => array(
                    'col' => 'col-lg-4 col-md-4 col-sm-4',
                ),
            ))
            ->add('telefono', null, array(
                'attr' => array(
                    'col' => 'col-lg-4 col-md-4 col-sm-4',
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
            'data_class' => 'Sistema\ClasificadoBundle\Entity\OfertaLaboral'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_clasificadobundle_ofertalaboral';
    }
}
