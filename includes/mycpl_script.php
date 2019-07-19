<?php
 $success = "logged in as Admin";
$loin_errors = array();
//
if(isset($_POST['dashboard_login'])) {
$dashboard_name = mysqli_real_escape_string($conn, $_POST['dashboard_name']);
$dashboard_email = mysqli_real_escape_string($conn, $_POST['dashboard_email']);
$dashboard_pwd = mysqli_real_escape_string($conn, $_POST['dashboard_pwd']);
    
$sql = "SELECT * FROM dashboard WHERE dashboard_uid = '$dashboard_name' AND dashboard_email = '$dashboard_email'";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) == 0 ){ //user doesn't exist
    array_push($loin_errors,  "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>User does not exist</h3></div>");
} else { //user exist
    $user = mysqli_fetch_assoc($query);
    
if (md5($dashboard_pwd) == $user['dashboard_pwd'] && $dashboard_email == $user['dashboard_email'] && $dashboard_name == $user['dashboard_uid']) {
    $_SESSION['dashboard_email'] = $user['dashboard_email'];
    $_SESSION['dashboard_uid'] = $user['dashboard_uid'];
    $_SESSION['dashboard_photo'] = $user['dashboard_photo'];
    $_SESSION['success'] = $success;
    header("location:mycp-dashboard.php");
} else {
    array_push($loin_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Access denied</h3></div>");
  }
    
 }
}
?>