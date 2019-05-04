<?php
include_once('./include/init.php');


// News
$sql = "SELECT * FROM i_news
      WHERE n_isshow=1
      ORDER BY n_time DESC";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);



include_once('./view/news.html');
