<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;

class SchoolRepository extends EntityRepository
{
	public function findSchool()
	{
		$em = $this->getEntityManager();

		$query = $em->createQuery(
			"SELECT school FROM MainBundle:School school");
		$query->setMaxResults(1);

		return $query->getResult();
	}
}
