<?php

namespace Qa\DisqusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('QaDisqusBundle:Default:index.html.twig');
    }
}
