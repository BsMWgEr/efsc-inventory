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
        main {
            margin-top: 100px;
        }
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

        form input, form select {
            font-size: 16pt;
            border-radius: 50px;
            padding: 5px;
            border: none;
            background: white;

            color: black;
            text-align: center;
            box-shadow: 0 0 10px black;
            margin: 10px;
            transition: 0.5s;
        }
        form input:hover, form select:hover {
            box-shadow: none;
            background: #32635F;
            color: white;
            transition: 0.5s;
        }
        form button, .delete-user-btn, .edit-user-btn {
            width: 50%;
            padding: 10px;
            color: #32635F;
            background: black;
            border: 1px solid #32635F;
        }
        form button:hover, .delete-user-btn:hover, .edit-user-btn:hover {
            background: #32635F;
            color: white;
            border-radius: 50px;
            box-shadow: black 0 0 10px;
            transition: 0.5s;
        }
        form {
            display: flex;
            flex-direction: row;
            padding: 20px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<main>

<div>
    <h1>Administration</h1>

    <form id="createUserForm" name="createUserForm" hidden>
        <input required type="text" id="username" name="username" value="" placeholder="Username" />
        <input required type="password" id="password" name="password" value="" placeholder="Password" />
        <input required type="password" id="password2" name="password2" value="" placeholder="re-enter password" />
        <input required type="text" id="email" name="email" value="" placeholder="Email" />
        <select required name="access_level" id="access_level">
            <option disabled selected value> -- Select Access Level -- </option>
            <option value="staff">Staff</option>
            <option value="admin">Admin</option>
            <option value="superadmin">Super-Admin</option>
        </select>
        <button type="button" onclick="create_user()">Create User</button>
    </form>
    <div id="users-list"></div>
</div>
</main>
<script src="/javascript/nav-menu.js" type="text/javascript"></script>
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
            console.log(header)
        }
        option.appendChild(element)
        console.log(element)
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
                console.log(data[i][keys[j]])
            }
            let button = document.createElement('button')
            button.innerHTML = 'Delete'
            button.setAttribute('onclick', `delete_user(${id_name})`)
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
        let uname = document.getElementById('username').value
        let p1 =document.getElementById('password').value
        let p2 = document.getElementById('password2').value
        let em = document.getElementById('email').value
        let ac = document.getElementById('access_level').value
        if (uname === '' || p1 === '' || p2 === '' || em === '' || ac === '') {
            alert('Please fill out all fields')
            return
        }
        if (p1 !== p2) {
            alert('Passwords do not match')
            p1.value = ''
            p2.value = ''
            return
        }
        if (p1.length < 8) {
            alert('Password must be at least 8 characters long')
            return
        }

        if (uname.length < 3) {
            alert('Username must be at least 3 characters long')
            return
        }
        if (em.includes('@') === false || em.includes('.') === false) {
            alert('Email must be valid')
            return
        }

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
            alert(data.message)
            GetUsers()
        }
    }

    async function delete_user(user_id) {
        let form_data = new FormData()
        form_data.append('id', user_id)
        console.log(form_data)

        const response = await fetch('/delete-user/', {
            method: 'POST',
            body: form_data
        }
        )
        const data = await response.json()
        console.log(data)
        if (data.failure) {
            alert(data.message)
        } else {
            alert(data.message)
            await GetUsers()
        }
    }





</script>
</body>
</html>