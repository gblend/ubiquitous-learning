<?php
if(isset($loin_errors) && ($loin_errors > 0)) { 
    foreach($loin_errors as $error) {
echo $error;
}
} ?>