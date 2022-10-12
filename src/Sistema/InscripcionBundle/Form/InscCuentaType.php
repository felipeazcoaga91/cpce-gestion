<?php

namespace Sistema\InscripcionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * CuentaType form.
 *
 * @author Max Shtefec <max.shtefec@gmail.com>
 */
class InscCuentaType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('controlCuenta', 'select2', array(
                'class' => 'Sistema\InscripcionBundle\Entity\InscControlCuenta',
                'url'   => 'admin_autocomplete_cuentas',
                'configs' => array(
                    'multiple' => false, //es requerido true o false
                    'width' => '100%'
                ),
                'label' => false,
                'attr' => array(
                    'col' => "col-lg-12 col-md-12 col-sm-12",
                    'class' => "col-lg-12 col-md-12 col-sm-12",
                )
            ))
            ->add('importe')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\InscripcionBundle\Entity\InscMoldeCuenta',
            'cascade_validation' => true,
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'Sistema_InscripcionBundle_cuenta';
    }

    private function getCuentas() {
        
    }

}
