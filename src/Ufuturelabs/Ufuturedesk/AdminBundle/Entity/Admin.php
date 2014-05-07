<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\User;

/**
 * Class Admin
 *
 * @package Ufuturelabs\Ufuturedesk\AdminBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="administrators")
 */
class Admin extends User
{
	/**
	 * @var boolean $permissionsSuperuser
	 *
	 * @ORM\Column(name="permissions_superuser", type="boolean")
	 */
	private $permissionsSuperuser = false;

	/**
	 * @var boolean $permissionsSchoolEdit
	 *
	 * @ORM\Column(name="permissions_school_edit", type="boolean")
	 */
	private $permissionsSchoolEdit = false;

	/**
	 * @var boolean $permissionsAdminView
	 *
	 * @ORM\Column(name="permissions_admin_view", type="boolean")
	 */
	private $permissionsAdminView = false;

	/**
	 * @var boolean $permissionsAdminCreate
	 *
	 * @ORM\Column(name="permissions_admin_create", type="boolean")
	 */
	private $permissionsAdminCreate = false;

	/**
	 * @var boolean $permissionsAdminEdit
	 *
	 * @ORM\Column(name="permissions_admin_edit", type="boolean")
	 */
	private $permissionsAdminEdit = false;

	/**
	 * @var boolean $permissionsAdminDelete
	 *
	 * @ORM\Column(name="permissions_admin_delete", type="boolean")
	 */
	private $permissionsAdminDelete = false;

	/**
	 * @var boolean $permissionsTeacherView
	 *
	 * @ORM\Column(name="permissions_teacher_view", type="boolean")
	 */
	private $permissionsTeacherView = false;

	/**
	 * @var boolean $permissionsTeacherCreate
	 *
	 * @ORM\Column(name="permissions_teacher_create", type="boolean")
	 */
	private $permissionsTeacherCreate = false;

	/**
	 * @var boolean $permissionsTeacherEdit
	 *
	 * @ORM\Column(name="permissions_teacher_edit", type="boolean")
	 */
	private $permissionsTeacherEdit = false;

	/**
	 * @var boolean $permissionsTeacherDelete
	 *
	 * @ORM\Column(name="permissions_teacher_delete", type="boolean")
	 */
	private $permissionsTeacherDelete = false;

	/**
	 * @var boolean $permissionsStudentView
	 *
	 * @ORM\Column(name="permissions_student_view", type="boolean")
	 */
	private $permissionsStudentView = false;

	/**
	 * @var boolean $permissionsStudentCreate
	 *
	 * @ORM\Column(name="permissions_student_create", type="boolean")
	 */
	private $permissionsStudentCreate = false;

	/**
	 * @var boolean $permissionsStudentEdit
	 *
	 * @ORM\Column(name="permissions_student_edit", type="boolean")
	 */
	private $permissionsStudentEdit = false;

	/**
	 * @var boolean $permissionsStudentDelete
	 *
	 * @ORM\Column(name="permissions_student_delete", type="boolean")
	 */
	private $permissionsStudentDelete = false;

	/**
	 * @var boolean $permissionsCourseView
	 *
	 * @ORM\Column(name="permissions_course_view", type="boolean")
	 */
	private $permissionsCourseView = false;

	/**
	 * @var boolean $permissionsCourseCreate
	 *
	 * @ORM\Column(name="permissions_course_create", type="boolean")
	 */
	private $permissionsCourseCreate = false;

	/**
	 * @var boolean $permissionsCourseEdit
	 *
	 * @ORM\Column(name="permissions_course_edit", type="boolean")
	 */
	private $permissionsCourseEdit = false;

	/**
	 * @var boolean $permissionsCourseDelete
	 *
	 * @ORM\Column(name="permissions_course_delete", type="boolean")
	 */
	private $permissionsCourseDelete = false;

	/**
	 * @var boolean $permissionsModalityView
	 *
	 * @ORM\Column(name="permissions_modality_view", type="boolean")
	 */
	private $permissionsModalityView = false;

	/**
	 * @var boolean $permissionsModalityCreate
	 *
	 * @ORM\Column(name="permissions_modality_create", type="boolean")
	 */
	private $permissionsModalityCreate = false;

	/**
	 * @var boolean $permissionsModalityEdit
	 *
	 * @ORM\Column(name="permissions_modality_edit", type="boolean")
	 */
	private $permissionsModalityEdit = false;

	/**
	 * @var boolean $permissionsModalityDelete
	 *
	 * @ORM\Column(name="permissions_modality_delete", type="boolean")
	 */
	private $permissionsModalityDelete = false;

	/**
	 * @var boolean $permissionsSubjectView
	 *
	 * @ORM\Column(name="permissions_subject_view", type="boolean")
	 */
	private $permissionsSubjectView = false;

	/**
	 * @var boolean $permissionsSubjectCreate
	 *
	 * @ORM\Column(name="permissions_subject_create", type="boolean")
	 */
	private $permissionsSubjectCreate = false;

	/**
	 * @var boolean $permissionsSubjectEdit
	 *
	 * @ORM\Column(name="permissions_subject_edit", type="boolean")
	 */
	private $permissionsSubjectEdit = false;

	/**
	 * @var boolean $permissionsSubjectDelete
	 *
	 * @ORM\Column(name="permissions_subject_delete", type="boolean")
	 */
	private $permissionsSubjectDelete = false;

	/**
	 * @return boolean
	 */
	public function isPermissionsAdminCreate()
	{
		return $this->permissionsAdminCreate;
	}

	/**
	 * @param boolean $permissionsAdminCreate
	 */
	public function setPermissionsAdminCreate($permissionsAdminCreate)
	{
		$this->permissionsAdminCreate = $permissionsAdminCreate;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsAdminDelete()
	{
		return $this->permissionsAdminDelete;
	}

	/**
	 * @param boolean $permissionsAdminDelete
	 */
	public function setPermissionsAdminDelete($permissionsAdminDelete)
	{
		$this->permissionsAdminDelete = $permissionsAdminDelete;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsAdminEdit()
	{
		return $this->permissionsAdminEdit;
	}

	/**
	 * @param boolean $permissionsAdminEdit
	 */
	public function setPermissionsAdminEdit($permissionsAdminEdit)
	{
		$this->permissionsAdminEdit = $permissionsAdminEdit;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsAdminView()
	{
		return $this->permissionsAdminView;
	}

	/**
	 * @param boolean $permissionsAdminView
	 */
	public function setPermissionsAdminView($permissionsAdminView)
	{
		$this->permissionsAdminView = $permissionsAdminView;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsCourseCreate()
	{
		return $this->permissionsCourseCreate;
	}

	/**
	 * @param boolean $permissionsCourseCreate
	 */
	public function setPermissionsCourseCreate($permissionsCourseCreate)
	{
		$this->permissionsCourseCreate = $permissionsCourseCreate;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsCourseDelete()
	{
		return $this->permissionsCourseDelete;
	}

	/**
	 * @param boolean $permissionsCourseDelete
	 */
	public function setPermissionsCourseDelete($permissionsCourseDelete)
	{
		$this->permissionsCourseDelete = $permissionsCourseDelete;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsCourseEdit()
	{
		return $this->permissionsCourseEdit;
	}

	/**
	 * @param boolean $permissionsCourseEdit
	 */
	public function setPermissionsCourseEdit($permissionsCourseEdit)
	{
		$this->permissionsCourseEdit = $permissionsCourseEdit;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsCourseView()
	{
		return $this->permissionsCourseView;
	}

	/**
	 * @param boolean $permissionsCourseView
	 */
	public function setPermissionsCourseView($permissionsCourseView)
	{
		$this->permissionsCourseView = $permissionsCourseView;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsModalityCreate()
	{
		return $this->permissionsModalityCreate;
	}

	/**
	 * @param boolean $permissionsModalityCreate
	 */
	public function setPermissionsModalityCreate($permissionsModalityCreate)
	{
		$this->permissionsModalityCreate = $permissionsModalityCreate;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsModalityDelete()
	{
		return $this->permissionsModalityDelete;
	}

	/**
	 * @param boolean $permissionsModalityDelete
	 */
	public function setPermissionsModalityDelete($permissionsModalityDelete)
	{
		$this->permissionsModalityDelete = $permissionsModalityDelete;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsModalityEdit()
	{
		return $this->permissionsModalityEdit;
	}

	/**
	 * @param boolean $permissionsModalityEdit
	 */
	public function setPermissionsModalityEdit($permissionsModalityEdit)
	{
		$this->permissionsModalityEdit = $permissionsModalityEdit;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsModalityView()
	{
		return $this->permissionsModalityView;
	}

	/**
	 * @param boolean $permissionsModalityView
	 */
	public function setPermissionsModalityView($permissionsModalityView)
	{
		$this->permissionsModalityView = $permissionsModalityView;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsSchoolEdit()
	{
		return $this->permissionsSchoolEdit;
	}

	/**
	 * @param boolean $permissionsSchoolEdit
	 */
	public function setPermissionsSchoolEdit($permissionsSchoolEdit)
	{
		$this->permissionsSchoolEdit = $permissionsSchoolEdit;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsStudentCreate()
	{
		return $this->permissionsStudentCreate;
	}

	/**
	 * @param boolean $permissionsStudentCreate
	 */
	public function setPermissionsStudentCreate($permissionsStudentCreate)
	{
		$this->permissionsStudentCreate = $permissionsStudentCreate;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsStudentDelete()
	{
		return $this->permissionsStudentDelete;
	}

	/**
	 * @param boolean $permissionsStudentDelete
	 */
	public function setPermissionsStudentDelete($permissionsStudentDelete)
	{
		$this->permissionsStudentDelete = $permissionsStudentDelete;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsStudentEdit()
	{
		return $this->permissionsStudentEdit;
	}

	/**
	 * @param boolean $permissionsStudentEdit
	 */
	public function setPermissionsStudentEdit($permissionsStudentEdit)
	{
		$this->permissionsStudentEdit = $permissionsStudentEdit;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsStudentView()
	{
		return $this->permissionsStudentView;
	}

	/**
	 * @param boolean $permissionsStudentView
	 */
	public function setPermissionsStudentView($permissionsStudentView)
	{
		$this->permissionsStudentView = $permissionsStudentView;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsSubjectCreate()
	{
		return $this->permissionsSubjectCreate;
	}

	/**
	 * @param boolean $permissionsSubjectCreate
	 */
	public function setPermissionsSubjectCreate($permissionsSubjectCreate)
	{
		$this->permissionsSubjectCreate = $permissionsSubjectCreate;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsSubjectDelete()
	{
		return $this->permissionsSubjectDelete;
	}

	/**
	 * @param boolean $permissionsSubjectDelete
	 */
	public function setPermissionsSubjectDelete($permissionsSubjectDelete)
	{
		$this->permissionsSubjectDelete = $permissionsSubjectDelete;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsSubjectEdit()
	{
		return $this->permissionsSubjectEdit;
	}

	/**
	 * @param boolean $permissionsSubjectEdit
	 */
	public function setPermissionsSubjectEdit($permissionsSubjectEdit)
	{
		$this->permissionsSubjectEdit = $permissionsSubjectEdit;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsSubjectView()
	{
		return $this->permissionsSubjectView;
	}

	/**
	 * @param boolean $permissionsSubjectView
	 */
	public function setPermissionsSubjectView($permissionsSubjectView)
	{
		$this->permissionsSubjectView = $permissionsSubjectView;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsSuperuser()
	{
		return $this->permissionsSuperuser;
	}

	/**
	 * @param boolean $permissionsSuperuser
	 */
	public function setPermissionsSuperuser($permissionsSuperuser)
	{
		$this->permissionsSuperuser = $permissionsSuperuser;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsTeacherCreate()
	{
		return $this->permissionsTeacherCreate;
	}

	/**
	 * @param boolean $permissionsTeacherCreate
	 */
	public function setPermissionsTeacherCreate($permissionsTeacherCreate)
	{
		$this->permissionsTeacherCreate = $permissionsTeacherCreate;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsTeacherDelete()
	{
		return $this->permissionsTeacherDelete;
	}

	/**
	 * @param boolean $permissionsTeacherDelete
	 */
	public function setPermissionsTeacherDelete($permissionsTeacherDelete)
	{
		$this->permissionsTeacherDelete = $permissionsTeacherDelete;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsTeacherEdit()
	{
		return $this->permissionsTeacherEdit;
	}

	/**
	 * @param boolean $permissionsTeacherEdit
	 */
	public function setPermissionsTeacherEdit($permissionsTeacherEdit)
	{
		$this->permissionsTeacherEdit = $permissionsTeacherEdit;
	}

	/**
	 * @return boolean
	 */
	public function isPermissionsTeacherView()
	{
		return $this->permissionsTeacherView;
	}

	/**
	 * @param boolean $permissionsTeacherView
	 */
	public function setPermissionsTeacherView($permissionsTeacherView)
	{
		$this->permissionsTeacherView = $permissionsTeacherView;
	}



	/**
	 * @return array Array with permissions for the admin
	 */
	public function getPermissions()
	{
		return array(
			'superuser' => $this->permissionsSuperuser,
			'school' => array(
				'edit' => $this->permissionsSchoolEdit
			),
			'admin' => array(
				'view' => $this->permissionsAdminView,
				'create' => $this->permissionsAdminCreate,
				'edit' => $this->permissionsAdminEdit,
				'delete' => $this->permissionsAdminDelete,
			),
			'teacher' => array(
				'view' => $this->permissionsTeacherView,
				'create' => $this->permissionsTeacherCreate,
				'edit' => $this->permissionsTeacherEdit,
				'delete' => $this->permissionsTeacherDelete,
			),
			'student' => array(
				'view' => $this->permissionsStudentView,
				'create' => $this->permissionsStudentCreate,
				'edit' => $this->permissionsStudentEdit,
				'delete' => $this->permissionsStudentDelete,
			),
			'course' => array(
				'view' => $this->permissionsCourseView,
				'create' => $this->permissionsCourseCreate,
				'edit' => $this->permissionsCourseEdit,
				'delete' => $this->permissionsCourseDelete,
			),
			'modality' => array(
				'view' => $this->permissionsModalityView,
				'create' => $this->permissionsModalityCreate,
				'edit' => $this->permissionsModalityEdit,
				'delete' => $this->permissionsModalityDelete,
			),
			'subject' => array(
				'view' => $this->permissionsSubjectView,
				'create' => $this->permissionsSubjectCreate,
				'edit' => $this->permissionsSubjectEdit,
				'delete' => $this->permissionsSubjectDelete,
			),
		);
	}

	/**
	 * @param array $permissions Array with permissions for the admin
	 */
	public function setPermissions(array $permissions)
	{
		$this->permissionsSuperuser = $permissions['superuser'];
		
		// Check if the user has superuser permisssions
		// In this case the user has all permissions true
		if ($this->permissionsSuperuser)
		{
			// School permissions
			$this->permissionsSchoolEdit = true;
			
			// Admins permissions
			$this->permissionsAdminView = true;
			$this->permissionsAdminCreate = true;
			$this->permissionsAdminEdit = true;
			$this->permissionsAdminDelete = true;

			// Teachers permissions
			$this->permissionsTeacherView = true;
			$this->permissionsTeacherCreate = true;
			$this->permissionsTeacherEdit = true;
			$this->permissionsTeacherDelete = true;

			// Students permissions
			$this->permissionsStudentView = true;
			$this->permissionsStudentCreate = true;
			$this->permissionsStudentEdit = true;
			$this->permissionsStudentDelete = true;

			// Courses permissions
			$this->permissionsCourseView = true;
			$this->permissionsCourseCreate = true;
			$this->permissionsCourseEdit = true;
			$this->permissionsCourseDelete = true;

			// Modalities permissions
			$this->permissionsModalityView = true;
			$this->permissionsModalityCreate = true;
			$this->permissionsModalityEdit = true;
			$this->permissionsModalityDelete = true;

			// Subjects permissions
			$this->permissionsSubjectView = true;
			$this->permissionsSubjectCreate = true;
			$this->permissionsSubjectEdit = true;
			$this->permissionsSubjectDelete = true;
			
			return;
		}

		// School permissions
		$this->permissionsSchoolEdit = $permissions['school']['edit'];

		// Admins permissions
		$this->permissionsAdminView = $permissions['admin']['view'];
		$this->permissionsAdminCreate = $permissions['admin']['create'];
		$this->permissionsAdminEdit = $permissions['admin']['edit'];
		$this->permissionsAdminDelete = $permissions['admin']['delete'];

		// Teachers permissions
		$this->permissionsTeacherView = $permissions['teacher']['view'];
		$this->permissionsTeacherCreate = $permissions['teacher']['create'];
		$this->permissionsTeacherEdit = $permissions['teacher']['edit'];
		$this->permissionsTeacherDelete = $permissions['teacher']['delete'];

		// Students permissions
		$this->permissionsStudentView = $permissions['student']['view'];
		$this->permissionsStudentCreate = $permissions['student']['create'];
		$this->permissionsStudentEdit = $permissions['student']['edit'];
		$this->permissionsStudentDelete = $permissions['student']['delete'];

		// Courses permissions
		$this->permissionsCourseView = $permissions['course']['view'];
		$this->permissionsCourseCreate = $permissions['course']['create'];
		$this->permissionsCourseEdit = $permissions['course']['edit'];
		$this->permissionsCourseDelete = $permissions['course']['delete'];

		// Modalities permissions
		$this->permissionsModalityView = $permissions['modality']['view'];
		$this->permissionsModalityCreate = $permissions['modality']['create'];
		$this->permissionsModalityEdit = $permissions['modality']['edit'];
		$this->permissionsModalityDelete = $permissions['modality']['delete'];

		// Subjects permissions
		$this->permissionsSubjectView = $permissions['subject']['view'];
		$this->permissionsSubjectCreate = $permissions['subject']['create'];
		$this->permissionsSubjectEdit = $permissions['subject']['edit'];
		$this->permissionsSubjectDelete = $permissions['subject']['delete'];
	}

	public function getRoles()
	{
		return array("ROLE_ADMIN");
	}

	public function getType()
	{
		return "admin";
	}

}