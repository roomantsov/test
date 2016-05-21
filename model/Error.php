<?php
	class Error
	{
		static public $types = array(
				'white'     => 'default',
				'blue'      => 'primary',
				'green'     => 'success',
				'lightblue' => 'info',
				'orange'    => 'warning',
				'red'       => 'danger'
			);

		static public function getErrors(){
			$errors = $_SESSION['errors'];
			$_SESSION['errors'] = array();
			return $errors;
		}

		static public function addError($head, $body, $type){
			array_push($_SESSION['errors'], array(
					'head' => $head,
					'body' => $body,
					'type' => self::$types[$type]
				));
		}

	}
?>