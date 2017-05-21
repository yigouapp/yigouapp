<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/17
 * Time: 14:59
 */
if (!defined("MVC")){
    echo "非法入侵！";
}
class route{
//    定义变量，只允许在本类里访问
//    文件的目录 就是  xx/$dir
    private static $dir="";
//    文件的名字
    private static $file="";
//    要调用的方法的名字
    private static $action="";
//    类的入口  对外的接口
    public function info(){
//        调用自身的方法
        $this->getInfo();
    }
//    获取地址栏传来的字符串 并加以处理
    private static function getInfo(){
//        获得目录路径
        self::$dir=(isset($_REQUEST['d'])&&!empty($_REQUEST['d']))?$_REQUEST['d']:'index';
//        获得文件名
        self::$file=(isset($_REQUEST['f'])&&!empty($_REQUEST['f']))?$_REQUEST['f']:'index';
//        获得要使用的方法名
        self::$action=(isset($_REQUEST['a'])&&!empty($_REQUEST['a']))?$_REQUEST['a']:'init';
//        整合完整路径，因为所有的类都放在modules里，所以要加上MODULES_PATH
        $dirpath=MODULES_PATH.self::$dir;
//        文件的路径
        $fullpath=$dirpath."/".self::$file.'.class.php';
//        判断路径是否是个目录
        if (is_dir($dirpath)){
//            判断是否是个文件
            if (is_file($fullpath)){
//                    引入这个文件
                include_once $fullpath;
//                判断这个文件中 self::$file 这个类是否存在  *****！！这里的文件名和文件里的类名相同！！****
                if (class_exists(self::$file,$fullpath)){
//                    类存在，就实例化一个对象
                    $obj=new self::$file();
//                    判断方法存在嘛
                    if (method_exists($obj,self::$action)){
                        $method=self::$action;
//                        方法存在，则调用方法
                        $obj->$method();
                    }else{
                        echo self::$action."这个方法不存在";
                    }
                }else{
                    echo self::$file."这个类不存在";
                }
            }else{
                echo $fullpath."这个文件不存在";
            }
        }else{
            echo $dirpath."这个路径不存在";
        }

    }
}