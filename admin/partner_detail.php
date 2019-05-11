<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-03 11:21:25
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-07 11:53:50
 */
include('./include/init.php');/* 初始化 */


// 获取参数 id
$page = isset($_GET['page'])? $_GET['page'] : 0; /* 获取页数ID */
$pid = isset($_GET['pid'])? $_GET['pid'] : 0; /* 获取伙伴ID */
// 处理GET传参问题
$page = intval($page);/* 确保是给数字 */
$pid = intval($pid);/* 确保是给数字 */

$sql = "SELECT p_id FROM i_partner
         WHERE p_id={$pid}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$status = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */

if($pid==0)
   $partner= '';
else if(!$status)
   header('location:partner.php?page='.$page); /* PHP重定向 返回原页面 */
else {
   // Partner
   $sql = "SELECT * FROM i_partner
      WHERE p_id={$pid}";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   $partner = $stmt->fetch(PDO::FETCH_ASSOC);
}


// 修改处理
if($_POST) {
   // 判断是否空
   if(!isset($_POST['title']) || empty($_POST['title']))
      alert('请填写标题！');
   if(!isset($_POST['link']) || empty($_POST['link']))
      alert('请填写链接！');

   // 获取数据
   $title = rtrim($_POST['title']);
   $link = rtrim($_POST['link']);
   $isshow = isset($_POST['isshow'])? 1: 0;


   if($pid==0) {
      if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name']))
         alert('请上传图片！');

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $p_img = $imges['filename'];

      // SQL语句
      $sql = "INSERT INTO i_partner
            (`p_title`, `p_link`, `p_isshow`, `p_img`) VALUES
            ('{$title}', '{$link}', '{$isshow}', '{$p_img}')";
   }else if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name'])) {
      // SQL语句
      $sql = "UPDATE i_partner
         SET `p_title`='{$title}', `p_link`='{$link}', `p_isshow`='{$isshow}'
         WHERE `p_id`='{$pid}'";
   }else {
      // 删除原图片
      $delImg = _UPLOADS_.$partner['p_img'];
      if(file_exists($delImg) && filesize($delImg)>0)
         unlink($delImg);

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $p_img = $imges['filename'];

      // SQL语句
      $sql = "UPDATE i_partner
            SET `p_title`='{$title}', `p_link`='{$link}', `p_img`='{$p_img}',
               `p_isshow`='{$isshow}'
            WHERE `p_id`={$pid}";
   }

   $bool = $dbh->exec($sql);/* 执行SQL */
   // 提示信息
   if($bool)
      header('location:partner.php?page='.$page); /* PHP重定向 返回原页面 */
   //    alert('修改成功！', 'partner.php?page='.$page);
   // else
   //    alert('修改失败！', get_url());


}



include('./view/partner_detail.html');
