<?php 
	session_start();
	if(!isset($_SESSION['errors'])){
		$_SESSION['errors'] = array();
	}
	require_once 'constants.php';
    require_once CONTROLLER.'/mainController.php';
?>