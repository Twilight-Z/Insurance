<?php
/*
 * @Author: Twilight
 * @Date: 2019-04-26 19:34:29
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-04 10:23:53
 */
include_once('./include/init.php');

// Banner
$sql = "SELECT * FROM i_banner
      WHERE b_isshow=1";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$banner = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Servies
$sql = "SELECT * FROM i_servies
      WHERE s_isshow=1
      LIMIT 3";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$servies = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Cases
$sql = "SELECT * FROM i_cases c
      LEFT JOIN i_cases_category cc
      ON c.cc_id=cc.cc_id
      WHERE c_isshow=1
      ORDER BY c_id ASC
      LIMIT 6";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$cases = $stmt->fetchAll(PDO::FETCH_ASSOC);

// News
$sql = "SELECT * FROM i_news
      WHERE n_isshow=1
      LIMIT 3";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Teames
$sql = "SELECT * FROM i_teams
      WHERE t_isshow=1";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Partner
$sql = "SELECT * FROM i_partner
      WHERE p_isshow=1
      LIMIT 6";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$partner = $stmt->fetchAll(PDO::FETCH_ASSOC);

// footer article
$sql = "SELECT * FROM i_article
      WHERE a_id=1";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$fArticle = $stmt->fetch(PDO::FETCH_ASSOC);


include_once('./view/index.html');
