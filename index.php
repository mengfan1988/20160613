<?php
interface usb{
const width=12;
const height=3;
public function load();
public function run();
public function stop();
}
class mouse implements usb{
    public function load(){
        echo '开始加载';
    }
    public function run(){
        echo '开始运行';
    }
    public function stop(){
        echo '卸载成功';
    }
}
class computer{
    function  useusb($usb){
        $usb->load();
        $usb->run();
        $usb->stop();
    }
}
class worker{
   public function usea() {
        $c=new computer;
        $m=new mouse;
        $c->useusb($m);
        
    }
}
$worker=new worker;
$worker->usea();