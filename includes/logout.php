<?php

if(isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    unset($_SESSION['success']);
    header("Location:../index.php?ho=ho");
}

?>