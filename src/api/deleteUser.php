<?php
require_once 'auth.php';
checkAccess(['superAdmin']);
require 'SQLOp.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $delOp = new UserDelete();
    $delOp -> connect();
    $delOp -> set_username($_POST['username']);
    $delOp -> delete_user();

}