<?php
include"dbconnect.php";
$success = "";
$errors = array();
//
if(isset($_POST['ulogin'])) {
 $success = "You are logged in";
$uid = mysqli_real_escape_string($conn, $_POST['uname']);
$sql = "SELECT * FROM users WHERE user_uid = '$uid'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) == 0 ){ //user doesn't exist
    array_push($errors,  "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>User does not exist</h3></div>");
} else { //user exist
    $user = mysqli_fetch_assoc($query);
    
if (md5($_POST['upwd']) == $user['user_pwd']) {
    header("location:dashboard.php?my=my");
    $_SESSION['user_first'] = $user['user_first'];
    $_SESSION['user_id'] = $user['user_id']; // the database unique id for the user
    $_SESSION['user_last'] = $user['user_last'];
    $_SESSION['user_email'] = $user['user_email'];
    $_SESSION['user_uid'] = $user['user_uid'];
    $_SESSION['user_photo'] = $user['profilephoto'];
    $_SESSION['success'] = $success;
} else {
    array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>wrong password</h3></div>");
  }
    
 }
}

?>
