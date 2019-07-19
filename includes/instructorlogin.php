<?php
include"dbconnect.php";
$success = "";
$ierrors = array();
//
if(isset($_POST['ilogin'])) {

 $success = "You are logged in";
$uid = mysqli_real_escape_string($conn, $_POST['i_uname']);
$sql = "SELECT * FROM instructortable WHERE instructor_uid = '$uid'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) == 0 ){ //user doesn't exist
    array_push($ierrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>User does not exist</h3></div>");
} else { //user exist
    $user = mysqli_fetch_assoc($query);
if (md5($_POST['i_pwd']) == $user['instructor_pwd']) {
    $_SESSION['instructor_first'] = $user['instructor_first'];
    $_SESSION['instructor_last'] = $user['instructor_last'];
    $_SESSION['instructor_email'] = $user['instructor_email'];
    $_SESSION['instructor_uid'] = $user['instructor_uid'];
    $_SESSION['instructor_photo'] = $user['i_profilephoto'];
    $_SESSION['country'] = $user['country'];
    $_SESSION['success'] = $success;
    header("Location:instructor-dashboard.php?my=my");
} else {
    array_push($ierrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>wrong password</h3></div>");
  }
    
 }
}

?>
