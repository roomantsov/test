<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(true){
			require_once '../model/database.php';
			$reviewsAssoc = $DB->getReviews();	
			print(json_encode($reviewsAssoc));
		}
	}
?>