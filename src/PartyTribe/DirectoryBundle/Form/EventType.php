<?php

namespace PartyTribe\DirectoryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('dresscodeTags')
            ->add('genreTags')
            ->add('time')
            ->add('weekdays')
            ->add('isRecurring')
            ->add('date')
            ->add('loves')
            ->add('hates')
            ->add('views')
            ->add('venue')
            ->add('companyid')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PartyTribe\DirectoryBundle\Entity\Event'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'partytribe_directorybundle_event';
    }
}
