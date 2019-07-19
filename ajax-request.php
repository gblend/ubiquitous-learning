<?php

if(isset($_GET['delete_item'])) {
    $item_id = $_GET['delete_item'];
    $array = [];
    
    //  qqueyroeir
    
//    if(sjdflksdf) {
//        return true;
//    } else {
//        return false;
//    }
    
    $array['success_all'] = true;
    $array['message'] = 'it is true';
    
    
    echo json_encode($array);
}