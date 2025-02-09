<?php

class Search extends SQLOp{
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
