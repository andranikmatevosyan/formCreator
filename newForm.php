<?php
require_once 'init.php';
//require_once 'config.php';


$smarty->assign("filename", "formCreator", true);
$smarty->display('formCreator.tpl');

?>