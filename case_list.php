<?php
include_once('./include/init.php');


// 获取传参
$cid = isset($_GET['cid'])? $_GET['cid']: 0;
$cid = intval($cid);/* 确保是数字 */


// Cases
$sql = "SELECT * FROM i_cases c
      LEFT JOIN i_cases_category cc
      ON c.cc_id=cc.cc_id
      WHERE c_id=".$cid;
$stmt = $dbh->prepare($sql);
$stmt->execute();
$cases = $stmt->fetch(PDO::FETCH_ASSOC);



include_once('./view/case_list.html');
