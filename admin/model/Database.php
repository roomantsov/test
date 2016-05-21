<?php
	class AdminDB{
		static public function getReviews(){
			$DB = new PDO("mysql:host=localhost;dbname=test", 'root', '');
			$sql_result = $DB->query("SELECT * FROM reviews");
			$reviews = array();
			while($review = $sql_result->fetch(PDO::FETCH_ASSOC)){
				array_push($reviews, $review);
			}
			return $reviews;
		}

		static function getUserByLogin($login){
			$DB = new PDO("mysql:host=localhost;dbname=test", 'root', '');
			$sql_result = $DB->query("SELECT * FROM users WHERE login='{$login}'");
			$user = $sql_result->fetch(PDO::FETCH_ASSOC);
			return $user != null ? $user : false;
		}

		static public function getConnection(){
			return new PDO("mysql:host=localhost;dbname=test", 'root', '');
		}
	}

	
?>