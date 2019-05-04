<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-03 10:46:48
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-03 10:51:33
 */
include('./include/init.php'); /* 初始化 */


// 获取参数 id
$aid = isset($_GET['aid']) ? $_GET['aid'] : 0; /* 获取案例ID */
// 处理GET传参问题
$aid = intval($aid); /* 确保是给数字 */
$sql = "SELECT * FROM i_article
         WHERE a_id={$aid}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$article = $stmt->fetch(PDO::FETCH_ASSOC); /* Article */
if (!$article)
   header('location:article.php'); /* PHP重定向 返回原页面 */


// 修改处理
if($_POST) {
   // 判断是否空
   if(!isset($_POST['content']) || empty($_POST['content']))
      alert('请填写详情内容！');

   // 获取数据
   $content = $_POST['content'];

   // SQL语句
   $sql = "UPDATE i_article
         SET `a_content`='{$content}'
         WHERE `a_id`={$aid}";

   $bool = $dbh->exec($sql); /* 执行SQL */
   // 提示信息
   if ($bool)
      alert('修改成功！', get_url());
   else
      alert('修改失败！', get_url());
}


include('./view/article.html');
