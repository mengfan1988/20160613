<?php

class do_add {

    public function connect($host = '127.0.0.1', $uname = 'root', $pwd = '', $dbname = 'shop') {
        @mysql_connect($host, $uname, $pwd);
        mysql_select_db($dbname);
        mysql_query('set names utf8');
    }

    public function __construct() {
        $this->connect();
    }

    public function add($table, $data) {
        $m = '';
        $f = '';
        foreach ($data as $k => $v) {
            $m.=$k . ',';
            $f.='\'' . $v . '\',';
        }
        $m = rtrim($m, ',');
        $f = rtrim($f, ',');
        $sql = sprintf('insert into %s (%s)values(%s)', $table, $m, $f);
        $res = mysql_query($sql);
        if ($res == true) {
            return mysql_insert_id(); //傳回增加的主鍵
        } else {
            return false;
        }
    }

}

$a = new do_add;
$data = array(
    'uname' => 'lilei',
    'age' => 23,
    'addr' => '新港'
);
$a->add('user', $data);
header("location:./DB.php");
