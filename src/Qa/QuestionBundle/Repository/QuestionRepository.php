<?php

namespace Qa\QuestionBundle\Repository;

use Doctrine\ORM\EntityRepository;

class QuestionRepository extends EntityRepository
{
	public function getQuestions($page, $limit = 10)
	{
		$dql = 'SELECT q
                FROM Qa\QuestionBundle\Entity\Question q 
                ORDER BY q.createdAt DESC';

		$query = $this->_em->createQuery($dql);
		
        if ($page > 1) {
            $query->setFirstResult(($page - 1) * $limit);
        }
		
        $query->setMaxResults($limit);
		
		return $query->getResult();
	}
	
    public function getQuestionsByTag($slug, $limit = 10)
    {
		$dql = 'SELECT q, u 
                FROM Qa\QuestionBundle\Entity\Question q
                INNER JOIN q.user u 
                INNER JOIN q.tags t 
                WHERE t.slug = :slug 
                ORDER BY q.createdAt DESC';

        $query = $this->_em->createQuery($dql);
        $query->setParameter('slug', $slug);
        $query->setMaxResults($limit);

        return $query->getResult();
    }

    public function getQuestionsCount()
    {
	    $dql = 'SELECT count(q.id) FROM Qa\QuestionBundle\Entity\Question q';
	    $query = $this->_em->createQuery($dql);
	    
	    return $query->getSingleScalarResult();
    }
}