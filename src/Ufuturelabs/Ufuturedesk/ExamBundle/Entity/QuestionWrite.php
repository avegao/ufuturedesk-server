<?php

namespace Ufuturelabs\Ufuturedesk\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class QuestionWrite
 * @package Ufuturelabs\Ufuturedesk\ExamBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="exams_questions_write")
 */
class QuestionWrite extends Question
{
    /**
     * @var string
     *
     * @ORM\Column(name="proposed_answer", type="text", nullable=false)
     */
    private $proposedAnswer;

    /**
     * @return string
     */
    public function getProposedAnswer()
    {
        return $this->proposedAnswer;
    }

    /**
     * @param string $proposedAnswer
     */
    public function setProposedAnswer($proposedAnswer)
    {
        $this->proposedAnswer = $proposedAnswer;
    }

}