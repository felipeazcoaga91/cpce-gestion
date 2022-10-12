<?php

namespace Sistema\CPCEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * ValidacionType form.
 * @author Max Shtefec <max.shtefec@gmail.com>
 */
class ValidacionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('afiTitulo', 'choice', array(
                'label' => 'Tipo',
                'choices'  => array(
                    'Contador Público' => "CP",
                    'Licenciado en Administración' => 'LA',
                    'Licenciado en Economía' => 'LE',
                ),
                'choices_as_values' => true,
                'attr' => array(
                     'class' => 'form-control',
                )
               
            ))
            ->add('afiMatricula', null, array(
                'required' => false,
                'label' => 'Nro de Matricula',
                'attr' => array(
                     'class' => 'form-control',
                )
               
            ))
            ->add('afiNombre', null, array(
                'required' => false,
                'label' => 'Apellido',
                'attr' => array(
                    'class' => 'form-control',
                  
                )
            ))
            ->add('afiNroDoc', null, array(
                'required' => false,
                'label' => 'Nro de Documento',
                'attr' => array(
                    'class' => 'form-control',
                  
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
            'data_class' => 'Sistema\CPCEBundle\Entity\Afiliado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_cpcebundle_validacion';
    }
}
