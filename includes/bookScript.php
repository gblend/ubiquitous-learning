<?php
include'includes/dbconnect.php';
$instructor_uid = '';
if(isset($_SESSION['instructor_uid'])) {
   $instructor_uid = $_SESSION['instructor_uid']; 
}
$book_title = $book_description = $book_author = $path1 = "";
$bookErrors = array();

if(isset($_POST['upload_book'])) {
    
$book_title = ucwords(mysqli_real_escape_string($conn, $_POST['book_title']));
$book_description = mysqli_real_escape_string($conn, $_POST['book_description']);
$book_author = mysqli_real_escape_string($conn, $_POST['book_author']);
$file_dir = "Books/BooksUpload/";
$book_file = $_FILES["book"]["name"];
$book_tmp_name = $_FILES["book"]["tmp_name"];
$path = $file_dir . basename($book_file);
$check = $_FILES["book"]["size"];
$bookFileType = pathinfo($path, PATHINFO_EXTENSION);
$file_dirbook = "images/Bookcovers/";
$bookpath = $file_dirbook . basename($_FILES["bookcover"]["name"]);
$checkcover = ($_FILES["bookcover"]["size"]);
$imageFileTypeBook = pathinfo($bookpath, PATHINFO_EXTENSION);
    //check if length of title is short and description
    if(strlen($book_title) < 3) {
       array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Book title is too short</h3></div>");
    }
    if(strlen($book_description) < 10 ){
        array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>book description too short</h3></div>");
    }
if($check !== false) {        
        // Check if file already exists in database
    $sql = "SELECT * FROM bookcontents WHERE book_path = '$path'";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
    array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops!. book already exists.</h3></div>");
    }
} else {
    array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops!. no book selected/file invalid.</h3></div>");
    }
// Check file size
if ($check > 10000000) {
     array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Sorry, your file is too large.</h3></div>");
}
// Allow certain file formats
if($bookFileType !== "pdf") {
   array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Sorry, only PDF files are allowed.</h3></div>");
}
    
if($checkcover !== false) {        
// Check file size
        // Check if file already exists
          $sql = "SELECT * bookcontents WHERE bookcover = '$bookpath'";
          $query = mysqli_query($conn, $sql);
            if($query){
                array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>book cover already exists.</h3></div>");
            }
}else {
     array_push($bookErrors,  "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>No file selected/file is not an image.</h3></div>");
                 
 }
if ($_FILES["bookcover"]["size"] > 1000000) {
    array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Sorry, your file is too large. </h3></div>"); 
}
// Allow certain file formats
if($imageFileTypeBook != "jpg" && $imageFileTypeBook != "png" && $imageFileTypeBook != "gif") {
    array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Sorry, only JPG, PNG & GIF files are allowed.</h3></div>"); 
} 

    
    if(!$bookErrors){
        $sql1 = "INSERT INTO bookcontents (book_title, book_description, book_author, book_path, bookcover, instructor_uid, date_modified, date_created) VALUES ('$book_title', '$book_description', '$book_author', '$path', '$bookpath', '$instructor_uid', '".date('d/m/y')."', '".date('d/m/y')."')";
        $query1 = mysqli_query($conn, $sql1);
        if($query1) {
            move_uploaded_file($book_tmp_name, $path);
            move_uploaded_file($_FILES["bookcover"]["tmp_name"], $bookpath);
            array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-right: 5px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px; background-color: #dff0d8'><span style='color:#468847;'>Book upload successful</span></div>");

        } else {
            array_push($bookErrors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Oops!, book upload failed</h3></div>");
            exit();
        }
    }
}

?>