<?php
include'includes/dbconnect.php';
$instructor_uid = '';
if(isset($_SESSION['instructor_uid'])) {
 $instructor_uid = $_SESSION['instructor_uid'];   
}
$course_title = $course_description = $path1 = $video_name = $video_tmp_name = $course_duration = "";
$courseErrors = array();
$date = date("m:d:Y");
if(isset($_POST['upload_course'])) {
    
$course_title = ucwords(mysqli_real_escape_string($conn, $_POST['course_title']));
$course_description = mysqli_real_escape_string($conn, $_POST['course_description']);
$course_duration = mysqli_real_escape_string($conn, $_POST['course_duration']);
$file_dir1 = "Videos/coursePoster/";
$path1 = $file_dir1 . basename($_FILES["course_poster"]["name"]);
$check = ($_FILES["course_poster"]["size"]);
$imageFileType = pathinfo($path1, PATHINFO_EXTENSION);

///////////////////////////////////////
    $video_name = $_FILES["course"]["name"];
    $video_tmp_name = $_FILES["course"]["tmp_name"];
    $video_path = "Videos/CourseVideos/".$video_name;
//    $video_ext = explode(".", $video_name);
//    $ext = $video_ext[1];
    $videoFileType = pathinfo($video_path, PATHINFO_EXTENSION);
    $allowed = array("wmv","mp4", "3gp", "mpeg");
    //check if length of title is short and description
    if(strlen($course_title) < 8) {
       array_push($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Course title is too short.</h3></div>");
    }
    if(strlen($course_description) < 10 ){
        array_push($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>course description too short.</h3></div>");
    }
    
    if(in_array($videoFileType, $allowed)) {
if($_FILES['course']['size'] > 900000000){
            array($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>course file is too large, 90mb max allowed.</h3></div>");
        } else {
          $sql = "SELECT * FROM coursecontents WHERE video_path = '$video_path'";
          $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0){
                array_push($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops!. video already exists.</h3></div>");
            }
        }
    } else {
        array_push($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>only mp4, 3gp, wmv, mpeg supported.</h3></div>");
    }
    
if($check !== false) {        
        // Check if file already exists in database
    $sql = "SELECT * FROM coursecontents WHERE poster_path = '$path1'";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
    array_push($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops!. image already exists.</h3></div>");
    }
} else {
    array_push($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops!. no file selected/file invalid.</h3></div>");
    }
// Check file size
if ($check > 1000000) {
     array_push($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Sorry, your file is too large.</h3></div>");
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif") {
   array_push($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h3></div>");
}

    
    if(!$courseErrors){
        $sql1 = "INSERT INTO coursecontents (instructor_uid, course_title, course_description, course_duration, video_path, poster_path, upload_date) VALUES ('$instructor_uid', '$course_title', '$course_description', '$course_duration', '$video_path', '$path1', '$date')";
        $query1 = mysqli_query($conn, $sql1);
        if($query1) {
            move_uploaded_file($video_tmp_name, $video_path);
            move_uploaded_file($_FILES['course_poster']['tmp_name'], $path1);
            array_push($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-right: 5px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px; background-color: #dff0d8'><span style='color:#468847;'>Course upload successful</span></div>");

        } else {
            array_push($courseErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops!, course upload failed</h3></div>");
            exit();
        }
    }
}

?>