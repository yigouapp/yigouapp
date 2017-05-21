<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/19
 * Time: 11:13
 */
class admin extends adminMain {
    public function __construct(){
        $obj=new db('user');
        $this->obj=$obj;
        parent::__construct();
    }
//    登录页面
    public function login(){
//       跳转登录页面
        $this->smarty->display("admin/login.html");
    }
//    后台主页
    public function main(){
        if (!isset($_SESSION["login"])){
//            提示页面
//            提示信息
            $this->smarty->assign("mess","您还没有登录，请登录！");
//            提示路径
            $this->smarty->assign("src","index.php?d=admin&f=admin&a=login");
            $this->smarty->display("admin/mess.html");
            exit();
        }
        $this->smarty->display("admin/main.html");
    }
//    登录信息验证
    public function loginCheck(){

        $verify=$_REQUEST['verify'];
//     验证码校验
        if(strtoupper($_SESSION['string'])!=strtoupper($verify)){
            $this->smarty->assign("mess","验证码错误！");
//            提示路径
            $this->smarty->assign("src","index.php?d=admin&f=admin&a=login");
            $this->smarty->display("admin/mess.html");
            exit();
        }
//        获取页面传来的账号密码
        $username=$_REQUEST['username'];
        $pass=md5($_REQUEST['pass']);
//        查询数据库
        $result=$this->obj->select();
//        判断在不在数据库
        foreach ($result as $v){
            if ($v['username']==$username){
                if ($v['pass']==$pass){
                    $_SESSION['login']="yes";
                    $_SESSION['username']=$username;
                    $_SESSION['uid']=$v['id'];
                    $this->smarty->assign("mess","登录成功！");
                    $this->smarty->assign("src","index.php?d=admin&f=admin&a=main");
                    $this->smarty->display("admin/mess.html");
                    exit();
                }else{
                    $this->smarty->assign("mess","密码错误！请重新登录！");
                    $this->smarty->assign("src","index.php?d=admin&f=admin&a=login");
                    $this->smarty->display("admin/mess.html");
                }
            }else{
                $this->smarty->assign("mess","账号不存在！请重新登录！");
                $this->smarty->assign("src","index.php?d=admin&f=admin&a=login");
                $this->smarty->display("admin/mess.html");
            }
        }
    }
}