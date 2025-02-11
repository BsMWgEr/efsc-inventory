<?php
require_once 'auth.php';
checkAccess(['superAdmin']);
require 'SQLOp.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $delOp = new UserDelete();
    $delOp -> connect();
    $response = $delOp -> delete_user($_POST["id"]);
    echo $response;

}