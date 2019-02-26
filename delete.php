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
   <body>
      <!-- Navigation -->
      <?php include 'navbar.php'?>
      <hr class="my-4">
      <!--- Two Column Section -->
      <div class="container-fluid padding">
      <div class="row padding">
      <div class="col-lg-6">
         <a name="aboutUs" class="a-dark">
            <h2>Search for a posts</h2>
         </a>
         <br>
         <form action="search.php" method="GET">
            <div class="form-group">
               <label>Post name</label>
               <input type="text" class="form-control" name="searchstring" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-dark">Search</button>
            <button type="submit" class="btn btn-dark">All products</button>
         </form>
      </div>
      <?php
echo "<div class='col-lg-4'>";
echo "<h2>Posts</h2><hr>";
include "dbaccess.php";
include "testinput.php";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = test_input($_GET["id"]);
    $sql = "SELECT * FROM shop WHERE id LIKE '%$id%';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if (isset($_SESSION['admin_loggedin'])) {
                //refer to array element name because of assosiative array
                echo "
                     <li class='list-group-item d-flex justify-content-between align-items-center'>
                     <a href=index.php style='color: black !important;'>Location: " . $row["location"] . "</a></li>
                     <li class='list-group-item'><b>Persons</b>: " . $row["persons"] . "</li>
                     <li class='list-group-item'><b>Diet</b>: " . $row["diet"] . "</li>
                     <li class='list-group-item'><b>Duration</b>: " . $row["duration"] . "</li>
                     <li class='list-group-item'><b>Departure</b>: " . $row["date"] . "</li>
                     <li class='list-group-item'><b>Poster</b>: " . $row["poster"] . "</li>
                     <li class='list-group-item'><b>Email</b>: " . $row["email"] . "</li>
                     <li class='list-group-item'><b>Created</b>: " . $row["created_date"] . "</li><br>
                     <p style='color: red;'>Are you sure you want to delete this request?</p>
                     <p><a class='a-dark' href='delete.php?delete=" . $row["id"] . "'>Delete product</a></p><hr>";
            }
        }
    } else {
        echo "0 results";
    }
}
if (isset($_GET["delete"])) {
    $id = test_input($_GET["delete"]);
    //echo "You are trying to delete '.$id.'";
    $sql = "DELETE FROM shop WHERE id = '$id'";
    $conn->query($sql);
    if ($conn->affected_rows > 0) {
        echo "Delete succesfull!<br>";
        echo "Bringing you back to your requests...";
        header("refresh:1.5;url=search.php");
    } else {
        echo "Delete unsuccesfull!";
    }
}
$conn->close();
echo "</div>";
echo "</div>";
echo "</div>";
?>
      <hr class="my-4">
      <!--- Footer -->
      <?php include "footer.php"?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>