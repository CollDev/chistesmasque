<?php

namespace CollDev\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('created')
            ->add('updated')
            ->add('status')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CollDev\MainBundle\Entity\Comment'
        ));
    }

    public function getName()
    {
        return 'colldev_mainbundle_commenttype';
    }
}
