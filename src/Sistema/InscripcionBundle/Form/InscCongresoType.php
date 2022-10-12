<?php

namespace Sistema\InscripcionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * InscCongresoType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class InscCongresoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('personas', 'collection', array(
                'type' => new InscPersonaType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false,
            ))
            ->add('extra', null, array(
                'label' => 'Gala Solidaria - $500'
            ))
            ->add('areas', 'select2', array(
                'class' => 'Sistema\InscripcionBundle\Entity\InscArea',
                'url'   => 'inscripcion_autocomplete_area',
                'required'   => true,
                'label' => false,
                'configs' => array(
                    'multiple' => true,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                ),
                'constraints' => array(
                    new Assert\Count(array(
                        'min' => 2, 
                        'max' => 2, 
                        'exactMessage' => 'Debe elegir 2 Areas exactamente: 1.- Preferencial 2.- Opcional'
                    )),
                ),
            ))
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
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\InscripcionBundle\Entity\InscFicha'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_inscripcionbundle_insccongreso';
    }
}
