<?php 
function get_str_keys($data){
    return implode(',', array_keys($data));
}

function get_virtual_params($data){
    $keys = array_keys($data);
    $tmp = [];
    foreach ($keys as $key) {
            $tmp[] = ":$key";
    }

    return implode(',', $tmp);
}

function get_set_params($data){
    $keys = array_keys($data);
    $tmp = [];
    foreach ($keys as $key) {
            $tmp[] = "$key = :$key";
    }
    return implode(',', $tmp);
}

//  Hàm insert

if (!function_exists('insert')) {
    function insert($tableName, $data=[]){
        try {
            $strKey = get_str_keys($data);
            $strVirtualParam = get_virtual_params($data);
            $sql = "INSERT INTO $tableName($strKey) VALUES ($strVirtualParam)";
            $stmt = $GLOBALS['conn'] -> prepare($sql);
            foreach ($data as $fieldName => &$value) {
                $stmt -> bindParam(":$fieldName", $value);
            }
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Hàm update

if (!function_exists('update')) {
    function update($tableName,$id, $data=[]){
        try {
            $strKey = get_str_keys($data);
            $setParams = get_set_params($data);
            $sql = "UPDATE $tableName SET $setParams where id = :id";
            $stmt = $GLOBALS['conn'] -> prepare($sql);
            foreach ($data as $fieldName => &$value) {
                $stmt -> bindParam(":$fieldName", $value);
            }
            $stmt -> bindParam(":id", $id);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('delete')) {
    function delete($tableName,$id){
        try {
            $sql = "DELETE FROM $tableName where id = :id";
            $stmt = $GLOBALS['conn'] -> prepare($sql);
            $stmt -> bindParam(":id", $id);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Hàm listAll


if (!function_exists('listAll')) {
    function listAll($tableName){
        try {
            $sql = "SELECT * FROM $tableName";
            $stmt = $GLOBALS['conn'] -> prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Hàm listOne

if (!function_exists('listOne')) {
    function listOne($tableName, $id){
        try {
            $sql = "SELECT * FROM $tableName WHERE id = :id LIMIT 1";
            $stmt = $GLOBALS['conn'] -> prepare($sql);
            $stmt -> bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}