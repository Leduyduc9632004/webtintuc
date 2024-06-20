<?php
function getAllUser(){
    $sql = "SELECT * FROM users";

    $stmt = $GLOBALS["conn"]-> prepare($sql);
    $stmt-> execute();
    return $stmt-> fetchAll();
}
?>