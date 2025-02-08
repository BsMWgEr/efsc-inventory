<?php
require_once 'auth.php';
require 'SQLOp.php';

checkAccess(['superAdmin']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = password_hash(trim($_POST["password"]), PASSWORD_ARGON2ID);
    $email = trim($_POST["email"]);

    $reg = new RegistUser();
    $reg -> connect();
    $reg -> register_user($username, $password, $email);
}

