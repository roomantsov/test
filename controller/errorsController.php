<?php
	require_once URL.MODEL.'/Error.php';
	$errors = Error::getErrors();
	require_once URL.VIEW.'/errors.php';
?>