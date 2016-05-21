<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(Validator::reviewFullValidation($_POST['name'], $_POST['email'], $_POST['telephone'], $_POST['content'])){
            $DB->sendReview(
            	trim(addslashes(htmlentities($_POST['name']))), 
            	$_POST['content'], 
            	trim(addslashes(htmlentities($_POST['email']))), 
            	trim(addslashes(htmlentities($_POST['telephone'])))
            );
            header('Location: '.URL);
        } else {
            $_SESSION['snd_error'] = true;
        }
    }
?>