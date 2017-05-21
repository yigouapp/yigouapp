<?php
/* Smarty version 3.1.30, created on 2017-05-19 07:11:35
  from "E:\wamp\www\mvccms\template\admin\mess.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_591e7e87ab5633_82804129',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df40ed02af2370f4879bf7b104fd31ee3481fb58' => 
    array (
      0 => 'E:\\wamp\\www\\mvccms\\template\\admin\\mess.html',
      1 => 1495170691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_591e7e87ab5633_82804129 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
    html,body{
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    #box{
        width: 500px;
        height: 250px;
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top:0;
        margin: auto;
        border: 1px solid pink;
        box-shadow: 0 0 4px pink;
        /*background-image: url("../static/img/bg.png");*/
        background-size: cover;
        background-repeat: no-repeat;
    }
    h1{
        text-align: center;
        margin: 30px 0;
        font-weight: 500;
    }
    p{
        width: 100%;
        text-align: center;
        font-size: 18px;
    }
    p span,p a{
        color: red;
    }
</style>
<body>
    <div id="box">
        <h1>提示信息</h1>
        <p><?php echo $_smarty_tpl->tpl_vars['mess']->value;?>
</p>
        <p>如果 <span>3</span>秒后没跳转，请<a href="<?php echo $_smarty_tpl->tpl_vars['src']->value;?>
">点击跳转</a></p>
    </div>
</body>
</html>
<?php echo '<script'; ?>
>
    let span=document.querySelector('span');
    let a=document.querySelector('a');
    let src=a.href;
    let i=3;
    let t=setInterval(function () {
        i--;
        if (i===0){
            location.href=src;
            clearInterval(t);
        }
        span.innerHTML=i;
    },1000)
<?php echo '</script'; ?>
><?php }
}
