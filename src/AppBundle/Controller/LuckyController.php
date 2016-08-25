<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller{
	public function indexAction(){
		$arr = array('test1','test2');
		return new JsonResponse($arr);
	}

	public function test1Action($page){
		echo $page;die;
	}

	public function test2Action(){
		return new Response('This is a test!');
	}

	public function test3Action(){
		$html = $this->container->get('templating')->render(
			'default/lucky.html.twig',array('numList'=>123)
		);

		return new Response($html);
	}

	public function test4Action(){
		return $this->redirectToRoute('app_lucky_test3page', array(), 301);
	}

	public function test5Action(){
		
	}


}