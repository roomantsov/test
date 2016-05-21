<?php
    class DB{
        private $CONN;

        static $is_set_connection = false;

        public function setDB(){
            $this->CONN->exec("CREATE TABLE reviews(
                    id INT(11) AUTO_INCREMENT PRIMARY KEY,
                    author_name TEXT,
                    email TEXT,
                    r_date TIMESTAMP,
                    is_moderated BOOLEAN,
                    is_changed BOOLEAN,
                    is_accepted BOOLEAN
                )");
            return;
        }

        public function getReviews(){
            $rowReviewsData = $this->CONN->query("SELECT * FROM reviews WHERE is_accepted = true");
            $reviewsAssoc = array();
            while($review = $rowReviewsData->fetch(PDO::FETCH_ASSOC)){
                array_push($reviewsAssoc, $review);
            }
            return $reviewsAssoc;
        }

        public function sendReview($author_name, $content, $email, $telephone){
            $this->CONN->exec("INSERT INTO reviews(author_name, content, email, telephone, is_moderated, is_changed, is_accepted) 
                VALUES('{$author_name}', '{$content}', '{$email}', '{$telephone}', FALSE, FALSE, FALSE)");
        }

        private function __construct($DBhost, $DBname, $DBuser, $DBpassword){
            try{
                $this->CONN = new PDO("mysql:host={$DBhost};dbname={$DBname}", $DBuser, $DBpassword);
                $this->CONN->exec("SET CHARACTER SET 'utf8'");
            } catch(Exception $e) {
                if($e->getMessage() == "SQLSTATE[HY000] [1049] Unknown database '{$DBname}'"){
                    $c = new PDO("mysql:host={$DBhost}", $DBuser, $DBpassword);
                    $c->exec("CREATE DATABASE {$DBname}");
                    $this->CONN = new PDO("mysql:host={$DBhost};dbname={$DBname}", $DBuser, $DBpassword);
                    $this->CONN->query("SET CHARACTER SET 'utf8'");
                    $this->setDB();
                } else {
                    echo "Поймано исключение: " . $e->getMessage();
                }
            }
        }

        public function Create(){
            try{
                if(DB::$is_set_connection){
                    throw new Exception("<br><h4>Only one instance of DB class available</h4><br>");
                } else {
                DB::$is_set_connection = true;
                    return new DB("localhost", "test", "root", "");
                }
            } catch(Exception $e) {
                exit($e->getMessage());
                return;
            }
        }

    }
    $DB = DB::Create();
?>