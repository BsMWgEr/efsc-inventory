<?php
// Created by Aaron C. 10/08/2024
// database.local is for local development
// database.php is for production

// comment/uncomment for proper environment
if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1' && $_SERVER['REMOTE_ADDR'] != '::1' && $_SERVER['REMOTE_ADDR'] != 'localhost') {
    require 'classes/database/DatabaseProduction.php';
    $db = 'DatabaseProduction.php';
} else {
    require 'classes/database/DatabaseDevelopment.php';
    $db = 'DatabaseDevelopment.php';
}

   $sSQLS = "selectSQLString.php";
   $sOP = 'SQLOp.php';
   $wordList = ["p_id", "name", "condition", "cost", "location", "type", "size", "addMonitorSize", "speed", "wattage", "modular", "addMotherboardSize"];
   $tableList = ["keyboards", "table"];
   $description_k = ["key board ID", "computer ID", "key board name", "Condition of part", "Keyboard cost",
                     "Keyboard location", "input for table name"];
   $tableNames = ["accessories", "mice", "monitors", "motherboards", "powersupplies", "ramsticks", "keyboards", "graphicscards"];


 if (!function_exists('find_ID')) {
   function find_ID($table_name) {
       $idArray = [
         "accessories" => "acc_id",
         "graphicscards" => "gpu_id",
         "keyboards" => "kb_id",
         "mice" => "mouse_id",
         "monitors" => "monitor_id",
         "motherboards" => "mobo_id",
         "pcsetups" => "pc_id",
         "powersupplies" => "psu_id",
         "ramsticks" => "ram_id"
                     ];
          return $idArray[$table_name];
      }
}