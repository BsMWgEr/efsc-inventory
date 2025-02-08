<?php
require_once 'auth.php';
require 'SQLOp.php';
require 'validators.php';

checkAccess(['superAdmin', 'admin', 'staff']);

$errorCount = 0;

$insertOP = new insertOp(); // instantiating deleteOp class
$table_name = $_POST['tableSelect'];

if($errorCount == 0) {
    $insertOP -> connect();
    $insertOP -> set_data($_POST);
    if ($table_name == "accessories") {
        $insertOP -> insert_accessory();
    } else if ($table_name == "keyboards") {
        $insertOP -> insert_keyboard();
    } else if ($table_name == "mice") {
        $insertOP -> insert_mouse();
    } else if ($table_name == "monitors") {
        $insertOP -> insert_monitor();
    } else if ($table_name == "graphicscards") {
        $insertOP -> insert_gpu();
    } else if ($table_name == "ramsticks") {
        $insertOP -> insert_ram();
    } else if ($table_name == "motherboards") {
        $insertOP -> insert_motherboard();
    } else if ($table_name == "powersupplies") {
        $insertOP -> insert_psu();
    }
}