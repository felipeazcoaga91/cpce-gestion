<?php

namespace Sistema\InscripcionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * InscFichaAsambleaType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class InscFichaAsambleaType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('delegacion', 'choice', array(
                'label'   => 'Selecciona delegación',
                'choices' => array(
                    'SC' => 'Sede Central',
                    'SP' => 'Saénz Peña',
                    'VA' => 'Villa Ángela',
                    'SO' => 'Sudoeste'
                ),
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-3 col-md-6 col-sm-8',
                )
            ))
            ->add('observaciones', 'hidden', array(
                'empty_data' => '-',
                'data' => '-',
                'attr'  => array(
                    'col'       => 'col-lg-12 col-md-12 col-sm-12',
                    'cols' => '50', 
                    'rows' => '4'
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
            'data_class' => 'Sistema\InscripcionBundle\Entity\InscFichaAsamblea',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_inscripcionbundle_inscfichaasamblea';
    }
}
