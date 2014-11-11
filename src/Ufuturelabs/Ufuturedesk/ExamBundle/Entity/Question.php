<?php

namespace Ufuturelabs\Ufuturedesk\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Question
 * @package Ufuturelabs\Ufuturedesk\ExamBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="exams_questions")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "test"   = "Ufuturelabs\Ufuturedesk\ExamBundle\Entity\QuestionTest",
 *      "write" = "Ufuturelabs\Ufuturedesk\ExamBundle\Entity\QuestionWrite",
 * 		"relationship" = "Ufuturelabs\Ufuturedesk\ExamBundle\Entity\QuestionRelationship"
 * })
 */
class Question
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
     * @ORM\Column(name="question", type="text", nullable=false)
     */
    private $question;

    /**
     * @var float
     *
     * @ORM\Column(name="points", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $points;

    /**
     * @var float
     *
     * @ORM\Column(name="max_points", type="decimal", precision=4, scale=2, nullable=false)
     */
    private $maxPoints;

    /**
     * @var Exam
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\ExamBundle\Entity\Exam")
     * @ORM\JoinColumn(name="exam", referencedColumnName="id")
     */
    private $exam;

    /**
     * @return float
     */
    public function getMaxPoints()
    {
        return $this->maxPoints;
    }

    /**
     * @param float $maxPoints
     */
    public function setMaxPoints($maxPoints)
    {
        $this->maxPoints = $maxPoints;
    }

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
     * @return float
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param float $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }
} 