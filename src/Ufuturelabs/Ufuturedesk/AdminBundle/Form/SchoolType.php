<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SchoolType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('name')
			->add('address')
			->add('telephone')
			->add('fax')
			->add('email')
			->add('logo');
	}

	public function setDefaultsOptions(OptionsResolveInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'Ufuturelabs\Ufuturedesk\MainBundle\Entity\User'
		));
	}

	public function getName()
	{
		return 'ufuturedesk_admin_school_schooltype';
	}
} 