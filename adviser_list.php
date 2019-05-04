<?php
include_once('./include/init.php');


// 获取传参
$tid = isset($_GET['tid'])? $_GET['tid']: 0;
$tid = intval($tid);/* 确保是数字 */

// Teames
$sql = 'SELECT * FROM i_teams WHERE t_isshow=1 AND t_id='.$tid;
$stmt = $dbh->prepare($sql);
$stmt->execute();
$teams = $stmt->fetch(PDO::FETCH_ASSOC);
// pre($teams);



include_once('./view/adviser_list.html');
