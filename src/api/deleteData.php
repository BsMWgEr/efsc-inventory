<?php
require_once 'auth.php';
require 'SQLOp.php';
require 'validators.php';

checkAccess(['superAdmin', 'admin']);

$errorCount = 0;

$deleteOp = new deleteOp(); // instantiating deleteOp class
$table_name = $_POST['tableDelete'];
$p_id = $_POST['pValue'];
if($errorCount == 0) {
    $deleteOp -> connect();
    $deleteOp -> set_table_delete($table_name, $p_id);
    $deleteOp -> delete_row();
}