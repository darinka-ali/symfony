<?php

namespace Test\Bundle\Testbundle\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class questionnaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('birthday')
            ->add('sex')
            ->add('lookingfor')
            ->add('body')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\Bundle\Testbundle\Bundle\Entity\questionnaire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test_bundle_testbundle_bundle_questionnaire';
    }
}
