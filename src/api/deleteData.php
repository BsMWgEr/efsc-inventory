<?php
require_once 'auth.php';
require 'SQLOp.php';
require 'mixins/validators.php';

checkAccess(['superAdmin', 'admin']);

$errorCount = 0;

$deleteOp = new DeleteData(); // instantiating deleteOp class
$table_name = $_POST['tableDelete'];
$column_name = find_ID($_POST["tableDelete"]);
$p_id = $_POST['pValue'];
if($errorCount == 0) {
    $deleteOp -> connect();
    $deleteOp -> set_table_delete($table_name, $p_id, $column_name);
    $response = $deleteOp -> delete_row();
    echo $response;
}