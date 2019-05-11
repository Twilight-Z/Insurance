<?php

include('include/config.php');/* 初始化 */
load_class('function');/* 引入函数库 */


// 登录检测
session_start();
if(!isset($_SESSION['islog']) || $_SESSION['islog']!='666')
   alert('请先登录！', 'login.php');

// 自动加载 class库
function __autoload($classname) {
   include_once(_ROOT_.'admin/include/'.$classname.'.class.php');
}


// 数据库 初始化
$dsn = "$dbms:host=$hostname;dbname=$dbtable";
$dbh = new PDO($dsn, $dbusername, $dbpassword);


