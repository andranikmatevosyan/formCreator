<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
ob_start();
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "form");
define('PROJECT_NAME', 'Form building');
define("ROOT_PATH", "");
date_default_timezone_set("Asia/Baku");



function connectDB (){
    
    $con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
    mysql_set_charset('utf8', $con);
    if(!$con) die("connection to database failed".mysql_error());
    $dataselect = mysql_select_db(DB_DATABASE,$con);
    if(!$dataselect) die("Database namelist not selected".mysql_error());
    
    return $con;
}

function closeDB($con){
    mysql_close($con);
}

function getOne($db, $MySQL=NULL) {
	$con = connectDB();
	
	$result = mysql_query($db, $MySQL=$con);
	if(!$result) die("Query Failed: ". mysql_error());
	$row = mysql_fetch_array($result);
	return $row;
	mysql_close();
}

function getOneDB($db, $MySQL=NULL) {
	$con = connectDB();
	
	$result = mysql_query($db, $MySQL=$con);
	if(!$result) die("Query Failed: ". mysql_error());
	$row = mysql_fetch_assoc($result);
	return $row;
	mysql_close();
}

function getMore($db, $MySQL=NULL) {
	$con = connectDB();
	
	$result = mysql_query($db, $MySQL=$con);
	if(!$result) die("Query Failed: ". mysql_error());
	while($row = mysql_fetch_array($result)) $arr[]=$row;
	return $arr;
	mysql_close();
}

function getMoreDB($db, $MySQL=NULL) {
	$con = connectDB();
	
	$result = mysql_query($db, $MySQL=$con);
	if(!$result) die("Query Failed: ". mysql_error());
	while($row = mysql_fetch_assoc($result)) $arr[]=$row;
	return $arr;
	mysql_close();
}

function query($db, $MySQL=NULL) {
	$con = connectDB();
	
	$result = mysql_query($db, $MySQL=$con);
	if(!$result) die("Query Failed: ". mysql_error());
	return $result;
	mysql_close();
}

function resultQuery($db, $MySQL=NULL) {
	$con = connectDB();
	
	$res = query($db, $MySQL=$con);
	$result = mysql_num_rows($res);
	return $result;
	mysql_close();
}

function protect($input){
    $con = connectDB();
    $result = mysql_real_escape_string(trim(strip_tags($input)));
    return $result;
    mysql_close();
}

function escapeString($db) {
	$result = mysql_real_escape_string($db);
	return $result;
}

function numRows($db) {
	$result = mysql_num_rows($db);
	return $result;
}

if (isset($_GET['message'])) {
    $messagebox = '<div class="alert alert-success">'.$_GET['message'].'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
} else if (isset($_GET['error'])) {
    $messagebox = '<div class="alert alert-danger">'.$_GET['error'].'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
} else {
    $messagebox = '';
}

?>