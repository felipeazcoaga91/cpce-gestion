<?php

namespace Sistema\CPCEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

/**
 * TrabajoType form.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 */
class FrontTrabajoType extends AbstractType
{
    private $tipo;

    public function __construct($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($this->tipo == "servicio") {
            $builder
                ->add('servicio', 'entity', array(
                    'label'    => 'SERVICIO',
                    'class'    => 'Sistema\CPCEBundle\Entity\Tareas',
                    'property' => 'tarDescrip',
                    'query_builder' => function (EntityRepository $er) use ($options) {
                        return $er->createQueryBuilder('s')
                            ->where('s.tarActivoweb = true')
                        ;
                    },
                    'attr' => array(
                        'col' => 'col-lg-6 col-md-6 col-sm-12',
                    )
                ))
                ->add('comitenteCuit', null, array(
                    'label' => "CUIT (?)",
                    'attr'  => array(
                        'col'       => 'col-lg-3 col-md-6 col-sm-12',
                        'data-mask' => '99-99999999-9',
                    ),
                    'label_attr' => array(
                        'class'               => 'tooltips',
                        'data-original-title' => 'En caso de que el Comitente/Cliente No tenga CUIT ingresar 00-00000000-0',
                    ),
                ))
            ;
        } else {
            $servicio = $options['data']->getServicio();
            $builder
                ->add('servicio', 'entity', array(
                    'label'    => 'SERVICIO',
                    'read_only' => true,
                    'class'     => 'Sistema\CPCEBundle\Entity\Tareas',
                    'property'  => 'tarDescrip',
                    'query_builder' => function (EntityRepository $er) use ($servicio) {
                        return $er->createQueryBuilder('s')
                            ->where('s.tarActivoweb = true')
                            ->andWhere('s.tarCodigo = :codigo')
                            ->setParameter('codigo', $servicio->getTarCodigo())
                        ;
                    },
                    'attr' => array(
                        'class' => 'form-control',
                        'col'   => 'col-lg-6 col-md-6 col-sm-12',
                    ),
                    'data' => $servicio,
                ))
                ->add('activo', 'mwspeso', array(
                    'label'    => 'ACTIVOS',
                    'label_attr' => array(
                        'class'               => 'tooltips',
                        'data-original-title' => 'Solo se permiten números y coma (,) valor de ej: 2500,50',
                    ),
                    'attr' => array(
                        'col'       => 'col-lg-6 col-md-6 col-sm-12',
                        'class'     => 'mwsValidaPatron mwsReemplazaValor',
                        'mwspatron' => '[0-9-,.]',
                        'mwsreemplazar'    => '.',
                        'mwsreemplazarpor' => ',',
                    ),
                    'data' => 0,
                ))
                ->add('pasivo', 'mwspeso', array(
                    'label'    => 'PASIVOS HACIA TERCEROS',
                    'label_attr' => array(
                        'class'               => 'tooltips',
                        'data-original-title' => 'Solo se permiten números y coma (,) valor de ej: 2500,50',
                    ),
                    'attr' => array(
                        'col'       => 'col-lg-6 col-md-6 col-sm-12',
                        'class'     => 'mwsValidaPatron mwsReemplazaValor',
                        'mwspatron' => '[0-9-,.]',
                        'mwsreemplazar'    => '.',
                        'mwsreemplazarpor' => ',',
                    ),
                    'data' => 0,
                ))
                ->add('importe1', 'mwspeso', array(
                    'label'    => 'TOTAL (activos + pasivos)',
                    'label_attr' => array(
                        'class'               => 'tooltips',
                        'data-original-title' => 'Solo se permiten números y coma (,) valor de ej: 2500,50',
                    ),
                    'attr' => array(
                        'col'       => 'col-lg-6 col-md-6 col-sm-12',
                        'class'     => 'mwsValidaPatron mwsReemplazaValor',
                        'disabled' => 'disabled',
                        'mwspatron' => '[0-9-,.]',
                        'mwsreemplazar'    => '.',
                        'mwsreemplazarpor' => ',',
                    ),
                    'data' => 0,
                ))
                ->add('importe2', 'mwspeso', array(
                    'label'    => 'INGRESOS POR VENTAS Y/O SERVICIOS (?)',
                    'label_attr' => array(
                        'class'               => 'tooltips',
                        'data-original-title' => 'Solo se permiten números y coma (,) valor de ej: 15000',
                    ),
                    'attr' => array(
                        'col'       => 'col-lg-6 col-md-6 col-sm-12',
                        'class'     => 'mwsValidaPatron mwsReemplazaValor',
                        'mwspatron' => '[0-9-,.]',
                        'mwsreemplazar'    => '.',
                        'mwsreemplazarpor' => ',',
                    ),
                    'data' => 0,
                ))
                ->add('comitenteCuit', 'hidden', array(
                    'label' => "CUIT",
                    'attr'  => array(
                        'col'       => 'col-lg-3 col-md-6 col-sm-12',
                        'data-mask' => '99-99999999-9',
                    ),
                ))
            ;
            if ($servicio->getTarCodigo() == 1) {
                $builder
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
                ;
            }
            if ($servicio->getTarCodigo() == 3 || $servicio->getTarCodigo() == 6 || $servicio->getTarCodigo() == 9 || $servicio->getTarCodigo() == 11) {
                $builder
                    ->add('esAuditor', 'choice', array(
                        'label'   => 'ES EL AUDITOR',
                        'choices' => array(
                            'SI' => 'SI',
                            'NO' => 'NO',
                        ),
                        'attr'  => array(
                            'col'   => 'col-lg-6 col-md-6 col-sm-12',
                        )
                    ))
                    ->add('porcentajeSindico', 'percent', array(
                        'label'    => 'PORCENTAJE SEGUN SINDICO (?)',
                        'type'     => 'integer',
                        'required' => true,
                        'scale'    => 2,
                        'label_attr' => array(
                            'class'               => 'tooltips',
                            'data-original-title' => 'Solo se permiten números y coma (,) valor de ej: 50%',
                        ),
                        'attr' => array(
                            'col'       => 'col-lg-6 col-md-6 col-sm-12',
                            'class'     => 'mwsValidaPatron mwsReemplazaValor',
                            'mwspatron' => '[0-9-,.]',
                            'mwsreemplazar'    => '.',
                            'mwsreemplazarpor' => ',',
                        ),
                        'data' => 100,
                    ))
                ;
            }
            if ($servicio->getTarCodigo() == 6 || $servicio->getTarCodigo() == 9 || $servicio->getTarCodigo() == 11) {
                $builder
                    ->add('meses', 'integer', array(
                        'label'    => 'MESES DEL PERIODO (?)',
                        'required' => true,
                        'label_attr' => array(
                            'class'               => 'tooltips',
                            'data-original-title' => 'Valor numérico permitido del 1 al 12',
                        ),
                        'attr' => array(
                            'col' => 'col-lg-3 col-md-6 col-sm-12',
                            'min' => 1,
                            'max' => 12,
                        ),
                        'data' => 1,
                    ))
                    ->add('importePeriodo', 'mwspeso', array(
                        'label'    => 'MONTO DEPOSITADO PERIODOS ANTERIORES (?)',
                        'required' => true,
                        'label_attr' => array(
                            'class'               => 'tooltips',
                            'data-original-title' => 'Solo se permiten números y coma (,) valor de ej: 2500,50',
                        ),
                        'attr' => array(
                            'col'       => 'col-lg-6 col-md-6 col-sm-12',
                            'class'     => 'mwsValidaPatron mwsReemplazaValor',
                            'mwspatron' => '[0-9-,.]',
                            'mwsreemplazar'    => '.',
                            'mwsreemplazarpor' => ',',
                        ),
                        'data' => 0,
                    ))
                ;
            }
            if ($servicio->getTarCodigo() == 7 || $servicio->getTarCodigo() == 10) {
                $builder
                    ->add('meses', 'integer', array(
                        'label'    => 'MESES DEL PERIODO (?)',
                        'required' => true,
                        'label_attr' => array(
                            'class'               => 'tooltips',
                            'data-original-title' => 'Valor numérico permitido del 1 al 12',
                        ),
                        'attr' => array(
                            'col' => 'col-lg-3 col-md-6 col-sm-12',
                            'min' => 1,
                            'max' => 12,
                        ),
                        'data' => 1,
                    ))
                ; 
            }
        }
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
        return 'cpce_trabajo_front';
    }
}