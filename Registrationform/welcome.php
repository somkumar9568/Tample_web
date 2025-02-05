<?php
session_start();
include 'config.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Fetch all users
$query = "SELECT * FROM user";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['email']; ?></h2>
<a href="logout.php">Logout</a>

<h3>All Users</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>fName</th>
        <th>lName</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Password</th>
        <th>Address</th>
        <th>Date</th>
        <th>update</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['fname']; ?></td>
        <td><?php echo $row['lname']; ?></td>
        <td><?php echo $row['phonenumber']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td>
            <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
