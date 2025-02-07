<?php
// Created by Aaron C. 10/08/2024
require 'wLInventory.php';
require $db;
include $sSQLS;
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

 // Class insertOp is used to add rows into existing table
 Class insertOp extends SQLOp
 {
     // class variables
    protected $data;

     public function set_data($inputData)
     {
         $this -> data = $inputData;
     }

     public function insert_mouse() {

         $mouse_id = $this -> data['p_id'];
         $name = $this -> data['name'];
         $condition = $this -> data['condition'];
         $cost = $this -> data['cost'];
         $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO mice (mouse_id, name, `condition`, cost, location) VALUES (:mouse_id, :name, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':mouse_id', $mouse_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
         }
         else{
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
         }

     }

     public function insert_accessory()
     {
        $acc_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $type = $this -> data['type'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO accessories (acc_id, name, type, `condition`, cost, location) VALUES (:acc_id, :name, :type, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':acc_id', $acc_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':type', $type);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
         }
         else{
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
         }
     }

     public function insert_keyboard()
     {
         $kb_id = $this -> data['p_id'];
         $name = $this -> data['name'];
         $condition = $this -> data['condition'];
         $cost = $this -> data['cost'];
         $location = $this -> data['location'];

         $this -> SQLstring = "INSERT INTO keyboards (kb_id, name, `condition`, cost, location) VALUES (:kb_id, :name, :condition, :cost, :location)";
         $this -> statement = $this -> conn -> prepare($this -> SQLstring);
         $this -> statement -> bindParam(':kb_id', $kb_id);
         $this -> statement -> bindParam(':name', $name);
         $this -> statement -> bindParam(':condition', $condition);
         $this -> statement -> bindParam(':cost', $cost);
         $this -> statement -> bindParam(':location', $location);

         if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
         }
         else{
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
         }
     }

     public function insert_monitor()
     {
        $monitor_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];
        $monitorSize = $this -> data['addMonitorSize'];

        $this -> SQLstring = "INSERT INTO monitors (monitor_id, name, `condition`, cost, location, size) VALUES (:monitor_id, :name, :condition, :cost, :location, :size)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':monitor_id', $monitor_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);
        $this -> statement -> bindParam(':size', $monitorSize);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }
     }

     public function insert_motherboard()
     {
        $mobo_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $size = $this -> data['addMotherboardSize'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO motherboards (mobo_id, name, size, `condition`, cost, location) VALUES (:mobo_id, :name, :size, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':mobo_id', $mobo_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':size', $size);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }

     }

     public function insert_gpu()
     {
        $gpu_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO graphicscards (gpu_id, name, `condition`, cost, location) VALUES (:gpu_id, :name, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':gpu_id', $gpu_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }
     }

     public function insert_ram()
     {
        $ram_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $type = $this -> data['type'];
        $speed = $this -> data['speed'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO ramsticks (ram_id, name, type, speed, `condition`, cost, location) VALUES (:ram_id, :name, :type, :speed, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':ram_id', $ram_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':type', $type);
        $this -> statement -> bindParam(':speed', $speed);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if ($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }

     }

     public function insert_psu()
     {
        $psu_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $wattage = $this -> data['wattage'];
        $modular = $this -> data['modular'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO powersupplies (psu_id, name, wattage, modular, `condition`, cost, location) VALUES (:psu_id, :name, :wattage, :modular, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':psu_id', $psu_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':wattage', $wattage);
        $this -> statement -> bindParam(':modular', $modular);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }
     }

 }




// Class queryOp is used to view a table in its entirety.
class queryOp extends SQLOp {
    protected $tableName;
    private $stmt;

    protected array $tableNames_;

    // Set table name
    public function set_table_name(string $tableName) {
        $this->tableName = $tableName;
    }
    public function check_table_name()
    {
        $this->tableNames_ = $GLOBALS['tableNames'];
        $tableNames__ = $this->tableNames_;
        return in_array($this->tableName, $tableNames__);

    }

    // Querying table


    public function query_table() {

            $this->SQLstring = "SELECT * FROM " . $this->tableName;
            $this->stmt = $this->conn->prepare($this->SQLstring);
            $this->stmt->execute();


    }

    // Print table as JSON
    public function print_table() {

            $headStmts = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            echo (json_encode($headStmts));


    }
}


class updateOp extends SQLOp{// updateOp class intended to update tables
    // class variables
    protected $statement;

    public function set_table_update($tableName, $columnValue, $pValue){
        include 'wLInventory.php';
        $columnArray = []; // array used to dynamically bind columnValues to column names
        $combineColumnArray =[];
        $tableColumnValue = array_values($columnValue);
        $tableColumnName = array_keys($columnValue);
        $this -> SQLstring = update_string($tableName, $tableColumnName);
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        if($this -> statement === false){
            die("SQL statement preparation failed: " . print_r($this -> conn-> errorInfo(), true));
        }
        for($i = 1; $i <= count($tableColumnName); $i++){
            $columnArray [] = ":columnValue$i";
        };
        $combineColumnArray = array_combine($columnArray, $tableColumnValue);

        foreach ($combineColumnArray as $colName => $colValue){
            $this -> statement -> bindValue($colName, $colValue);
        }
        $this -> statement ->bindValue('pValue', $pValue);
    }

    public function update_table() {
        try{
            if($this -> statement -> execute()){
                echo "Update record successfully";
                $this -> database -> closeDB();
            }
        }
        catch(PDOException $e){
            echo "Execution not successful " . $e -> getMessage();

        }
    }
}// end of class updateOp

class deleteOp extends SQLOp {// delete rows
    public function set_table_delete($tableName, $deleteValue1){// set user variables to delete row
        // deleteValue1 is the primary ID to tables
        include 'wLInventory.php';

        $searchValue = find_ID($tableName);

        $this -> SQLstring = "DELETE FROM $tableName WHERE $searchValue = :deleteValue1";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        if($this -> statement === false){
            die("SQL statement preparation failed: " . print_r($this -> conn-> errorInfo(), true));
        }
        $this -> statement -> bindParam(':deleteValue1', $deleteValue1);
    }

    public function delete_row(){// function used to delete a row from a table.
        try{
            if($this -> statement -> execute()){
                echo json_encode(["success" => true, "message" => "Row successfully deleted"]);
            }
        }
        catch(PDOException $e){
            echo "Deletion not successful " . $e -> getMessage();
        }
    }
}// end of class deleteOp

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
        echo "error: ". $e -> getMessage();
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
            return ['error' => $e->getMessage()];
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
            echo "Execution not successful " . $e -> getMessage();

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
            echo "Deletion not successful " . $e -> getMessage();
        }
    }//end of remove_row function
}// end of pcSetUp class

class SearchBarcodes extends SQLOp{
     protected array $tableNames_;

     protected array $foundData = [];
    public function search_barcode($barcode){

        $barcode = "%" . $barcode . "%";

        $this -> tableNames_ = $GLOBALS['tableNames'];

        foreach($this -> tableNames_ as $tableName){
            $searchValue = find_ID($tableName);

            $this -> statement = $this -> conn -> prepare("SELECT * FROM $tableName WHERE $searchValue LIKE :barcode");
            $this -> statement -> bindParam(':barcode', $barcode);
            try{
                $this -> statement -> execute();
                $data = $this -> statement -> fetchAll(PDO::FETCH_ASSOC);
                if ($data) {
                    $this->foundData = array_merge($this->foundData, $data); // Merges results from each table
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        echo json_encode($this -> foundData);
    }
}

?>