<?php
function listAllCategory(){
    $view = "categories/list";
    $title = "Danh sách danh mục";
    $script = "datatables";
    $script2 = "categories/script";
    $categories = listAll('categories');

    require_once PATH_VIEW_ADMIN."layout/master.php";
}

function validateCategory($data){
    $errors = [];
    // validateCategory name
    if (empty($data['name'])) {
        $errors[] = "Vui lòng nhập tên của bạn";
    }else if(strlen($data['name'])<8 || strlen($data['name'])>40){
        $errors[] = "Độ dài tên phải lớn hơn 8 ký tự và nhỏ hơn 40 ký tự";
    }

    return $errors; 

}

function categoryCreate(){
    $view = "categories/create";
    $title = "Thêm mới người dùng";

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'],
        ];

        $errors = validateCategory($data);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            // header('location: '.BASE_URL_ADMIN.'?act=categories-create');
        }else{
            insert('categories',$data);
            // header('location: '.BASE_URL_ADMIN.'?act=categories');
        }
    }

    require_once PATH_VIEW_ADMIN."layout/master.php";
}

function categoryUpdate($id){
    $view = "categories/update";
    $title = "Cập nhật người dùng";
    $categorie = listOne('categories', $id);

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'],
        ];

        $errors = validate($data);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        }else{
            update('categories', $id, $data);
            // header('location: '.BASE_URL_ADMIN.'?act=categories');
        }
    }

    require_once PATH_VIEW_ADMIN."layout/master.php";
}

function categoryDelete($id){
    Delete('categories', $id);
    header('location: '. BASE_URL_ADMIN.'?act=categories');
}


?>