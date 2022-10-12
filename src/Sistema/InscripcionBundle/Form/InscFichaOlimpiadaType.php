<?php

namespace Sistema\InscripcionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * InscFichaOlimpiada form.
 * @author Nombre Apellido <name@gmail.com>
 */
class InscFichaOlimpiadaType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
            
        $builder
            ->add('hotel', 'select2', array(
                'class' => 'Sistema\InscripcionBundle\Entity\InscHotel',
                'url'   => 'inscripcion_autocomplete_hotel',
                'configs' => array(
                    'multiple' => false,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            ->add('transporte', 'select2', array(
                'class' => 'Sistema\InscripcionBundle\Entity\InscTransporte',
                'url'   => 'inscripcion_autocomplete_transporte',
                'configs' => array(
                    'multiple' => false,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            ->add('disciplinas', 'select2', array(
                'class' => 'Sistema\InscripcionBundle\Entity\InscDisciplina',
                'url'   => 'inscripcion_autocomplete_disciplina',
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
            ->add('personas', 'collection', array(
                'type' => new InscPersonaType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false,
            ))
        ;
            
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\InscripcionBundle\Entity\InscFichaOlimpiada',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_inscripcionbundle_inscficha';
    }
}
