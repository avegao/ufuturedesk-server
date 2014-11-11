<?php

namespace Ufuturelabs\Ufuturedesk\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class QuestionRelationship
 * @package Ufuturelabs\Ufuturedesk\ExamBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="exams_questions_relationships")
 */
class QuestionRelationship extends Question
{
    /**
     * @var QuestionRelationshipOption
     *
     * @ORM\OneToOne(targetEntity="Ufuturelabs\Ufuturedesk\ExamBundle\Entity\QuestionRelationshipOption")
     * @ORM\JoinColumn(name="option_left")
     */
    private $optionLeft;

    /**
     * @var QuestionRelationshipOption
     *
     * @ORM\OneToOne(targetEntity="Ufuturelabs\Ufuturedesk\ExamBundle\Entity\QuestionRelationshipOption")
     * @ORM\JoinColumn(name="option_right")
     */
    private $optionRight;
} 