<?php

class UserQuery extends Users
{
    private $users;

    public function query_users() {
        // get user data id, username, email, and access_level from database
        $this -> statement = $this -> conn -> prepare("SELECT id, username, email, access_level FROM users");
        $this -> statement -> execute();
        $this -> users = $this -> statement -> fetchAll(PDO::FETCH_ASSOC);

        if ($this -> users) {
            return json_encode($this -> users);
        } else {
            echo json_encode(["failure" => true, "message" => "No users found"]);
        }
    }
}