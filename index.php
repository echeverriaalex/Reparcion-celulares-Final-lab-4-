<?php
 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require "Config/Autoload.php";
	require "Config/Config.php";

	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;
		
	Autoload::start();

	session_start();

	require_once(VIEWS_PATH."header.php");

	Router::Route(new Request());

	/*
		echo "<br> DIR ---> " . dirname(__DIR__);
		echo "<br> ROOT ---> " . ROOT;
		echo "<br> FRONT ROOT ---> " . FRONT_ROOT;
		echo "<br> VIEWS ---> " . VIEWS_PATH;
		echo "<br> CSS ---> " . CSS_PATH;
		echo "<br> JS ---> " . JS_PATH;
	*/
	require_once(VIEWS_PATH."footer.php");
?>