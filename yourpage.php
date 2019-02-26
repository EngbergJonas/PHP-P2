<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
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
      <div class="container-fluid padding">
         <div class="row welcome text-center">
            <div class="col-12">
               <h1 class="display-4"><?php echo $user; ?> page</h1>
               <hr>
               <br>
               <h2>How to use our services</h2>
               <br>
               <p>Here you can post a request for a camping trip that will be notified to our employees.
               </p>
               <p>After posting your trip requests you will be notified, and ones one of our expert campers
                  have recieved your requests you will be able to discuss the terms in private.
               </p>
               <p>Happy camping!</p>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row justify-content-center text-center">
            <div class="col-md-4">
               <i class="fas fa-map-marked"></i>
               <a href="yourrequests.php">
                  <h3>Your requests</h3>
               </a>
               <p>All your trips can be found here</p>
            </div>
            <div class="col-md-4">
               <i class="far fa-comments"></i>
               <a href="staff.php">
                  <h3>Contact</h3>
               </a>
               <p>Contact our administration</p>
            </div>
         </div>
      </div>
      <hr class="my-4">
      <div class="container-fluid padding">
         <div class="row text-center">
            <div class="col-sm-4 offset-sm-4 text-center">
               <h2>Post a request</h2>
               <br>
               <form action="yourpage.php" method="POST">
                  <div class="form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="location" placeholder="Specify where you would like to go."><br>
                     <label>Persons</label>
                     <select type="text" class="form-control" name="persons"">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>More (discussed)</option>
                     </select>
                     <br>
                     <label>Diet</label>
                     <input type="text" class="form-control" name="diet" placeholder="Specify any possible diets or allergies."><br>
                     <label>Duration</label>
                     <select type="text" class="form-control" name="duration"">
                        <option>1 day</option>
                        <option>2 days</option>
                        <option>3 days</option>
                        <option>4 days</option>
                        <option>5 days</option>
                        <option>Do you really wanna stay longer?</option>
                     </select>
                     <br>
                     <label>Date</label>
                     <input type="text" class="form-control" name="date" placeholder="When would you like to departure? (Year-Month-Day)">
                  </div>
                  <button type="submit" class="btn btn-dark" name="post" value="Post">Post</button>
               </form>
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

if (isset($_POST['post'])) {
    $location = test_input($_POST['location']);
    $persons = test_input($_POST['persons']);
    $diet = test_input($_POST['diet']);
    $duration = test_input($_POST['duration']);
    $date = test_input($_POST['date']);
    $email = $_SESSION['email'];
    $sql = "INSERT INTO shop (location, persons, diet, duration, date, poster, email)
                           VALUES ('$location', '$persons', '$diet', '$duration', '$date', '$user', '$email');";

    $result = $conn->query($sql);
    if ($conn->affected_rows > 0) {
        echo "<div class='col-4'><p>Thank you for your request!</p></div>";
    } else {
        echo "<div class='col-4'><<p>Could not process your request, contact Staff if the problem persists.</p></div>";
    }
}
$conn->close();
?>
         </div>
      </div>
      <hr class="my-4">
      <!--- Footer -->
      <?php include "footer.php"?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>