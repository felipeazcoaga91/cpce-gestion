<?php

namespace Sistema\CPCEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * AfiliadoType form.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 */
class DatosSindicoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('afiNombre')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\CPCEBundle\Entity\Afiliado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_cpcebundle_sindico';
    }
}
