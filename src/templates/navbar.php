<?php

$admin_nav = "";
if (isset($_SESSION['access_level'])) {
    if ($_SESSION['access_level'] == "superAdmin") {
        $admin_nav = "<a href='/admin/'>Admin</a><a href='http://localhost:8081/' target='_blank'>PHPMyAdmin</a><p class='access-level-p'>Access Level: {$_SESSION['access_level']}</p>";
    }
    else {
        $admin_nav = "<p class='access-level-p'>Access Level: {$_SESSION['access_level']}</p>";
    }
}



echo "
    <nav id='navbar'>
        <div class='image-banner-div'>
            <img src='/assets/cyberBanner.png' alt='Banner' class='banner-image'>
        </div>
        
        <!-- Menu Icon (hamburger) -->
        <div id='menu-icon' class='menu-icon' onmouseenter='toggleMenu()'>
            &#9776; <!-- Hamburger Icon -->
        </div>
       
        <!-- The Sliding Menu -->
        <div id='menu' class='menu' onmouseleave='closeMenu()'>
            <div class='menu-content'>
                <a href='/'>Home</a>
                <a href='/inventory-form'>Inventory Form</a>
                <a href='/search'>Search</a>
                <a id='nav-delete-btn' href='/delete'>Delete</a>
                <a href='/logout/'>Logout</a>
                <a href='/dashboard/'>Dashboard</a>
                <hr style='margin-top: 20px; margin-bottom: 20px; width: 100%; color: white; height: 2px; background-color: white;border-radius: 10px;box-shadow: 0 0 5px white;'>
                {$admin_nav}
                <button onclick='closeMenu()'>Close</button>
            </div>
        
        </div>
        
    </nav>
";