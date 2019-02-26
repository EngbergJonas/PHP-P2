<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>PHP Project 2</title>
      <link
         rel="stylesheet"
         href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
         crossorigin="anonymous"
         />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link
         rel="stylesheet"
         href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
         integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
         crossorigin="anonymous"
         />
      <link href="style.css" rel="stylesheet" />
   </head>
   <body>
      <!-- Navigation -->
      <?php include 'navbar.php'?>
      <div class="row text-center">
         <div class="col-12">
            <h1 class="display-4">Log in page</h1>
         </div>
      </div>
      <hr class="my-4">
      <!--- Cards -->
      <?php isLogged();?>
      <div class="container-fluid padding">
         <div class="col-md-4 mx-auto">
            <div class="card-body">
               <h4 class="card-title">Register</h4>
               <form action="login.php" method="POST">
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" class="form-control" name="name" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <button type="submit" name="login" class="btn btn-primary">Log in</button>
                  <a class="create" href="register.php">Create account</a>
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
if (isset($_POST['login'])) {
    // Input validation
    $name = test_input($_POST['name']);
    $password = test_input($_POST['password']);
    $password = hash("sha256", $password);
    // Kolla ifall användaren redan finns
    $sql = "SELECT * FROM users WHERE name='$name' AND password='$password';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $name;
        // Rollhantering
        while ($row = $result->fetch_assoc()) {
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            if ($_SESSION['role'] == 'admin') {
                $_SESSION['admin_loggedin'] = true;
                $_SESSION['loggedin'] = true;
            } else {
                $_SESSION['user_loggedin'] = true;
                $_SESSION['loggedin'] = true;
            }

        }
        echo "<p class='text-center'</p>Welcome, " . $_SESSION['username'] . "!</p>";
        header("Location: yourpage.php");
    } else {
        echo "<p class='text-center'</p>Invalid username or password.</p>";
        echo "<p class='text-center'>Are you<a class='create' href='register.php'>registered?</a></p>";
    }
    $conn->close();
}

function isLogged()
{
    if (isset($_SESSION['user_logged']) || isset($_SESSION['admin_logged'])) {
        echo "<p class='text-center'>You are already logged in as " . $_SESSION['username'] . "</p>";
    } else {
        echo "<p class='text-center'>Please use the form to log in</p>";
    }
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
      <script
         src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
         integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
         crossorigin="anonymous"
         ></script>
      <script
         src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
         crossorigin="anonymous"
         ></script>
   </body>
</html>