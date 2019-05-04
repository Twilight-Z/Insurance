<?php
include_once('./include/init.php');


// 获取传参
$nid = isset($_GET['nid'])? $_GET['nid']: 0;
$nid = intval($nid);/* 确保是数字 */


// News
$sql = "SELECT * FROM i_news WHERE n_isshow=1 AND n_id=".$nid;
$stmt = $dbh->prepare($sql);
$stmt->execute();
$news = $stmt->fetch(PDO::FETCH_ASSOC);



include_once('./view/news_list.html');
