<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/17
 * Time: 15:25
 */
class index extends adminMain {
    public function __construct(){
        $obj=new db('user');
        $this->obj=$obj;
    }
    public function init(){
        echo "前台页";
    }
    public function upload(){
        echo "这是更新方法";
    }
}