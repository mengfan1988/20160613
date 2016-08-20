<?php

//類里定義常量用const
class A {

    const SEX = 'boy';//定義常量
    public $name = 'tom';
    public function test(){
        echo self::SEX;//常量用self
    }

}

$a = new A;
echo $a->name;
echo A::SEX; //常量，靜態變量（static）用類名+ ：：調用
$a->test();
class B{
    public function a() {
        $a=new A;
        return $a;
    }
} 
$b=new B;
echo $b->a()->name;