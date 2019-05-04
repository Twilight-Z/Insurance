<?php
/*
 * @Author: Twilight
 * @Date: 2019-04-26 19:07:48
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-04-26 20:00:07
 */
   // 初始化文件 设置
   header('content-type: text/html; charset=utf8');/* 设置头文件 */
   include_once('./include/config.php');/* 引入配置文件 */
   include_once('./include/function.php');/* 引入函数库 */

   // 自动加载 class库
   function __autoload($classname) {
      include_once('./include/'.$classname.'.class.php');
   }

   // 链接数据库
   // $oms = new \mysql($hostname, $dbusername, $dbpassword, $dbtable);
   $dsn="$dbms:host=$hostname;dbname=$dbtable";
   $dbh = new PDO($dsn, $dbusername, $dbpassword); //初始化一个PDO对象



