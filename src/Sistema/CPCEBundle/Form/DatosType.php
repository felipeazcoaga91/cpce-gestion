<?php

namespace Sistema\CPCEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * DatosType form.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 */
class DatosType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $afiNac1 = $options['data']->getAfiNac1();
        if (!is_null($afiNac1)) {
            if ($afiNac1->format('d/m/Y') == "00/00/0000") {
                $afiNac1 = null;
            }
        }
            
        $afiNac2 = $options['data']->getAfiNac2();
        if (!is_null($afiNac2)) {
            if ($afiNac2->format('d/m/Y') == "00/00/0000") {
                $afiNac2 = null;
            }
        }

        $afiNac3 = $options['data']->getAfiNac3();
        if (!is_null($afiNac3)) {
            if ($afiNac3->format('d/m/Y') == "00/00/0000") {
                $afiNac3 = null;
            }
        }
        
        $afiNac4 = $options['data']->getAfiNac4();
        if (!is_null($afiNac4)) {
            if ($afiNac4->format('d/m/Y') == "00/00/0000") {
                $afiNac4 = null;
            }
        }
        
        $afiNac5 = $options['data']->getAfiNac5();
        if (!is_null($afiNac5)) {
            if ($afiNac5->format('d/m/Y') == "00/00/0000") {
                $afiNac5 = null;
            }
        }
        
        $afiNac6 = $options['data']->getAfiNac6();
        if (!is_null($afiNac6)) {
            if ($afiNac6->format('d/m/Y') == "00/00/0000") {
                $afiNac6 = null;
            }
        }

        $builder
            /*
            ->add('afiNombre', null, array(
                'label'      => 'Apellido y Nombres',
            ))
            ->add('afiTipdoc', null, array(
                'label'      => 'Tipo',
            ))
            ->add('afiNrodoc', null, array(
                'label'      => 'Documento',
            ))
            ->add('afiCategoria', null, array(
                'label'      => 'Categoría',
            ))
            ->add('afiTitulo', null, array(
                'label'      => 'Título',
            ))
            ->add('afiMatricula', null, array(
                'label'      => 'Matrícula',
            ))
            ->add('afiZona', null, array(
                'label'      => 'Delegación',
            ))
            */
            ->add('afiDireccion', null, array(
                'label'      => 'Domicilio',
                'required'    => true
            ))
            ->add('afiLocalidad', null, array(
                'label'      => 'Localidad',
                'required'    => true
            ))
            ->add('afiProvincia', 'choice', array(
                'label'      => 'Provincia',  
                'choices' => array(
                    'Chaco'                => 'Chaco',
                    'Corrientes'           => 'Corrientes',
                    'Formosa'              => 'Formosa',
                    'Misiones'             => 'Misiones',
                    'Santa Fe'             => 'Santa Fe',
                    'Entre Rios'           => 'Entre Rios',
                    'Santiago del Estero'  => 'Santiago del Estero',
                    'Salta'                => 'Salta',
                    'Jujuy'                => 'Jujuy',
                    'Tucuman'              => 'Tucuman',
                    'Catamarca'            => 'Catamarca',
                    'La Rioja'             => 'La Rioja',
                    'San Juan'             => 'San Juan',
                    'Cordoba'              => 'Cordoba',
                    'Mendoza'              => 'Mendoza',
                    'Buenos Aires'         => 'Buenos Aires',
                    'La Pampa'             => 'La Pampa',
                    'Neuquen'              => 'Neuquen',
                    'Chubut'               => 'Chubut',
                    'Rio Negro'            => 'Rio Negro',
                    'Santa Cruz'           => 'Santa Cruz',
                    'Tierra del Fuego'     => 'Tierra del Fuego'
                )
            ))
            ->add('afiCodpos', null, array(
                'label'      => 'Código Postal',
                'required'    => true
            ))
            /*
            ->add('afiFecnac', 'bootstrapdatetime', array(
                'label'      => 'Fecha de Nacimiento',
                'widget_type' => 'date',
            ))
            ->add('afiSexo', null, array(
                'label'      => 'Sexo',
            ))
            ->add('afiCivil', null, array(
                'label'      => 'Estado Civil',
            ))
            */
            ->add('afiTelefono1', null, array(
                'label'      => 'Teléfono (10 caract.)',
                'attr'  => array(
                    'data-mask' => '(999)9999999',
                ),
                'required'    => true
            ))
            ->add('afiCelular', null, array(
                'label'      => 'Celular (Sin 0 ni 15)',
                'attr'  => array(
                    'data-mask' => '(999)9999999',
                ),
                'required'    => true
            ))
            ->add('afiMail', null, array(
                'label'      => 'Correo',
                'required'    => true
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
