<?php include'dbconnect.php';

$u_pwd = $cu_pwd = $u_email = $u_uid = "";

//if(isset($_POST['ureset'])) {
//    $u_pwd = mysqli_real_escape_string($conn, $_POST['u_pwd']);
//    $cu_pwd = mysqli_real_escape_string($conn, $_POST['cu_pwd']);
//    $u_email = mysqli_real_escape_string($conn, $_POST['u_email']);
//    
//    if(strlen($u_pwd) < 6 || strlen($cu_pwd) < 6 ){
//      http_response_code(400);
//      echo "Oops! Password must be up to 6 characters. Please complete the form and try again.";
//            exit;
//    }
//    if($u_pwd !== $cu_pwd) {
//        http_response_code(400);
//        echo "Oops! Password mismatch. Please complete the form and try again.";
//            exit;
//    }
//    if(!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
//        http_response_code(400);
//        echo "Oops! email is invalid. Please complete the form and try again.";
//            exit;      
//    }
//    $sql = "SELECT * FROM users WHERE user_email = '$u_email'";
//    $query = mysqli_query($conn, $sql);
//    if(mysqli_num_rows($query) == 0) {
//            http_response_code(500);
//            echo "Oops! email doesn't exist.";
//    } else {
//        $u_pwd = md5($u_pwd);
//        $sql = "UPDATE users SET user_pwd = '$u_pwd' WHERE user_email = '$u_email'";
//        $query = mysqli_query($sql);
//        if($query) {
//            http_response_code(200);
//            echo "Password Reset Successful.";
//        } else {
//         http_response_code(403);
//        echo "There was a problem with your submission, please try again.";
//        }
//    }
//}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
    $u_pwd = mysqli_real_escape_string($conn, $_POST['u_pwd']);
     $u_uid = mysqli_real_escape_string($conn, $_POST['u_uid']);
    $cu_pwd = mysqli_real_escape_string($conn, $_POST['cu_pwd']);
    $u_email = filter_var(trim($_POST["u_email"]), FILTER_SANITIZE_EMAIL);

        // Check that data was sent to the mailer.
        if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! invalid email. Please complete the form and try again.";
            exit;
        } elseif ($u_pwd !== $cu_pwd){
            http_response_code(400);
            echo "Oops! Password mismatch. Please complete the form and try again.";
            exit;          
        } else {
                $sql = "SELECT * FROM users WHERE user_email = '$u_email' AND user_uid = '$u_uid'";
                $query = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) == 0) {
            http_response_code(500);
            echo "Oops! email doesn't exist.";                    
            } else {
              $u_pwd = md5($u_pwd);
              $sql = "UPDATE users SET user_pwd = '$u_pwd' WHERE user_email = '$u_email'";
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



