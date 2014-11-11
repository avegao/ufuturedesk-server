<?php

namespace Ufuturelabs\Ufuturedesk\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class QuestionTestOption
 * @package Ufuturelabs\Ufuturedesk\ExamBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="exams_questions_test_options")
 */
class QuestionTestOption
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
     * @ORM\Column(name="question", type="string", nullable=false)
     */
    private $option;

    /**
     * @var QuestionTest
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturedesk\ExamBundle\Entity\QuestionTest")
     * @ORM\JoinColumn(name="question_test_id", referencedColumnName="id")
     */
    private $questionTest;

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

    /**
     * @return QuestionTest
     */
    public function getQuestionTest()
    {
        return $this->questionTest;
    }

    /**
     * @param QuestionTest $questionTest
     */
    public function setQuestionTest($questionTest)
    {
        $this->questionTest = $questionTest;
    }

} 