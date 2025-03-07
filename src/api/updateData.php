<?php
require_once 'auth.php';
require 'SQLOp.php';

checkAccess(['superAdmin', 'admin', 'staff']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_name = $_POST["tableUpdate"];

    $updateOP = new Update();
    $updateOP -> connect();
    $columns = $updateOP -> get_column_names($table_name);
    $cleaned_data = [];
    // Form field names must match database column names
    foreach($_POST as $key => $value) {
        $value = trim($value);
        if ($key == "p_id") {
            $cleaned_data += [$columns[0] => $value];
        }
        if(in_array($key, $columns)) {
            $cleaned_data += [$key => $value];
        }
    }
    $response = $updateOP -> update_item($_POST['tableUpdate'], $columns[0], $cleaned_data);
    echo $response;
}