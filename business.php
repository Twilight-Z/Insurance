<?php
include_once('./include/init.php');


// Servies
$sql = "SELECT * FROM i_servies
      WHERE s_isshow=1";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$servies = $stmt->fetchAll(PDO::FETCH_ASSOC);


include_once('./view/business.html');
