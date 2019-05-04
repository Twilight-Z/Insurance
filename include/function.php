<?php

   // 测试函数
   function pre($con) {
      echo '<pre>';
      print_r($con);
      echo '</pre>';
      exit;/* 退出代码执行 */
   }
   function ieo($con) {
      echo $con.'<br>';
   }


   // 弹窗函数
   function alert($con, $url='') {
      $html = "<script>";
      $url ?
         $html .= "alert('{$con}');window.location.href='{$url}';":
         $html .= "alert('{$con}');window.history.go(-1);";
      echo $html .= "</script>";
      exit;/* 退出代码执行 */
   }

   // MySQL查询函数
   function getAll($sql) {/* 获取所有数据 */
      $list = array();
      $result = mysql_query($sql);                 /* 执行SQL语句 获取结果集 */
      if($result && mysql_num_rows($result)>0)     /* 判断结果集有没数据 */
         while($row = mysql_fetch_assoc($result))  /* 遍历获取结果 */
            $list[] = $row;
      return $list;
   }
   function getOne($sql) {/* 获取一条数据 */
      $result = mysql_query($sql);                 /* 执行SQL语句 获取结果集 */
      if($result && mysql_num_rows($result)>0)     /* 判断结果集有没数据 */
         return mysql_fetch_assoc($result);     /* 获取一个结果 */
      else
         return array();
   }

   // MySQL增删改 操作函数
   function Mysql_op($sql) {
      $bool = mysql_query($sql);                   /* 执行SQL语句 */
      // if(mysql_affected_rows() > 0)
         return var_dump($bool);
   }

   /**
    * 中文字符串替换带 截取函数
    * @param $str    [project string]
    * @param $length [int length]
    * @param $start  [int offset]
    * @return string
    */
   function mb_replaceSubstr($str, $length, $start=0) {
      // 正则 过滤标签
      $str = preg_replace("/<[^<>]*?>/", "", $str);
      // 截取字符串长度
      return mb_substr($str, $start, $length, 'utf-8');
   }


   //得到当前网址
   function get_url($path='page'){
      $str = $_SERVER['PHP_SELF'].'?';
      if($_GET){
         foreach ($_GET as $k=>$v){  //$_GET['page']
            if($k!=$path){
               $str .= $k.'='.$v.'&';
            }
         }
      }
      return $str;
   }

   /**
    * $name 上传域的name名
    * $uri  存放文件的目录名
    * $size  上传文件的大小
    * $type  上传文件的类型
    */
   function  upload($name,$uri,$size='1048576',$type=array('jpg','jpeg','gif','png')){
      if($_FILES[$name]['error']>0){

         switch ($_FILES[$name]['error']) {
            case 1:
               $res['msg'] = "文件大于2M，请重新上传";
               break;
            case 2:
               $res['msg'] = "文件指定大小，请重新上传";
               break;
            case 3:
               $res['msg'] = "上传失败，请重新上传";
               break;
            case 4:
               $res['msg'] = "请选择文件";
               break;
            default:
               $res['msg'] = '未知错误';
               break;
         }
         $res['error'] = 1;
         return $res;
      }
      if($_FILES[$name]['size']>$size){
         $res['msg'] = "文件大于指定大小，请重新上传";
         $res['error'] = 1;
         return $res;
      }

      $path = pathinfo($_FILES[$name]['name']);
      $ext = $path['extension'];//获取后缀。

      if(!in_array($ext,$type)){
         $res['msg'] = "文件类型错误，请重新上传";
         $res['error'] = 1;
         return $res;
      }

      $time = time();
      $tmpdir = date('Y/m',$time);
      $dir = rtrim($uri,'/').'/'.$tmpdir;
      // echo $dir;exit;
      if(!is_dir($dir)){
         // 如果目录不存在，则创建目录
         mkdir($dir,0777,true);
      }
      do{
         $filename = $time.rand(0,99999);
         $file = $filename.'.'.$ext;
      }while(is_file($dir.'/'.$file));
      move_uploaded_file($_FILES[$name]['tmp_name'], $dir.'/'.$file);
      $res['error'] = 2;
      $res['msg'] = "上传成功";
      $res['filename'] = $tmpdir.'/'.$file;
      return $res;
   }

   // 生成缩略图 函数
   // $img,  原图片  （图片来源）
   // $son_width,  宽
   // $son_height,  高
   // $url,  把缩略图放到哪里
   // $thumpath  原图片的名称
   function thumb_img($img,$son_width,$son_height,$url,$thumpath){
      $filename=$img;
      $info=getimagesize($filename);
      // print_r($info);
      $width=$info[0];
      $height=$info[1];
      // 打开图片
      if($info[2]==1){
         $parent=imagecreatefromgif($filename);
      }elseif($info[2]==2){
         $parent=imagecreatefromjpeg($filename);
      }elseif($info[2]==3){
         $parent=imagecreatefrompng($filename);
      }
      // 创建新的图层
      // $son_width=300;
      // $son_height=50;
      // 等比例缩放
      // $son_height=ceil(($height*$son_width)/$width);
      // 新建图像
      $son=imagecreatetruecolor($son_width,$son_height);

      // $son新建图像
      // $parent原图像
      // 0,0 目标图片的y轴和x轴
      // 0,0 原图片的y轴和x轴
      imagecopyresized($son,$parent,0,0,0,0,$son_width,$son_height,$width,$height);
      // 获取后缀名
      $path=pathinfo($filename,PATHINFO_EXTENSION);
      // 设置文件名
      // $pathname=mt_rand(1000,9999).'.'.$path;
      $pathname=$thumpath;

      $dir=date("Y-m/d");
      if(!is_dir($url."/".$dir)){
         mkdir($url."/".$dir,0700,true);
      }
      $news_filename=$dir."/".$pathname;

      // dump($news_filename);exit;
      $pathname=$url."/".$news_filename;


      // 生成图片
      if($info[2]==1){
         imagegif($son,$pathname);
      }elseif($info[2]==2){
         imagejpeg($son,$pathname);
      }elseif($info[2]==3){
         imagepng($son,$pathname);
      }
      // 销毁原图片
      imagedestroy($parent);
      // 销毁目标图片
      imagedestroy($son);
      return $news_filename;
   }


?>