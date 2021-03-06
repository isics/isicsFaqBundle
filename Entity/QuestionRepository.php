<?php

namespace Isics\FAQBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * QuestionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QuestionRepository extends EntityRepository
{
    /**
     * Returns all questions ordered alphabetically.
     *
     * @return collection of questions
     */
    public function findAllOrderedByDate()
    {
        return $this->getEntityManager()
            ->getRepository('IsicsFAQBundle:Question')
            ->createQueryBuilder('q')
            ->addOrderBy('q.date', 'DESC')
            ->addOrderBy('q.question', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}