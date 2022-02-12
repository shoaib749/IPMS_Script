<?php
    class dbOpreations{
        private $con;
        function __construct(){
            require_once dirname(__FILE__).'/dbConnect.php';
            $db = new dbConnect();
            $this->con = $db->connect();
        }

        //Creating new user
        public function createUser($fname,$lname,$email_id,$pass){
            if($this->isUserExist($fname,$lname,$email_id)){
                return 0;
            }else{
                $stmt = $this->con->prepare("INSERT INTO `login_details` (`fname`, `lname`, `email_id`, `pass`) VALUES (?,?,?,?);");
                $stmt->bind_param("ssss",$fname,$lname,$email_id,$pass);
                if($stmt->execute()){
                    return 1;
                }else{
                    return 2;
                }
            }

        }
        //checking for existing user
        private function isUserExist($fname,$lname,$email_id){
            $stmt = $this->con->prepare("SELECT email_id FROM login_details WHERE fname = ? AND lname = ? or email_id = ?");
            $stmt->bind_param("sss",$fname,$lname,$email_id);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }

        
    }