<?php
class magic{
    public $x = 1;
    public $y = 2;
    public function __construct($a,$b) {
         $this->x=3;
         $this->y=4;
         echo $a+$b;
    }
    public function __destruct() {
        echo __FUNCTION__;
    }
}
$m=new magic(3,4);
echo $m->x;
echo $m->y;

