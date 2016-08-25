<?php

namespace App\SystemBundle\Controller;

use App\ModelBundle\Entity\Attach;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Common\BaseController;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        return $this->render('SystemBundle:Default:index.html.twig');
    }

    public function uploadAction(Request $request)
    {
        //clearstatcache() ;

        if (empty($_FILES)) {
            return $this->redirect($this->generateUrl('app_web_homepage'));
        }

        $service = $this->getServices('FileUploadService');

        $files = $_FILES;
        // exit();
        $user = $request->getSession()->get('user');
        $uid = $user->getId();


        foreach ($files as $file) {

                $error = $file['error'];
                if ($error > 0) {
                    switch ($error) {
                        case 1:
                            echo '上传文件超出php限定值';
                            break;
                        case 2:
                            echo '超出表单限制';
                            break;
                        case 3:
                            echo '文件部分上传';
                            break;
                        case 4:
                            echo '没有文件上传';
                            break;
                    }
                    exit();
                }

                $ok = $service->uploadValidFile($file);
                if ($ok) {

                    $name = $file['name'];
                     $tmpName = $file['tmp_name'];
                    $upFile = ATTACH_PATH . '/' .$uid.'/';
                    if(!is_dir($upFile)){
                        @mkdir($upFile);
                    }
                    $upFile.=$name;
                   if (is_uploaded_file($tmpName)) {   //判断是否是由HTTP/POST上传文件

                        if (!move_uploaded_file($tmpName, $upFile)) {
                            //移动到目标目录
                            echo "上传失败";
                           exit();

                        }

                       $model = new Attach();
                       $data=[
                           'Name' => $name,
                           'Path' => $upFile,
                           'Uid' => $uid,
                           'CreateTime' => NULL,
                           'Status' => 1
                       ];
                       $res = $service->attribute($model,$data);
                       $service->addFile($res);
                       echo "上传成功";
                        exit();
                        /**/

                    }else {
                       //return new Response("");
                       echo '文件非法上传';
                       exit();
                   }
                }
            echo '文件类型错误';exit();

            }



    }



}
