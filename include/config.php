<?php
/*
 * @Author: Twilight
 * @Date: 2019-04-26 19:08:04
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-04-26 19:46:17
 */
   // 配置文件 设置

   // 数据库信息
   $dbms = 'mysql';           //数据库类型
   $hostname = 'localhost';
   $dbusername = 'root';
   $dbpassword = '321654';
   $dbtable = 'insurance';
   $dbcharset = 'utf8';

   // 配置路径 要用常量配置
   $server = isset($_SERVER['REQUEST_SCHEME'])?
         $_SERVER['REQUEST_SCHEME']:
         current(explode('/', $_SERVER['SERVER_PROTOCOL']));
   define('_WEB_', rtrim($server.'://'.$_SERVER['HTTP_HOST'], '/').'/');

   // CSS
   define('_CSS_', _WEB_.'static/css/');
   // JS
   define('_JS_', _WEB_.'static/js/');
   // img
   define('_IMG_', _WEB_.'static/images/');
   // UPLOAD
   define('_UPLOAD_', _WEB_.'uploads/');
   // THUMB
   define('_THUMB_', _WEB_.'thumbs/');


   // 存放路径
   define('_ROOT_', rtrim($_SERVER['DOCUMENT_ROOT'], '/').'/');
   // UPLOADS
   define('_UPLOADS_', _ROOT_.'uploads/');
   // THUMBS
   define('_THUMBS_', _ROOT_.'thumbs/');