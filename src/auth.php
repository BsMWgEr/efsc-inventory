<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect if user is not logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: /login");
    exit;
}

// Function to check if the user has the required role
function checkAccess($allowed_roles) {
    if (!in_array($_SESSION["access_level"], $allowed_roles)) {
        header("Location: /access-denied");
        die("❌ Access Denied. You do not have permission to view this page.");
    }
}

