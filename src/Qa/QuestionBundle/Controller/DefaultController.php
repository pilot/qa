<?php

namespace Qa\QuestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Qa\PaginatorBundle\Paginator\Paginator;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $page = $request->get('page', 1);
        $step = $page - 1;

	    // Get repository
	    $em = $this->getDoctrine()->getEntityManager();
	    $repository = $em->getRepository('QaQuestionBundle:Question');
	
	    // Questions per page
        $limit = $this->container->getParameter('questions_per_page');
    
	    // Get questions
	    $questions = $repository->getQuestions($step, $limit);
	
        // Prepare paginator
        $paginator = new Paginator($repository->getQuestionsCount(), $page , $limit);
        
        return $this->render('QaQuestionBundle:Default:index.html.twig', array(
            'questions' => $questions, 
          	'paginator' => $paginator,
            'start' => $step ? $page * $limit : $page,
            'page' => $page,
            'limit' => $limit
            )
        );
    }

    public function showAction($id)
    {
	    // Get question by id
	    $em = $this->getDoctrine()->getEntityManager();
	    $question = $em->getRepository('QaQuestionBundle:Question')->findOneById($id);

		if (!$question) {
		    throw new NotFoundHttpException('The question does not exist.');
	    }
	
	    return $this->render('QaQuestionBundle:Default:show.html.twig', array('question' => $question));
    }

    public function questionsByTagAction($slug)
    {
		// Get Tag by slug
		$em = $this->getDoctrine()->getEntityManager();
	    $tag = $em->getRepository('QaQuestionBundle:Tag')->findOneBySlug($slug);

	    if (!$tag) {
		    throw new NotFoundHttpException('The tag does not exist.');
	    }
	
		// Get questions by tag slug
	    $questions = $em->getRepository('QaQuestionBundle:Question')->getQuestionsByTag($slug);
	
	    return $this->render('QaQuestionBundle:Default:questionsByTag.html.twig', array('questions' => $questions, 'tag' => $tag));
    }
}
