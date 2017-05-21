<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/17
 * Time: 11:33
 */
header("content-type:text/html;charset=utf8");
session_start();
define("MVC","ok");
//echo "<pre>";
//var_dump($_SERVER);
//项目运行根目录
define("ROOT_PATH",substr($_SERVER['SCRIPT_FILENAME'],0,(strrpos($_SERVER['SCRIPT_FILENAME'],"/"))+1));
//引擎文件目录
define("LIBS_PATH",ROOT_PATH."libs/");
//模块目录
define("MODULES_PATH",ROOT_PATH."modules/");
//服务器根目录
define("HTTP_PATH","http://".$_SERVER['SERVER_NAME'].substr($_SERVER['SCRIPT_NAME'],0,(strrpos($_SERVER['SCRIPT_NAME'],"/"))+1));
//当前运行的文件
define("SELF_PATH","http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']);
//静态目录
define("STATIC_PATH",HTTP_PATH."static/");
//css目录
define("CSS_PATH",STATIC_PATH."css/");
//js目录
define("JS_PATH",STATIC_PATH."js/");
//img目录
define("IMG_PATH",STATIC_PATH."img/");
include_once LIBS_PATH."smarty/Smarty.class.php";
include_once LIBS_PATH."adminMain.class.php";
include_once LIBS_PATH."route.class.php";
include_once LIBS_PATH."db.class.php";
//include_once LIBS_PATH."smarty.class.php";
$route=new route();
$route->info();

//查询 where
//$ss=$obj->where("id=2")->select();
//查询 order
//$ss=$obj->order("id asc")->select();
//查询 limit
//$ss=$obj->limit("0,2")->select();
//插入
//$ss=$obj->getField("username,nickname,password,sex,email")->getVal("'wwww','测试','123456','女','ewq3443@qq.com'")->insert();
//更新
//$ss=$obj->getField("username='新的'")->where("id=1")->update();
//删除
//$ss=$obj->where("id=2")->delete();
//$aaa=$obj->select();
//var_dump($aaa);



