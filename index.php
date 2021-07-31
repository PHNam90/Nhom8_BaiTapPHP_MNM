<?php 
	session_start();
	include "application/Connection.php";
	include "application/Controller.php";
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