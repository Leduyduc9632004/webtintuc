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

    // CRUD users
    'users' => listAllUser(),
    'users-detail' => showOneUser($_GET['id']),
    'users-create' => userCreate(),
    'users-update' => userUpdate($_GET['id']),
    'users-delete' => userDelete($_GET['id']),

    // CRUD categories
    'categories' => listAllCategory(),
    'categories-create' => categoryCreate(),
    'categories-update' => categoryUpdate($_GET['id']),
    'categories-delete' => categoryDelete($_GET['id']),

    // CRUD tags    
    'tags' => listAllTag(), 
    'tags-create' => tagCreate(),
    'tags-update' => tagUpdate($_GET['id']),
    'tags-delete' => tagDelete($_GET['id']),
};




require "../commons/disconnect-db.php";
?>