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
			->add('photo', 'file', array('required' => false));
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