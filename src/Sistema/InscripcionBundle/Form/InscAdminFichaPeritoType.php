<?php

namespace Sistema\InscripcionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * InscAdminFichaPeritoType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class InscAdminFichaPeritoType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('afiNrodoc', null, array(
                'attr'  => array(
                    'col'       => 'col-lg-12 col-md-12 col-sm-12',
                ),
                'label' => 'Afiliado D.N.I.',
            ))
            ->add('moldeId', 'select2', array(
                'class' => 'Sistema\InscripcionBundle\Entity\InscMolde',
                'url'   => 'inscripcion_autocomplete_molde',
                'configs' => array(
                    'multiple' => false,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            ->add('circunscripcion', 'select2', array(
                'class' => 'Sistema\InscripcionBundle\Entity\InscCircunscripcion',
                'url'   => 'inscripcion_autocomplete_circunscripcion',
                'configs' => array(
                    'multiple' => false,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            ->add('fueros', 'select2', array(
                'class' => 'Sistema\InscripcionBundle\Entity\InscFuero',
                'url'   => 'inscripcion_autocomplete_fuero',
                'label' => false,
                'required'   => true,
                'configs' => array(
                    'multiple' => true,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\InscripcionBundle\Entity\InscFichaPerito',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_inscripcionbundle_inscadminfichaperitos';
    }
}
