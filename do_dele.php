<?php

class Do_del {

    public function connect($host = '127.0.0.1', $uname = 'root', $pwd = '', $dbname = 'shop') {
        @mysql_connect($host, $uname, $pwd);
        mysql_select_db($dbname);
        mysql_query('set names utf8');
    }

    public function __construct() {
        $this->connect();
    }

    public function del($table, $filed = 'uid=29') {
        $sql = sprintf('delete from %s where %s', $table, $filed);
        $res = mysql_query($sql);
        return $res;
    }

}

$b = new Do_del;
$b->del('user', 'uid>30');
header("location:./DB.php");
