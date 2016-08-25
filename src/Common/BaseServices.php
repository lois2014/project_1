<?php
namespace  Common;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
class BaseServices{

    public $doctrine;

    public  function __construct($doctrine){
    $this->doctrine = $doctrine;
}

    public function getDoctrine() {
        return $this->doctrine;
    }

    
    public function getServices($service){
        $className = "Services\\".$service;

        $className = str_replace('/','\\',$className);

        if(class_exists($className)){
            return new $className($this->getDoctrine());
        }else{
            throw new InvalidArgumentExceptionse("Service Not Found!");
        }

    }

    public function attribute($model,$result){
        if(!is_array($result)){
            throw new InvalidArgumentException("NULL");
        }
        foreach($result as $key => $value){

            $set = 'set';
            $set .=$key;
            if(method_exists($model,$set)) {
                $model->$set($value);
            }
        }
        return $model;
    }
    


}