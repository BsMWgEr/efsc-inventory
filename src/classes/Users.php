<?php

class Users extends SQLOp{

    protected $id;

    protected $username;

    private $password;

    protected $email;

    protected $access_level;

//     public function __construct($username, $password, $email, $access_level){
//         $this->username = $username;
//         $this->password = $password;
//     }

    private function hash_password($password){
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    public function set_username($username){
        $this->username = $username;
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function set_email($email){
        $this->email = $email;
    }

    public function set_access_level($access_level){
        $this->access_level = $access_level;
    }


    public function create_user() {

        $username = $this->username;
        $password = $this->password;
        $email = $this->email;
        $access_level = $this->access_level;

        $password = $this->hash_password($password);

        $this->statement = $this->conn->prepare("INSERT INTO users (username, password, email, access_level) VALUES (:username, :password, :email, :access_level)");
        $this->statement->bindParam(':username', $username);
        $this->statement->bindParam(':password', $password);
        $this->statement->bindParam(':email', $email);
        $this->statement->bindParam(':access_level', $access_level);

        try {
            if($this->statement->execute()) {
                echo json_encode(["success" => true, "message" => "User created successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);
        }
    }

    public function update_username() {
        $id = $this->id;
        $username = $this->username;
        $this->statement = $this->conn->prepare("UPDATE users SET username = :username WHERE id = :id");
        $this->statement->bindParam(':username', $username);
        $this->statement->bindParam(':id', $id);

        try {
            if($this->statement->execute()) {
                echo json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);
        }
    }

    public function update_password() {
        $id = $this->id;
        $password = $this->password;
        $this->statement = $this->conn->prepare("UPDATE users SET password = :password WHERE id = :id");
        $this->statement->bindParam(':password', $password);
        $this->statement->bindParam(':id', $id);

        try {
            if($this->statement->execute()) {
                echo json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);
        }
    }

    public function update_email() {
        $id = $this->id;
        $email = $this->email;
        $this->statement = $this->conn->prepare("UPDATE users SET email = :email WHERE id = :id");
        $this->statement->bindParam(':email', $email);
        $this->statement->bindParam(':id', $id);

        try {
            if($this->statement->execute()) {
                echo json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);
        }

    }

    public function update_access_level() {
        $id = $this->id;
        $access_level = $this->access_level;
        $this->statement = $this->conn->prepare("UPDATE users SET access_level = :access_level WHERE id = :id");
        $this->statement->bindParam(':access_level', $access_level);
        $this->statement->bindParam(':id', $id);

        try {
            if($this->statement->execute()) {
                echo json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);
        }
    }

    public function authenticate_user() {

        $username = $this->username;
        $password = $this->password;

        $this->statement = $this->conn->prepare("SELECT id, password, access_level FROM users WHERE username = :username");
        $this->statement->bindParam(':username', $username);
        try {
            $this->statement->execute();
            $user = $this -> statement -> fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["username"] = $username;
                $_SESSION["access_level"] = $user["access_level"];
                header("Location: /dashboard/"); // Redirect to dashboard
                exit;
            } else {
                echo json_encode(["failure" => true, "message" => "Invalid username or password"]);
            }

        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo json_encode(["failure" => true, "message" => $error_message]);
        }
    }
}
