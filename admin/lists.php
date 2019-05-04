<?php
/*
 * @Author: Twilight
 * @Date: 2019-05-04 11:45:15
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-05-04 11:47:29
 */
include('./include/init.php');/* 初始化 */
load_class('page.class');/* 引入分页类 */


// 传参
$lists = isset($_GET['lists'])? $_GET['lists'] : ''; /* 获取名字 */
$current = isset($_GET['page'])? $_GET['page'] : 1; /* 获取分页ID */
// 处理GET传参问题
$current = intval($current);/* 确保是给数字 */

// 总记录 长度
$sql = "SELECT count(*) count FROM i_{$lists}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$count = $stmt->fetch(PDO::FETCH_ASSOC);
$count = ceil($count['count']);/* 总条数 */
$limit = 5;/* 每页显示多少条 */
$size = 7;/* 分页的个数 */
$class='sabrosus';
// 处理GET传参问题
if($current<1 || $current>ceil($count/$limit))
   header('location:'.$lists.'.php'); /* PHP重定向 返回原页面 */

// 实例化分页类
$pagelist = '';
if($count > $limit) {
   $page = new Page($current,$count,$limit,$size,$class='pagination');
   $pagelist = $page->first()->prev()->num()->next()->last()->show();
}


// Interface 接口
$start = ($current - 1) * $limit;/* 开始位置 */
$sql = "SELECT * FROM i_{$lists}
      LIMIT {$start},{$limit}";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$interface = $lists;
$$interface = $stmt->fetchAll(PDO::FETCH_ASSOC);


include('./view/'.$lists.'.html');
