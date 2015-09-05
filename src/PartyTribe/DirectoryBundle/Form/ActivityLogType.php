<?php

namespace PartyTribe\DirectoryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActivityLogType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activityCode')
            ->add('description')
            ->add('affectedTables')
            ->add('dateTime')
            ->add('backofficeUser')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PartyTribe\DirectoryBundle\Entity\ActivityLog'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'partytribe_directorybundle_activitylog';
    }
}
