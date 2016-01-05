<?php

namespace SGT\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name',               'text')
            ->add('email',              'text')
            ->add('lastname',           'text')
            ->add('userRoles', 'entity', array(
                        'class'     => 'SGTUserBundle:Roles',
                        'property'  => 'role',
                        'multiple'  => true))
            ->add('actif',              'checkbox', array('required' => false))
            ->add('profession',         'text', array('required' => false))
            ->add('street',             'text', array('required' => false))
            ->add('number',             'text', array('required' => false))
            ->add('postal',             'text', array('required' => false))
            ->add('city',               'text', array('required' => false))
            ->add('country', 'entity', array(
                'class'     => 'SGTUserBundle:Country',
                'property'  => 'country',
                'multiple'  => false))
            ->add('phone',              'text', array('required' => false))
            ->add('mobilephone',        'text', array('required' => false))
            ->add('emergencylastname',  'text', array('required' => false))
            ->add('emergencyname',      'text', array('required' => false))
            ->add('emergencyrelation',  'text', array('required' => false))
            ->add('emergencyphone',     'text', array('required' => false))
            ->add('birthday',           'birthday', array('required' => false))
            ->add('newsletter',         'checkbox', array('required' => false))
            ->add('save',               'submit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SGT\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sgt_userbundle_user';
    }
}
