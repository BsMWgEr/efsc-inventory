<?php
require_once 'auth.php';
require 'SQLOp.php';
require 'validators.php';

checkAccess(['superAdmin', 'admin', 'staff']);

$errorCount = 0;

$searchObject = new SearchBarcodes(); // instantiating deleteOp class

$searchKey = $_POST['searchKey'];
if($errorCount == 0) {
    $searchObject -> connect();
    $searchObject -> search_barcode($searchKey);

}