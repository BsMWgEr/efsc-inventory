<?php

require 'SQLOp.php';



$auth = new AuthenticateUser();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $auth -> connect();
    $auth -> authenticate_user($username, $password);

}


?>
