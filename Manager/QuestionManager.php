<?php

namespace Isics\FAQBundle\Manager;

use Doctrine\ORM\EntityManager;
use Isics\FAQBundle\Entity\Question;

class QuestionManager
{
    protected $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    /**
     * Creates a new question.
     *
     * @return Isics\FAQBundle\Entity\Question
     */
    public function create()
    {
        $question = new Question();
 
        return $question;
    }
    
    /**
     * Saves a question.
     *
     * @param Isics\FAQBundle\Entity\Question $question  Question
     */
    public function save(Question $question)
    {
        $this->em->persist($question);
        $this->em->flush();
    }

    /**
     * Deletes a question.
     *
     * @param Isics\FAQBundle\Entity\Question $question  Question
     */
    public function delete(Question $question)
    {
        $this->em->remove($question);
        $this->em->flush();
    }    

    /**
     * Returns Question repository.
     *
     * @return Doctrine\ORM\EntityManager
     */
    public function getRepository()
    {
        return $this->em->getRepository('IsicsFAQBundle:Question');
    }
}