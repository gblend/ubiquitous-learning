<?php
//Database connection
include'dbconnect.php';

$newsletter_email = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newsletter_email = mysqli_real_escape_string($conn, $_POST['newsletter_email']);
             
            if (!empty($newsletter_email)){
                if (!filter_var($newsletter_email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo "Enter valid email"; 
                    exit();
                } else {
                $sql = "SELECT * FROM newsletteremail WHERE user_email = '$newsletter_email'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0) {
            http_response_code(400);
            echo "Oops! Email already exist."; 
                    exit();
                } else {
                 $insert = "INSERT INTO newsletteremail (user_email) VALUES ('$newsletter_email')";
                 $query = mysqli_query($conn, $insert);
                 if ($query == true) {
            http_response_code(200);
            echo "Successfully Subscribed.";
                 } else {
             http_response_code(500);
            echo "Oops! subscription failed."; 
                 }
                } 
               
        } 
  } else {

        http_response_code(403);
        echo "Email is required.";
            }
}
?>
