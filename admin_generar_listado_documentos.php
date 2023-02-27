<?php
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(isset($_REQUEST['id'])){
		$st_id = $_REQUEST['id'];
	}
	
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
	
	$insert =$user->generar_listado_documentos($st_id);
	if($insert){
        header('Location: admin_reg_documentos.php');
		exit();
	}
?>