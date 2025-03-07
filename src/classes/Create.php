<?php

class Create extends SQLOp
{
    // class variables
//    protected array $data;
//
//    public function set_data($inputData)
//    {
//        $this -> data = $inputData;
//    }

    public function insert_item($tableName, $data) {

        $columnKeys = array_keys($data);
        $columnNames = "";
        $columnValues = "";

        foreach ($columnKeys as $key) {
            $columnNames .= "`$key`,";
            $columnValues .= ":$key,";
        }

        $columnNames = rtrim($columnNames, ",");
        $columnValues = rtrim($columnValues, ",");

        $this->SQLstring = "INSERT INTO $tableName ($columnNames) VALUES ($columnValues)";

        $this->statement = $this->conn->prepare($this->SQLstring);

        foreach ($data as $key => $value) {
            $this->statement->bindValue(':' . $key, $value);
        }

        try {
            if ($this->statement->execute()) {
                return json_encode(["success"=>true, "message"=>"Item added successfully."]);
            }
        }
        catch (PDOException $e) {
            return json_encode(["success"=>false, "message"=>$e->getMessage()]);
        }


    }

}
