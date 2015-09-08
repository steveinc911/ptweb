<?php

namespace PartyTribe\DirectoryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BackofficeUserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
            ->add('securityQuestion')
            ->add('securityAnswer')
            ->add('contactInfo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PartyTribe\DirectoryBundle\Entity\BackofficeUser'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'partytribe_directorybundle_backofficeuser';
    }
}
