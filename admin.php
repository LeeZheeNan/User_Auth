<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <style>
        .User {
        background-color:rgba(203, 222, 203, 0.5);
        width: 300px;
        border: 5px solid black;
        padding: 15px;
        margin-left: 0px;
        margin-top: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
        th {
            
            background-color: #04AA6D;
            color: white;
        }
        td {
            
            background-color:rgb(173, 229, 175, 0.5);
            color: black;
        }
        input[type=text], select {
            width: 100%;
            padding: 8px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            }
            button[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }
            body {
            background-image: url('images/wallpaper2.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            }
    </style>
</head>
<body>
    <div style="display: inline-block;">
        <h1 style="color: white; display: inline;">User Management</h1>
        <button onclick="window.location.href='logout.php';" style="display: inline; background-color: rgb(173, 229, 175, 0.5); width: 100px; height: 30px; margin-left: 1150px;">Log Out</button>
    </div>
    <div class = "User">
    <h2>User Management System</h2>
    <form action="adduser.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="usertype">User Type:</label>
        <input type="text" id="usertype" name="Utype" required><br>
        <button type="submit">Add User</button>
    </form>
        </div>
    <h3>Users</h3>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Address</th>
                <th>User_Type</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // PHP code to fetch and display users
            include 'fetch_users.php';
            ?>
        </tbody>
    </table>
</body>
</html>
