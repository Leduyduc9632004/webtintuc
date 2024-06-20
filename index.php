<?php
// require file trong commons
require "commons/env.php";
require "commons/helper.php";
require "commons/connect-db.php";
require "commons/CRUD-db.php";
// require file trong controllers and models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);
// điều hướng

$act = $_GET["act"] ?? "/"; 

match ($act) {
    '/' => homeindex(),
    'dssp' => "Đây là dssp",
};




require "commons/disconnect-db.php";
?>