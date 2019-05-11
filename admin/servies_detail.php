<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-02 15:45:44
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-07 11:53:49
 */
include('./include/init.php');/* 初始化 */


// 获取参数 id
$page = isset($_GET['page'])? $_GET['page'] : 0; /* 获取页数ID */
$sid = isset($_GET['sid'])? $_GET['sid'] : 0; /* 获取业务ID */
// 处理GET传参问题
$page = intval($page);/* 确保是给数字 */
$sid = intval($sid);/* 确保是给数字 */
$sql = "SELECT s_id FROM i_servies
         WHERE s_id={$sid}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$status = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */

if($sid==0)
   $servies= '';
else if(!$status)
   header('location:servies.php?page='.$page); /* PHP重定向 返回原页面 */
else {
   // Servies
   $sql = "SELECT * FROM i_servies
      WHERE s_id={$sid}";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   $servies = $stmt->fetch(PDO::FETCH_ASSOC);
}


// 修改处理
if($_POST) {
   // 判断是否空
   if(!isset($_POST['title']) || empty($_POST['title']))
      alert('请填写标题！');
   if(!isset($_POST['subtitle']) || empty($_POST['subtitle']))
      alert('请填写副标题！');
   if(!isset($_POST['content']) || empty($_POST['content']))
      alert('请填写详情内容！');

   // 获取数据
   $title = rtrim($_POST['title']);
   $subtitle = rtrim($_POST['subtitle']);
   $content = $_POST['content'];
   $isshow = isset($_POST['isshow'])? 1: 0;


   if($sid==0) {
      if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name']))
         alert('请上传图片！');

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $s_img = $imges['filename'];

      // 生成缩略图
      $img = _UPLOADS_.$s_img;
      $imges = getimagesize($img);/* 原图信息 */
      $son_width = 100;
      $son_height = $son_width*$imges[1]/$imges[0];/* 自动高度 */
      $url = _THUMBS_;
      $thumpath = pathinfo($s_img, PATHINFO_BASENAME );
      $t_img = thumb_img($img,$son_width,$son_height,$url,$thumpath);

      // SQL语句
      $sql = "INSERT INTO i_servies
            (`s_title`, `s_subtitle`, `s_content`, `s_isshow`, `s_img`, `s_thumb`) VALUES
            ('{$title}', '{$subtitle}', '{$content}', '{$isshow}', '{$s_img}', '{$t_img}')";
   }else if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name'])) {
      // SQL语句
      $sql = "UPDATE i_servies
         SET `s_title`='{$title}', `s_subtitle`='{$subtitle}', `s_content`='{$content}', `s_isshow`='{$isshow}'
         WHERE `s_id`='{$sid}'";
   }else {
      // 删除原图片
      $delImg = _UPLOADS_.$servies['s_img'];
      $delThumb = _THUMBS_.$servies['s_thumb'];
      if(file_exists($delImg) && filesize($delImg)>0)
         unlink($delImg);
      if(file_exists($delThumb) && filesize($delThumb)>0)
         unlink($delThumb);

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $s_img = $imges['filename'];

      // 生成缩略图
      $img = _UPLOADS_.$s_img;
      $imges = getimagesize($img);/* 原图信息 */
      $son_width = 100;
      $son_height = $son_width*$imges[1]/$imges[0];/* 自动高度 */
      $url = _THUMBS_;
      $thumpath = pathinfo($s_img, PATHINFO_BASENAME );
      $t_img = thumb_img($img,$son_width,$son_height,$url,$thumpath);

      // SQL语句
      $sql = "UPDATE i_servies
            SET `s_title`='{$title}', `s_subtitle`='{$subtitle}', `s_img`='{$s_img}',
               `s_thumb`='{$t_img}', `s_content`='{$content}', `s_isshow`='{$isshow}'
            WHERE `s_id`={$sid}";
   }

   $bool = $dbh->exec($sql);/* 执行SQL */
   // 提示信息
   if($bool)
      header('location:partner.php?page='.$page); /* PHP重定向 返回原页面 */
   //    alert('修改成功！', 'servies.php?page='.$page);
   // else
   //    alert('修改失败！', get_url());

}



include('./view/servies_detail.html');
