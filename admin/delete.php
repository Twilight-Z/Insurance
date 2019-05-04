<?php
include('./include/init.php'); /* 初始化 */


// 获取参数 id
$table = isset($_GET['table']) ? $_GET['table'] : ''; /* 获取数据表 */
$id = isset($_GET['id']) ? $_GET['id'] : 0; /* 获取业务ID */
// 处理GET传参问题
// $id = intval($id); /* 确保是给数字 */
$one = substr($id, 0, 1);/* 获取表名首写 */

// 查询原图片
$sql = "SELECT * FROM {$table}
         WHERE {$id}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$photo = $stmt->fetch(PDO::FETCH_ASSOC); /* 获取一个结果 */
// 删除原图片
$delImg = _UPLOADS_.$photo[$one.'_img'];
$delThumb = _THUMBS_.$photo[$one.'_thumb'];
if (file_exists($delImg) && filesize($delImg) > 0)
   unlink($delImg);
if (file_exists($delThumb) && filesize($delThumb) > 0)
   unlink($delThumb);

// 删除记录
$sql = "DELETE FROM {$table}
      WHERE {$id}";
// 执行删除
$bool = $dbh->exec($sql); /* 执行SQL */


echo $bool;
