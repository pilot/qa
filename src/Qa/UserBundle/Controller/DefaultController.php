<?php

namespace Qa\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('QaUserBundle:Default:index.html.twig');
    }
}
