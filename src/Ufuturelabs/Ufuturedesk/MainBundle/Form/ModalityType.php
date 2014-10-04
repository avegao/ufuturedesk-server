<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ModalityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('course')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturedesk\MainBundle\Entity\Modality'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ufuturelabs_ufuturedesk_mainbundle_modality';
    }
}
