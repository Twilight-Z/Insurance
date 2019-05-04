<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-02 15:45:44
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-03 21:33:38
 */
include('./include/init.php');/* 初始化 */


// 获取参数 id
$page = isset($_GET['page'])? $_GET['page'] : 0; /* 获取页数ID */
$tid = isset($_GET['tid'])? $_GET['tid'] : 0; /* 获取业务ID */
// 处理GET传参问题
$page = intval($page);/* 确保是给数字 */
$tid = intval($tid);/* 确保是给数字 */
$sql = "SELECT t_id FROM i_teams
         WHERE t_id={$tid}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$status = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */

if($tid==0)
   $teams= '';
else if(!$status)
   header('location:teams.php?page='.$page); /* PHP重定向 返回原页面 */
else {
   // teams
   $sql = "SELECT * FROM i_teams
      WHERE t_id={$tid}";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   $teams = $stmt->fetch(PDO::FETCH_ASSOC);
}


// 修改处理
if($_POST) {
   // 判断是否空
   if(!isset($_POST['name']) || empty($_POST['name']))
      alert('请填写名字！');
   if(!isset($_POST['job']) || empty($_POST['job']))
      alert('请填写职位！');
   if(!isset($_POST['content']) || empty($_POST['content']))
      alert('请填写详情内容！');

   // 获取数据
   $t_name = rtrim($_POST['name']);
   $job = rtrim($_POST['job']);
   $content = $_POST['content'];
   $isshow = isset($_POST['isshow'])? 1: 0;


   if($tid==0) {
      if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name']))
         alert('请上传图片！');

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $t_img = $imges['filename'];

      // 生成缩略图
      $img = _UPLOADS_.$t_img;
      $imges = getimagesize($img);/* 原图信息 */
      $son_width = 100;
      $son_height = $son_width*$imges[1]/$imges[0];/* 自动高度 */
      $url = _THUMBS_;
      $thumpath = pathinfo($t_img, PATHINFO_BASENAME );
      $t_img = thumb_img($img,$son_width,$son_height,$url,$thumpath);

      // SQL语句
      $sql = "INSERT INTO i_teams
            (`t_name`, `t_job`, `t_content`, `t_isshow`, `t_img`, `t_thumb`) VALUES
            ('{$t_name}', '{$job}', '{$content}', '{$isshow}', '{$t_img}', '{$t_img}')";
   }else if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name'])) {
      // SQL语句
      $sql = "UPDATE i_teams
         SET `t_name`='{$t_name}', `t_job`='{$job}', `t_content`='{$content}', `t_isshow`='{$isshow}'
         WHERE `t_id`='{$tid}'";
   }else {
      // 删除原图片
      $delImg = _UPLOADS_.$teams['t_img'];
      $delThumb = _THUMBS_.$teams['t_thumb'];
      if(file_exists($delImg) && filesize($delImg)>0)
         unlink($delImg);
      if(file_exists($delThumb) && filesize($delThumb)>0)
         unlink($delThumb);

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $t_img = $imges['filename'];

      // 生成缩略图
      $img = _UPLOADS_.$t_img;
      $imges = getimagesize($img);/* 原图信息 */
      $son_width = 100;
      $son_height = $son_width*$imges[1]/$imges[0];/* 自动高度 */
      $url = _THUMBS_;
      $thumpath = pathinfo($t_img, PATHINFO_BASENAME );
      $t_img = thumb_img($img,$son_width,$son_height,$url,$thumpath);

      // SQL语句
      $sql = "UPDATE i_teams
            SET `t_name`='{$t_name}', `t_job`='{$job}', `t_img`='{$t_img}',
               `t_thumb`='{$t_img}', `t_content`='{$content}', `t_isshow`='{$isshow}'
            WHERE `t_id`={$tid}";
   }

   $bool = $dbh->exec($sql);/* 执行SQL */
   // 提示信息
   if($bool)
      header('location:partner.php?page='.$page); /* PHP重定向 返回原页面 */

}



include('./view/teams_detail.html');
