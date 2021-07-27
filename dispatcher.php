<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
$controllers = array(
	"services" => array("addServicesToDb", "updateServicesToDb", "deleteServices", "fetchServices", "fetchServicesByID"),
	"portfolio" => array("addPortfolioToDb", "updatePortfolioToDb", "deletePortfolio", "fetchPortfolio")
);

/*Validate if the page exist then validate if the action exist*/

if (array_key_exists($controller, $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		dispatch($controller, $action);
	} else {
		dispatch("index", "error");
	}
} else {
	dispatch("index", "error");
}

function dispatch($controller, $action)
{
	require_once "controller/" . ucfirst($controller) . "Controller.class.php";
	// require_once "model/DBManager.class.php";
	// require_once "model/Post.class.php";
	// require_once "model/User.class.php";
	switch ($controller) {
		case 'services':
			$controller = new ServicesController();
			break;

		case 'post':
			$controller = new PostController();
			break;
	}

	$controller->{$action}();
}
