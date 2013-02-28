<?php

namespace CollDev\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JokeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('part1')
            ->add('part2')
            ->add('star')
            ->add('category', 'entity', array(
                'class' => 'CollDevMainBundle:Category',
                'property' => 'name',
                'empty_value' => 'Seleccione',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CollDev\MainBundle\Entity\Joke'
        ));
    }

    public function getName()
    {
        return 'colldev_mainbundle_joketype';
    }
}
