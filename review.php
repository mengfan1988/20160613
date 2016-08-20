<?php
$link=mysql_connect('127.0.0.1','root','') or exit();
mysql_select_db('shop') or exit();
mysql_query('set names utf8');
$query='select * from user';
$result=  mysql_query($query);
$arr=array();
while($data=  mysql_fetch_assoc($result)){
    $arr[]=$data;
}

