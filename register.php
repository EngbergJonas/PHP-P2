<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>PHP Project 2</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <!-- Navigation -->
        <?php include 'navbar.php'?>
            <div class="row text-center">
                <div class="col-12">
                <h1 class="display-4">Join our community!</h1>
                </div>
            </div>
            <hr class="my-4">

            <!--- Cards -->

            <div class="container-fluid padding">
                <div class="col-md-4 mx-auto">
                    <div class="card-body">
                        <h4 class="card-title">Register</h4>
                        <form action="register.php" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                            <a class="create" href="login.php">Already registered?</a>
                        </form>
                    </div>
                </div>

                <?php
include "dbaccess.php";
include "testinput.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $name = test_input($_POST['name']);
    $password = test_input($_POST['password']);
    $password = hash("sha256", $password);
    $email = test_input($_POST['email']);
    $role = "user";
    $status = "verified";

    $subject = "Registration confirmation for " . $name . "";
    $msg = "Welcome, " . $name . "!
    Your username is the following:
    - Username: " . $name . ",
    Thank you for regsitering to Engberg Camping!";

    $sql = "SELECT * FROM users WHERE name='$name' OR email='$email';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<p class='text-center'>User already exists</p>";
    } else {
        $sql = "INSERT INTO users (name, password, email, role, status)
            VALUES ('$name', '$password', '$email', '$role', '$status');";
        $result = $conn->query($sql);
        if ($conn->affected_rows > 0) {
            echo "<p class='text-center'>Registered succesfully, Welcome, " . $name . "!</p>
            <p class='text-center'>A confirmation email has been sent to your email address.</p>";
            echo "<p class='text-center'>Would you like to
            <a href='login.php'>log in</a>?</p>";
            mail($email, $subject, $msg);
        } else {
            echo "<p class='text-center'>Register unsuccesfull</p>";
        }
    }
    $conn->close();
}
?>
            </div>
            </div>

            <hr class="my-4">

            <!--- Fixed background -->
            <figure>
                <div class="fixed-wrap">
                    <div id="fixed">
                    </div>
                </div>
            </figure>

            <hr class="my-4">
            <?php include "footer.php"?>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

    </html>