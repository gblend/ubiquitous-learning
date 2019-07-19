<?php

if(isset($ierrors) && ($ierrors > 0)) { 
    foreach($ierrors as $error) {
        echo $error;
    }
} ?>

