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
class FrontTrabajoConfirmarType extends AbstractType
{
    private $muestroMontos;
    private $editarComitente;
    private $editarMatriculado;
    private $hasCbu;
    private $montoHonorario;

    public function __construct($muestroMontos, $editarComitente, $editarMatriculado, $hasCbu, $montoHonorario)
    {
        $this->muestroMontos     = $muestroMontos;
        $this->editarComitente   = $editarComitente;
        $this->editarMatriculado = $editarMatriculado;
        $this->hasCbu            = $hasCbu;
        $this->montoHonorario    = $montoHonorario;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $servicio    = $options['data']->getServicio();
        $tareaCodigo = $servicio->getTarCodigo();

        if ($options['data']->getCondicionIva() == "SI") {
            $choicesCondicionIva = array('SI' => 'RESPONSABLE INSCRIPTO');
        } elseif ($options['data']->getCondicionIva() == "NO") {
            $choicesCondicionIva = array('NO' => 'MONOTRIBUTO');
        } else {
            $choicesCondicionIva = array(
                'NO' => 'MONOTRIBUTO',
                'SI' => 'RESPONSABLE INSCRIPTO',
            );
        }

        $builder
            ->add('clienteComitente', null, array(
                'read_only' => $this->editarComitente,
                'label'     => "Comitente",
                'attr'      => array(
                    'col' => 'col-lg-9 col-md-6 col-sm-12',
                ),
            ))
            ->add('comitenteCuit', null, array(
                'read_only' => true,
                'label'     => "CUIT",
                'attr'      => array(
                    'col' => 'col-lg-3 col-md-6 col-sm-12',
                    'data-mask' => '99-99999999-9',
                ),
            ))
            ->add('comitenteDomicilio', null, array(
                'read_only' => $this->editarComitente,
                'label'     => 'Domicilio real/social',
                'attr'      => array(
                    'col' => 'col-lg-9 col-md-6 col-sm-12',
                ),
            ))
            ->add('fechaInforme', 'date', array(
                'required'   => true,
                
                'label'      => 'Fecha de Certificación',
            ))
            ->add('acreditar', 'checkbox', array(
                'label'    => 'Solicitó acreditar a saldo deudores',
                'required' => false,
                'data' => true,
            ))
            ->add('fechaCierre', 'date', array(
                'required'   => true,
                'label'      => 'Fecha de Cierre',
            ))
            ->add('cantidad', null, array(
                
                'label' => "Cant. de Ejemplares",
            ));
            if ($this->montoHonorario) {
                $builder
                ->add('tipoReintegro', 'choice', array(
                    'read_only' => $this->montoHonorario,
                    'label'     => 'Indicar Tipo de Reintegro',
                    'choices'   => array(
                        'TRANSFERENCIA' => 'TRANSFERENCIA',
                    ),
                    'attr' => array(
                        'class' => 'form-control',
                        'col'   => 'col-lg-12 col-md-12 col-sm-12',
                    )
                    ));
            }else{
                $builder
                ->add('tipoReintegro', 'choice', array(
                    'read_only' => $this->montoHonorario,
                    'label'     => 'Indicar Tipo de Reintegro',
                    'choices'   => array(
                        'TRANSFERENCIA' => 'TRANSFERENCIA',
                        'CHEQUE' => 'CHEQUE',
                    ),
                    'attr' => array(
                        'class' => 'form-control',
                        'col'   => 'col-lg-12 col-md-12 col-sm-12',
                    )
                    ))
               ;
            }
            $builder
            ->add('profesional', null, array(
                'read_only' => true,
                'attr' => array(
                    'col' => 'col-lg-9 col-md-6 col-sm-12',
                ),
            ))
            ->add('matricula', null, array(
                'read_only' => true,
                'attr' => array(
                    'col' => 'col-lg-3 col-md-6 col-sm-12',
                ),
            ))
            ->add('domicilio', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-12',
                ),
            ))
            ->add('telefono', null, array(
                'label' => "Teléfono (10 caract.)",
                'attr'  => array(
                    'col' => 'col-lg-3 col-md-6 col-sm-12',
                    'data-mask' => '(999)9999999',
                ),
            ))
            ->add('celular', null, array(
                'label' => "Celular (Sin 0 ni 15)",
                'attr'  => array(
                    'col' => 'col-lg-3 col-md-6 col-sm-12',
                    'data-mask' => '(999)9999999',
                ),
            ))
            ->add('correo', null, array(
                'attr' => array(
                    'col' => 'col-lg-6 col-md-6 col-sm-12',
                ),
            ))
            ->add('servicio', 'entity', array(
                'label'     => 'SERVICIO',
                'read_only' => true,
                'class'     => 'Sistema\CPCEBundle\Entity\Tareas',
                'property'  => 'tarDescrip',
                'query_builder' => function (EntityRepository $er) use ($tareaCodigo) {
                    return $er->createQueryBuilder('s')
                        ->where('s.tarActivoweb = true')
                        ->andWhere('s.tarCodigo = :codigo')
                        ->setParameter('codigo', $tareaCodigo)
                    ;
                },
                'attr'      => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-6 col-md-6 col-sm-12',
                ),
                'data' => $servicio,
            ))
            ->add('condicionIva', 'choice', array(
                'read_only' => $this->editarMatriculado,
                'label'     => 'Condición IVA',
                'choices'   => $choicesCondicionIva,
                'attr' => array(
                    'class' => 'form-control',
                    'col'   => 'col-lg-3 col-md-6 col-sm-12',
                )
            ))
            ->add('cuit', null, array(
                'read_only' => $this->editarMatriculado,
                'label'     => "CUIT",
                'attr'      => array(
                    'col'       => 'col-lg-3 col-md-6 col-sm-12',
                    'data-mask' => '99-99999999-9',
                ),
            ))
            ->add('cbu', null, array(
                'required'   => true,
                'read_only' => $this->hasCbu,
                'label'     => "CBU",
                'attr'      => array(
                    'col'       => 'col-lg-8 col-md-8 col-sm-12',
                    'data-mask' => '999-9999-9-9999999999999-9',
                ),
            ))
        ;
        if ($this->muestroMontos) {
            if ($tareaCodigo == 1) {
                $auditoriaTipo = $options['data']->getAuditoriaTipo();
                if ($auditoriaTipo == "CFL") {
                    $choicesAT = array('CFL' => 'CON FINES DE LUCRO');
                } elseif ($auditoriaTipo == "SFL") {
                    $choicesAT = array('SFL' => 'SIN FINES DE LUCRO');
                } else {
                    $choicesAT = array(
                        'CFL' => 'CON FINES DE LUCRO',
                        'SFL' => 'SIN FINES DE LUCRO',
                    );
                }
                $builder
                    ->add('auditoriaTipo', 'choice', array(
                        'label'     => 'TIPO DE ENTE',
                        'read_only' => true,
                        'choices'   => $choicesAT,
                        'attr' => array(
                            'col' => 'col-lg-6 col-md-6 col-sm-12',
                        ),
                        'data' => $auditoriaTipo,
                    ))
                ;
            }
            if ($tareaCodigo == 3 || $tareaCodigo == 6 || $tareaCodigo == 9 || $tareaCodigo == 11) {
                $esAuditor = $options['data']->getEsAuditor();
                if ($esAuditor == "SI") {
                    $choicesEA = array('SI' => 'SI');
                } elseif ($esAuditor == "NO") {
                    $choicesEA = array('NO' => 'NO');
                } else {
                    $choicesEA = array(
                        'SI' => 'SI',
                        'NO' => 'NO',
                    );
                }
                $builder
                    ->add('esAuditor', 'choice', array(
                        'label'   => 'Es el auditor',
                        'read_only' => true,
                        'choices'   => $choicesEA,
                        'attr'  => array(
                            'col'   => 'col-lg-6 col-md-6 col-sm-12',
                        ),
                        'data' => $esAuditor,
                    ))
                    ->add('porcentajeSindico', 'percent', array(
                        'label'     => 'Porcentaje según síndico',
                        'type'      => 'integer',
                        'read_only' => true,
                        'required'  => true,
                        'scale'     => 2,
                        'attr' => array(
                            'col' => 'col-lg-6 col-md-6 col-sm-12',
                        ),
                    ))
                ;
                if ($tareaCodigo == 6 || $tareaCodigo == 9 || $tareaCodigo == 11) {
                    $builder
                        ->add('meses', 'integer', array(
                            'label'     => 'Meses del periodo',
                            'read_only' => true,
                            'required'  => true,
                            'attr' => array(
                                'col' => 'col-lg-3 col-md-6 col-sm-12',
                            ),
                        ))
                        ->add('importePeriodo', 'mwspeso', array(
                            'label'     => 'Monto depositado periodos anteriores',
                            'read_only' => true,
                            'required'  => true,
                            'attr' => array(
                                'col' => 'col-lg-6 col-md-6 col-sm-12',
                            ),
                        ))
                    ;
                }
            }
            if ($tareaCodigo == 7 || $tareaCodigo == 10) {
                $builder
                        ->add('meses', 'integer', array(
                            'label'     => 'Meses del periodo',
                            'read_only' => true,
                            'required'  => true,
                            'attr' => array(
                                'col' => 'col-lg-3 col-md-6 col-sm-12',
                            ),
                        ))
                    ;
            }
            $builder
                ->add('activo', 'mwspeso', array(
                    'label'    => 'ACTIVOS',
                    'read_only' => true,
                    'attr' => array(
                        'col' => 'col-lg-6 col-md-6 col-sm-12',
                    )
                ))
                ->add('pasivo', 'mwspeso', array(
                    'label'    => 'PASIVOS HACIA TERCEROS',
                    'read_only' => true,
                    'attr' => array(
                        'col' => 'col-lg-6 col-md-6 col-sm-12',
                    )
                ))
                ->add('importe1', 'mwspeso', array(
                    'label'     => 'TOTAL (activos + pasivos)',
                    'read_only' => true,
                    'attr' => array(
                        'col' => 'col-lg-6 col-md-6 col-sm-12',
                    )
                ))
                ->add('importe2', 'mwspeso', array(
                    'label'     => 'INGRESOS POR VENTAS Y/O SERVICIOS',
                    'read_only' => true,
                    'attr' => array(
                        'col' => 'col-lg-6 col-md-6 col-sm-12',
                    )
                ))
                ->add('honorarioMinimo', 'mwspeso', array(
                    'label'     => 'Honorarios monto mínimo (según escala)',
                    //'read_only' => $this->editarMatriculado,
                	'read_only' => true,
                    'attr' => array(
                        'col' => 'col-lg-3 col-md-6 col-sm-12',
                    ),
                ))
                ->add('monto', 'mwspeso', array(
                    'label'     => 'Monto honorarios (requerido)',
                    'label_attr'  => array(
                        'class'               => 'tooltips',
                        'data-original-title' => 'Solo se permiten números y coma (,) valor de ej: 15000',
                    ),
                    'attr' => array(
                        'col' => 'col-lg-3 col-md-6 col-sm-12 pull-right',
                        'class'     => 'mwsValidaPatron mwsReemplazaValor calculo_monto_honorario',
                        'mwspatron' => '[0-9-,.]',
                        'mwsreemplazar'    => '.',
                        'mwsreemplazarpor' => ',',
                    ),
                ))
                ->add('montoIva', 'mwspeso', array(
                    'label'     => 'Discriminar IVA (opcional)',
                    'required'  => false,
                    'empty_data' => "0",
                    'label_attr'  => array(
                        'class'               => 'tooltips',
                        'data-original-title' => 'Solo se permiten números y coma (,) valor de ej: 2500,50',
                    ),
                    'attr' => array(
                        'col' => 'col-lg-3 col-md-6 col-sm-12 pull-right',
                        'class'     => 'mwsValidaPatron mwsReemplazaValor calculo_monto_iva',
                        'mwspatron' => '[0-9-,.]',
                        'mwsreemplazar'    => '.',
                        'mwsreemplazarpor' => ',',
                    ),
                ))
                ->add('montoAporte', 'mwspeso', array(
                    'label'     => 'Discriminar aporte 8% (opcional)',
                    'required'  => false,
                    'empty_data' => "0",
                    'label_attr'  => array(
                        'class'               => 'tooltips',
                        'data-original-title' => 'Solo se permiten números y coma (,) valor de ej: 15000',
                    ),
                    'attr' => array(
                        'col' => 'col-lg-3 col-md-6 col-sm-12 pull-right',
                        'class'     => 'mwsValidaPatron mwsReemplazaValor calculo_monto_aporte',
                        'mwspatron' => '[0-9-,.]',
                        'mwsreemplazar'    => '.',
                        'mwsreemplazarpor' => ',',
                    ),
                ))
                ->add('montoTotal', 'mwspeso', array(
                    'label'     => 'Monto total (Honorarios + IVA + Aporte)',
                    'mapped'    => false,
                    'required'  => false,
                    'read_only' => true,
                    'attr' => array(
                        'col'   => 'col-lg-3 col-md-6 col-sm-12 pull-right',
                        'class' => 'calculo_total',
                    ),
                ))
                ->add('montoDeposito', 'mwspeso', array(
                    'label'     => 'Monto a depositar (requerido)',
                    'label_attr' => array(
                        'class'               => 'tooltips',
                        'data-original-title' => 'Solo se permiten números y coma (,) valor de ej: 2500,50',
                    ),
                    'attr' => array(
                        'col' => 'col-lg-3 col-md-6 col-sm-12 pull-right',
                        'class'     => 'mwsValidaPatron mwsReemplazaValor calculo_total',
                        'mwspatron' => '[0-9-,.]',
                        'mwsreemplazar'    => '.',
                        'mwsreemplazarpor' => ',',
                    ),
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
