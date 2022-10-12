<?php

namespace Sistema\CPCEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

/**
 * TrabajoFilterType filtro.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 */
class TrabajoFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'filter_text', array(
                'label'    => "Codigo",
                'required' => false,
                'attr' => array(
                    'col'   => 'col-lg-3 col-md-6 col-sm-12',
                ),
            ))
            ->add('estado', 'filter_entity', array(
                'label'    => "Estado",
                'class'    => 'SistemaCPCEBundle:TrabajoEstado',
                'choice_label' => 'nombre',
                'required' => false,
                'attr' => array(
                    'col'   => 'col-lg-3 col-md-6 col-sm-12',
                ),
            ))
            ->add('certificado', 'filter_choice', array(
                'label'    => "Revisión",
                'choices' => array(
                    '1' => 'FINALIZADO',
                ),
                'required' => false,
                'attr' => array(
                    'col'   => 'col-lg-3 col-md-6 col-sm-12',
                ),
            ))
            ->add('clienteComitente', 'filter_text_like', array(
                'label'    => "Comitente",
                'required' => false,
                'attr' => array(
                    'col'   => 'col-lg-6 col-md-6 col-sm-12',
                ),
            ))
            ->add('comitenteCuit', 'filter_text_like', array(
                'required' => false,
                'attr' => array(
                    'col'   => 'col-lg-3 col-md-6 col-sm-12',
                ),
            ))
            // ->add('comitenteDomicilio', 'filter_text_like', array(
            //     'required' => false,
            // ))
            ->add('fechaInforme', 'filter_date_range', array(
                'required' => false,
            ))
        ;

        $listener = function(FormEvent $event)
        {
            // Is data empty?
            foreach ((array)$event->getForm()->getData() as $data) {
                if ( is_array($data)) {
                    foreach ($data as $subData) {
                        if (!empty($subData)) {
                            return;
                        }
                    }
                } else {
                    if (!empty($data)) {
                        return;
                    }    
                }
            }
            $event->getForm()->addError(new FormError('Filter empty'));
        };
        $builder->addEventListener(FormEvents::POST_SUBMIT, $listener);
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\CPCEBundle\Entity\Trabajo',
            'validation_groups' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_cpcebundle_trabajofiltertype';
    }
}
