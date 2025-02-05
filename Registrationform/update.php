<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $updateQuery = "UPDATE user SET email = '$email', password = '$password' WHERE id = $id";
    
    if ($conn->query($updateQuery)) {
        echo "User updated successfully!";
        header("Location: welcome.php");
        exit;
    } else {
        echo "Error updating user!";
    }
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <input type="text" name="email" value="<?php echo $user['email']; ?>" required><br><br>
    <input type="text" name="password" value="<?php echo $user['password']; ?>" required><br><br>
    <button type="submit">Update</button>
</form>
