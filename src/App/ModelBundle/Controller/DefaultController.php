<?php

namespace App\ModelBundle\Controller;

use Common\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    /**
     * @Route("/user", name="homepage")
     */
    public function indexAction()
    {
       
        return $this->render('default/index.html.twig');
    }

   
}
