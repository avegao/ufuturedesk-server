<?php

namespace Ufuturelabs\Ufuturedesk\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class QuestionRelationshipOption
 * @package Ufuturelabs\Ufuturedesk\ExamBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="exams_questions_relationship_options")
 */
class QuestionRelationshipOption
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="option", type="string", nullable=false)
     */
    private $option;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param string $option
     */
    public function setOption($option)
    {
        $this->option = $option;
    }
} 