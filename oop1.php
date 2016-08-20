<?php
class cartoon{//声明类
  public  $name = '奥特曼';
  public  $age = 40;
  public  $country = 'Japan';
  public $hobby = array('吃饭','睡觉','打小怪兽');
  public  function xianglongzhang(){
        echo '降龙十八掌';
    }
}
$person = new cartoon;//声明对象
echo $person->xianglongzhang().'<br>';
$person->name = 'lisan';
echo $person->name.'<br>';
echo $person->age.'<br>';
echo $person->country;














