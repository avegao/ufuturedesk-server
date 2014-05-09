<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdminType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('userName')
			->add('password', 'repeated')
			->add('photo', 'file', array('required' => false))
			->add('permissionsSuperuser', 'checkbox', array('required' => false))
			->add('permissionsAdminView', 'checkbox', array('required' => false))
			->add('permissionsAdminCreate', 'checkbox', array('required' => false))
			->add('permissionsAdminEdit', 'checkbox', array('required' => false))
			->add('permissionsAdminDelete', 'checkbox', array('required' => false))
			->add('permissionsTeacherView', 'checkbox', array('required' => false))
			->add('permissionsTeacherCreate', 'checkbox', array('required' => false))
			->add('permissionsTeacherEdit', 'checkbox', array('required' => false))
			->add('permissionsTeacherDelete', 'checkbox', array('required' => false))
			->add('permissionsStudentView', 'checkbox', array('required' => false))
			->add('permissionsStudentCreate', 'checkbox', array('required' => false))
			->add('permissionsStudentEdit', 'checkbox', array('required' => false))
			->add('permissionsStudentDelete', 'checkbox', array('required' => false))
			->add('permissionsCourseView', 'checkbox', array('required' => false))
			->add('permissionsCourseCreate', 'checkbox', array('required' => false))
			->add('permissionsCourseEdit', 'checkbox', array('required' => false))
			->add('permissionsCourseDelete', 'checkbox', array('required' => false))
			->add('permissionsModalityView', 'checkbox', array('required' => false))
			->add('permissionsModalityCreate', 'checkbox', array('required' => false))
			->add('permissionsModalityEdit', 'checkbox', array('required' => false))
			->add('permissionsModalityDelete', 'checkbox', array('required' => false))
			->add('permissionsSubjectView', 'checkbox', array('required' => false))
			->add('permissionsSubjectCreate', 'checkbox', array('required' => false))
			->add('permissionsSubjectEdit', 'checkbox', array('required' => false))
			->add('permissionsSubjectDelete', 'checkbox', array('required' => false));
	}

	public function setDefaultsOptions(OptionsResolveInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin'
		));
	}

	public function getName()
	{
		return 'ufuturedesk_admin_admintype';
	}
}