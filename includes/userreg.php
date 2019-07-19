<?php

$first = "";
 $last = "";
 $email = "";
 $uid = "";
 $pwd = $cpwd = "";
$u_errors = array();
$success = ""; 
$u_sex = "";
$date = date("m : d : y");

   //database connection
    include('includes/dbconnect.php');

//if the submit button is clicked
if(isset($_POST['submitu'])) {
    
    $first = mysqli_real_escape_string($conn, $_POST['user_first']);
    $last = mysqli_real_escape_string($conn, $_POST['user_last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);
    $u_sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $success = "You are logged in";

//    //Error handlers  
//ensure that form fields are filled properly
    if(strlen($first) < 3) {
       array_push($u_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>firstname must be up to 3 characters</h3></div>");
    }
    if(strlen($last) < 3) {
       array_push($u_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>lastname must be up to 3 characters</h3></div>"); 
    }
     if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
       array_push($u_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>email is invalid</h3></div>"); 
    }
     if(strlen($uid) < 3) {
       array_push($u_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>username must be up to 3 characters </h3></div>"); 
    }
     if((strlen($pwd) < 6) || (strlen($cpwd) <6)) {
       array_push($u_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>password must be up to 6 characters </h3></div>"); 
    }
     if($pwd != $cpwd) {
       array_push($u_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>password mismatch</h3></div>"); 
    }
    
//    if there are no errors, save user to database
    if(count($u_errors) == 0) {
        
                $sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$email'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0) {
                  array_push($u_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>User already exist<sup>&nabla;</sup></h3></div>");
                } else {
        
        $pwd = md5($pwd);
        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, user_sex, regdate) VALUES ('$first', '$last', '$email', '$uid', '$pwd', '$u_sex', '$date');";
        mysqli_query($conn, $sql);
        array_push($u_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-right: 5px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px; background-color: #dff0d8'><span style='color:#468847;'><span style='color:#167ac6'>Registration Successful, Please Login<sup>&nabla;</sup></span></sup></span></div>");
                     $_SESSION['user_first'] = $first;
                     $_SESSION['user_last'] = $last;
                     $_SESSION['user_email'] = $email;
                     $_SESSION['user_id'] = $uid;
                     $_SESSION['success'] = $success;
        header("Refresh:2; loginpage.php");
    }
}
    }
?>