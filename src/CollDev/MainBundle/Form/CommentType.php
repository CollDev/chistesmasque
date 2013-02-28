<?php

namespace CollDev\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
    public $user;
    public $joke;
    
    public function __construct($parameters = array()) {
        if (isset($parameters['user']) && isset($parameters['joke'])) {
            $this->user = $parameters['user'];
            $this->joke = $parameters['joke'];
        }
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comment')
            ->add('likeme', 'text', array(
                'required' => false,
            ))
            ->add('user', 'entity', array(
                'class' => 'CollDevMainBundle:User',
                'property' => 'username',
                'attr' => array(
                    'value' => $this->user,
                )
            ))
            ->add('joke', 'entity', array(
                'class' => 'CollDevMainBundle:Joke',
                'property' => 'part1',
                'attr' => array(
                    'value' => $this->joke,
                )
            ))
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
