<?php include'dbconnect.php';

$ri_pwd = $ric_pwd = $ri_email = $i_uid = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
    $ri_pwd = mysqli_real_escape_string($conn, $_POST['ri_pwd']);
    $i_uid = mysqli_real_escape_string($conn, $_POST['i_uid']);
    $ric_pwd = mysqli_real_escape_string($conn, $_POST['ric_pwd']);
        $ri_email = filter_var(trim($_POST["ri_email"]), FILTER_SANITIZE_EMAIL);

        // Check that data was sent to the mailer.
        if (!filter_var($ri_email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! invalid email. Please complete the form and try again.";
            exit;
        } elseif ($ri_pwd !== $ric_pwd){
            http_response_code(400);
            echo "Oops! Password mismatch. Please complete the form and try again.";
            exit;          
        } else {
                $sql = "SELECT * FROM instructortable WHERE instructor_email = '$ri_email' AND instructor_uid = '$i_uid'";
                $query = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) == 0) {
            http_response_code(500);
            echo "Oops! user doesn't exist.";                    
            } else {
              $ri_pwd = md5($ri_pwd);
              $sql = "UPDATE instructortable SET instructor_pwd = '$ri_pwd' WHERE instructor_email = '$ri_email'";
              $query = mysqli_query($conn, $sql);
            if ($query == true) {
                 //Successfully saved
            http_response_code(200);
            echo "Password Reset Successful.";
            } elseif ($result == false) {
                 //Failed to save
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't reset your password.";
            } 
        }
        }
} else {
            http_response_code(403);
        echo "There was a problem with your submission, please try again.";
}
?>



