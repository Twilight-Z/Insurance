<?php
header('content-type: text/html; charset=utf8'); /* 设置头文件 */

$dbms = 'mysql';           //数据库类型
$hostname = 'localhost';
$dbusername = 'root';
$dbpassword = '321654';
$dbtable = 'insurance';
$dbcharset = 'utf8';

// 配置路径 要用常量配置
$server = isset($_SERVER['REQUEST_SCHEME']) ?
   $_SERVER['REQUEST_SCHEME'] : current(explode('/', $_SERVER['SERVER_PROTOCOL']));
define('_WEB_', rtrim($server . '://' . $_SERVER['HTTP_HOST'], '/') . '/');

// CSS
define('_CSS_', _WEB_ . 'admin/css/');
// JS
define('_JS_', _WEB_ . 'admin/js/');
// img
// define('_IMGS_', _WEB_ . 'static/images/');
define('_IMG_', _WEB_ . 'admin/images/');
// umeditor
define('_UMEDITOR_', _WEB_ . 'admin/umeditor/');
// UPLOAD
define('_UPLOAD_', _WEB_ . 'uploads/');
// THUMB
define('_THUMB_', _WEB_ . 'thumbs/');


// 存放路径
define('_ROOT_', rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/');
// UPLOADS
define('_UPLOADS_', _ROOT_ . 'uploads/');
// THUMBS
define('_THUMBS_', _ROOT_ . 'thumbs/');


// 引入函数
function load_class($class_name) {
   //path to the class file
   $path = _ROOT_.'admin/include/'.$class_name.'.php';
   require_once($path);
}
