<?php
/*
 * @Author: Twilight
 * @Date: 2019-04-24 19:08:56
 * @Last Modified by: Twilight
 * @Last Modified time: 2019-04-26 10:44:52
 */
// MySQL操作数据库类
   // namespace datebase;/* 命名空间 */
   class mysql {
      // 属性设置
      public $hostname;                      /* 服务器名 */
      public $dbusername;                    /* 数据库用户名 */
      public $dbpassword;                    /* 数据库密码 */
      public $dbtable;                       /* 数据库表 */
      public $dbcharset;                     /* 数据库编码 */

      public $conn;                          /* 数据库句柄 */
      public $sql;                           /* SQL语句 */
      public $table;                         /* 表 */
      public $data;                          /* 数据 */
      public $where;                         /* 条件 */

      // 初始化   链接
      function __construct($hostname, $dbusername, $dbpassword, $dbtable, $dbcharset='utf8') {
         // 初始化 设置变量
         $this->hostname = $hostname;
         $this->dbusername = $dbusername;
         $this->dbpassword = $dbpassword;
         $this->dbtable = $dbtable;
         $this->dbcharset = $dbcharset;

         // 1、链接数据库
         $this->conn = mysql_connect($this->hostname, $this->dbusername, $this->dbpassword)or die('链接失败');

         // 1.1设置数据库编码
         mysql_set_charset($this->dbcharset);

         // 2、选择数据库
         mysql_select_db($this->dbtable)or die('选择失败');
      }
      // 结束化   关闭
      function __destruct() {
         mysql_close($this->conn);
      }


      // MySQL查询方法
      public function getAll() {/* 获取所有数据 */
         $list = array();
         $result = mysql_query($this->sql, $this->conn);    /* 执行SQL语句 获取结果集 */
         if($result && mysql_num_rows($result)>0)           /* 判断结果集有没数据 */
            while($row = mysql_fetch_assoc($result))        /* 遍历获取结果 */
               $list[] = $row;
         return $list;
      }
      public function getOne() {/* 获取一条数据 */
         $result = mysql_query($this->sql, $this->conn);    /* 执行SQL语句 获取结果集 */
         if($result && mysql_num_rows($result)>0)           /* 判断结果集有没数据 */
            return mysql_fetch_assoc($result);              /* 获取一个结果 */
         else
            return array();
      }

      // 增
      public function insert() {
         $sql = "INSERT INTO {$this->table} ";
         $sql .= "(`".implode("`,`", array_keys($this->data))."`)";
         $sql .= " VALUES ";
         $sql .= "('".implode("','", $this->date)."')";
         $this->sql = $sql;
         return $this->Mysql_op();
      }

      // 修
      public function update() {
         $sql = "UPDATE {$this->table} SET ";
         foreach ($this->data as $key => $value)
            $sql .= "`{$key}`='{$value}',";
         $sql = rtrim($sql, ',');
         $sql .= " WHERE {$this->where} ";
         $this->sql = $sql;
         return $this->Mysql_op();
      }

      // 删除
      public function delete() {
         $sql = "DELETE FROM {$this->table} WHERE {$this->where}";
         $this->sql = $sql;
         return $this->Mysql_op();
      }

      // MySQL增删改 操作方法
      public function Mysql_op() {
         $bool = mysql_query($this->sql);                   /* 执行SQL语句 */
         // if($bool && mysql_affected_rows()>0)
         $bool = $bool && mysql_affected_rows()>0;
         return $bool;
      }
   }


   // MySQL查询类
   class select extends mysql {
      // 属性设置
      public $select;                     /* 查询 */
      public $order;                      /* 排序 */
      public $limit;                      /* 限制 */

   // SQL语句处理
      // 开始部分
      public function start() {/* 默认全部字段显示 */
         $this->sql = "SELECT * FROM {$this->table}";
         return $this;
      }
      /* 选择字段部分 */
      public function sel() {/* 单独字段显示 数组 */
         $select = "`".implode("`,`", $this->select)."`";
         $this->sql = "SELECT {$select} FROM {$this->table}";
         return $this;
      }
      /* 选择字段部分 */
      public function opt() {/* 和执行记录显示字段 数组 */
         $data = "`".implode("`,`", array_keys($this->data))."`";
         $this->sql = "SELECT {$data} FROM {$this->table}";
         return $this;
      }

      // 条件部分
      public function where() {
         $this->sql .= " WHERE {$this->where}";
         return $this;
      }

      // 排序部分
      public function orderA() {
         $this->sql .= " ORDER BY {$this->order} ASC";
         return $this;
      }
      /* 倒序部分 */
      public function orderDE() {
         $this->sql .= " ORDER BY {$this->order} DESC";
         return $this;
      }

      // 限制部分
      public function limit() {
         $this->sql .= " LIMIT {$this->limit}";
         return $this;
      }

   }
?>
