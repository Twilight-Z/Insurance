<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-02 15:45:44
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-03 21:56:54
 */
include('./include/init.php');/* 初始化 */


// 获取参数 id
$page = isset($_GET['page'])? $_GET['page'] : 0; /* 获取页数ID */
$nid = isset($_GET['nid'])? $_GET['nid'] : 0; /* 获取业务ID */
// 处理GET传参问题
$page = intval($page);/* 确保是给数字 */
$nid = intval($nid);/* 确保是给数字 */
$sql = "SELECT n_id FROM i_news
         WHERE n_id={$nid}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$status = $stmt->fetch(PDO::FETCH_ASSOC);/* 获取一个结果 */

if($nid==0)
   $news= '';
else if(!$status)
   header('location:news.php?page='.$page); /* PHP重定向 返回原页面 */
else {
   // Servies
   $sql = "SELECT * FROM i_news
      WHERE n_id={$nid}";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   $news = $stmt->fetch(PDO::FETCH_ASSOC);
}


// 修改处理
if($_POST) {
   // 判断是否空
   if(!isset($_POST['title']) || empty($_POST['title']))
      alert('请填写标题！');
   if(!isset($_POST['subtitle']) || empty($_POST['subtitle']))
      alert('请填写副标题！');
   if(!isset($_POST['time']) || empty($_POST['time']))
      alert('请填写时间！');
   if(!isset($_POST['content']) || empty($_POST['content']))
      alert('请填写详情内容！');

   // 获取数据
   $title = rtrim($_POST['title']);
   $subtitle = rtrim($_POST['subtitle']);
   $time = strtotime($_POST['time']);
   $content = $_POST['content'];
   $isshow = isset($_POST['isshow'])? 1: 0;


   if($nid==0) {
      // SQL语句
      $sql = "INSERT INTO i_news
            (`n_title`, `n_subtitle`, `n_time`, `n_content`, `n_isshow`) VALUES
            ('{$title}', '{$subtitle}', '{$time}', '{$content}', '{$isshow}')";
   }else {
      // SQL语句
      $sql = "UPDATE i_news
            SET `n_title`='{$title}', `n_subtitle`='{$subtitle}', `n_time`='{$time}',
               `n_content`='{$content}', `n_isshow`='{$isshow}'
            WHERE `n_id`={$nid}";
   }

   $bool = $dbh->exec($sql);/* 执行SQL */
   // 提示信息
   if($bool)
      alert('修改成功！', 'news.php?page='.$page);
   else
      alert('修改失败！', get_url());

}



include('./view/news_detail.html');
