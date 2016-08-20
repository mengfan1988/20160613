<?php

class DB {
    
    public function connect($host = '127.0.0.1', $uname = 'root', $pwd = '', $dbname = 'shop') {
        @mysql_connect($host, $uname, $pwd);
        mysql_select_db($dbname);
        mysql_query('set names utf8');
    }
    public function __construct() {
        $this->connect();
    }
    public function query($table,$filed='*',$where='1=1') {
        //$sql = 'select * from '.$table; 
        $sql=  sprintf('select %s from %s where %s',$filed,$table,$where);
        $res = mysql_query($sql);
        $arr = array();
        while ($row = mysql_fetch_assoc($res)) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function del($table,$filed='uid=29') {
        $sql=  sprintf('delete from %s where %s',$table,$filed);
        $res = mysql_query($sql);
        return $res;
    }
    public function update($table,$filed='uid=1') {
        $sql=  sprintf('update %s set age=age+1 where %s',$table,$filed);
        $res = mysql_query($sql);
        return $res;
    }
    public function add($table,$data){
        $m='';
        $f='';
        foreach ($data as $k => $v) {
          $m.=$k.',';
          $f.='\''.$v.'\',';
        }
        $m= rtrim($m,',');      
        $f= rtrim($f,',');
        $sql=  sprintf('insert into %s (%s)values(%s)',$table,$m,$f);
        $res = mysql_query($sql);
        if($res==true){
        return mysql_insert_id();//傳回增加的主鍵
        }else{
        return false;
        }
    }
}

$db = new DB;
$data = array(
    'uname'=>'lilei',
    'age'=>23,
    'addr'=>'新港'
);
//$d = 'delete from user where uid=1';
//$u = "update user set age=age+1 where uname='马化腾'";
//$a="insert into user(uname,age,addr)values('小豬',20,'新港')";
$row=$db->query('user','*');
//$db->add('user',$data);
//$db->del('user','uid=27');
//$db->update('user','uid=28');
//print_r($db->del($d));
//print_r($db->update($u));
//print_r($db->add($a));
?>

<html>
    <head>
        <title>title</title>
        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <table class="table table-bordered">
            <tr>
                <th>用户名</th>
                <th>年龄</th>
                <th>地址</th>
            </tr>
            <?php foreach($row as $v){ ?>
            <tr>
                <td><?php echo $v['uname']; ?></td>
                <td><?php echo $v['age']; ?></td>
                <td><?php echo $v['addr']; ?></td>               
            </tr>
            <?php } ?>
        </table>
        <a href="./do_add.php"><button type="button" class="btn btn-default">增加</button></a>
        <a href="./do_dele.php"><button type="button" class="btn btn-default">删除</button></a>
        <a href="./do_edit.php"><button type="button" class="btn btn-default">修改</button></a>
        <!--<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-remove"></span>（成功）Success</button>-->
    </body>
</html>




