<?php
    include_once('./include/init.php');


   // Partner
   $sql = "SELECT * FROM i_partner
         LIMIT 6";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   $partner = $stmt->fetchAll(PDO::FETCH_ASSOC);


    include_once('./view/partner.html');
