<?php
if(isset($dashboard_errors) && ($dashboard_errors > 0)) { 
    foreach($dashboard_errors as $error) {
echo $error;
}
} ?>
