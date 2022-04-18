<?php
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"ipms");   
    $response = array();

    $email=$_POST['email_id'];
    $img=$_POST['upload'];
    $filename=$email.".jpg";
    file_put_contents("images/".$filename,base64_decode($img));
    //sql
    $sql="UPDATE info SET profile_img = '$filename' WHERE email_id = '$email';";
    $result = mysqli_query($conn,$sql);
    if($result==true){
        $response['error'] = false;
        $response['message'] = "File uploaded Success" ;
    }        
    else{
        $response['error'] = true;
        $response['message'] = "Failed";
    }
        
    
    echo json_encode($response);