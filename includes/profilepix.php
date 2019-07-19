<?php 
$username = $_SESSION['user_uid'];
$profilepixerrors = array();
$file_dir1 = $path1 = $check = $uploadOk = $imageFileType = $profilepixerrors = "";

if(isset($_POST["profilepix-btn"])) {
    
$username = $_SESSION['user_uid'];
//$file_dir = "../images/ProfilepixUpload/";
$file_dir1 = "images/ProfilepixUpload/";
//$path = $file_dir . basename($_FILES["userphoto"]["name"]);
$path1 = $file_dir1 . basename($_FILES["userphoto"]["name"]);
$check = ($_FILES["userphoto"]["size"]);
$uploadOk = 1;
$imageFileType = pathinfo($path1, PATHINFO_EXTENSION);
$profilepixerrors = array();
    
    //check if is a real image
if($check !== false) {        
// Check file size
if ($_FILES["userphoto"]["size"] > 1000000) {
     array_push($profilepixerrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Sorry, your file is too large.</h3></div>");
    $uploadOk = 0;
} 
    
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif") {
    array_push($profilepixerrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Only JPG, PNG & GIF files allowed.</h3></div>");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
array_push($profilepixerrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>your file was not uploaded.</h3></div>");
    $uploadOk = 0;
} 
    
        $sql = "SELECT * FROM users WHERE profilephoto = '$path1'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
        array_push($profilepixerrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>image already exists.</h3></div>");
        $uploadOk = 0;
        }

    if (!$profilepixerrors) {
        $sql = "UPDATE users SET profilephoto = '$path1' WHERE user_uid = '$username'";
        $query = mysqli_query($conn, $sql);
        if($query) {
             $uploadOk = 1;
            $_SESSION['user_photo'] = $path1;
            move_uploaded_file($_FILES["userphoto"]["tmp_name"], $path1);
            array_push($profilepixerrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-right: 5px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px; background-color: #dff0d8'><span style='color:#468847;'><span style='color:#167ac6'>profile photo uploaded successfully<sup>&nabla;</sup></span></sup></span></div>");
        } else {
            array_push($profilepixerrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops! profile photo ulpoad failed</h3></div>");
        }
}

}
     } else {
    $file_dir1 = $path1 = $check = $uploadOk = $imageFileType = $profilepixerrors = "";
}
?>