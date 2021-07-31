<?php 
	session_start();
	//load file Connection.php
	include "../application/Connection.php";	
	//load file controller
	include "../application/Controller.php";	
 ?>
 <?php 
 	$controller = isset($_GET["controller"]) ? $_GET["controller"]:"Home";
 	$action = isset($_GET["action"]) ? $_GET["action"]:"index";
 	$fileController = "controllers/".ucfirst($controller)."Controller.php";
 	$classController = "$controller"."Controller";
 	if(file_exists($fileController)){
 		include $fileController;
 		$obj = new $classController();
 		$obj->$action();
 	}
  ?>