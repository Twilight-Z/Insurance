<?php
include_once('./include/init.php');


$sql = "SELECT * FROM i_article
      WHERE a_id=3";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$article = $stmt->fetch(PDO::FETCH_ASSOC);


include_once('./view/about.html');
