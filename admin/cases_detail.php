<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-02 20:30:00
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-03 11:28:26
 */
include('./include/init.php');/* 初始化 */


// 获取参数 id
$page = isset($_GET['page'])? $_GET['page'] : 0; /* 获取页数ID */
$ccid = isset($_GET['ccid'])? $_GET['ccid'] : 0; /* 获取案例分类ID */
$cid = isset($_GET['cid'])? $_GET['cid'] : 0; /* 获取案例ID */
// 处理GET传参问题
$page = intval($page);/* 确保是给数字 */
$ccid = intval($ccid);/* 确保是给数字 */
$cid = intval($cid);/* 确保是给数字 */

$sql = "SELECT c_id FROM i_cases
         WHERE c_id={$cid}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$status = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */

if($cid==0)
   $cases= '';
else if(!$status)
   header('location:cases.php?page='.$page); /* PHP重定向 返回原页面 */
else {
   // cases
   $sql = "SELECT * FROM i_cases
      WHERE c_id={$cid}";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   $cases = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Cass category
$sql = "SELECT * FROM i_cases_category";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC);


// 修改处理
if($_POST) {
   // 判断是否空
   if(!isset($_POST['category']) || empty($_POST['category']))
      alert('请选择分类！');
   if(!isset($_POST['title']) || empty($_POST['title']))
      alert('请填写标题！');
   if(!isset($_POST['subtitle']) || empty($_POST['subtitle']))
      alert('请填写副标题！');
   if(!isset($_POST['content']) || empty($_POST['content']))
      alert('请填写详情内容！');

   // 获取数据
   $date = strtotime($_POST['date']);
   $id = $_POST['category'];
   $title = rtrim($_POST['title']);
   $subtitle = rtrim($_POST['subtitle']);
   $content = $_POST['content'];
   $isshow = isset($_POST['isshow'])? 1: 0;


   if($cid==0) {
      if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name']))
         alert('请上传图片！');

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $c_img = $imges['filename'];

      // 生成缩略图
      $img = _UPLOADS_.$c_img;
      $imges = getimagesize($img);/* 原图信息 */
      $son_width = 100;
      $son_height = $son_width*$imges[1]/$imges[0];/* 自动高度 */
      $url = _THUMBS_;
      $thumpath = pathinfo($c_img, PATHINFO_BASENAME );
      $t_img = thumb_img($img,$son_width,$son_height,$url,$thumpath);

      // SQL语句
      $sql = "INSERT INTO i_cases
            (`cc_id`, `c_title`, `c_subtitle`, `c_content`, `c_isshow`, `c_img`, `c_thumb`, `c_time`) VALUES
            ('{$id}', '{$title}', '{$subtitle}', '{$content}', '{$isshow}', '{$c_img}', '{$t_img}', '{$date}')";
   }else if(!isset($_FILES['upload']['name']) || empty($_FILES['upload']['name'])) {
      // SQL语句
      $sql = "UPDATE i_cases
         SET `cc_id`='{$id}', `c_title`='{$title}', `c_subtitle`='{$subtitle}',
         `c_content`='{$content}', `c_isshow`='{$isshow}', `c_time`='{$date}'
         WHERE `c_id`='{$cid}'";
   }else {
      // 删除原图片
      $delImg = _UPLOADS_.$cases['c_img'];
      $delThumb = _THUMBS_.$cases['c_thumb'];
      if(file_exists($delImg) && filesize($delImg)>0)
         unlink($delImg);
      if(file_exists($delThumb) && filesize($delThumb)>0)
         unlink($delThumb);

      // 上传文件
      $name = 'upload';
      $uri = _UPLOADS_;
      $imges = upload($name, $uri);
      $c_img = $imges['filename'];

      // 生成缩略图
      $img = _UPLOADS_.$c_img;
      $imges = getimagesize($img);/* 原图信息 */
      $son_width = 100;
      $son_height = $son_width*$imges[1]/$imges[0];/* 自动高度 */
      $url = _THUMBS_;
      $thumpath = pathinfo($c_img, PATHINFO_BASENAME );
      $t_img = thumb_img($img,$son_width,$son_height,$url,$thumpath);

      // SQL语句
      $sql = "UPDATE i_cases
            SET `c_title`='{$title}', `c_subtitle`='{$subtitle}', `c_img`='{$c_img}', `cc_id`='{$id}',
            `c_thumb`='{$t_img}', `c_content`='{$content}', `c_isshow`='{$isshow}', `c_time`='{$date}'
            WHERE `c_id`={$cid}";
   }

   $bool = $dbh->exec($sql);/* 执行SQL */
   // 提示信息
   if($bool)
      alert('修改成功！', 'cases.php?page='.$page.'&ccid='.$ccid);
   else
      alert('修改失败！', get_url());

}



include('./view/cases_detail.html');
