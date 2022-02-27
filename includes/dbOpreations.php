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

        //login method
        public function userLogin($email_id,$pass){
            $stmt = $this->con->prepare("SELECT email_id FROM login_details WHERE email_id = ? AND pass = ?");
            $stmt->bind_param("ss",$email_id,$pass);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }
        public function getUserByUsername($email_id){
            $stmt=$this->con->prepare("SELECT * FROM login_details WHERE email_id = ?");
            $stmt->bind_param("s",$email_id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }
        //adminLogin
        public function adminLogin($email_id,$pass){
            $stmt = $this->con->prepare("SELECT email_id FROM admin_details WHERE email_id = ? AND pass = ?");
            $stmt->bind_param("ss",$email_id,$pass);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }
        public function adminUserDetails($email_id){
            $stmt=$this->con->prepare("SELECT * FROM admin_details WHERE email_id = ?");
            $stmt->bind_param("s",$email_id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }
        //moreInformation function
        public function moreInfo($fname,$lname,$email_id,$mobNo,$par_mobNo,$dept,$sem,$regNo,$pass10,$per10,$pass12,$per12,$passDip,$perDip,$admission,$sgpa1,$sgpa2,$sgpa3,$sgpa4,$sgpa5,$sgpa6,$sgpa7,$sgpa8,$avgsgpa,$passout,$live,$dead,$option1,$placement_status){
            if($this->isUserHaveInfo($fname,$email_id)){
                $stmt = $this->con->prepare("UPDATE info SET mobNo = ? ,par_mobNo = ?, dept = ?,sem =?, regNo = ? , pass10 = ?, per10 = ?, pass12=?, per12=?, passDip=?, perDip=?, admission=?, sgpa1=?, sgpa2=?, sgpa3=?, sgpa4=?, sgpa5=?, sgpa6=?, sgpa7=?, sgpa8=?, avgSgpa=?, passout=?, live=?, dead=?, option1=?, placement_status=? WHERE fname = ? AND email_id = ?");
                $stmt->bind_param('ssssssssssssssssssssssiissss',$mobNo,$par_mobNo,$dept,$sem,$regNo,$pass10,$per10,$pass12,$per12,$passDip,$perDip,$admission,$sgpa1,$sgpa2,$sgpa3,$sgpa4,$sgpa5,$sgpa6,$sgpa7,$sgpa8,$avgsgpa,$passout,$live,$dead,$option1,$placement_status,$fname,$email_id);
                if($stmt->execute()){
                    return 0;
                }else{
                    return 3;
                }
                
            }
            $stmt = $this->con->prepare("INSERT INTO `info` (`sr`, `fname`, `lname`, `email_id`, `mobNo`, `par_mobNo`, `dept`, `sem`, `regNo`, `pass10`, `per10`, `pass12`, `per12`, `passDip`, `perDip`, `admission`, `sgpa1`, `sgpa2`, `sgpa3`, `sgpa4`, `sgpa5`, `sgpa6`, `sgpa7`, `sgpa8`, `avgSgpa`, `passout`, `live`, `dead`, `option1`, `placement_status`) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
            $stmt->bind_param("sssssssssssssssssssssssssiiss",$fname,$lname,$email_id,$mobNo,$par_mobNo,$dept,$sem,$regNo,$pass10,$per10,$pass12,$per12,$passDip,$perDip,$admission,$sgpa1,$sgpa2,$sgpa3,$sgpa4,$sgpa5,$sgpa6,$sgpa7,$sgpa8,$avgsgpa,$passout,$live,$dead,$option1,$placement_status);
            if($stmt->execute()){
                return 1;
            }else{
                return 2;
            }
        }  
        //checking for user Data 
        public function  isUserHaveInfo($fname,$email_id){
            $stmt = $this->con->prepare("SELECT email_id FROM info WHERE fname = ? AND email_id = ?;");
            $stmt->bind_param("ss",$fname,$email_id);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }
        //count Total offers
        public function countTotalOffer(){
            $stmt = $this->con->prepare("SELECT * FROM placement_data;");
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows;

        }
        //count Total student placed 
        // public function countStudentOffer(){
        //     $stmt  = $this->con->prepare("SELECT COUNT(DISTINCT email_id) FROM placement_data;");
            
        //     $rowcount=num_rows($stmt->execute());
        //     return $rowcount;
        // }
        //count Total Intenship Offers
        public function countInternship(){
            $stmt = $this->con->prepare("SELECT * FROM internship_data;");
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows;
        }
    }