<?php
// src/InvoiceBundle/Form/InvoiceType.php

namespace InvoiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType{
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('billTo')
            ->add('description')
            ->add('hourlyPrice')
            ->add('hours')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver){

        $resolver->setDefaults(
            [
                'csrf_protection' => false,
                'data_class' => 'InvoiceBundle\Entity\Invoice',
            ]
        );
    }

    /**
     * @return string
     */
    public function getName(){
        return "";
    }
}
