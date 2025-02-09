<?php

class UserDelete extends Users
{
    public function delete_user() {
        $id = $this->id;

        $this->statement = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $this->statement->bindParam(':id', $id);

        try {
            if($this->statement->execute()) {
                echo json_encode(["success" => true, "message" => "User deleted successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);
        }
    }
}