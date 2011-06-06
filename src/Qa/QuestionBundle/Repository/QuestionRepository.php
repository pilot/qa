<?php

namespace Qa\QuestionBundle\Repository;

use Doctrine\ORM\EntityRepository;

class QuestionRepository extends EntityRepository
{
    public function getQuestionsByTag($slug, $limit = 10)
    {
		$dql = 'SELECT q, u FROM Qa\QuestionBundle\Entity\Question q ' .
               'INNER JOIN q.user u INNER JOIN q.tags t WHERE t.slug = :slug ORDER BY q.createdAt DESC';

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('slug', $slug);
        $query->setMaxResults($limit);

        return $query->getResult();
    }
}