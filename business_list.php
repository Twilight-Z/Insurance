<?php
include_once('./include/init.php');


// 获取传参
$sid = isset($_GET['sid'])? $_GET['sid']: 0;
$sid = intval($sid);/* 确保是数字 */


// Servies
$sql = "SELECT * FROM i_servies WHERE s_isshow=1 AND s_id=".$sid;
$stmt = $dbh->prepare($sql);
$stmt->execute();
$servies = $stmt->fetch(PDO::FETCH_ASSOC);
// pre($servies);


include_once('./view/business_list.html');
