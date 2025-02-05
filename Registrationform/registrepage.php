<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
    <form id="myform">
        <h1>Register Page</h1>

        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" placeholder="Enter your first name" value="">
        <div class="error" id="fnameErr"></div>

        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" placeholder="Enter your last name" value="">
        <div class="error" id="lnameErr"></div>

        <label for="date">Date of Birth</label>
        <input type="date" name="date" id="date">
        <div class="error" id="dateErr"></div>

        <label for="address">Address</label>
        <input type="text" name="address" id="address" placeholder="Enter your address">
        <div class="error" id="addressErr"></div>

        <label for="phonenumber">Phone Number</label>
        <input type="text" name="phonenumber" id="phonenumber" placeholder="Enter your phone number">
        <div class="error" id="phonenumberErr"></div>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Enter your email">
        <div class="error" id="emailErr"></div>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password">
        <div class="error" id="passwordErr"></div>

        <button type="submit">Register</button>
    </form>

    <script>
    $(document).ready(function () {

        function validateFirstName() {
            let fname = $("#fname").val();
            const regex = /^[a-zA-Z]+$/;
            if (fname === "") {
                $("#fnameErr").text("First Name is required.");
                return false;
            } else if (!regex.test(fname)) {
                $("#fnameErr").text("First Name should contain only letters.");
                return false;
            } else {
                $("#fnameErr").text("");
                return true;
            }
        }

        function validateLastName() {
            let lname = $("#lname").val();
            const regex = /^[a-zA-Z]+$/;
            if (lname === "") {
                $("#lnameErr").text("Last Name is required.");
                return false;
            } else if (!regex.test(lname)) {
                $("#lnameErr").text("Last Name should contain only letters.");
                return false;
            } else {
                $("#lnameErr").text("");
                return true;
            }
        }

        function validateDateOfBirth() {
            let dob = $("#date").val();
            if (dob === "") {
                $("#dateErr").text("Date of Birth is required.");
                return false;
            } else {
                let birthDate = new Date(dob);
                let age = new Date().getFullYear() - birthDate.getFullYear();
                if (age < 18) {
                    $("#dateErr").text("You must be at least 18 years old.");
                    return false;
                } else {
                    $("#dateErr").text("");
                    return true;
                }
            }
        }

        function validatePhoneNumber() {
            let phone = $("#phonenumber").val();
            const regex = /^[0-9]{10}$/;
            if (phone === "") {
                $("#phonenumberErr").text("Phone number is required.");
                return false;
            } else if (!regex.test(phone)) {
                $("#phonenumberErr").text("Phone number must be 10 digits.");
                return false;
            } else {
                $("#phonenumberErr").text("");
                return true;
            }
        }

        function validateEmail() {
            let email = $("#email").val();
            const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (email === "") {
                $("#emailErr").text("Email is required.");
                return false;
            } else if (!regex.test(email)) {
                $("#emailErr").text("Enter a valid email.");
                return false;
            } else {
                $("#emailErr").text("");
                return true;
            }
        }

        function validatePassword() {
            let password = $("#password").val();
            const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            if (password === "") {
                $("#passwordErr").text("Password is required.");
                return false;
            } else if (!regex.test(password)) {
                $("#passwordErr").text("Password must be at least 8 characters, and contain both letters and numbers.");
                return false;
            } else {
                $("#passwordErr").text("");
                return true;
            }
        }

        function validateAddress() {
            let address = $("#address").val();
            if (address === "") {
                $("#addressErr").text("Address is required.");
                return false;
            } else {
                $("#addressErr").text("");
                return true;
            }
        }

        $("#fname").on("input", validateFirstName);
        $("#lname").on("input", validateLastName);
        $("#date").on("input", validateDateOfBirth);
        $("#phonenumber").on("input", validatePhoneNumber);
        $("#email").on("input", validateEmail);
        $("#password").on("input", validatePassword);
        $("#address").on("input", validateAddress);

        $("#myform").on("submit", function (e) {
            e.preventDefault();

            if (validateFirstName() && validateLastName() && validateDateOfBirth() &&
                validatePhoneNumber() && validateEmail() && validatePassword() && validateAddress()) {

                $.ajax({
                    url: "insert.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.trim() === "duplicate") {  
                            alert("This entry already exists.");
                            $("#myform input").prop("disabled", false);  
                        } else if (response.trim() === "Registration successful!") {
                            alert("Registration Successful!");
                            $("#myform")[0].reset(); 
                            $(".error-message").text("");  
                        } else {
                            alert("Failed to insert data. Please try again.");
                        }
                    },
                    error: function () {
                        alert("Error submitting form");
                    }
                });
            } else {
                alert("Please fix the errors in the form before submitting.");
            }
        });


    });
    </script>
</body>
</html>
