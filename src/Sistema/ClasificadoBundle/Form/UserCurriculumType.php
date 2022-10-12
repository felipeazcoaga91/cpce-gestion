<?php

namespace Sistema\ClasificadoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * UserCurriculumType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class UserCurriculumType extends AbstractType
{

    private $isAdmin;

    public function __Construct($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', 'mws_field_file', array(
                'required'  => false,
                'file_path' => 'webPath',
                'label'     => 'Archivo',
                //'show_path' => true,
                //'preview_image' => true,
            ))
        ;
        if ($this->isAdmin) {
            $builder
                ->add('usercv', 'select2', array(
                    'label' => 'Usuario',
                    'class' => 'Sistema\UserBundle\Entity\User',
                    'url'   => 'UserCurriculum_autocomplete_usercv',
                    'configs' => array(
                        'multiple' => false, //required true or false
                        'width'    => 'off',
                    ),
                    'attr' => array(
                        'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                    )
                ))
                ->add('ofertaLaborals', 'select2', array(
                    'label' => 'Suscripcion a Oferta',
                    'class' => 'Sistema\ClasificadoBundle\Entity\OfertaLaboral',
                    'url'   => 'UserCurriculum_autocomplete_ofertaLaborals',
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
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\ClasificadoBundle\Entity\UserCurriculum'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_clasificadobundle_usercurriculum';
    }
}
