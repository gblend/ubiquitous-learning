<?php
if(isset($enroll_msg) && ($enroll_msg > 0)) {
    foreach($enroll_msg as $error) { 
    echo $error; 
}
} ?>