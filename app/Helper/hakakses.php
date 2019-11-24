<?php
function check($permision,$role){
    $access = getMyPermision($role);
    foreach($permision as $key => $value){
        if($value ==  $access){
            return true;
        }
    }
}
function getMyPermision($id){
    switch ($id){
        case "admin":
            return "admin";
        break;
        case "supplier":
            return "supplier";
        break;
        case "member":
            return "member";
        break;
    }
}
?>