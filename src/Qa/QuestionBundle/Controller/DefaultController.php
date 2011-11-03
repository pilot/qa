<?php

namespace Qa\QuestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Qa\PaginatorBundle\Paginator\Paginator;

class DefaultController extends Controller
{
    public function indexAction($page)
    {
	    // Get repository
	    $em = $this->get('doctrine')->getEntityManager();
	    $repository = $em->getRepository('QaQuestionBundle:Question');
	
	    $limit = 2;
		$midrange = 7;    
	    $questionsCount = $repository->getQuestionsCount();
	   
	    // Get all questions
	    $questions = $repository->getQuestions($page, $limit);
	
	    $paginator = new Paginator($questionsCount, $page , $limit, $midrange);
//echo $page, '<pre>'; var_dump($paginator); die;	
        return $this->render('QaQuestionBundle:Default:index.html.twig', array('questions' => $questions, 
          																	   'paginator' => $paginator));

/*
		$repository = new ListRepository();

		  $limit = 20;
		  $midrange = 7;

		  $itemsCount = $repository->getListCount();
          $items = $repository->getList($offset);

		  $paginator = new Paginator($itemsCount, $offset , $limit, $midrange);
		  

		  return array('items' => $items, 'paginator' => $paginator);
*/		
    }

    public function showAction($id)
    {
	    // Get question by id
	    $em = $this->get('doctrine')->getEntityManager();
	    $question = $em->getRepository('QaQuestionBundle:Question')->findOneById($id);

		if (!$question) {
		    throw new NotFoundHttpException('The question does not exist.');
	    }
	
	    return $this->render('QaQuestionBundle:Default:show.html.twig', array('question' => $question));
    }

    public function questionsByTagAction($slug)
    {
		// Get Tag by slug
		$em = $this->get('doctrine')->getEntityManager();
	    $tag = $em->getRepository('QaQuestionBundle:Tag')->findOneBySlug($slug);

	    if (!$tag) {
		    throw new NotFoundHttpException('The tag does not exist.');
	    }
	
		// Get questions by tag slug
	    $questions = $em->getRepository('QaQuestionBundle:Question')->getQuestionsByTag($slug);
	
	    return $this->render('QaQuestionBundle:Default:questionsByTag.html.twig', array('questions' => $questions, 'tag' => $tag));
    }
}
