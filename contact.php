<?php
include_once('./include/init.php');


$sql = "SELECT * FROM i_article
      WHERE a_id=4";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$contact = $stmt->fetch(PDO::FETCH_ASSOC);


include_once('./view/contact.html');
