<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sistema\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipdoc', 'choice', array(
                'label' => 'Tipo Documento',
                'choices' => array(
                    'DNI' => 'DNI', 'LE' => 'LE', 'LC' => 'LC', 'CI' => 'CI',
                ),
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('nrodoc', null, array(
                'label' => 'Número Documento',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('email', 'email', array(
                'label' => 'form.email',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'form.email',
                )
            ))
            ->add('username', null, array(
                'label' => 'form.username',
                'translation_domain' => 'FOSUserBundle',
                'constraints' => array(
                    new Regex(array(
                        'pattern'     => '/^[0-9a-zA-Z]+$/i',
                        'htmlPattern' => '^[0-9a-zA-Z]+$',
                        'message'     => 'Nombre de Usuario: Solo letras en mayusculas/minusculas y numeros, sin espacios.',
                    )),
                ),
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'form.username',
                )
            ))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array(
                    'label' => 'form.password',
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'form.password',
                    )
                ),
                'second_options' => array(
                    'label' => 'form.password_confirmation',
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'form.password_confirmation',
                    )
                ),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention'  => 'registration',
        ));
    }

    public function getName()
    {
        return 'sistema_fos_user_registration';
    }
}
