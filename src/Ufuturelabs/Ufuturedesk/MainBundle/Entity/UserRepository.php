<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * Return the user type
     *
     * Return the user type. This can be admin, teacher or student
     *
     * @param $id User id
     * @return string User type (admin|teacher|student)
     */
    public function findUserType($id)
    {
        $em = $this->getEntityManager();

        $sql = "SELECT u.type FROM users u WHERE u.id = ?";

        $query = $em->getConnection()->prepare($sql);
        $query->bindParam("i", $id);

        return $query->fetchAll();
    }

	/**
	 * @return integer
     * @deprecated
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
     * @deprecated
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
     * @deprecated
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