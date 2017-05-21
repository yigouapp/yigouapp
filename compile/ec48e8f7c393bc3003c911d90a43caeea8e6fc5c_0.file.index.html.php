<?php
/* Smarty version 3.1.30, created on 2017-05-19 03:57:51
  from "E:\wamp\www\mvccms\template\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_591e511f36e5e9_15275999',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec48e8f7c393bc3003c911d90a43caeea8e6fc5c' => 
    array (
      0 => 'E:\\wamp\\www\\mvccms\\template\\index.html',
      1 => 1495159070,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_591e511f36e5e9_15275999 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
    <li>
        <?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['pass'];?>

    </li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul>

</body>
</html><?php }
}
