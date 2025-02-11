<?php
require_once 'auth.php';
require 'SQLOp.php';
require 'mixins/validators.php';

checkAccess(['superAdmin', 'admin', 'staff']);

$errorCount = 0;

$insertOP = new Create(); // instantiating deleteOp class
$table_name = $_POST['tableSelect'];

if($errorCount == 0) {
    $insertOP -> connect();
    $insertOP -> set_data($_POST);
    $response = json_encode(["success" => false, "message" => "Something went wrong. Request did not succeed"]);
    if ($table_name == "accessories") {
        $response = $insertOP -> insert_accessory();
    } else if ($table_name == "keyboards") {
        $response = $insertOP -> insert_keyboard();
    } else if ($table_name == "mice") {
        $response = $insertOP -> insert_mouse();
    } else if ($table_name == "monitors") {
        $response = $insertOP -> insert_monitor();
    } else if ($table_name == "graphicscards") {
        $response = $insertOP -> insert_gpu();
    } else if ($table_name == "ramsticks") {
        $response = $insertOP -> insert_ram();
    } else if ($table_name == "motherboards") {
        $response = $insertOP -> insert_motherboard();
    } else if ($table_name == "powersupplies") {
        $response = $insertOP -> insert_psu();
    }

    echo $response;
}