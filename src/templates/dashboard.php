<?php
    require 'auth.php';
    checkAccess(['superAdmin', 'admin', 'staff']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/navbar.css">
    <style>
        margin-top: 100px;
    </style>
    <title>Dashboard</title>
</head>
<body>
<?php include 'navbar.php'; ?>
<main>

</main>

<script src="/javascript/nav-menu.js" type="text/javascript"></script>
</body>
</html>