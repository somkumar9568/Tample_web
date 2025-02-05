<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if ($password == $user['password']) { 
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user['id']; 
            header("Location: welcome.php");
            exit;
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        .error {
            color: red;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <form id="loginForm" method="POST">
        <h1>Login</h1>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Enter your email"><br>
        <div class="error" id="emailErr"></div>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password"><br>
        <div class="error" id="passwordErr"></div>

        <button type="submit">Login</button>
    </form>

    <script>
    $(document).ready(function () {

        function validateEmail() {
            let email = $("#email").val();
            const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (email === "") {
                $("#emailErr").text("Email is required.");
                return false;
            } else if (!regex.test(email)) {
                $("#emailErr").text("Please enter a valid email address.");
                return false;
            } else {
                $("#emailErr").text("");
                return true;
            }
        }

        function validatePassword() {
            let password = $("#password").val();
            if (password === "") {
                $("#passwordErr").text("Password is required.");
                return false;
            } else if (password.length < 6) {
                $("#passwordErr").text("Password must be at least 6 characters.");
                return false;
            } else {
                $("#passwordErr").text(""); 
                return true;
            }
        }

        $("#email").on("input", validateEmail);
        $("#password").on("input", validatePassword);

        $("#loginForm").on("submit", function (e) {
            e.preventDefault(); 
            if (validateEmail() && validatePassword()) {
                this.submit();
            } else {
                alert("Please fix the errors before submitting.");
            }
        });

    });
    </script>
    
</body>
</html>
