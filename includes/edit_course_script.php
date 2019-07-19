<?php
include'dbconnect.php';
$course_title = $course_description = $course_duration = "";
$date = date("m : d : Y");
$v_id = "";
    if(isset($_GET['v_id'])) {
        $v_id = $_GET['v_id'];   
    }
if (isset($_POST['edit'])) {
    $title = strip_tags(mysqli_real_escape_string($conn, $_POST['course_title']));
    $description = strip_tags(mysqli_real_escape_string($conn, $_POST['course_description']));
    $duration = strip_tags(mysqli_real_escape_string($conn, $_POST['course_duration']));
    if(!empty($title)) {
     $course_title = $title;   
    } else {
    $course_title = $row['course_title'];
    } 
    if(!empty($description)) {
     $course_description = $description;   
    } else {
      $course_description = $row['course_description'];  
    } 
    if(!empty($duration)) {
     $course_duration = $duration;   
    } else {
    $course_duration = $row['course_duration'];  
    }

    $sql = "UPDATE coursecontents SET course_title = '".$course_title."',  course_description = '".$course_description."', course_duration = '".$course_duration."',  mod_date = '".$date."' WHERE content_id = '".$v_id."'";
    $query = $conn->query($sql);

    if($query) {
            echo "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-right: 5px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px; background-color: #dff0d8'><span style='color:#468847;'>record updated Successfully.</span></div>";
    } else {
        echo "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops! There was a problem with your submission. Please try again.</h3></div>";
    }
}
?>