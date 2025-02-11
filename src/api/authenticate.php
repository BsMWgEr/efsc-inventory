<?php

require 'SQLOp.php';



$auth = new Users();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $auth -> connect();
    $auth -> set_username($username);
    $auth -> set_password($password);
    $auth -> authenticate_user();

}
