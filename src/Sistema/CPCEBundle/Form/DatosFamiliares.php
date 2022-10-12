<?php

namespace Sistema\CPCEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * DatosFamiliares form.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 */
class DatosFamiliares extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $afiNac1 = $options['data']->getAfiNac1();
        if (!is_null($afiNac1)) {
            if ($afiNac1->format('d/m/Y') == "30/11/-0001") {
                $afiNac1 = null;
            }
        }
            
        $afiNac2 = $options['data']->getAfiNac2();
        if (!is_null($afiNac2)) {
            if ($afiNac2->format('d/m/Y') == "30/11/-0001") {
                $afiNac2 = null;
            }
        }

        $afiNac3 = $options['data']->getAfiNac3();
        if (!is_null($afiNac3)) {
            if ($afiNac3->format('d/m/Y') == "30/11/-0001") {
                $afiNac3 = null;
            }
        }
        
        $afiNac4 = $options['data']->getAfiNac4();
        if (!is_null($afiNac4)) {
            if ($afiNac4->format('d/m/Y') == "30/11/-0001") {
                $afiNac4 = null;
            }
        }
        
        $afiNac5 = $options['data']->getAfiNac5();
        if (!is_null($afiNac5)) {
            if ($afiNac5->format('d/m/Y') == "30/11/-0001") {
                $afiNac5 = null;
            }
        }
        
        $afiNac6 = $options['data']->getAfiNac6();
        if (!is_null($afiNac6)) {
            if ($afiNac6->format('d/m/Y') == "30/11/-0001") {
                $afiNac6 = null;
            }
        }

        $builder
            ->add('afiAut1')
            ->add('afiFil1', 'choice', array(
                'choices' => array(
                    '' => null,
                    '0' => 'Esposo/a',
                    '1' => 'Hijo/a',
                    '2' => 'Tutela',
                    '3' => 'Conviviente'
                ),
                'choices_as_values' => false,
            ))
            ->add('afiNac1', 'bootstrapdatetime', array(
                'required'    => false,
                'widget_type' => 'date',
                'data'        => $afiNac1,
            ))
            ->add('afiDoc1')
            ->add('afiSex1', 'choice', array(
                'choices' => array(
                    '-' => null,
                    'F' => 'Mujer',
                    'M' => 'Hombre'
                ),
                'choices_as_values' => false,
            ))
            ->add('afi_benef_fs1', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_sv1', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_cap1', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afiDoc2')
            ->add('afiAut2')
            ->add('afiNac2', 'bootstrapdatetime', array(
                'required'    => false,
                'widget_type' => 'date',
                'data'        => $afiNac2,
            ))
            ->add('afiSex2', 'choice', array(
                'choices' => array(
                    '-' => null,
                    'F' => 'Mujer',
                    'M' => 'Hombre'
                ),
                'choices_as_values' => false,
            ))
            ->add('afiFil2', 'choice', array(
                'choices' => array(
                    '-' => null,
                    '0' => 'Esposo/a',
                    '1' => 'Hijo/a',
                    '2' => 'Otro'
                ),
                'choices_as_values' => false,
            ))
            ->add('afi_benef_fs2', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_sv2', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_cap2', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afiDoc3')
            ->add('afiAut3')
            ->add('afiNac3', 'bootstrapdatetime', array(
                'required'    => false,
                'widget_type' => 'date',
                'data'        => $afiNac3
            ))
            ->add('afiSex3', 'choice', array(
                'choices' => array(
                    '-' => null,
                    'F' => 'Mujer',
                    'M' => 'Hombre'
                ),
                'choices_as_values' => false,
            ))
            ->add('afiFil3', 'choice', array(
                'choices' => array(
                    '-' => null,
                    '0' => 'Esposo/a',
                    '1' => 'Hijo/a',
                    '2' => 'Otro'
                ),
                'choices_as_values' => false,
            ))
            ->add('afi_benef_fs3', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_sv3', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_cap3', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afiDoc4')
            ->add('afiAut4')
            ->add('afiNac4', 'bootstrapdatetime', array(
                'required'    => false,
                'widget_type' => 'date',
                'data'        => $afiNac4,
            ))
            ->add('afiSex4', 'choice', array(
                'choices' => array(
                    '-' => null,
                    'F' => 'Mujer',
                    'M' => 'Hombre'
                ),
                'choices_as_values' => false,
            ))
            ->add('afiFil4', 'choice', array(
                'choices' => array(
                    '-' => null,
                    '0' => 'Esposo/a',
                    '1' => 'Hijo/a',
                    '2' => 'Otro'
                ),
                'choices_as_values' => false,
            ))
            ->add('afi_benef_fs4', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_sv4', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_cap4', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afiDoc5')
            ->add('afiAut5')
            ->add('afiNac5', 'bootstrapdatetime', array(
                'required'    => false,
                'widget_type' => 'date',
                'data'        => $afiNac5,
            ))
            ->add('afiSex5', 'choice', array(
                'choices' => array(
                    '-' => null,
                    'F' => 'Mujer',
                    'M' => 'Hombre'
                ),
                'choices_as_values' => false,
            ))
            ->add('afiFil5', 'choice', array(
                'choices' => array(
                    '-' => null,
                    '0' => 'Esposo/a',
                    '1' => 'Hijo/a',
                    '2' => 'Otro'
                ),
                'choices_as_values' => false,
            ))
            ->add('afi_benef_fs5', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_sv5', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_cap5', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afiDoc6')
            ->add('afiAut6')
            ->add('afiNac6', 'bootstrapdatetime', array(
                'required'    => false,
                'widget_type' => 'date',
                'data'        => $afiNac6,
            ))
            ->add('afiSex6', 'choice', array(
                'choices' => array(
                    '-' => null,
                    'F' => 'Mujer',
                    'M' => 'Hombre'
                ),
                'choices_as_values' => false,
            ))
            ->add('afiFil6', 'choice', array(
                'choices' => array(
                    '-' => null,
                    '0' => 'Esposo/a',
                    '1' => 'Hijo/a',
                    '2' => 'Otro'
                ),
                'choices_as_values' => false,
            ))
            ->add('afi_benef_fs6', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_sv6', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
            ))
            ->add('afi_benef_cap6', 'checkbox', array(
                'label'    => ' ',
                'required' => false,
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
