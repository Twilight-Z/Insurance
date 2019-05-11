<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-05 11:18:44
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-05 12:12:13
 */
   // include('./include/init.php');
   include('./include/config.php');
   include('./include/function.php');

   // 数据库 初始化
   $dsn = "$dbms:host=$hostname;dbname=$dbtable";
   $dbh = new PDO($dsn, $dbusername, $dbpassword);



   if($_POST) {
      // 判断设置
      if(!isset($_POST['username']) || empty($_POST['username']))
         alert('请输入用户名');
      if(!isset($_POST['password']) || empty($_POST['password']))
         alert('请输入密码');

      // 判断用户名
      if(strlen($_POST['username'])<4 || strlen($_POST['username'])>16)
         alert('用户名长度在4-16位！');
      // 判断密码
      if(strlen($_POST['password'])<6 || strlen($_POST['password'])>18)
         alert('密码长度在6-18位！');
      // 判断特殊字符
      $status = preg_match("/\W/", $_POST['username'], $math);
      if($status)
         alert('用户名必须为英文、数字、下划线！');

      // 获取数据
      $username = trim($_POST['username']);/* 去首尾空白符 */
      $password = md5($_POST['password']);/* md5加密 */

      // 检查用户名
      $sql = "SELECT `admin_id`, `admin_password`, `admin_verify` FROM i_admin
            WHERE admin_username='{$username}'";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $repeat = $stmt->fetch(PDO::FETCH_ASSOC);
      $verity = $repeat['admin_verify'];/* 盐巴 */
      $password = md5($password.$verity);/* 加盐密码 */

      if(!$repeat)
         alert('用户名不正确');
      else if($repeat['admin_password'] != $password)
         alert('密码不正确');
      else {
         session_start();
         $_SESSION['islog'] = 666;/* 登录状态 */
         $_SESSION['username'] = $username;/* 用户名 */
         $_SESSION['adminid'] = $repeat['admin_id'];/* id */

         // 更新登录时间
         $time = time();/* 最后登录时间 */
         $ip = $_SERVER['SERVER_ADDR'];/* ip地址 */
         $sql = "UPDATE i_admin
               SET `lasttime`='{$time}', `lastip`='{$ip}'
               WHERE admin_id={$repeat['admin_id']}";
         $stmt = $dbh->prepare($sql);
         $bool = $stmt->execute();

         if($bool)
            header('location:index.php'); /* PHP重定向 返回原页面 */
      }

   }else{
      // 退出登录
      // setcookie('username', 0, time());// 删除cook
      session_start();
      session_unset();
      session_destroy();
   }


   include('./view/login.html');