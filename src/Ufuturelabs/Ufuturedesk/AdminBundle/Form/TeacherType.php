<?php
/**
 * Created by PhpStorm.
 * User: avegao
 * Date: 18/06/14
 * Time: 13:45
 */

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('surname')
            ->add('email', 'email')
            ->add('address', 'text')
            ->add('telephone');
    }

    public function setDefaultsOptions(OptionsResolveInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturedesk\TeacherBundle\Entity\Teacher'
        ));
    }

    public function getName()
    {
        return 'ufuturedesk_admin_teachertype';
    }
}