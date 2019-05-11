<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-05 10:38:41
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-05 11:12:19
 */
include_once('./include/init.php');

// 获取数据
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$phone = $_POST['phone'];
// $code = $_POST['code'];
// $cookiecode = $_COOKIE['code'];

// if($code != $cookiecode)
//    alert('验证码错误!');

// 判断数据
// 判断用户名
$status = preg_match("/\W/", $username, $math);
if ($status)
   alert('用户名必须为英文、数字、下划线！');
if (strlen($username) < 4 || strlen($username) > 16)
   alert('用户名长度在4-16位！');
// 判断密码
if (strlen($password) < 4 || strlen($password) > 16)
   alert('密码长度在4-16位！');
$password = md5($password);


// 检查用户名
$sql = "SELECT `u_id`, `u_name`, `u_password` FROM i_user
      WHERE u_name='{$username}'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$repeat = $stmt->fetch(PDO::FETCH_ASSOC);

if ($repeat) {
   echo 2;exit;/* 用户名重复 */
}

// 写入数据
$sql = "INSERT INTO i_user
      (`u_name`, `u_password`, `u_phone`)
      VALUES ('{$username}', '{$password}', '{$phone}')";
$bool = $dbh->exec($sql);/* 执行SQL */
// $bool = $stmt->execute();
// pre($sql);

if ($bool) {
   setcookie('islog', 666, 0, '/');/* 传cook */
   setcookie('username', $username, 0, '/');/* 传cook */
   setcookie('userid', $repeat['u_id'], 0, '/');/* 传cook */
   echo 1;exit;/* 注册成功！ */
} else
   echo 0;exit;/* 注册失败 */
