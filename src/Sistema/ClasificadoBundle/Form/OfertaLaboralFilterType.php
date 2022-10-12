<?php

namespace Sistema\ClasificadoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

/**
 * OfertaLaboralFilterType filtro.
 * @author Nombre Apellido <name@gmail.com>
 */
class OfertaLaboralFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('solicitante', 'filter_text_like')
            ->add('requiere', 'filter_text_like')
            ->add('puesto', 'filter_text_like')
            ->add('requisito', 'filter_text_like')
            ->add('tarea', 'filter_text_like')
            ->add('fechaFin', 'filter_date_range')
            ->add('activo', 'filter_choice')
            ->add('delegacion', 'filter_number_range')
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
            'data_class' => 'Sistema\ClasificadoBundle\Entity\OfertaLaboral'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_clasificadobundle_ofertalaboralfiltertype';
    }
}
