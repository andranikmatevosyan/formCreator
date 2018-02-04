<?php
session_start();

require_once 'includes/functions/dbfunctions.php';
require_once 'includes/functions/customfunctions.php';
require_once 'includes/classes/smarty/libs/Smarty.class.php';


$smarty = new Smarty;
$smarty->force_compile = false;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;
$smarty->assign("activeClass", 'active', true);
/*

$smarty->assign("currentLanguage", $currentLanguage, true);
$smarty->assign("actualLink", $actualLink, true);

foreach ($lang as $langKey => $langString){
	$smarty->assign('lang_'.$langKey, $lang[$langKey], true);
}

$action = $_GET['action'];
*/
?>