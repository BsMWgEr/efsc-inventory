<?php
require 'auth.php';
checkAccess(['superAdmin', 'admin', 'staff']);
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Created by Aaron C 09/25/2024 -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="/images/icon.png">
        <link rel="stylesheet" href="/css/homepage.css">
        <link rel="stylesheet" href="/css/formStyle.css">
        <link rel="stylesheet" href="/css/navbar.css">
        <title>Cyber Lab</title>
    </head>
    <body>
    <main>
    <?php include 'navbar.php'; ?>
        <h1 style="text-align: center" id='header'>Cyber Lab Inventory Home Page</h1>
        <p id="pcSetUp-table" name="pcSetUp-table" class="table"></p>
        <p id="error" name="error"></p>
        <form id="Main-form" name="Main-form">
            <div id="addingToForm" class="styleForm">
                <div class="form-field">
                    <label for="pc_id">PC ID: </label>
                   <input class="computer-form-inputs" type="text" id="pc_id" name="pc_id"/>
                </div>
                <div class="form-field">
                    <label for="mobo_id">MotherBoard ID: </label>
                    <input class="computer-form-inputs" type="text" id="mobo_id" name="mobo_id"/>
                </div>
                <div class="form-field">
                    <label for="gpu_id">Graphics card ID: </label>
                    <input class="computer-form-inputs" type="text" id="gpu_id" name="gpu_id"/>
                </div>
                <div class="form-field">
                   <label for="ram_id">Ramstick ID: </label>
                   <input class="computer-form-inputs" type="text" id="ram_id" name="ram_id"/>
                </div>
                <div class="form-field">
                   <label for="psu_id">Power Supply ID: </label>
                   <input class="computer-form-inputs" type="text" id="psu_id" name="psu_id"/>
                </div>
                <div class="form-field">
                   <label for="monitor_id">Monitor ID: </label>
                   <input class="computer-form-inputs" type="text" id="monitor_id" name="monitor_id"/>
                </div>
                <div class="form-field">
                   <label for="acc_id">Accessory ID: </label>
                   <input class="computer-form-inputs" type="text" id="acc_id" name="acc_id"/>
                </div>
                <div class="form-field">
                   <label for="kb_id">Keyboard ID: </label>
                   <input class="computer-form-inputs" type="text" id="kb_id" name="kb_id"/>
                </div>
                <div class="form-field">
                   <label for="mouse_id">Mouse ID:</label>
                   <input class="computer-form-inputs" type="text" id="mouse_id" name="mouse_id"/><br>
                </div>
                <div class="comment-block">
                   <label for="PCcondition">Computer's current condition:</label><br>
                   <textarea class="computer-form-inputs" id="PCcondition" name="PCcondition" rows="2"></textarea>
                </div>
                <div class="form-field">
                    <label for="tableLocation">Computer location:</label><br>
                    <input class="computer-form-inputs" type="text" id="tableLocation" name="tableLocation"/>
                </div>
                <div class="button-container">
                    <button type="submit" name="add" class="button">Insert Row</button>
                    <button type="submit" name="update" class="button">Update Row</button> 
                </div>
            </div>
        
            <fieldset id="deleteTableRow" class="styleForm">
                <div class="form-field" name="delete">
                   <label for="delete_pc_id">PC ID: </label>
                   <input class="computer-form-inputs" type="text" id="delete_pc_id" name="delete_pc_id"/>
                </div><br>
                <div class="button-container" name="delete">
                   <button type="submit" name="submit">Delete Row</button>
                </div>
            </fieldset>
        </form>
    <footer>Cyber Range</footer>
    </main>
    <script src="/javascript/nav-menu.js" type="text/javascript"></script>
        <script src="../javascript/cyberScript.js"></script>
    </body>
</html>