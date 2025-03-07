<?php
require 'auth.php';
checkAccess(['superAdmin', 'admin', 'staff']);
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Created by Aaron C. 01/16/2023 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/formStyle.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/forms.css">
    <style>
        .floating-box {
            position: fixed;
            top: 20%;
            right: -300px; /* Initially off-screen */
            width: 200px;
            padding: 15px;
            background-color: orangered;
            color: black;
            text-align: center;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            opacity: 0;
            transition: right 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }

        /* Show the box */
        .show {
            right: 20px; /* Moves into view */
            opacity: 1;
        }

        /* Hide the box */
        .hide {
            right: -300px;
            opacity: 0;
        }
    </style>
    <title>Cyber Range Tables</title>
</head>
<body>
<?php include 'navbar.php'; ?>
    <!--Form 1 for add rows operation-->
<main>
    <header><h1>Independent Tables Inventory Forms</h1></header>
    <form id="insertForm" class="insertForm" name="inventory">
            <h2>Add row form</h2>
            <p style="font-weight: bold;">add information to database // test</p>
            <input type="hidden" name="form" value="form1"/>
            <label for="tableSelect">Table name</label><br>
            <select id="tableSelect" name="tableSelect" onchange="showNeededFields( 'tableSelect', 'addAccessoryFields', 'addMonitorsFields', 'addMotherboardsFields',
                'addRamsticksFields', 'addPowerSupplyFields')">
                <option value="empty">Table drop down list </option>
                <option value="accessories">Accessory table</option>
                <option value="graphicscards">Graphics card table</option>
                <option value="keyboards">Keyboard table</option>
                <option value="mice">Mouse table</option>
                <option value="monitors">Monitors table</option>
                <option value="motherboards">Motherboard table</option>
                <option value="powersupplies">Power supply table</option>
                <option value="ramsticks">Ramstick table</option>
            </select><br>

            <div id="addFormCommonFields">
            <label for="p_id">Primary ID (bar code number)</label><br>
            <input type="text" id="p_id" name="p_id" placeholder="Enter Barcode"/><br>
            <label for="name">Brand name</label><br>
            <input type="text" id="name" name="name" placeholder="Enter Brand Name"/><br>
            <label for="condition">Item condition</label><br>
            <input type="text" id="condition" name="condition" placeholder="Condition..."/><br>
            <label for="cost">Item cost</label><br>
            <input type="number" id="cost" name="cost" step=".01" value="0"/><br>
            <label for="location">Item's location</label><br>
            <input type="text" id="location" name="location" placeholder="Location"/><br>
            </div>
            
            <div id="addAccessoryFields" class="hidden">
            </div>

            <div id="addMonitorsFields" class="hidden">
            </div>

            <div id="addMotherboardsFields" class="hidden">
            </div>

            <div id="addRamsticksFields" class="hidden">
            </div>

            <div id="addPowerSupplyFields" class="hidden">
            </div>
            <div class="insertFormButtons">
                <button class="insertButton" type="reset" onclick="clearForm('addForm')">Clear Form</button>&nbsp; &nbsp;
                <button class="insertButton" type="button" name="submit" onclick="InsertRow()">Insert row</button>
            </div>
    </form>
    <br>
    <!--Form 2 for view table--> 
    <form id="form2" name="viewTable">
            <h2>View table operation</h2>
            <p style="font-weight: bold;">Test run for viewing a table</p>
            <input type="hidden" name="form" value="form2"/>
            <label for="table">Table name</label><br>
            <select id="table" name="tableView" >
                <option value="empty">Table drop down list </option>
                <option value="accessories">Accessory table</option>
                <option value="graphicscards">Graphics card table</option>
                <option value="keyboards">Keyboard table</option>
                <option value="mice">Mouse table</option>
                <option value="monitors">Monitors table</option>
                <option value="motherboards">Motherboard table</option>
                <option value="powersupplies">Power supply table</option>
                <option value="ramsticks">Ramstick table</option>
            </select><br>
            <button class="queryButton" type="button" onclick="ViewTable()" name="submit">View table</button>
    </form>

    <br>
    <!--Form 3 for update table-->
    <form id="updateForm" name="updateTable" >
            <h2>Update table form</h2>
            <p style="font-weight: bold;">Test run updating a table</p>
            <input type="hidden" name="form" value="form3"/>
            <label for="tableUpdate">Table name</label><br>
            <select class="update-form-inputs" id="tableUpdate" name="tableUpdate" onchange="showNeededFields('tableUpdate', 'updateAccessoriesFields', 'updateMonitorsFields', 'updateMotherBoardsFields',
                'updateRamsticksFields', 'updatePowerSupplyFields')">
                <option value="empty">Table drop down list </option>
                <option value="accessories">Accessory table</option>
                <option value="graphicscards">Graphics card table</option>
                <option value="keyboards">Keyboard table</option>
                <option value="mice">Mouse table</option>
                <option value="monitors">Monitors table</option>
                <option value="motherboards">Motherboard table</option>
                <option value="powersupplies">Power supply table</option>
                <option value="ramsticks">Ramstick table</option>
            </select><br>
            <div id="updateFormCommonFields">
                <label for="pValue">Bar code number</label><br>
                <input class="update-form-inputs" type="text" id="pValue" name="p_id"/><br>
                <label for="nValue">Brand name</label><br>
                <input class="update-form-inputs" type="text" id="nValue" name="name"/><br>
                <label for="conValue">Update condition of component</label><br>
                <input class="update-form-inputs" type="text" id="conValue" name="condition"/><br>
                <label for="costVal">Update cost on compenent</label><br>
                <input class="update-form-inputs" type="number" id="costVal" name="cost" step=".01" value="0"/><br>
                <label for="locValue">Update location</label><br>
                <input class="update-form-inputs" type="text" id="locValue" name="location"/><br>
            </div>

            <div id="updateAccessoriesFields" class="hidden">
            </div>

            <div id="updateMonitorsFields" class="hidden">
            </div>

            <div id="updateMotherBoardsFields" class="hidden">
            </div>

            <div id="updateRamsticksFields" class="hidden">
            </div>

            <div id="updatePowerSupplyFields" class="hidden">
            </div>
        <div class="update-form-buttons">
            <button class="update-form-btns" type="reset" onclick="clearForm('updateForm')">Clear Form</button>&nbsp; &nbsp;
            <button class="update-form-btns" type="button" name="submit" onclick="UpdateRow()">Update table</button>
        </div>

    </form>
    <br>

    <footer>Cyber Range</footer>
</main>
<div id="queryDisplay" class="queryDisplay"></div>
<div id="floatingBox" class="floating-box">
    Item successfully added to database. 🚀
    <div id="data-return"></div>
</div>

<script src="/javascript/cyberScript.js" type="text/javascript"></script>
<script src="/javascript/nav-menu.js" type="text/javascript"></script>
<script>
    async function ViewTable() {
        const response = await fetch('/query-data/', {
            method: 'POST',
            body: new FormData(document.getElementById('form2'))
        })
        const data = await response.json()
        console.log(data)
        let table_name = document.getElementById('table').selectedOptions[0].text
        let table_name_display = document.createElement('h2')
        table_name_display.innerHTML = table_name
        const table = document.getElementById('queryDisplay')
        table.appendChild(table_name_display)
        table.classList.add('display-flex')
        document.querySelector('main').classList.add('display-none')

        if (!data.failure) {
            const option = document.createElement('table')
            table.appendChild(option)
            let keys = data[0]
            keys = Object.keys(keys)
            console.log(keys)
            const element = document.createElement('thead')
            for (let i = 0; i < keys.length; i++) {
                let header = document.createElement('th')
                header.innerHTML = keys[i]
                element.appendChild(header)
            }
            option.appendChild(element)
            const table_body = document.createElement('tbody')
            option.appendChild(table_body)
            for (let i = 0; i < data.length; i++) {
                let row = document.createElement('tr')
                table_body.appendChild(row)
                let id_name
                for (let j = 0; j < keys.length; j++) {
                    if (j === 0) {
                        id_name = data[i][keys[j]]
                    }
                    let cell = document.createElement('td')
                    cell.innerHTML = data[i][keys[j]]
                    row.appendChild(cell)
                }
            }
        } else {
            let message = document.createElement('p')
            message.innerHTML = 'No data to display. Empty table.'
            table.appendChild(message)
        }
        let button = document.createElement('button')
        button.innerHTML = 'Back'
        button.setAttribute('onclick', 'BackToMain()')
        button.setAttribute('class', 'table-view-return-btn')
        table.appendChild(button)
        // scroll to top
        window.scrollTo(0, 0)
        if (data.failure) {
            alert(data.message)
        }
    }

    function BackToMain() {
        document.querySelector('main').classList.remove('display-none')
        document.getElementById('queryDisplay').classList.remove('display-flex')
        document.getElementById('queryDisplay').classList.add('display-none')
        document.getElementById('table').selectedIndex = 0
        document.getElementById('queryDisplay').innerHTML = ''
    }

    async function InsertRow() {
        console.log(document.getElementById('insertForm'))
        const response = await fetch('/insert-data/', {
            method: 'POST',
            body: new FormData(document.getElementById('insertForm'))
        })
        const data = await response.json()
        if (data.success) {
            console.log(data)
            clearForm('insertForm')
            let data_return = data.message
            let string_ = ''
            for (let key in data_return) {
                string_ += `<p>${key}: ${data_return[key]}</p>`
            }
            document.getElementById('data-return').innerHTML = string_
            showFloatingBox()
        } else {
            console.log(data)
            alert(data.message)
        }
    }

    async function UpdateRow() {
        const response = await fetch('/update-data/', {
            method: 'POST',
            body: new FormData(document.getElementById('updateForm'))
        })
        const data = await response.json()
        console.log(data)
        if (data.success) {
            alert('Row updated successfully')
            clearForm('updateForm')
            showFloatingBox()
            console.log(data)
        } else {
            alert(data.message)
            console.log(data)
        }
    }

    function showFloatingBox() {
        let box = document.getElementById("floatingBox");
        box.classList.add("show");

        // Hide the box after 5 seconds
        setTimeout(() => {
            box.classList.add("hide");
            setTimeout(() => {
                box.style.display = "none"; // Ensure it's removed after animation
            }, 500); // Wait for animation to complete
        }, 10000);
    }

</script>
</body>


</html><!--End of html page-->