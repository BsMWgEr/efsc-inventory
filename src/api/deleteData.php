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
$deleteOp -> connect();
$response = $deleteOp -> delete_row($table_name, $p_id, $column_name);
//echo $response;
