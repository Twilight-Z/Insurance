<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-03 20:47:58
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-03 21:33:40
 */
include('./include/init.php');/* 初始化 */


// 获取参数 id
$page = isset($_GET['page'])? $_GET['page'] : 0; /* 获取页数ID */
$rid = isset($_GET['rid'])? $_GET['rid'] : 0; /* 获取业务ID */
// 处理GET传参问题
$page = intval($page);/* 确保是给数字 */
$rid = intval($rid);/* 确保是给数字 */
$sql = "SELECT r_id FROM i_recruit
      WHERE r_id={$rid}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$status = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */

if($rid==0)
   $recruit= '';
else if(!$status)
   header('location:recruit.php?page='.$page); /* PHP重定向 返回原页面 */
else {
   // recruit
   $sql = "SELECT * FROM i_recruit
      WHERE r_id={$rid}";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   $recruit = $stmt->fetch(PDO::FETCH_ASSOC);
}


// 修改处理
if($_POST) {
   // 判断是否空
   if(!isset($_POST['title']) || empty($_POST['title']))
      alert('请填写标题！');
   if(!isset($_POST['time']) || empty($_POST['time']))
      alert('请填写时间！');
   if(!isset($_POST['content']) || empty($_POST['content']))
      alert('请填写详情内容！');

   // 获取数据
   $title = rtrim($_POST['title']);
   $time = strtotime($_POST['time']);
   $content = $_POST['content'];
   $isshow = isset($_POST['isshow'])? 1: 0;


   if($rid==0) {
      if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name']))
         alert('请上传图片！');

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $r_img = $imges['filename'];

      // SQL语句
      $sql = "INSERT INTO i_recruit
            (`r_title`, `r_time`, `r_content`, `r_isshow`, `r_img`) VALUES
            ('{$title}', '{$time}', '{$content}', '{$isshow}', '{$r_img}')";
   }else if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name'])) {
      // SQL语句
      $sql = "UPDATE i_recruit
         SET `r_title`='{$title}', `r_time`='{$time}', `r_content`='{$content}', `r_isshow`='{$isshow}'
         WHERE `r_id`='{$rid}'";
   }else {
      // 删除原图片
      $delImg = _UPLOADS_.$recruit['r_img'];
      if(file_exists($delImg) && filesize($delImg)>0)
         unlink($delImg);

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $r_img = $imges['filename'];

      // SQL语句
      $sql = "UPDATE i_recruit
            SET `r_title`='{$title}', `r_time`='{$time}', `r_img`='{$r_img}',
               `r_content`='{$content}', `r_isshow`='{$isshow}'
            WHERE `r_id`={$rid}";
   }

   $bool = $dbh->exec($sql);/* 执行SQL */
   // 提示信息
   if($bool)
      header('location:partner.php?page='.$page); /* PHP重定向 返回原页面 */

}



include('./view/recruit_detail.html');
