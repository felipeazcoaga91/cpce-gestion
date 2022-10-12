<?php

namespace Sistema\CPCEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * AfiliadoType form.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 */
class AfiliadoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('afiNombre')
            ->add('afiFecnac', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Afifecnac',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'date',
            ))
            ->add('afiTipo')
            ->add('afiTitulo')
            ->add('afiMatricula')
            ->add('afiDireccion')
            ->add('afiLocalidad')
            ->add('afiProvincia')
            ->add('afiZona')
            ->add('afiCodpos')
            ->add('afiTelefono1')
            ->add('afiCelular')
            ->add('afiMail')
            ->add('afiMailAlternativo')
            ->add('afiCivil')
            ->add('afiTipoiva')
            ->add('afiCuit')
            ->add('afiDgr')
            ->add('afiCategoria')
            ->add('afiFicha')
            ->add('afiEjprof')
            ->add('afiAsoc')
            ->add('afiMonto')
            ->add('afiSexo')
            ->add('afiGarante')
            ->add('afiDoc1')
            ->add('afiAut1')
            ->add('afiNac1', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Afinac1',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'date',
            ))
            ->add('afiSex1')
            ->add('afiFil1')
            ->add('afiDoc2')
            ->add('afiAut2')
            ->add('afiNac2', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Afinac2',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'date',
            ))
            ->add('afiSex2')
            ->add('afiFil2')
            ->add('afiDoc3')
            ->add('afiAut3')
            ->add('afiNac3', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Afinac3',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'date',
            ))
            ->add('afiSex3')
            ->add('afiFil3')
            ->add('afiDoc4')
            ->add('afiAut4')
            ->add('afiNac4', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Afinac4',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'date',
            ))
            ->add('afiSex4')
            ->add('afiFil4')
            ->add('afiDoc5')
            ->add('afiAut5')
            ->add('afiNac5', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Afinac5',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'date',
            ))
            ->add('afiSex5')
            ->add('afiFil5')
            ->add('afiDoc6')
            ->add('afiAut6')
            ->add('afiNac6', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Afinac6',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'date',
            ))
            ->add('afiSex6')
            ->add('afiFil6')
            ->add('afiDgralic')
            ->add('afiCuota')
            ->add('afiDebitos')
            ->add('afiCreditos')
            ->add('afiGanancias')
            ->add('afiIva')
            ->add('afiDgrexcep', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Afidgrexcep',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'date',
            ))
            ->add('afiDgiexcep', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Afidgiexcep',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'date',
            ))
            ->add('afiCbu')
            ->add('afiCbuCredito')
            ->add('afiLote')
            ->add('afiTipdoc')
            ->add('afiNrodoc')
            ->add('afiGarantedeTipdoc', 'select2', array(
                'class' => 'Sistema\CPCEBundle\Entity\Afiliado',
                'url'   => 'Afiliado_autocomplete_afiGarantedeTipdoc',
                'configs' => array(
                    'multiple' => false,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            ->add('afiGaranteTipdoc', 'select2', array(
                'class' => 'Sistema\CPCEBundle\Entity\Afiliado',
                'url'   => 'Afiliado_autocomplete_afiGaranteTipdoc',
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
            'data_class' => 'Sistema\CPCEBundle\Entity\Afiliado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_cpcebundle_afiliado';
    }
}
