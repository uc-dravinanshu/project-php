<?php
/*
 * File-name : Project-PHP/index.php
 * Created at : 06/02/2023
 * @detail : this is an index file for going to index.tpl file.
 * Last Updated by : Dravinanshu Mishra <dravinanshu.mishra@ucertify.com>
 * last Updated Date : 06/02/2023
 */
require_once('./smarty/libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->display('index.tpl');
?>