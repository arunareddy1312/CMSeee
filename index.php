<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$controller = "index";
$action="view";

if(isset($_GET['controller']) && isset($_GET['action'])){
	$controller = $_GET['controller'];
	$action 	= $_GET['action'];
}
require_once 'view/layout.php';
?>