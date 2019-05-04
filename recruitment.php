<?php
include_once('./include/init.php');


// footer article
$sql = "SELECT * FROM i_article
      WHERE a_id=2";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$article = $stmt->fetch(PDO::FETCH_ASSOC);

// Recruit
$sql = "SELECT * FROM i_recruit";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$recruit = $stmt->fetchAll(PDO::FETCH_ASSOC);


include_once('./view/recruitment.html');
