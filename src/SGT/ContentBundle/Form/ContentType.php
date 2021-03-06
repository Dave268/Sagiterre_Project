<?php

namespace SGT\ContentBundle\Form;

use SGT\ContentBundle\Entity\ContentRole;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', 'textarea')
            ->add('role', 'entity', array(
                'class'     => 'SGTContentBundle:ContentRole',
                'property'  => 'role',
                'multiple'  => false
            ))
            ->add('published', 'checkbox', array(
                'required'  => false))
            ->add('save', 'submit')
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SGT\ContentBundle\Entity\Content'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sgt_contentbundle_content';
    }
}
