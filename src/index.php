<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/templates/';
$viewDir2 = '/api/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'homePage.php';
        break;

    case '/search/':
    case '/search':
        require __DIR__ . $viewDir . 'search.php';
        break;

    case '/inventory-form/':
    case '/inventory-form':
        require __DIR__ . $viewDir . 'inventoryForm.php';
        break;

    case '/delete':
    case '/delete/':
        require __DIR__ . $viewDir . 'delete.php';
        break;

    case '/search-data':
    case '/search-data/':
        require __DIR__ . $viewDir2 . 'searchData.php';
        break;

    case '/delete-data':
    case '/delete-data/':
        require __DIR__ . $viewDir2 . 'deleteData.php';
        break;

    case '/query-data':
    case '/query-data/':
        require __DIR__ . $viewDir2 . 'viewData.php';
        break;

    case '/insert-data':
    case '/insert-data/':
        require __DIR__ . $viewDir2 . 'insertData.php';
        break;

    case '/login/':
    case '/login':
        require __DIR__ . $viewDir . 'login.php';
        break;

    case '/authenticate':
    case '/authenticate/':
        require __DIR__ . $viewDir2 . 'authenticate.php';
        break;

    case '/dashboard':
    case '/dashboard/':
        require __DIR__ . $viewDir . 'dashboard.php';
        break;

    case '/register':
    case '/register/':
        require __DIR__ . $viewDir . 'register.php';
        break;

    case '/registration':
    case '/registration/':
        require __DIR__ . $viewDir2 . 'registration.php';
        break;

    case '/logout':
    case '/logout/':
        require __DIR__ . $viewDir2 . 'logout.php';
        break;

    case '/admin':
    case '/admin/':
        require __DIR__ . $viewDir . 'admin.php';
        break;

    case '/get-users':
    case '/get-users/':
        require __DIR__ . $viewDir2 . 'queryUsers.php';
        break;

    case '/update-data':
    case '/update-data/':
        require __DIR__ . $viewDir2 . 'updateData.php';
        break;

    case '/create-user':
    case '/create-user/':
        require __DIR__ . $viewDir2 . 'createUser.php';
        break;

    case '/access-denied/':
    case '/access-denied':
        require __DIR__ . $viewDir . 'access-denied.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
