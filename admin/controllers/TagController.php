<?php
function listAllTag(){
    $view = "tags/list";
    $title = "Danh sách tags";
    $script = "datatables";
    $script2 = "tags/script";
    $tags = listAll('tags');

    require_once PATH_VIEW_ADMIN."layout/master.php";
}

function validateTag($data){
    $errors = [];
    // validateTag name
    if (empty($data['name'])) {
        $errors[] = "Vui lòng nhập tên của bạn";
    }else if(strlen($data['name'])<8 || strlen($data['name'])>40){
        $errors[] = "Độ dài tên phải lớn hơn 8 ký tự và nhỏ hơn 40 ký tự";
    }

    return $errors; 

}

function tagCreate(){
    $view = "tags/create";
    $title = "Thêm mới người dùng";

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'],   
        ];

        $errors = validateTag($data);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            // header('location: '.BASE_URL_ADMIN.'?act=tags-create');
        }else{
            insert('tags',$data);
            // header('location: '.BASE_URL_ADMIN.'?act=tags');
        }
    }

    require_once PATH_VIEW_ADMIN."layout/master.php";
}

function tagUpdate($id){
    $view = "tags/update";
    $title = "Cập nhật người dùng";
    $tag = listOne('tags', $id);

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'],
        ];

        $errors = validate($data);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        }else{
            update('tags', $id, $data);
            // header('location: '.BASE_URL_ADMIN.'?act=tags');
        }
    }

    require_once PATH_VIEW_ADMIN."layout/master.php";
}

function tagDelete($id){
    Delete('tags', $id);
    header('location: '. BASE_URL_ADMIN.'?act=tags');
}


?>