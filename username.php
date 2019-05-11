<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-05 10:08:23
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-05 10:50:22
 */
include_once('./include/init.php');

// 获取数据
$username = isset($_GET['username']) ? $_GET['username'] : 0;

// 判断数据
// 判断用户名
$status = preg_match("/\W/", $username, $math);
if ($status)
   alert('用户名必须为英文、数字、下划线！');
if (strlen($username) < 4 || strlen($username) > 16)
   alert('用户名长度在4-16位！');


// 检查用户名
$sql = "SELECT `u_id`, `u_name`, `u_password` FROM i_user
      WHERE u_name='{$username}'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$repeat = $stmt->fetch(PDO::FETCH_ASSOC);

// 判断用户名
if ($repeat)
   echo 0; /* 用户名已存在 */
else {
   echo 1;/* 此用户名可以注册 */
}

// echo $username, $password;