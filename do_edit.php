<?php

class Do_edit {

    public function connect($host = '127.0.0.1', $uname = 'root', $pwd = '', $dbname = 'shop') {
        @mysql_connect($host, $uname, $pwd);
        mysql_select_db($dbname);
        mysql_query('set names utf8');
    }

    public function __construct() {
        $this->connect();
    }

    public function update($table, $filed = 'uid=1') {
        $sql = sprintf('update %s set age=age+1 where %s', $table, $filed);
        $res = mysql_query($sql);
        return $res;
    }

}

$c = new Do_edit;
$c->update('user', 'uid=32');
header("location:./DB.php");
