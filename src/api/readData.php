<?php
require_once 'auth.php';
require 'SQLOp.php';

checkAccess(['superAdmin', 'admin', 'staff']);

$errorCount = 0;
$viewOp = new Read();// instantiating queryOp class
$table_name = $_POST['tableView'];

if($errorCount == 0) {
    $viewOp -> connect();
    $viewOp -> set_table_name($table_name);
    $checkTableName = $viewOp -> check_table_name();
    if ($checkTableName == false) {
        echo json_encode(["failure" => true, "message" => "Table does not exist"]);
    } else {
        $viewOp -> query_table();
        $response = $viewOp -> print_table();
        echo $response;
        }
    } else{
        echo json_encode(["failure" => true, "message" => "No form data recieved"]);
}






