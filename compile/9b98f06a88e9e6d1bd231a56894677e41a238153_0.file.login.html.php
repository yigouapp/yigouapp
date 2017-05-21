<?php
/* Smarty version 3.1.30, created on 2017-05-19 10:49:12
  from "E:\wamp\www\mvccms\template\admin\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_591eb188928f37_51104692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b98f06a88e9e6d1bd231a56894677e41a238153' => 
    array (
      0 => 'E:\\wamp\\www\\mvccms\\template\\admin\\login.html',
      1 => 1495183751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_591eb188928f37_51104692 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
login-admin.css">
</head>
<body>
    <form action="index.php?d=admin&f=admin&a=loginCheck" method="post" class="form">
        <label>
            <h3>后台管理入口</h3>
        </label>
        <label>
            账&nbsp;&nbsp;&nbsp;号：<input type="text" name="username" required id="user">
        </label>
        <label>
            密&nbsp;&nbsp;&nbsp;码：<input type="password" name="pass" required id="pass">
        </label>
        <label class="yzm">
            验证码：<input type="text" name="verify" required id="verify">
            <img src="<?php echo HTTP_PATH;?>
yzm/img.php" alt="" onclick="this.src='<?php echo HTTP_PATH;?>
yzm/img.php?aa='+Math.random()">
        </label>
        <label class="choose">
            <input type="submit" value="登录">
        </label>
    </form>
</body>
</html><?php }
}
