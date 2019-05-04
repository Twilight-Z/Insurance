<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-01 13:19:52
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-02 19:55:42
 */
include('./include/init.php');/* 初始化 */


// Cass category
$sql = "SELECT * FROM i_cases_category";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Article
// $sql = "SELECT `a_id` FROM i_article";
// $stmt = $dbh->prepare($sql);
// $stmt->execute();
// $article = $stmt->fetchAll(PDO::FETCH_ASSOC);


include('./view/index.html');
