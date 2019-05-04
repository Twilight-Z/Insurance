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


include('./view/index_right.html');
