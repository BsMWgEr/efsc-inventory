<?php

class Read extends SQLOp {
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
        return (json_encode($headStmts));


    }
}
