<?php

namespace Sistema\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

/**
 * UserType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class UserType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        if (is_null($builder->getData()->getId())) {//New
            $required = true;
        } else {//Edit
            $required = false;
        }
        $builder
            ->add('username', null, array(
                'label' => 'Nombre',
                // 'label_attr' => array(
                //     'class' => 'form-label col-lg-3',
                // ),
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-3 col-md-3'
                )
            ))
            ->add('email', null, array(
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-3 col-md-3'
                )
            ))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'required' => $required,
                'invalid_message' => 'Las Contraseñas deben Coincidir.',
                'options' => array(
                    'attr' => array(
                        'class' => 'password-field form-control'
                    )
                ),
                'first_options' => array(
                    'label' => 'Contraseña',
                    // 'label_attr' => array(
                    //     'class' => 'form-label col-lg-3',
                    // ),
                    'attr' => array(
                        'class' => 'form-control',
                        'col'   => 'col-lg-3 col-md-3'
                    )
                ),
                'second_options' => array(
                    'label' => 'Repetir',
                    // 'label_attr' => array(
                    //     'class' => 'form-label col-lg-3',
                    // ),
                    'attr' => array(
                        'class' => 'form-control',
                        'col'   => 'col-lg-3 col-md-3'
                    )
                ),
            ))
            ->add('user_roles', 'select2', array(
                'label' => 'Roles',
                'class' => 'Sistema\UserBundle\Entity\Role',
                'url'   => 'User_autocomplete_user_roles',
                'configs' => array(
                    'multiple' => true, //required true or false
                    'width' => 'off',
                ),
                'label_attr' => array(
                    'class' => "col-lg-3 col-md-3 col-sm-12 col-xs-12",
                ),
                'attr' => array(
                    'class' => "col-lg-6 col-md-6 col-sm-12 col-xs-12",
                )
            ))
            ->add('enabled', null, array(
                'label' => 'Activo',
                'label_attr' => array(
                    'class' => "col-lg-6 col-md-6 col-sm-12 col-xs-12",
                ),
                'attr'  => array(
                    'col' => "col-lg-2 col-md-6 col-sm-12 col-xs-12",
                ),
            ))
            ->add('tipdoc', 'choice', array(
                'label' => 'Tipo Documento',
                'choices' => array(
                    'DNI' => 'DNI', 'LE' => 'LE', 'LC' => 'LC', 'CI' => 'CI', 'ECO' => 'ECO',
                ),
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-6 col-md-6',
                )
            ))
            ->add('nrodoc', null, array(
                'label' => 'Número Documento',
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-6 col-md-6',
                )
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'sistema_userbundle_user';
    }

}
