<?php

namespace App\AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Common\BaseController;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

       // $result = file_get_contents("http://www.example.com/");
        //echo $result;
        //101190408
      /* $result = $this->getWeather(101190408);
    
        if(is_object($result)) {
            $result = get_object_vars($result);
            $result = $result['weatherinfo'];
            $result = get_object_vars($result);
        }
      */

        $result = $this->getQQ(2217736700);


        print_r( $result);
        exit;
        return $this->render('AdminBundle:Default:index.html.twig',['info'=>$result]);
    }
}
