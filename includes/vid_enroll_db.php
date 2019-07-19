<?php 
$enroll_msg = array();
require "dbconnect.php";
if(isset($_GET['uid']) && isset($_GET['cid']) && !empty($_GET['uid']) && !empty($_GET['cid'])) {
    $u_id = $_GET['uid'];
    $video_id = $_GET['cid'];
    
    $sql = "SELECT * FROM users_coursecontents WHERE user_id = '$u_id' AND coursecontent_id = '$video_id'";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0) {
        array_push($enroll_msg, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Content Already Exists</h3></div>");
        header("Refresh:3 url=courses.php");
    } else{
    $query = "
        INSERT INTO users_coursecontents(user_id, coursecontent_id, modified_on, created_on) VALUES( '$u_id', '$video_id', '".date('d:m:Y')."', '". date('d/m/Y') ."')
    ";
    if(mysqli_query($conn, $query)) {
        array_push($enroll_msg, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-right: 5px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px; background-color: #dff0d8'><span style='color:#468847;'><span style='color:#167ac6'>Content Added Successfullyy<sup>&nabla;</sup></span></sup></span></div>");
 header("Refresh:3 url=courses.php");
    } else {
array_push($enroll_msg, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops!. Request Failed</h3></div>");
        header("Refresh:3 url=courses.php");

    }
    }
    
}
?>