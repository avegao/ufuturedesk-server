<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
	/**
	 * @return integer
	 */
	public function findAdminsNumber()
	{
		$em = $this->getEntityManager();
		
		$query = $em->createQuery(
				"SELECT COUNT(admin) 
					FROM AdminBundle:Admin admin
						GROUP BY admin");
		
		return $query->getResult();
	}
	
	/**
	 * @return integer
	 */
	public function findTeachersNumber()
	{
		$em = $this->getEntityManager();
	
		$query = $em->createQuery(
			"SELECT COUNT(teacher)
				FROM TeacherBundle:Teacher teacher
					GROUP BY teacher");
	
		return $query->getResult();
	}
	
	/**
	 * @return integer
	 */
	public function findStudentsNumber()
	{
		$em = $this->getEntityManager();
	
		$query = $em->createQuery(
			"SELECT COUNT(student)
				FROM StudentBundle:Student student
					GROUP BY student");
	
		return $query->getResult();
	}
}