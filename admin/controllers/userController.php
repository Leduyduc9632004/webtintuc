<?php
function listAllUser(){
    $view = "users/list";
    $title = "Danh sách người dùng";
    $script = "datatables";
    $script2 = "users/script";
    $users = listAll('users');

    require_once PATH_VIEW_ADMIN."layout/master.php";
}

function showOneUser($id){


    $user = listOne('users', $id);
    $view = "users/detail";
    $title = "Chi tiết người dùng". $user['name'];

    require_once PATH_VIEW_ADMIN."layout/master.php";
}

function validate($data){
    $errors = [];
    // validate name
    if (empty($data['name'])) {
        $errors[] = "Vui lòng nhập tên của bạn";
    }else if(strlen($data['name'])<8 || strlen($data['name'])>40){
        $errors[] = "Độ dài tên phải lớn hơn 8 ký tự và nhỏ hơn 40 ký tự";
    }

    // validate email
    if (empty($data['email'])) {
        $errors[] = "Vui lòng nhập email của bạn";
    }else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = "Email không đúng định dạng";
    }

    // validate password
    if (empty($data['password'])) {
        $errors[] = "Vui lòng nhập mật khẩu của bạn";
    }else if(strlen($data['password'])<8 || strlen($data['password'])>20){
        $errors[] = "Độ dài mật khẩu phải lớn hơn 8 ký tự và nhỏ hơn 16 ký tự, có ký tự chữ hoa, chữ thường và số";
    }

    return $errors; 

}

function userCreate(){
    $view = "users/create";
    $title = "Thêm mới người dùng";

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "role" => $_POST['role'],
        ];

        $errors = validate($data);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            // header('location: '.BASE_URL_ADMIN.'?act=users-create');
        }else{
            insert('users',$data);
            // header('location: '.BASE_URL_ADMIN.'?act=users');
        }
    }

    require_once PATH_VIEW_ADMIN."layout/master.php";
}

function userUpdate($id){
    $view = "users/update";
    $title = "Cập nhật người dùng";
    $user = listOne('users', $id);

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "role" => $_POST['role'],
        ];

        $errors = validate($data);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        }else{
            update('users', $id, $data);
            // header('location: '.BASE_URL_ADMIN.'?act=users');
        }
    }

    require_once PATH_VIEW_ADMIN."layout/master.php";
}

function userDelete($id){
    Delete('users', $id);
    header('location: '. BASE_URL_ADMIN.'?act=users');
}


?>