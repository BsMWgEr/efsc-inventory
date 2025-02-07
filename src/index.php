<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'homePage.html';
        break;

    case '/search/':
    case '/search':
        require __DIR__ . $viewDir . 'search.html';
        break;

    case '/inventory-form/':
    case '/inventory-form':
        require __DIR__ . $viewDir . 'inventoryForm.html';
        break;

    case '/delete':
    case '/delete/':
        require __DIR__ . $viewDir . 'delete.html';
        break;

    case '/search-data':
    case '/search-data/':
        require __DIR__ . $viewDir . 'searchData.php';
        break;

    case '/delete-data':
    case '/delete-data/':
        require __DIR__ . $viewDir . 'deleteData.php';
        break;

    case '/query-data':
    case '/query-data/':
        require __DIR__ . $viewDir . 'viewData.php';
        break;

    case '/insert-data':
    case '/insert-data/':
        require __DIR__ . $viewDir . 'insertData.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
