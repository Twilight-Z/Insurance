<?php
include('./include/init.php');/* 初始化 */

$id = $_POST['id'];
$img = $_POST['img'];
pre($img);
// admin
$sql = "SELECT `admin_img` FROM i_admin
   WHERE admin_id={$id}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

// 删除原图片
$delImg = _UPLOADS_.$admin['admin_img'];
if(file_exists($delImg) && filesize($delImg)>0)
   unlink($delImg);

// 上传文件
$uri = _UPLOADS_;
if(!file_exists('uploads'))/* 无目录则创建 */
   mkdir('uploads', 0777, ture);/* 创建目录 限权获取 确认 */

$a_img = rand(9999,10000).'jpg';
file_put_contents($uri.$imgn, $img);/* 依次调用fopen()、fwrite()、fclose() 并将字符串写入文件 */

// $imges = upload($name, $uri);
// $a_img = $imges['filename'];

// SQL语句
$sql = "UPDATE i_admin
      SET `admin_img`='{$a_img}'
      WHERE `admin_id`={$id}";