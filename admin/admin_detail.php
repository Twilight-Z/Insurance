<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-07 10:31:48
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-07 11:48:40
 */
include('./include/init.php');/* 初始化 */


// 获取参数 id
$page = isset($_GET['page'])? $_GET['page'] : 0; /* 获取页数ID */
$aid = $_SESSION['adminid']; /* 获取管理员ID */
// 处理GET传参问题
$page = intval($page);/* 确保是给数字 */
$aid = intval($aid);/* 确保是给数字 */
$sql = "SELECT admin_id FROM i_admin
      WHERE admin_id={$aid}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$status = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */

if($aid==0)
   $admin= '';
else if(!$status)
   header('location:admin.php?page='.$page); /* PHP重定向 返回原页面 */
else {
   // admin
   $sql = "SELECT * FROM i_admin
      WHERE admin_id={$aid}";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   $admin = $stmt->fetch(PDO::FETCH_ASSOC);
}


// 修改处理
if($_POST) {
   // 更新登录时间
   $lasttime = time();/* 最后登录时间 */
   $lastip = $_SERVER['SERVER_ADDR'];/* ip地址 */
   $real = $_POST['real']? $_POST['real'] : '';/* 真名 */


   // 判断是否空
   if(!isset($_POST['username']) || empty($_POST['username']))
      alert('请填写用户名！');
   if($aid==0) {  /* 创建新管理员 */
      // 判断是否空
      if(!isset($_POST['password']) || empty($_POST['password']))
         alert('请填写密码！');
      if(!isset($_POST['repassword']) || empty($_POST['repassword']))
         alert('请填写确认密码！');
      if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name']))
         alert('请上传图片！');

      // 判断用户名
      if(strlen($_POST['username'])<4 || strlen($_POST['username'])>16)
         alert('用户名长度在4-16位！');
      // 判断密码
      if(strlen($_POST['password'])<6 || strlen($_POST['password'])>18)
         alert('密码长度在6-18位！');
      if(strlen($_POST['repassword'])<6 || strlen($_POST['repassword'])>18)
         alert('密码长度在6-18位！');
      if($_POST['password'] != $_POST['repassword'])
         alert('密码不一致');

      // 判断特殊字符
      $status = preg_match("/\W/", $_POST['username'], $math);
      if($status)
         alert('用户名必须为英文、数字、下划线！');

      // 获取数据
      $username = trim($_POST['username']);/* 去首尾空白符 */
      $real = isset($_POST['real'])? $_POST['real']: '';/* 去首尾空白符 */
      $password = md5($_POST['password']);/* md5加密 */
      $verify = md5(rand(10000, 99999));/* 盐巴 */
      $create = time();/* 创建时间 */

      // 检查重复用户名
      $sql = "SELECT `admin_id` FROM i_admin
            WHERE admin_id<>'{$aid}' AND admin_username='{$username}'";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $repeat = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */
      if($repeat)
         alert('用户名已被注册！');


      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $admin_img = $imges['filename'];

      // 写入数据库
      $password = md5($password.$verify);
      // SQL语句
      $sql = "INSERT INTO i_admin
      (`admin_username`, `admin_real`, `admin_password`, `admin_verify`, `admin_img`, `create`, `lasttime`, `lastip`) VALUES
      ('{$username}', '{$real}', '{$password}', '{$verify}', '{$admin_img}', '{$create}', '{$lasttime}', '{$lastip}')";

      $bool = $dbh->exec($sql);/* 执行SQL */
      // 提示信息
      if($bool)
         header('location:lists.php?lists=admin&page='.$page); /* PHP重定向 返回原页面 */
   }else if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name'])) {/* 不修改图片 */
      // 判断是否空
      if(!isset($_POST['pw']) || empty($_POST['pw']))
         alert('请填写原密码！');
      if(!isset($_POST['password']) || empty($_POST['password']))
         alert('请填写修改密码！');
      if(!isset($_POST['repassword']) || empty($_POST['repassword']))
         alert('请填写确认密码！');

      // 判断用户名
      if(strlen($_POST['username'])<4 || strlen($_POST['username'])>16)
         alert('用户名长度在4-16位！');
      // 判断密码
      if(strlen($_POST['pw'])<6 || strlen($_POST['pw'])>18)
         alert('密码长度在6-18位！');
      if(strlen($_POST['password'])<6 || strlen($_POST['password'])>18)
         alert('密码长度在6-18位！');
      if(strlen($_POST['repassword'])<6 || strlen($_POST['repassword'])>18)
         alert('密码长度在6-18位！');
      if($_POST['password'] != $_POST['repassword'])
         alert('密码不一致！');
      // 原密码判断
      $sql = "SELECT `admin_password`, `admin_verify` FROM i_admin
            WHERE admin_id='{$aid}'";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $apv = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */

      $pass = $apv['admin_password'];/* 原密码 */
      $verity = $apv['admin_verify'];/* 盐巴 */
      $pass1 = md5($_POST['password']);
      $pass1 = md5($pass1.$verity);/* 加盐密码 */
      if($pass != $pass1)
         alert('原密码不对！');

      // 判断特殊字符
      $status = preg_match("/\W/", $_POST['username'], $math);
      if($status)
         alert('用户名必须为英文、数字、下划线！');

      // 获取数据
      $username = trim($_POST['username']);/* 去首尾空白符 */
      $password = md5($_POST['password']);/* 新密码md5加密 */
      $password = md5($password.$verity);/* 新加盐密码 */

      // 检查重复用户名
      $sql = "SELECT `admin_id` FROM i_admin
            WHERE admin_id<>'{$aid}' AND admin_username='{$username}'";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $repeat = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */
      if($repeat)
         alert('用户名已被注册！');

      // SQL语句
      $sql = "UPDATE i_admin
         SET `admin_username`='{$username}', `admin_password`='{$password}',
            `lasttime`='{$lasttime}', `lastip`='{$lastip}', `admin_real`='{$real}'
         WHERE `admin_id`='{$aid}'";
   }else {/* 修改信息 */
      // 判断是否空
      if(!isset($_POST['pw']) || empty($_POST['pw']))
         alert('请填写原密码！');
      if(!isset($_POST['password']) || empty($_POST['password']))
         alert('请填写修改密码！');
      if(!isset($_POST['repassword']) || empty($_POST['repassword']))
         alert('请填写确认密码！');

      // 判断用户名
      if(strlen($_POST['username'])<4 || strlen($_POST['username'])>16)
         alert('用户名长度在4-16位！');
      // 判断密码
      if(strlen($_POST['pw'])<6 || strlen($_POST['pw'])>18)
         alert('密码长度在6-18位！');
      if(strlen($_POST['password'])<6 || strlen($_POST['password'])>18)
         alert('密码长度在6-18位！');
      if(strlen($_POST['repassword'])<6 || strlen($_POST['repassword'])>18)
         alert('密码长度在6-18位！');
      if($_POST['password'] != $_POST['repassword'])
         alert('密码不一致！');
      // 原密码判断
      $sql = "SELECT `admin_password`, `admin_verify` FROM i_admin
            WHERE admin_id='{$aid}'";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $apv = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */

      $pass = $apv['admin_password'];/* 原密码 */
      $verity = $apv['admin_verify'];/* 盐巴 */
      $pass1 = md5($_POST['password']);
      $pass1 = md5($pass1.$verity);/* 加盐密码 */
      if($pass != $pass1)
         alert('原密码不对！');

      // 判断特殊字符
      $status = preg_match("/\W/", $_POST['username'], $math);
      if($status)
         alert('用户名必须为英文、数字、下划线！');

      // 获取数据
      $username = trim($_POST['username']);/* 去首尾空白符 */
      $password = md5($_POST['password']);/* 新密码md5加密 */
      $password = md5($password.$verity);/* 新加盐密码 */

      // 检查重复用户名
      $sql = "SELECT `admin_id` FROM i_admin
            WHERE admin_id<>'{$aid}' AND admin_username='{$username}'";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $repeat = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */
      if($repeat)
         alert('用户名已被注册！');

      // 删除原图片
      $delImg = _UPLOADS_.$admin['admin_img'];
      if(file_exists($delImg) && filesize($delImg)>0)
         unlink($delImg);

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $admin_img = $imges['filename'];

      // SQL语句
      $sql = "UPDATE i_admin
         SET `admin_username`='{$username}', `admin_img`='{$admin_img}', `admin_password`='{$password}',
            `lasttime`='{$lasttime}', `lastip`='{$lastip}', `admin_real`='{$real}'
         WHERE `admin_id`='{$aid}'";
   }

   $bool = $dbh->exec($sql);/* 执行SQL */
   // 提示信息
   if($bool)
      alert('修改成功！', 'login.php');
      // header('location:admin.php?page='.$page); /* PHP重定向 返回原页面 */

}



include('./view/admin_detail.html');
