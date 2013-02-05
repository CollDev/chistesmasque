<?php

namespace CollDev\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\Validator\Constraint\UserPassword;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array(
                'label' => 'form.firstname',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('lastname', null, array(
                'label' => 'form.lastname',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('birthday', null, array(
                'label' => 'form.birthday',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('photo', null, array(
                'label_attr' => array(
                    'class' => 'control-label'
                    ),
                'label' => 'form.file',
                'translation_domain' => 'FOSUserBundle',
                'required' => false,
                'data_class' => null,
            ))
            ->add('country', 'entity', array(
                'label_attr' => array(
                    'class' => 'control-label'
                ),
                'class' => 'CollDevMainBundle:Country',
                'property' => 'name',
                'attr' => array(
                    'class' => 'input-block-level',
                    'placeholder' => 'País',
                    'data-selected' => 13
                )
            ))
            ->add('timezone', 'timezone', array(
                'label' => 'form.timezone',
                'translation_domain' => 'FOSUserBundle'
            ))    
            ->add('username', null, array(
                'label' => 'form.username',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('email', 'email', array(
                'label' => 'form.email',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('current_password', 'password', array(
                'label' => 'form.current_password',
                'translation_domain' => 'FOSUserBundle',
                'mapped' => false,
                'constraints' => new UserPassword(),
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CollDev\MainBundle\Entity\User',
            'intention'  => 'profile',
        ));
    }

    public function getName()
    {
        return 'colldev_main_profile';
    }
}
