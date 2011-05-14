<?php

namespace Qa\QuestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('QaQuestionBundle:Default:index.html.twig');
    }
}
