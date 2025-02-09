<?php

require_once 'auth.php';
checkAccess(['superAdmin']);
require 'SQLOp.php';

$userOP = new Users();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userOP -> connect();
    $userOP -> set_username(trim($_POST["username"]));
    $userOP -> set_password(trim($_POST["password"]));
    $userOP -> set_email(trim($_POST["email"]));
    $userOP -> set_access_level($_POST["access_level"]);
    $userOP -> create_user();
}