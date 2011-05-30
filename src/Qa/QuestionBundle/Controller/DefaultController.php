<?php

namespace Qa\QuestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
	    $em = $this->get('doctrine')->getEntityManager();
	    $questions = $em->getRepository('QaQuestionBundle:Question')->findAll();    
	
        return $this->render('QaQuestionBundle:Default:index.html.twig', array('questions' => $questions));
    }
}
