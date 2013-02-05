<?php

namespace CollDev\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            //->add('usernameCanonical')
            ->add('email')
            //->add('emailCanonical')
            ->add('enabled')
            //->add('salt')
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array(
                    'translation_domain' => 'FOSUserBundle'
                    ),
                'invalid_message' => 'fos_user.password.mismatch',
                'first_options' => array(
                    'label' => 'form.password',
                    'label_attr' => array(
                        'class' => 'control-label'
                        ),
                    'attr' => array(
                        'class' => 'input-block-level',
                        'placeholder' => 'form.password'
                        )
                    ),
                'second_options' => array(
                    'label' => 'form.password_confirmation',
                    'label_attr' => array(
                        'class' => 'control-label'
                        ),
                    'attr' => array(
                        'class' => 'input-block-level',
                        'placeholder' => 'form.password_confirmation'
                        )
                    ),
            ))
            //->add('lastLogin')
            ->add('locked', null, array(
                'required' => false,
            ))
            //->add('expired')
            //->add('expiresAt')
            //->add('confirmationToken')
            //->add('passwordRequestedAt')
            //->add('roles')
            //->add('credentialsExpired')
            //->add('credentialsExpireAt')
            ->add('firstname')
            ->add('lastname')
            ->add('birthday')
            ->add('photo', 'file', array(
                'data_class' => null,
                'required' => false,
            ))
            //->add('created')
            //->add('updated')
            ->add('country', 'entity', array(
                'class' => 'CollDevMainBundle:Country', 
                'property' => 'name',
            ))
            ->add('timezone', 'timezone')
            ->add('restrictions')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CollDev\MainBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'colldev_mainbundle_usertype';
    }
}
