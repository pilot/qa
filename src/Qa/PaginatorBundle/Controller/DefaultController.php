<?php

namespace Qa\PaginatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('QaPaginatorBundle:Default:index.html.twig');
    }
}
