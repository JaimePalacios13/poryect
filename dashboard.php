<?php
error_reporting(0);
session_start();

/* if ($_SESSION["session"]=="validated") { */
	
	
	require_once("autoload.php");
	require_once("configuration/conexion.php");
	require_once("helpers/utils.php");
	require_once("configuration/parameters.php");
	require_once("controllers/ErrorController.php");
	require("models/ModeloBandeja.php");

	if ($_SESSION["session"] == "validated" && $_SESSION["id_usuario"] != 0) {
		
		$notificaciones = new ModeloBandeja();
		require_once("views/layout/header.php");
		require_once("views/layout/aside.php");
		
	}

	
	
	
	function show_error(){
		$error = new errorControler();
		$error->index();
	}

	function error403(){
		$error = new errorControler();
		$error->error403();
	}
	
	
	if(isset($_GET['controller'])){
		$nombre_controlador = $_GET['controller'].'Controller';
	}else{
		show_error();
		exit();
	}
	
	
	/* if ($_SESSION["session"] == "validated" && $_SESSION["id_usuario"] != 0) { */
		
		if(class_exists($nombre_controlador)){	
			$controlador = new $nombre_controlador();
			
			if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
				$action = $_GET['action'];
				$controlador->$action();
			}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
				$action_default = action_default;
				$controlador->$default();
			}else{
				show_error();
				
			}
		}else{
			show_error();
		}
		
	/* }else {
		
		header("Location: ".base_url);
	} */

	if ($_SESSION["session"] == "validated" && $_SESSION["id_usuario"] != 0) {
		
		require_once("views/layout/footer.php");
		
	}

	
	
/* }elseif ($_SESSION["session"]=="") {
	
	Utils::loadAction("bandeja/.khlkh");
}  */