<?php
session_start();
// require file trong commons
require "../commons/env.php";
require "../commons/helper.php";
require "../commons/connect-db.php";
require "../commons/model.php";
// require file trong controllers and models
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);
// điều hướng

$act = $_GET["act"] ?? "/"; 

match ($act) {
    '/' => dashboard(),
    'users' => listAllUser(),
    'users-detail' => showOneUser($_GET['id']),
    'users-create' => userCreate(),
    'users-update' => userUpdate($_GET['id']),
    'users-delete' => userDelete($_GET['id']),
};




require "../commons/disconnect-db.php";
?>