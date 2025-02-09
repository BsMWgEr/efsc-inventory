<?php
require_once 'auth.php';
require 'SQLOp.php';
require 'mixins/validators.php';

checkAccess(['superAdmin', 'admin', 'staff']);

$errorCount = 0;

$searchObject = new Search(); // instantiating deleteOp class

$searchKey = $_POST['searchKey'];
if($errorCount == 0) {
    $searchObject -> connect();
    $searchObject -> search_barcode($searchKey);

}