<?php
	class Security{
		public static function login($login, $password){
			$user = AdminDB::getUserByLogin($login);
			if(!$user){
				return;
			}
			if($user['password'] == $password){
				$_SESSION['role'] = 'admin';
			}
		}
	}
?>