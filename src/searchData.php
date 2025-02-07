<?php

require 'SQLOp.php';
require 'validators.php';

$errorCount = 0;

$searchObject = new SearchBarcodes(); // instantiating deleteOp class

$searchKey = $_POST['searchKey'];
if($errorCount == 0) {
    $searchObject -> connect();
    $searchObject -> search_barcode($searchKey);

}