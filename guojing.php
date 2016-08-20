<?php

class Boy {

    const SEX = 'boy';
    public $name = '郭靖';
    public $country = '南宋';
    public function xianglongzhang() {
        echo '降龍十八掌';
    }
    public function yiyangzhi() {
        echo '一陽指';
    }
}
$person = new Boy;
echo $person->name;
$person1=  clone $person;
echo $person1->name;

