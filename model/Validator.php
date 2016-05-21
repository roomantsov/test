<?php
    require_once URL.MODEL.'/Error.php';
    class Validator
    {
        public static function reviewFullValidation($name, $email, $telephone, $content){
            $valid = true;
            if(!self::emailValidation($email)){
                $valid = false;
            }

            if(!self::telephoneValidation($telephone)){
                $valid = false;
            }

            if(!self::nameValidation($name)){
                $valid = false;
            }

            if(!self::contentValidation($content)){
                $valid = false;
            }
            return $valid;
        }

        public static function emailValidation($email){
            if(preg_match("/^[0-9A-Za-z\._]*@[0-9A-Za-z\.]{1,30}\.[A-Za-z]{1,10}$/", $email)){
                return true;
            }
            Error::addError('Wrong email', 'Please, rewrite your email correctly', 'red');
            return false;
        }

        public static function telephoneValidation($telephone){
            if(preg_match("/^\+[0-9] [0-9]{3}-[0-9]{3}-[0-9]{4}$/", $telephone)){
                return true;
            }
            Error::addError('Wront telephone', 'Please rewrite your telephone correctly', 'red');
            return false;
        }

        public static function nameValidation($name){
            if(preg_match("/^[A-Za-z]{1,100}$/", $name)){
                return true;
            }
            Error::addError('Wrong name', 'Please rewrite your name correctly', 'red');
            return false;
        }

        public static function contentValidation($content)
        {
            if(strlen($content) >= 15 && strlen($content) <= 100){
                return true;
            }
            Error::addError('Too short', 'Content must be longer than 15 and shorter than 100 symbols', 'red');
            return false;
        }
    }
?>