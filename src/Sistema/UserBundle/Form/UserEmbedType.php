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
class UserEmbedType extends AbstractType
{
    private $required;

    public function __construct($required)
    {
        $this->required = $required;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array(
                'label' => 'Nombre de usuario',
                'label_attr' => array(
                    'class' => 'col-lg-3 col-md-3 col-sm-3 control-label',
                ),
                'attr' => array(
                    'class' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('email', null, array(
                'label_attr' => array(
                    'class' => 'col-lg-3 col-md-3 col-sm-3 control-label',
                ),
                'attr' => array(
                    'class' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('password', 'repeated', array(
                'type'            => 'password',
                'required'        => $this->required,
                'invalid_message' => 'Las Contraseñas deben Coincidir.',
                'options'         => array(
                    'attr' => array(
                        'class' => 'password-field'
                    )
                ),
                'first_options'  => array(
                    'label' => 'Contraseña',
                    'label_attr' => array(
                        'class' => 'col-lg-3 col-md-3 col-sm-3 control-label',
                    ),
                    'attr' => array(
                        'class' => 'col-lg-6 col-md-6 col-sm-6',
                    ),
                ),
                'second_options' => array(
                    'label' => 'Repetir',
                    'label_attr' => array(
                        'class' => 'col-lg-3 col-md-3 col-sm-3 control-label',
                    ),
                    'attr' => array(
                        'class' => 'col-lg-6 col-md-6 col-sm-6',
                    ),
                ),
            ))
            ->add('user_roles', null, array(
                'label'    => 'Rol',
                'required' => true,
                'class'    => 'SistemaUserBundle:Role',
                'property' => 'roleName',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->select('a')
                        ->where('a.id <> 1')
                        ->orderBy('a.role_name', 'ASC')
                    ;
                },
                'label_attr' => array(
                    'class' => 'col-lg-3 col-md-3 col-sm-3 control-label',
                ),
                'attr' => array(
                    'class' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('enabled', null, array(
                'label'    => 'Activo',
                'required' => false,
                'label_attr' => array(
                    'class' => 'col-lg-3 col-md-3 col-sm-3 control-label',
                ),
                'attr' => array(
                    'class' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_userbundle_user';
    }
}
