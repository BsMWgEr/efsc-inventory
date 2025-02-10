<?php
require 'auth.php';
checkAccess(['superAdmin', 'admin']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/formStyle.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/forms.css">
    <style>
        footer {
            position: fixed;
            bottom: 0;
        }

        #tableDeleteListOptions {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 90%;
            margin: 10px;
            border-radius: 10px;
        }

        form select, form input {
            font-size: 16pt;
            border-radius: 50px;
            padding: 5px;
            border: none;
            background: white;
            opacity: .5;
            color: black;
            text-align: center;
        }

        #delete-submit-btn {
            margin-top: 30px;
        }

        .delete-submit-btn {
            width: 50%;
            padding: 10px;
            color: #32635F;
            background: black;
            border-radius: 10px;
            border: none;
            transition: 0.5s;
        }

        .delete-submit-btn:hover {
            background: red;
            color: white;
            border-radius: 50px;
            box-shadow: red 0 0 10px;
            transition: 0.5s;
        }

        #deleteForm {
            display: none;
        }
    </style>
    <title>Delete Entry</title>
</head>
<body>
<?php include 'navbar.php'; ?>
    <main>

            <h2>Delete row form</h2>
            <p style="font-weight: bold;">Test run deleting a table</p>
            <input type="hidden" name="form" value="form4"/>
            <label for="tableDelete">Table name</label><br>
            <form id="deleteTable" name="deleteTable" oninput="ViewTableToDeleteItem()">
                <select id="tableDelete" name="tableView" >
                    <option selected value="empty">Table drop down list </option>
                    <option value="accessories">Accessory table</option>
                    <option value="graphicscards">Graphics card table</option>
                    <option value="keyboards">Keyboard table</option>
                    <option value="mice">Mouse table</option>
                    <option value="monitors">Monitors table</option>
                    <option value="motherboards">Motherboard table</option>
                    <option value="powersupplies">Power supply table</option>
                    <option value="ramsticks">Ramstick table</option>
                </select><br>
            </form>
            <div id="tableDeleteListOptions">

            </div>
            <form hidden id="deleteForm" name="delete_name_id">
                <input type="text" id="delete_name_id" name="tableDelete" value="" />
                <input type="text" id="delete_pValue" name="pValue" value="" />
            </form>
            <form hidden id="searchDeleteForm" name="searchDeleteForm">
                <input type="text" id="searchKey" name="searchKey" placeholder="Enter a bar code number" />
                <button id="delete-submit-btn" class="delete-submit-btn" type="button" onclick="BarcodeRequestForDeletion()">Submit</button>
            </form>

    </main>
<footer>Cyber Range</footer>
<script src="/javascript/nav-menu.js" type="text/javascript"></script>
<script>

    function DisplayData(data) {
        document.getElementById('tableDeleteListOptions').innerHTML = ''
        const table = document.getElementById('tableDeleteListOptions')
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
            let button = document.createElement('button')
            button.innerHTML = 'Delete'
            console.log(id_name)
            button.setAttribute('onclick', `DeleteRow('${id_name.toString()}')`)
            button.classList.add('delete-submit-btn')
            row.appendChild(button)
        }
    }
    async function ViewTableToDeleteItem() {
        document.getElementById('tableDeleteListOptions').innerHTML = ''
        const response = await fetch('/query-data/', {
            method: 'POST',
            body: new FormData(document.getElementById('deleteTable'))
        })
        const data = await response.json()
        console.log(data)
        DisplayData(data)
        if (data.failure) {
            alert(data.message)
            return;
        }

    }
    async function DeleteRow(pValue_) {
        console.log(pValue_)
        document.getElementById('delete_name_id').value = document.getElementById('tableDelete').value
        document.getElementById('delete_pValue').value = pValue_.toString()
        console.log(document.getElementById('delete_name_id').value)
        const response = await fetch('/delete-data/', {
            method: 'POST',
            body: new FormData(document.getElementById('deleteForm'))
        })
        const data = await response.json()
        console.log(data)
        if (data.failure) {
            alert(data.message)
            return;
        } else {
            alert(data.message)
            document.getElementById('tableDeleteListOptions').innerHTML = ''
            document.getElementById('tableDelete').selectedIndex = 0
        }
    }

    async function BarcodeRequestForDeletion() {
        const response = await fetch('/search-data/', {
            method: 'POST',
            body: new FormData(document.getElementById('searchDeleteForm'))
        })
        const data = await response.json()
        console.log(data)
        DisplayData(data)
        if (data.failure) {
            alert(data.message)
        }
    }
</script>
</body>
</html>