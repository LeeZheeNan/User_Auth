<?php
include('config.php'); 

// SQL query to fetch users
$sql = "SELECT * FROM usertable";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['UserType'] . "</td>";
        echo "<td><a href='edit_user.php?username=" . $row['username'] . "'>Edit</a></td>";
        echo "<td><a href='delete_user.php?username=" . $row['username'] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No users found</td></tr>";
}

mysqli_close($con);
?>
