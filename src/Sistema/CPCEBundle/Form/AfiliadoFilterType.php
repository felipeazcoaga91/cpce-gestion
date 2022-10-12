<?php

namespace Sistema\CPCEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

/**
 * AfiliadoFilterType filtro.
 * @author Gonzalo Alonso <gonzaloalonsod@gmail.com>
 */
class AfiliadoFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('afiNombre', 'filter_text_like', array(
                'attr'=> array('class'=>'form-control')
            ))
            // ->add('afiFecnac', 'filter_date_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiTipo', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiTitulo', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiMatricula', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDireccion', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiLocalidad', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiProvincia', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiZona', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiCodpos', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiTelefono1', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiCelular', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiMail', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiMailAlternativo', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiCivil', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiTipoiva', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiCuit', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDgr', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiCategoria', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiFicha', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiEjprof', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiAsoc', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiMonto', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiSexo', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiGarante', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDoc1', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiAut1', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiNac1', 'filter_date_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiSex1', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiFil1', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDoc2', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiAut2', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiNac2', 'filter_date_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiSex2', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiFil2', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDoc3', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiAut3', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiNac3', 'filter_date_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiSex3', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiFil3', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDoc4', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiAut4', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiNac4', 'filter_date_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiSex4', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiFil4', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDoc5', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiAut5', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiNac5', 'filter_date_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiSex5', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiFil5', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDoc6', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiAut6', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiNac6', 'filter_date_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiSex6', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiFil6', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDgralic', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiCuota', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDebitos', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiCreditos', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiGanancias', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiIva', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDgrexcep', 'filter_date_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiDgiexcep', 'filter_date_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiCbu', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiCbuCredito', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiLote', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiTipdoc', 'filter_text_like', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
            // ->add('afiNrodoc', 'filter_number_range', array(
            //     'attr'=> array('class'=>'form-control')
            // ))
        ;

        $listener = function(FormEvent $event)
        {
            // Is data empty?
            foreach ((array)$event->getForm()->getData() as $data) {
                if ( is_array($data)) {
                    foreach ($data as $subData) {
                        if (!empty($subData)) {
                            return;
                        }
                    }
                } else {
                    if (!empty($data)) {
                        return;
                    }    
                }
            }
            $event->getForm()->addError(new FormError('Filter empty'));
        };
        $builder->addEventListener(FormEvents::POST_SUBMIT, $listener);
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
        return 'sistema_cpcebundle_afiliadofiltertype';
    }
}
