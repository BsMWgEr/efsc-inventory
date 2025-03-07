<?php
require_once 'auth.php';
require 'SQLOp.php';
require 'mixins/validators.php';

checkAccess(['superAdmin', 'admin', 'staff']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertOP = new Create(); // instantiating deleteOp class
    $table_name = $_POST['tableSelect'];
    $cleaned_data = [];
    $insertOP -> connect();
    $columns = $insertOP -> get_column_names($table_name);
    foreach($_POST as $key => $value) {
        $value = trim($value);
        if ($key == "p_id") {
            $cleaned_data += [$columns[0] => $value];
        }
        if(in_array($key, $columns)) {
            $cleaned_data += [$key => $value];
        }
    }
    $response = $insertOP -> insert_item($table_name, $cleaned_data);
    echo $response;
}

