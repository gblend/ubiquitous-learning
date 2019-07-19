<?php
$i_first = "";
$i_last = "";
$i_uname = "";
$i_email = "";
$i_number = "";
$i_pwd = $ci_pwd = "";
$errors = array();
$success = "";
$sex = "";
$country = "";
$i_spec = "";
$i_quote = "";
$file_dir = "images/InstructorpixUpload/";
$check = '';
$path = ''; 
if( isset($_FILES["i_photo"]["name"])) {
   $path = $file_dir . basename($_FILES["i_photo"]["name"]);
   $check = ($_FILES["i_photo"]["size"]);
}
$uploadOk = 1;
$imageFileType = pathinfo($path, PATHINFO_EXTENSION);

   //database connection
    include('includes/dbconnect.php');

//if the submit button is clicked
if(isset($_POST['submiti'])) {
    
$i_first = mysqli_real_escape_string($conn, $_POST['i_first']);
$i_last = mysqli_real_escape_string($conn, $_POST['i_last']);
$i_email = mysqli_real_escape_string($conn, $_POST['i_email']);
$i_number = mysqli_real_escape_string($conn, $_POST['i_number']);
$i_uname = mysqli_real_escape_string($conn, $_POST['i_uname']);
$i_pwd = mysqli_real_escape_string($conn, $_POST['i_pwd']);
$ci_pwd = mysqli_real_escape_string($conn, $_POST['ci_pwd']);
$sex = mysqli_real_escape_string($conn, $_POST['sex']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$i_spec = mysqli_real_escape_string($conn, $_POST['i_spec']);
$i_quote = mysqli_real_escape_string($conn, $_POST['i_quote']);
$success = "You are logged in";
    

//    //Error handlers  
//ensure that form fields are filled properly
    if(empty($sex) || empty($country)) {
       array_push($errors,  "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>sex & country required</h3></div>");       
    }
    if(strlen($i_number) < 11 || strlen($i_number) > 11) {
        array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Specified mobile number is invalid</h3></div>");
    }
    if(strlen($i_quote) < 8) {
        array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops!. qoute is too short</h3></div>");
    }
    if(strlen($i_spec) < 8) {
        array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>full description of specialization is needed</h3></div>");
    }
    if(strlen($i_first) < 3) {
       array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>firstname must be up to 3 characters</h3></div>");
    }
    if(strlen($i_last) < 3) {
       array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>lastname must be up to 3 characters</h3></div>"); 
    }
     if(!filter_var($i_email, FILTER_VALIDATE_EMAIL)) {
       array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>email is invalid</h3></div>"); 
    }
     if(strlen($i_uname) < 3) {
       array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>username must be up to 3 characters</h3></div>"); 
    }
     if((strlen($i_pwd) < 6) || (strlen($ci_pwd) < 6)) {
       array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>password must be up to 6 characters</h3></div>"); 
    }
     if($i_pwd != $ci_pwd) {
       array_push($errors,  "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>password mismatch</h3></div>"); 
    }
    
if($check !== false) {        
// Check file size
if ($_FILES["userphoto"]["size"] > 1000000) {
    array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Sorry, your file is too large.</h3></div>"); 
} else {        // Check if file already exists
          $sql = "SELECT * FROM instructortable WHERE i_profilephoto = '$path'";
          $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0){
                array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>image already exists.</h3></div>");
            }
 }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
    array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Sorry, only JPG, PNG & GIF files are allowed.</h3></div>"); 
}
} else {
    array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>No file selected/file is not an image.</h3></div>");
    }
    
    //if there are no errors, save user to database
    if(count($errors) == 0) {
        
                 $sql = "SELECT * FROM instructortable WHERE instructor_uid = '$i_uname' OR instructor_email = '$i_email'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0) {
                  array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>User already exist</h3></div>");          
                } else {
        $i_pwd = md5($i_pwd);
        $sql = "INSERT INTO instructortable (instructor_first, instructor_last, sex, instructor_email, i_number, instructor_uid, country, instructor_specialization, i_quote, i_profilephoto, instructor_pwd) VALUES ('$i_first','$i_last', '$sex', '$i_email', '$i_number', '$i_uname', '$country', '$i_spec', '$i_quote', '$path', '$i_pwd')";
        mysqli_query($conn, $sql);
        move_uploaded_file($_FILES["i_photo"]["tmp_name"], $path);
        array_push($errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-right: 5px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px; background-color: #dff0d8'><span style='color:#468847;'>Thanks, Your post was published successfully</sup></span></div>");
                    $_SESSION['instructor_uid'] = $i_uname;
                    $_SESSION['instructor_first'] = $i_first;
                    $_SESSION['instructor_last'] = $i_last;
                    $_SESSION['instructor_email'] = $i_email;
                    $_SESSION['country'] = $country;
                    $_SESSION['instructor_photo'] = $path;
                    $_SESSION['success'] = $success;
                    header("Refresh:2; url=instructor-dashboard.php?my=my");
    }
}
    
}
?>