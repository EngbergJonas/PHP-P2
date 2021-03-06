<?php
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
    header("Location: index.php");
} else {
    $user = $_SESSION['username'];
}
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
   <?php
?>
   <body>
      <!-- Navigation -->
      <?php include 'navbar.php'?>
      <!--Staff page-->
      <div class="container-fluid padding">
         <div class="row welcome text-center">
            <div class="col-12">
               <h1 class="display-4">Admin</h1>
            </div>
            <hr>
            <div class="col-12">
               <h2>Customer requests</h2>
               <br>
               <form action="search.php" method="get">
                  <button class="btn btn-dark">Manage customer requests</button>
               </form>
            </div>
         </div>
      </div>
      <hr class="my-4">
      <div class="container-fluid padding">
      <div class="row text-center">
      <div class="col-sm-4 offset-sm-4 text-center">
      <h2>Users</h2>
      <form action="admin.php" method="GET" class="justify-content-center">
         <div class="col-12 center-block">
            <input type="text" class="form-control" name="searchstring" placeholder="Search">
         </div>
         <button type="submit" class="btn btn-dark">Search</button>
      </form>
      <hr class="my-4">
      <?php
include "dbaccess.php";
include "testinput.php";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['id'])) {
    $id = test_input($_GET["id"]);
    $sql = "SELECT * FROM users WHERE id LIKE '%$id%';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if (isset($_SESSION['admin_loggedin'])) {
                //refer to array element name because of assosiative array
                echo "
                         <li class='list-group-item'><b>Username</b>: " . $row["name"] . "</li>
                         <li class='list-group-item'><b>Email</b>: " . $row["email"] . "</li>
                         <li class='list-group-item'><b>Role</b>: " . $row["role"] . "</li>
                         <li class='list-group-item'><b>Status</b>: " . $row["status"] . "</li><br>
                         <p style='color: red;'>Are you sure you want to promote this user?</p>
                         <p><a class='a-dark' href='updateuser.php?update=" . $row["id"] . "'>Promote user</a></p><hr>";
            }
        }
    } else {
        echo "0 results";
    }
}
if (isset($_GET["update"])) {
    $id = test_input($_GET["update"]);
    //echo "You are trying to delete '.$id.'";
    $sql = "UPDATE users SET role='admin' WHERE id = '$id'";
    $conn->query($sql);
    if ($conn->affected_rows > 0) {
        echo "User promoted succesfully!<br>";
        echo "Bringing you back to the admin page...";
        header("refresh:1.5;url=admin.php");
    } else {
        echo "Couldn't promote user!";
    }
}
$conn->close();
echo "</div>";
echo "</div>";
echo "</div>";
?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>