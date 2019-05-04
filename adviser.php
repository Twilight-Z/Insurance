<?php
include_once('./include/init.php');

// Teames
$sql = "SELECT * FROM i_teams WHERE t_isshow=1";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);



include_once('./view/adviser.html');
