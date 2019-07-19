<?php
if(isset($_GET['u_id'])) {
    $u_id = $_GET['u_id'];
        $sqluser = "DELETE FROM users WHERE user_id = '$u_id'";
    $queryuser = $conn->query($sqluser);
}
if(isset($_GET['i_id'])) {
    $i_id = $_GET['i_id'];
        $sqluser = "DELETE FROM instructortable WHERE instructor_id = '$i_id'";
    $queryuser = $conn->query($sqluser);
}
if(isset($_GET['c_id'])) {
    $course_id = $_GET['c_id'];
        $sqluser = "DELETE FROM coursecontents WHERE content_id = '$course_id'";
    $queryuser = $conn->query($sqluser);
}
if(isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
        $sqluser = "DELETE FROM blogpost WHERE poster_id = '$p_id'";
    $queryuser = $conn->query($sqluser);
}
if(isset($_GET['b_id'])) {
    $b_id = $_GET['b_id'];
        $sqluser = "DELETE FROM bookcontents WHERE book_id = '$b_id'";
    $queryuser = $conn->query($sqluser);
}if(isset($_GET['n_id'])) {
    $n_id = $_GET['n_id'];
        $sqluser = "DELETE FROM newsletteremail WHERE newsletter_id = '$n_id'";
    $queryuser = $conn->query($sqluser);
}