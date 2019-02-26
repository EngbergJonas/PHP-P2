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
      <!--- Two Column Section -->
      <div class="container-fluid padding">
         <div class="row welcome text-center">
            <div class="col-12">
               <h1 class="display-4">Customer requests</h1>
            </div>
            <hr>
         </div>
      </div>
      <div class="container-fluid padding">
      <div class="row padding">
      <div class="col-md-6">
         <h2>Search for a post</h2>
         <br>
         <form action="search.php" method="GET">
            <div class="form-group">
               <label>Post name</label>
               <input type="text" class="form-control" name="searchstring" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-dark">Search</button>
         </form>
      </div>
      <?php
echo "<div class='col-lg-4'>";
echo "<h2>Post</h2><hr>";
include "dbaccess.php";
include "testinput.php";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET["searchstring"])) {
    $searchstring = test_input($_GET["searchstring"]);
    $sql = "SELECT * FROM shop WHERE poster LIKE '%$searchstring%' OR location LIKE '%$searchstring%' OR date LIKE '%$searchstring%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
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
                     <li class='list-group-item'><b>Created</b>: " . $row["created_date"] . "</li><br>";
            if (isset($_SESSION['admin_loggedin'])) {
                echo "<p><a class='a-dark' href='delete.php?id=" . $row["id"] . "'>Delete product</a></p><hr>";
            }
        }
    } else {
        echo "<p>No products found.</p>";
        $conn->close();
    }
} else {
    echo "<p>Write a product in the field and click search</p>";
}
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