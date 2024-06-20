<?php 

function homeindex(){
    $users = getAllUser();
    require_once PATH_VIEW.'home.php';
}