<?php
namespace Services;

use Common\BaseController;
use Doctrine\ORM\Query\AST\NullComparisonExpression;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\ModelBundle\Entity\User;
use Common\BaseServices;
class Users extends BaseServices
{

    /**
     * @param $username
     * @param $pwd
     * @return array
     */
    public function login($username, $pwd)
    {

        $pwd = md5($pwd);
        $param = ['username' => $username, 'pwd' => $pwd];
        $em = $this->getDoctrine()->getManager();
        $query = $em->CreateQueryBuilder()
            ->select(['a'])
            ->from('ModelBundle:User', 'a')
            ->where('a.username=:username')
            ->andwhere('a.pwd=:pwd')->setParameters($param);

        $result = [];
        $result = $query->getQuery()->getArrayResult();
        if($result){

            $info = ['Id' => $result[0]['id'],
                'Username' => $result[0]['username'],
                'Pwd' => $result[0]['pwd'],
                'CreateTime' => $result[0]['create_time'],
                'UpdateTime' => NULL,
                'Status' => $result[0]['status']
            ];
            $result = $this->updateInfo($info);
            return $result;
        }
        return false;
    }


    public function checkInfo($username,$pwd,$repwd){
        if(!$username){
            return new Response('用户名不能为空');
        }
        if(!$pwd || !$repwd){
            return new Response('密码不能为空');
        }

        if(strlen($username) < 4 || strlen($username)>50){
            return new Response("用户名为4~50个字符！");
        }

        if(strlen($pwd) < 6 || strlen($pwd) > 8){
            return new Response("密码6~8位！");
        }

        if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            return new Response("只能由数字和字母组成！");
        }

        if($pwd != $repwd){

            return new Response('密码不一致');

        }
    }

    /**
     * @param $username
     * @return mixed
     */
    public function is_exists($username){
        $em = $this->getDoctrine()->getManager();

        $query = $em->CreateQueryBuilder()
            ->select('a.id')
            ->from('ModelBundle:User','a')
            ->where('a.username = :username')
            ->setParameters(['username'=>$username])->getQuery();

        $result = $query->getArrayResult();
        return $result;
    }

    /**
     * @param $username
     * @param $pwd
     * @return bool
     */
    public function addUser($username, $pwd) {
        $em = $this->getDoctrine()->getManager();
        $pwd = md5($pwd);
        $model = new User();
        $result = [
            'Username' => $username,
            'Pwd' => $pwd,
            'CreateTime' => NULL,
            'UpdateTime' => NULL,
            'Status' => 1
        ];
        $this->attribute($model,$result);
        /*$model->setUsername($username);
        $model->setPwd($pwd);
        $model->setStatus(1);
        $model->setCreateTime();
        $model->setUpdateTime();*/
        $em->persist($model);
        $em->flush();
        return true;
    }

    /**
     * @param $result
     */
    public function updateInfo($result){
        $em = $this->getDoctrine()->getManager();
        $res = $em->getRepository("ModelBundle:User")->find($result['Id']);

        $this->attribute($res,$result);

        $em->flush();

        return $res;
      }

}