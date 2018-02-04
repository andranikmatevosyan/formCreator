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
$action = $_GET['action'];

?>
