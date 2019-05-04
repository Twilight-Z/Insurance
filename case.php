<?php
include_once('./include/init.php');


// Cases
$sql = "SELECT * FROM i_cases c
      LEFT JOIN i_cases_category cc
      ON c.cc_id=cc.cc_id
      ORDER BY c_time DESC";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$cases = $stmt->fetchAll(PDO::FETCH_ASSOC);


include_once('./view/case.html');
