<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/19
 * Time: 11:05
 */
class adminMain{
    public function __construct(){
        //       实例化一个smarty对象
        $smarty=new Smarty();
//       设置模版路径
        $smarty->setTemplateDir('template');
//       设置编译路径
        $smarty->setCompileDir('compile');
        $this->smarty=$smarty;
    }
}