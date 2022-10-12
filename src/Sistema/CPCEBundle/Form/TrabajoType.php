<?php

namespace Sistema\CPCEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * TrabajoType form.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 */
class TrabajoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clienteComitente', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('comitenteCuit', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('comitenteDomicilio', null, array(
                'label' => 'Domicilio real/social',
                'attr'  => array(
                    'col' => 'col-lg-9 col-md-6 col-sm-6',
                ),
            ))
            ->add('cantidad', null, array(
                'label' => "Cantidad de trabajos",
                'attr'  => array(
                    'col' => 'col-lg-3 col-md-6 col-sm-6',
                ),
            ))
            ->add('fechaInforme', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Fecha del informe o certificación',
                'label_attr' => array(
                    //'class' => 'col-lg-2 col-md-2 col-sm-2',
                    'col'   => 'col-lg-6 col-md-6 col-sm-6',
                ),
                'widget_type' => 'date',
            ))
            ->add('fechaCierre', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Fecha de cierre',
                'label_attr' => array(
                    //'class' => 'col-lg-2 col-md-2 col-sm-2',
                    'col'   => 'col-lg-6 col-md-6 col-sm-6',
                ),
                'widget_type' => 'date',
            ))
            ->add('tipoReintegro', 'choice', array(
                'label'   => 'Tipo de Reintegro',
                'choices' => array(
                    'TRANSFERENCIA' => 'TRANSFERENCIA',
                    'CHEQUE' => 'CHEQUE',
                ),
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-3 col-md-6 col-sm-12',
                )
            ))
            ->add('profesional', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('matricula', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('domicilio', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('telefono', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('celular', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('correo', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-6',
                ),
            ))
            ->add('servicio', 'entity', array(
                'class'    => 'Sistema\CPCEBundle\Entity\Tareas',
                'property' => 'tarDescrip',
                'attr'     => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-12',
                )
            ))
            ->add('auditoriaTipo', 'choice', array(
                'label'   => 'TIPO DE ENTE',
                'choices' => array(
                    'CFL' => 'CON FINES DE LUCRO',
                    'SFL' => 'SIN FINES DE LUCRO',
                ),
                'attr'  => array(
                    'col'   => 'col-lg-6 col-md-6 col-sm-12',
                )
            ))
            ->add('importe1', null, array(
                'label' => 'ACTIVO + PASIVO HACIA TERCEROS',
                'attr'  => array(
                    'col'   => 'col-lg-6 col-md-6 col-sm-12',
                )
            ))
            ->add('importe2', null, array(
                'label' => 'INGRESOS POR VENTAS Y/O SERVICIOS',
                'attr'  => array(
                    'col'   => 'col-lg-6 col-md-6 col-sm-12',
                )
            ))
            ->add('honorarioMinimo', null, array(
                'label'     => 'Honorarios monto mínimo',
                'attr'      => array(
                    'col' => 'col-lg-3 col-md-6 col-sm-12',
                ),
            ))
            ->add('monto', null, array(
                'label' => 'Monto a depositar',
                'attr' => array(
                    'col' => 'col-lg-3 col-md-6 col-sm-12 pull-right',
                ),
            ))
            ->add('condicionIva', 'choice', array(
                'label'   => 'Condición IVA',
                'choices' => array(
                    'NO' => 'MONOTRIBUTO',
                    'SI' => 'RESPONSABLE INSCRIPTO',
                ),
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-3 col-md-6 col-sm-12',
                )
            ))
            ->add('cuit', null, array(
                'label' => "CUIT",
                'attr'  => array(
                    'col'       => 'col-lg-3 col-md-6 col-sm-12',
                    'data-mask' => '99-99999999-9',
                ),
            ))
            ->add('cbu', null, array(
                'label'     => "CBU",
                'attr'      => array(
                    'col'       => 'col-lg-8 col-md-8 col-sm-12',
                    'data-mask' => '999-9999-9-9999999999999-9',
                ),
            ))
            ->add('user', 'select2', array(
                'class' => 'Sistema\UserBundle\Entity\User',
                'url'   => 'Trabajo_autocomplete_user',
                'configs' => array(
                    'multiple' => false,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-6 col-md-6 col-sm-12 col-xs-12",
                )
            ))
            // ->add('servicio', 'select2', array(
            //     'class' => 'Sistema\CPCEBundle\Entity\Tareas',
            //     'url'   => 'Trabajo_autocomplete_servicio',
            //     'configs' => array(
            //         'multiple' => false,//required true or false
            //         'width'    => 'off',
            //     ),
            //     'attr' => array(
            //         'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
            //     )
            // ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\CPCEBundle\Entity\Trabajo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_cpcebundle_trabajo';
    }
}
