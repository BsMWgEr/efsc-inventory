<?php

class Update extends SQLOp
{// updateOp class intended to update tables
    // class variables
    protected $data;

    public function set_data($inputData)
    {
        $this->data = $inputData;
    }

    public function get_column_names($table)
    {
        // Prepare the SQL query to get column information
        $SQLstring = "DESCRIBE $table";

        // Prepare the statement
        $this->statement = $this->conn->prepare($SQLstring);

        try {
            // Execute the query
            $this->statement->execute();

            // Fetch all the column information
            $columns = $this->statement->fetchAll(PDO::FETCH_ASSOC);

            // Extract just the column names
            $columnNames = [];
            foreach ($columns as $column) {
                $columnNames[] = $column['Field'];  // 'Field' is the column name in the DESCRIBE output
            }

            return $columnNames;
        } catch (PDOException $e) {
            // Return an error message if something goes wrong
            return json_encode(["failure" => true, "message" => $e->getMessage()]);
        }
    }

    // $data keys must match table column names
    public function update_item($table, $idField, $data)
    {
        // Prepare dynamic SQL for the update
        $setClause = "";
        $params = [];

        // Loop through the data and create the SET part of the SQL query
        foreach ($data as $key => $value) {
            if ($key != $idField) {  // Skip the id field from the SET part
                $setClause .= "`$key` = :$key, ";
                $params[":$key"] = $value;  // Add to params for binding
            }
        }

        // Remove the trailing comma and space from the SET clause
        $setClause = rtrim($setClause, ', ');

        // Build the full SQL string for the UPDATE query
        $this->SQLstring = "UPDATE $table SET $setClause WHERE $idField = :$idField";

        // Prepare the SQL statement
        $this->statement = $this->conn->prepare($this->SQLstring);

        // Bind parameters dynamically for the SET clause
        foreach ($params as $key => $value) {
            $this->statement->bindValue("$key", $value);
        }

        // Bind the idField parameter for the WHERE clause
        $this->statement->bindParam(":$idField", $data[$idField]);

        try {
            // Execute the statement and return success or failure message
            if ($this->statement->execute()) {
                return json_encode([
                    "success" => true,
                    "message" => "$table updated successfully",
                    "data" => $data,
                ]);
            }
        } catch (PDOException $e) {
            // Catch any exceptions and display error message
            $error_message = $e->getMessage();
            return json_encode([
                "success" => false,
                "message" => $error_message,
            ]);
        }
    }
}
