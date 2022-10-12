<?php

namespace Sistema\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

/**
 * RoleFilterType filtro.
 * @author Nombre Apellido <name@gmail.com>
 */
class RoleFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('name', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('url', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            ->add('acceso', 'filter_choice', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('role_name', 'filter_text_like', array(
                'attr'=> array('class'=>'form-control')
            ))
        ;

        $listener = function (FormEvent $event) {
            // Is data empty?
            foreach ((array) $event->getForm()->getData() as $data) {
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
            'data_class' => 'Sistema\UserBundle\Entity\Role'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_userbundle_rolefiltertype';
    }
}
