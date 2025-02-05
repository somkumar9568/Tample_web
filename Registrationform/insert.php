<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $date = $_POST['date'];

    $check_email_query = "SELECT * FROM user WHERE email = '$email'";
    $result_email = $conn->query($check_email_query);

    if ($result_email->num_rows > 0) {
        echo "duplicate";
        exit();
    }

    $query = "INSERT INTO user (fname, lname, email, password, address, phonenumber, date) 
              VALUES ('$fname', '$lname', '$email', '$password', '$address', '$phonenumber', '$date')";

    if ($conn->query($query)) {
        echo "Registration successful!";
    } else {
        echo "Failed to insert data.";
    }

    $conn->close();
}
?>
