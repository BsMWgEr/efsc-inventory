<?php
require_once 'auth.php';
require 'SQLOp.php';

checkAccess(['superAdmin', 'admin', 'staff']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_name = $_POST["tableUpdate"];

    $updateOP = new Update();
    $updateOP -> connect();
    $columns = $updateOP -> get_column_names($table_name);
    $clean_data = [];
    // Form field names must match database column names
    foreach($_POST as $key => $value) {
        $value = trim($value);
        if (in_array($key, $columns)) {
           $clean_data += [$key => $value];
        }
    }
    $response = $updateOP -> update_item($_POST['tableUpdate'], $columns[0], $clean_data);
    echo $response;

}