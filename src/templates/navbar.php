<?php

$access_level = "";
if (isset($_SESSION['access_level'])) {
    if ($_SESSION['access_level'] == "superAdmin") {
        $access_level = "<a href='/admin/'>Admin</a>";
    }
}



echo "
    <nav>
        <div>
            <img src='/assets/cyberBanner.png' alt='Banner' class='banner-image'>
        </div>
        
        <div class='nav-links'>
        <div><a href='/'>Home</a>
            <a href='/inventory-form'>Inventory Form</a>
            <a href='/search'>Search</a>
            <a id='nav-delete-btn' href='/delete'>Delete</a></div>
        <div>
            <a href='/logout/'>Logout</a>
            <a href='/dashboard/'>Dashboard</a>"
        . $access_level . "
    
        </div>
            
        </div>
    </nav>
";