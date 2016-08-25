<?php
/**
 * Author: zhangxingz@servyou.com.cn
 * Date: 16-6-8
 * Time: 上午9:04
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname( __DIR__) . DS);
define('APP_PATH', ROOT_PATH . 'app' . DS);
define('VAR_PATH',ROOT_PATH . 'var' . DS);
define('CACHE_PATH', VAR_PATH . 'cache' . DS);
define('LOG_PATH', VAR_PATH . 'logs' . DS);
define('IMAGE_PATH',VAR_PATH.'upload'.DS.'images');//图片（非附件）上传路径
define('ATTACH_PATH',VAR_PATH.'upload'.DS.'attaches');//附件上传路径

define('ADMIN_URL', 'http://127.0.0.1:8000/');