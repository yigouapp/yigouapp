<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/18
 * Time: 18:18
 */
if (!defined("MVC")){
    echo "非法入侵！";
    exit();
}
class smarty{
    public $templateDir="template";
    public $compileDir="compile";
    public $assignArr=array();
//    创建模版路径
    public function setTem($template){
//        将传进来的参数赋值给定义的路径
//        *****!!!!
        $dir=$this->templateDir=ROOT_PATH.$template;
//        判断路径是否存在
        if (!file_exists($dir)){
            mkdir($dir);
        }
    }
//    创建编译路径
    public function setCom($compile){
//        将传进来的参数赋值给定义的路径
        $dir=$this->compileDir=ROOT_PATH.$compile;
//        判断路径是否存在
        if (!file_exists($dir)){
            mkdir($dir);
        }
    }
//    分配变量
    public function assign($key,$val){
//        传来的值要保存起来，以后要用
        $this->assignArr[$key]=$val;
    }
//    编译变量
    public function display($path){
//        组合路径
        $way=$this->templateDir."/".$path;
//        将路径里的值取出来？
        $str=file_get_contents($way);
//        正则匹配
        $content=preg_replace("/\{([\s\S]+?)\}/",'<?php echo $this->assignArr["$1"]?>',$str);
//        将编译好的放入页面？
//        要放入的路径
        $goalway=$this->compileDir."/".md5($way).".php";
//        放入
        file_put_contents($goalway,$content);
        include_once $goalway;
    }



}
$obj=new smarty();
//创建一个模版路径
$obj->setTem("template");
//创建一个编译路径
$obj->setCom("compile");

$obj->assign("name","cll");
$obj->assign("age","18");

$obj->display("index.html");