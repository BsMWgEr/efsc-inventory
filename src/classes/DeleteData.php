<?php

class DeleteData extends SQLOp {// delete rows

    public function set_table_delete($tableName, $deleteValue1, $columnName)
    {// set user variables to delete row
        $this->table = $tableName;
        $this->deleteValue1 = $deleteValue1;
        $this->SQLstring = "DELETE FROM $tableName WHERE $columnName = :deleteValue1";
        $this->statement = $this->conn->prepare($this->SQLstring);
        $this->statement->bindParam(':deleteValue1', $this->deleteValue1);
    }
    public function delete_row(){// function used to delete a row from a table.

        try {
            if($this->statement->execute()) {
                return json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            return json_encode(["failure" => true, "message" => $error_message]);
        }
    }
}
