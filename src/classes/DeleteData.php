<?php

class DeleteData extends SQLOp {// delete rows

    public function delete_row($tableName, $deleteValue1, $columnName)
    {// set user variables to delete row
        $this->SQLstring = "DELETE FROM $tableName WHERE $columnName = :deleteValue1";
        $this->statement = $this->conn->prepare($this->SQLstring);
        $this->statement->bindParam(':deleteValue1', $deleteValue1);
        try {
            if($this->statement->execute()) {
                echo json_encode(["success" => true, "message" => "Item successfully deleted"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo json_encode(["success" => false, "message" => $error_message]);
        }
    }
}
