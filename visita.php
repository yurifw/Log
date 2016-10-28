<?php

require_once("config.php");


$dbConnection = new MySQLi($CONFIG['host'], $CONFIG['db_user'], $CONFIG['db_password'], $CONFIG['db_name']);


$params = get_parameters();
$stmt = $dbConnection->prepare("INSERT INTO ".$CONFIG['table_name']." (file, ip, languages, browser, parameters, hour) VALUES (?, ?, ?, ?, ?, STR_TO_DATE(?, '%d/%m/%Y %H:%i:%s'))");
$stmt->bind_param("ssssss", $_SERVER['SCRIPT_FILENAME'], $_SERVER["REMOTE_ADDR"], $_SERVER["HTTP_ACCEPT_LANGUAGE"], $_SERVER["HTTP_USER_AGENT"], $params, date('d/m/Y H:i:s'));
$stmt->execute();


function get_parameters(){
	$p = "";
	foreach($_GET as $key=>$value){
    	$p= $p.$key.'='.$value."&";
    }
    foreach($_POST as $key=>$value){
    	$p= $p.$key.'='.$value."&";
    }
    return $p;
}

?>