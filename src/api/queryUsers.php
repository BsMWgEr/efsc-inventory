<?php
require_once 'auth.php';
require 'SQLOp.php';

checkAccess(['superAdmin']);

$userAdmin = new UserQuery();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userAdmin -> connect();
    echo $userAdmin -> query_users();
}