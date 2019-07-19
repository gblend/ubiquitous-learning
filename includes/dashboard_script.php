<?php

$dashboard_name = "";
 $dashboard_email = "";
 $dashboard_pwd = "";
$dashboard_errors = array();


//if the submit button is clicked
if(isset($_POST['dashboard_submit'])) {
    
    $dashboard_name = mysqli_real_escape_string($conn, $_POST['dashboard_name']);
    $dashboard_email = mysqli_real_escape_string($conn, $_POST['dashboard_email']);
    $dashboard_pwd = mysqli_real_escape_string($conn, $_POST['dashboard_pwd']);
    $dashboard_pwd = ucfirst($dashboard_pwd);
    $dashboard_email = ucfirst($dashboard_email);
    $dashboard_name = ucfirst($dashboard_name);

//    //Error handlers  
//ensure that form fields are filled properly
    if(strlen($dashboard_name) < 4) {
       array_push($dashboard_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>username must be above 3 characters</h3></div>");
    }
     if(!filter_var($dashboard_email, FILTER_VALIDATE_EMAIL)) {
       array_push($dashboard_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>email is invalid</h3></div>"); 
    }
     if((strlen($dashboard_pwd) < 6)) {
       array_push($dashboard_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>password must be up to 6 characters </h3></div>"); 
    }
//    if there are no errors, save user to database
    if(count($dashboard_errors) == 0) {
        
                $sql = "SELECT * FROM dashboard WHERE dashboard_uid = '$dashboard_name' OR dashboard_email = '$dashboard_email'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0) {
                  array_push($dashboard_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px;background-color:#F2DEDE'><h3 style='color: #A84341; margin-top:3px'>Access denied<sup>&nabla;</sup></h3></div>");
                } else {
        
        $dashboard_pwd = md5($dashboard_pwd);
        $sql = "INSERT INTO dashboard (dashboard_uid, dashboard_email, dashboard_pwd) VALUES('$dashboard_name', '$dashboard_email', '$dashboard_pwd');";
        mysqli_query($conn, $sql);
        array_push($dashboard_errors, "<div style='border:1px solid #D3D3D3; padding-top: 6px; margin-right: 5px; margin-bottom:10px; height:40px; width:100%; text-align:center; border-radius:5px; background-color: #dff0d8'><span style='color:#468847;'><span style='color:#167ac6'>Access granted<sup>&nabla;</sup></span></sup></span></div>");
                    
    }
}
    }
?>