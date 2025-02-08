<?php
require_once 'auth.php';
require 'SQLOp.php';

checkAccess(['superAdmin']);

$userAdmin = new Users();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userAdmin -> connect();
    $userAdmin -> get_users();
}