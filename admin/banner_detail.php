<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-04 09:46:09
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-04 10:16:24
 */
include('./include/init.php');/* 初始化 */


// 获取参数 id
$page = isset($_GET['page'])? $_GET['page'] : 0; /* 获取页数ID */
$bid = isset($_GET['bid'])? $_GET['bid'] : 0; /* 获取伙伴ID */
// 处理GET传参问题
$page = intval($page);/* 确保是给数字 */
$bid = intval($bid);/* 确保是给数字 */

$sql = "SELECT b_id FROM i_banner
         WHERE b_id={$bid}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$status = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */

if($bid==0)
   $banner= '';
else if(!$status)
   header('location:banner.php?page='.$page); /* PHP重定向 返回原页面 */
else {
   // Partner
   $sql = "SELECT * FROM i_banner
      WHERE b_id={$bid}";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   $banner = $stmt->fetch(PDO::FETCH_ASSOC);
}


// 修改处理
if($_POST) {
   // 获取数据
   $isshow = isset($_POST['isshow'])? $_POST['isshow']: 0;


   if($bid==0) {
      if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name']))
         alert('请上传图片！');

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri, 1024*1024*2);
      $b_img = $imges['filename'];

      // 生成缩略图
      $img = _UPLOADS_.$b_img;
      $imges = getimagesize($img);/* 原图信息 */
      $son_width = 100;
      $son_height = $son_width*$imges[1]/$imges[0];/* 自动高度 */
      $url = _THUMBS_;
      $thumpath = pathinfo($b_img, PATHINFO_BASENAME );
      $t_img = thumb_img($img,$son_width,$son_height,$url,$thumpath);

      // SQL语句
      $sql = "INSERT INTO i_banner
            (`b_isshow`, `b_img`, `b_thumb`) VALUES
            ('{$isshow}', '{$b_img}', '{$t_img}')";
   }else if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name'])) {
      // SQL语句
      $sql = "UPDATE i_banner
         SET `b_isshow`='{$isshow}'
         WHERE `b_id`='{$bid}'";
   }else {
      // 删除原图片
      $delImg = _UPLOADS_.$banner['b_img'];
      $delThumb = _THUMBS_.$banner['b_thumb'];
      if(file_exists($delImg) && filesize($delImg)>0)
         unlink($delImg);
      if(file_exists($delThumb) && filesize($delThumb)>0)
         unlink($delThumb);

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri, 1024*1024*2);
      $b_img = $imges['filename'];

      // 生成缩略图
      $img = _UPLOADS_.$b_img;
      $imges = getimagesize($img);/* 原图信息 */
      $son_width = 100;
      $son_height = $son_width*$imges[1]/$imges[0];/* 自动高度 */
      $url = _THUMBS_;
      $thumpath = pathinfo($b_img, PATHINFO_BASENAME );
      $t_img = thumb_img($img,$son_width,$son_height,$url,$thumpath);

      // SQL语句
      $sql = "UPDATE i_banner
            SET `b_img`='{$b_img}', `b_thumb`='{$t_img}', `b_isshow`='{$isshow}'
            WHERE `b_id`={$bid}";
   }

   $bool = $dbh->exec($sql);/* 执行SQL */
   // 提示信息
   if($bool)
      header('location:banner.php?page='.$page); /* PHP重定向 返回原页面 */
   //    alert('修改成功！', 'banner.php?page='.$page);
   // else
   //    alert('修改失败！', get_url());


}



include('./view/banner_detail.html');
