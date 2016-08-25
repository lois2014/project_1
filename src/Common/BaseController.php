<?php

namespace Common;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\httpFoundation\Request;
use Symfony\Component\httpFoundation\JsonResponse;

class BaseController extends Controller{
	

	public function is_login(Request $request){
      
    // $request = Request::createFromGlobals();
    	$user = $request->getSession()->get('user');
		//echo $user;

    	if(!$user){

			return 	0;	
    	}else{

    		return 1;
    	}
		
	}

	public function getServices($service)
	{
		$className = "Services\\" . $service;

		$className = str_replace('/', '\\', $className);

		if (class_exists($className)) {
			return new $className($this->getDoctrine());
		} else {
			return new Response("Class Not Found!");
		}
	}

	public function getWeather($cityId){
		$url = "http://www.weather.com.cn/data/cityinfo/".$cityId.".html";
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($ch);
		curl_close($ch);
		//$str = str_replace('{','',$result);
		//$str = str_replace('}','',$str);
		return json_decode($result);
	}

	public function getQQ($qq){
		$url = "http://r.qzone.qq.com/cgi-bin/user/cgi_personal_card?uin=".$qq;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result);
	}
	
	
	


}