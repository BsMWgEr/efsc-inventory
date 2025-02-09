<?php
require_once 'auth.php';
require 'SQLOp.php';

checkAccess(['superAdmin', 'admin', 'staff']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_name = $_POST["tableUpdate"];

    $updateOP = new Update();
    $updateOP -> connect();
    $updateOP -> set_data($_POST);

    if ($table_name == "accessories") {
        $updateOP -> update_accessory();
    } else if ($table_name == "keyboards") {
        $updateOP -> update_keyboard();
    } else if ($table_name == "mice") {
        $updateOP -> update_mouse();
    } else if ($table_name == "monitors") {
        $updateOP -> update_monitor();
    } else if ($table_name == "graphicscards") {
        $updateOP -> update_gpu();
    } else if ($table_name == "ramsticks") {
        $updateOP -> update_ram();
    } else if ($table_name == "motherboards") {
        $updateOP -> update_motherboard();
    } else if ($table_name == "powersupplies") {
        $updateOP -> update_psu();
    }

}