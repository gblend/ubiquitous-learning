<?php
include'includes/dbconnect.php';
$poster_subject = $poster_email = $poster_message = "";
 $post_msg = array();
$user_photo = '';
$user_id = '';
if(isset($_POST['submit_post'])) {
    $poster_subject = mysqli_real_escape_string($conn, $_POST['poster_subject']);
    $poster_email = mysqli_real_escape_string($conn, $_POST['poster_email']);
    $poster_message = strip_tags(mysqli_real_escape_string($conn, $_POST['poster_message']));
    $poster_check = mysqli_real_escape_string($conn, $_POST['poster_check']);
    $date = date("m:d:Y");
        if(isset($_SESSION['instructor_uid'])){
        $user_id = $_SESSION['instructor_uid'];
    } else if(isset($_SESSION['user_uid'])) {
        $user_id = $_SESSION['user_uid'];
    }
        if(isset($_SESSION['instructor_photo'])){
        $user_photo = $_SESSION['instructor_photo'];
    } else if(isset($_SESSION['user_photo'])) {
        $user_photo = $_SESSION['user_photo'];
    }
    
     //check if all fields are filled
    if(empty($poster_subject) || empty($poster_email) || empty($poster_message)) {
        array_push($post_msg, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>all fields must be filled</h3></div>
");
    }
    //check if empty hidden field is filled
    if(!empty($poster_check)) {
        header("Location:blog-single.php");
    }
    
    //check if email is valid
    if(!filter_var($poster_email, FILTER_VALIDATE_EMAIL)) {
        array_push($post_msg, "Enter a valid email");
    }
    
    $sql = "SELECT * FROM blogpost WHERE post = '".$poster_message."'; ";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    if($row['post'] === $poster_message) {
    array_push($post_msg, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops!, this post is already published.</h3></div>"); 
    }
    
    if(count($post_msg) == 0) {
        $sql = "INSERT INTO blogpost (poster_photo, poster_subject, poster_email, post, bloguser_uid, post_date) VALUES('$user_photo', '$poster_subject', '$poster_email', '$poster_message', '$user_id', '$date')";
        $query = mysqli_query($conn, $sql);
        if($query) {
            array_push($post_msg, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-right: 5px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px; background-color: #dff0d8'><span style='color:#468847;'>Thanks, Your post was published successfully.</span></div>");
        } else {
            array_push($post_msg, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Sorry, unable to publish your post. Kindly try again.</h3></div>");
        }
    }
    
} else {
array_push($post_msg, " ");
$poster_subject = $poster_email = $poster_message = "";  
}
?>