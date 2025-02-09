<?php
// Created by Aaron C. 10/08/2024

require 'wLInventory.php';

// Class insertOp is used to add rows into existing table
require 'classes/Create.php';
// Class queryOp is used to view a table in its entirety.
require 'classes/Read.php';
// Class updateOp to update an existing table
require 'classes/Update.php';
//
require 'classes/Delete.php';
//
require 'classes/Search.php';
//
require 'classes/Users.php';
require 'classes/UserDelete.php';
require 'classes/UserQuery.php';

abstract Class SQLOp {
    // super class variables
    protected $statement;
    Protected $tableName;
    Protected $SQLstring;
    Protected $conn;
    protected $database;

    public function __construct(){
            $this -> database = new Database();
    }
    public function connect(){
        $this -> conn = null;
        try{
            $this -> conn = $this -> database -> getConnection();
            //echo "Database connection successful. <br>";
        }
        catch(PDOException $e){
           die("Connection failed" . $e->getMessage());
        }
    }
    public function DB_close(){
        $this -> database -> closeDB();
    }
}

class pcSetUp extends SQLOp{
    public function add_row(...$values){
        // start of function statements
        //$bindValues = [$p_ID_value, $mobo_ID_value, $gpu_ID_Value, $ram_ID_value, $psu_ID_value, $monitor_ID_value, $acc_ID_value, $kb_ID_value,
                //$mouse_ID_value, $PCcondition_value];
        try{
           $this -> statement = $this -> conn -> prepare("INSERT INTO pcsetups (pc_id, mobo_id, gpu_id, ram_id, psu_id, monitor_id, acc_id, kb_id, mouse_id, tableLocation, PCcondition)
            VALUES (:val1, :val2, :val3, :val4, :val5, :val6, :val7, :val8, :val9, :val10, :val11)");

           for($i = 1; $i -1 <= count($values); $i++){
             $this -> statement -> bindParam("val$i",$values[$i - 1]);
           }

           if($this -> statement){
            echo "Statement prepared successfully <br>";
           }
           else {
            echo "Statement preparation failed.<br>";
            print_r($this -> conn->errorInfo());
           }

           // executing pcsetup statement for execution to the database
           if($this -> statement -> execute()){
            echo "Record inserted successfully.";
           }
           else{
            echo "Insertion not successful.";
           }
       }
       catch(PDOException $e){
           $error_message = $e->getMessage();
           echo json_encode(["failure" => true, "message" => $error_message]);
       }
    }// end of add_row function

    public function view_table(){
        try{
            $viewStatement = $this -> conn -> query("SELECT * FROM pcsetups");
            $data = $viewStatement -> fetchAll(PDO::FETCH_ASSOC);
            if($data){
                return $data;
            }
            else{
                return ['message' => 'No Data fetched'];
            }
        }
        catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);
        }
    }// end of view_table function

    public function update_row($columnNameValue, $pValue){
        $tableName = "pcsetups";
        $columnArray = [];
        $tableColumnName = array_keys($columnNameValue);
        $tableColumnValue = array_values($columnNameValue);
        $updateStmnt = update_string($tableName, $tableColumnName);
        $updateSqlStmnt = $this -> conn -> prepare($updateStmnt);
        if($updateSqlStmnt === false){
            die("SQL statement preparation failed: " . print_r($this -> conn-> errorInfo(), true));
        }
        for($i = 1; $i <= count($tableColumnName); $i++){
            $columnArray [] = ":columnValue$i";
        };
        $combineColumnArray = array_combine($columnArray, $tableColumnValue);
        foreach ($combineColumnArray as $colName => $colValue){
            $updateSqlStmnt -> bindParam($colName, $colValue);
        }
        $updateSqlStmnt -> bindParam('pValue', $pValue);

        try{
            if($updateSqlStmnt -> execute()){
                echo "Update record successfully";
            }
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);

        }
    }// end of update_row function

    public function delete_row($deleteValue){
        $this -> statement = $this -> conn ->prepare("DELETE FROM pcsetups WHERE pc_id = id_value");

        if($this -> statement === false){
            die("SQL statement preparation failed: " . print_r($this -> conn-> errorInfo(), true));
        }
        $this -> statement -> bindParam(':id_value', $deleteValue);

        try{
            if($this -> statement -> execute()){
                echo "Row successfully deleted";
            }
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);
        }
    }//end of remove_row function
} // end of pcSetUp class
