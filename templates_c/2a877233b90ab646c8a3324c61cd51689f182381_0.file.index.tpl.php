<?php
/* Smarty version 4.3.0, created on 2023-01-27 08:09:18
  from 'C:\xampp\htdocs\MaaSharda\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63d3789e1c3711_62149034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a877233b90ab646c8a3324c61cd51689f182381' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MaaSharda\\index.tpl',
      1 => 1673770232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./inc/links.tpl' => 1,
    'file:./inc/header.tpl' => 1,
    'file:./inc/script.tpl' => 1,
  ),
),false)) {
function content_63d3789e1c3711_62149034 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ucertify Online Examination</title>
     <?php $_smarty_tpl->_subTemplateRender('file:./inc/links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </head>
  <body>
   <?php $_smarty_tpl->_subTemplateRender('file:./inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center mt-5">
                <a href="ucertify.php" class="btn btn-success" id="Start_test" name="Start_test">Start Test</a>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender('file:./inc/script.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </body>
</html><?php }
}
