<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-01 13:19:52
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-07 10:28:21
 */
include('./include/init.php');/* 初始化 */

$id = $_SESSION['adminid'];
// Admin    管理员
$sql = "SELECT `admin_id`, `admin_username`, `admin_img` FROM i_admin
      WHERE admin_id={$id}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

// Cass category
$sql = "SELECT * FROM i_cases_category";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC);


include('./view/index.html');
