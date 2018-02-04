<?php
require_once 'init.php';
//require_once 'config.php';
$forms = getMoreDB("SELECT id, formName, formId, formClass, formAction, formMethod FROM form_general ORDER BY id DESC");

$smarty->assign("filename", "homepage", true);
$smarty->assign("forms", $forms, true);
$smarty->display('formList.tpl');


?>