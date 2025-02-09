<?php

class Delete extends SQLOp {// delete rows
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
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);
        }
    }
}
