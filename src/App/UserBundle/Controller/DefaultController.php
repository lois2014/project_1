<?php

namespace App\UserBundle\Controller;

use Common\BaseController;
use Doctrine\ORM\Query\AST\NullComparisonExpression;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\ModelBundle\Entity\User;


class DefaultController extends BaseController
{
    /**
     * @Route("/user", name="homepage")
     */
    public function indexAction(Request $request)
    {

		if($this->is_login($request)) {
			$user = $request->getSession()->get('user');
            $username = $user->getUsername();
			$createTime = $user->getCreateTime();
			return $this->render('user/index.html.twig',['username'=>$username,'create_time'=>$createTime]);
		}else{
			return $this->render('user/login.html.twig');
		}
		return $this->render('user/index.html.twig');
    }

    public function LoginAction(Request $request){
    	 if($this->is_login($request)){
          	return $this->redirect($this->generateUrl('app_web_homepage'));
          }
           
           if(!empty($_POST)){
               
               $username = trim($request->request->get('username',''));
               $pwd = trim($request->request->get('pwd',''));

            /*
               //源mysql
              $query = "select * from user where username = {$username} and pwd = {$pwd}";
              $result = mysql_query($query);

            */
			   //$services = $this->getServices('Users');

			   //$result = $services->login($username,$pwd);

			   if (!$pwd || !$username) {
				   return new Response("用户名或者密码不能为空！");

			   }

			   

			  $service = $this->getServices('Users');
			   $result = $service->login($username,$pwd);
			   
            if(!$result){
				//exit("用户名或者密码错误");
              return new Response("用户名或者密码错误");// return $this->render("/user/login.html.twig");
            }else{
				$request->getSession()->set('user',$result);

                return $this->redirect($this->generateUrl('app_web_homepage'));
            }

           }else{

             return $this->render('user/login.html.twig');
          }
    }

    public function logoutAction(Request $request){
    	$request->getSession()->set('user',NULL);
    	return $this->redirect($this->generateUrl('app_web_homepage'));
    }

    public function registerAction(Request $request){
		if($this->is_login($request)){
			return $this->redirect($this->generateUrl('app_web_homepage'));
		}
    	if(empty($_POST)){
    		return $this->render('user/register.html.twig');
    	}else{

    		$username = trim($request->request->get('username'));

    		$pwd = trim($request->request->get('pwd'));

    		$repwd = trim($request->request->get('repwd'));

			$service = $this->getServices('Users');
			$service->checkInfo($username,$pwd,$repwd);
    		$result = $service->is_exists($username);
            //$pwd = md5($pwd);
           if(!$result){

    		$service->addUser($username,$pwd);
    		//return new Response('Saved new product with id '.$model->getId());
    		return $this->render('user/login.html.twig');
    	}else{

    		return new Response('用户名已注册');
    	}
    	
}

    }

   
}
