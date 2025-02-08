<?php
require 'auth.php';
checkAccess(['superAdmin']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/navbar.css">
    <title>Administration</title>
    <style>
        table {
            border-collapse: separate;
            width: 100%;
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            background-color: #32635F;
            color: white;
        }
        td {
            background-color: #E6E6FA;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="admin-nav">
    <button class="admin-nav-btn" type="button" onclick="ShowCreateUserForm()">Add User</button>
</div>

<div>
    <h1>Administration</h1>
    <div id="users-list"></div>
    <form id="createUserForm" name="createUserForm" hidden>
        <input type="text" id="username" name="username" value="" placeholder="Username" />
        <input type="password" id="password" name="password" value="" placeholder="Password" />
        <input type="password" id="password2" name="password2" value="" />
        <input type="text" id="email" name="email" value="" placeholder="Email" />
        <select name="access_level" id="access_level">
            <option disabled selected value> -- Select Access Level -- </option>
            <option value="staff">Staff</option>
            <option value="admin">Admin</option>
            <option value="superadmin">Super-Admin</option>
        </select>
        <button type="button" onclick="create_user()">Create User</button>
        <button type="button" onclick="HideCreateUserForm()">Cancel</button>
    </form>
</div>

<script>
    async function GetUsers() {
        const response = await fetch('/get-users/')
        const data = await response.json()
        console.log(data)
        if (data.failure) {
            alert(data.message)
        } else {
            DisplayUsers(data)
        }
    }
    GetUsers()

    function DisplayUsers(data) {
        document.getElementById('users-list').innerHTML = ''
        const table = document.getElementById('users-list')
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
            button.setAttribute('onclick', `DeleteUser('')`)
            button.classList.add('delete-user-btn')
            row.appendChild(button)
            let button2 = document.createElement('button')
            button2.innerHTML = 'Edit'
            button2.setAttribute('onclick', `EditUser('')`)
            button2.classList.add('edit-user-btn')
            row.appendChild(button2)
        }
    }

    async function DeleteUser(user_id) {
        console.log(user_id)
        const response = await fetch('/delete-user/', {
            method: 'POST',
            body: new FormData(document.getElementById('deleteUserForm'))
        })
        const data = await response.json()
        console.log(data)
        if (data.failure) {
            alert(data.message)
        } else {
            alert(data.message)
            GetUsers()
        }
    }

    async function create_user() {
        const response = await fetch('/create-user/', {
            method: 'POST',
            body: new FormData(document.getElementById('createUserForm'))
        })
        const data = await response.json()
        console.log(data)
        if (data.failure) {
            alert(data.message)
        } else {
            document.getElementById('createUserForm').reset()
            HideCreateUserForm()
            alert(data.message)
            GetUsers()
        }
    }

    function ShowCreateUserForm() {
        document.getElementById('createUserForm').hidden = false
    }

    function HideCreateUserForm() {
        document.getElementById('createUserForm').reset()
        document.getElementById('createUserForm').hidden = true
    }



</script>
</body>
</html>