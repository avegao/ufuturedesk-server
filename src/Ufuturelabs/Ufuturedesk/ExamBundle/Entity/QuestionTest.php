<?php

namespace Ufuturelabs\Ufuturedesk\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class QuestionTest
 * @package Ufuturelabs\Ufuturedesk\ExamBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="exams_questions_test")
 */
class QuestionTest extends Question
{
    /**
     * @var QuestionTestOption[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Ufuturelabs\Ufuturedesk\ExamBundle\Entity\QuestionTestOption",
     *      mappedBy="questionTest"
     * )
     */
    private $options;

    /**
     * @var QuestionTestOption
     *
     * @ORM\OneToOne(targetEntity="Ufuturelabs\Ufuturedesk\ExamBundle\Entity\QuestionTestOption")
     * @ORM\JoinColumn(name="correct_option", referencedColumnName="id")
     */
    private $correctOption;
} 