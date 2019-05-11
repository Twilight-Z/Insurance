<?php
include('./include/init.php');


// 服务器信息
$userinfo['os'] = PHP_OS; /* 操作系统 */
$ver = explode(' ', apache_get_version());
$userinfo['av'] = $ver[0]; /* apache版本 */
// $userinfo['pv'] = PHP_VERSION; /* PHP版本 */
$userinfo['pv'] = $ver[2]; /* PHP版本 */
$stmt = $dbh->query('SELECT VERSION() as mv')->fetch(PDO::FETCH_ASSOC);
$userinfo['mv'] = $stmt['mv']; /* mysql版本 */


// 总数信息
// Message
$sql = "SELECT count(m_id) as count FROM i_message";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$message = $stmt->fetch(PDO::FETCH_ASSOC);
$total[0] = $message['count'];

// User
$sql = "SELECT count(u_id) as count FROM i_user";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$total[1] = $user['count'];

// Article
$sql = "SELECT count(a_id) as count FROM i_article";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$article = $stmt->fetch(PDO::FETCH_ASSOC);
$total[2] = $article['count'];

// News
$sql = "SELECT count(n_id) as count FROM i_news";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$news = $stmt->fetch(PDO::FETCH_ASSOC);
$total[3] = $news['count'];


// Admin    管理员
$sql = "SELECT * FROM i_admin
      ORDER BY admin_id ASC";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$admin = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Message  留言板
$sql = "SELECT `m_name`, `m_content`, `m_time` FROM i_message
      ORDER BY m_time DESC";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$message = $stmt->fetchAll(PDO::FETCH_ASSOC);
// pre($message);



include('./view/index_right.html');
