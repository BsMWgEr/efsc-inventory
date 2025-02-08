<?php

require_once 'auth.php';
checkAccess(['superAdmin']);


include 'SQLOp.php';

$userOP = new Users();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userOP -> connect();
    $userOP -> set_username( $_POST["username"]);
    $userOP -> set_password(password_hash($_POST["password"], PASSWORD_ARGON2ID));
    $userOP -> set_email($_POST["email"]);
    $userOP -> set_access_level( $_POST["access_level"]);
    $userOP -> create_user();
}