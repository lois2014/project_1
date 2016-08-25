<?php

namespace App\WebBundle\Controller;

use Common\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
 
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
    	$user = $request->getSession()->get('user');
    	if($user){
    		$username =  $user->getUsername();
    		//echo $username.'12312';
    		return $this->render('default/index.html.twig',['username'=>$username]);
    	}

        return $this->render('default/index.html.twig', [
           'username' => ''
        ]);
    }
    
}
