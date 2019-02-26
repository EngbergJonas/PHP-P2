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
      <!--Staff page-->
      <div class="container-fluid padding">
         <div class="row welcome text-center">
            <div class="col-12">
               <h1 class="display-4">Contact staff</h1>
            </div>
            <hr>
            <div class="col-12">
               <p class="lead">Please give us your message</p>
            </div>
         </div>
      </div>
      <?php
include "dbaccess.php";
include "testinput.php";
$emailFrom = "";
$emailTo = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['contact'])) {
    $sql = "SELECT * FROM users WHERE name ='jonas';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $emailTo = $row['email'];
            if (!isset($_SESSION['email'])) {
                $emailFom = "moi@moi.com";
            } else {
                $emailFrom = $_SESSION['email'];
            }

        }
    } else {
        echo "0 results";
    }
    $conn->close();

    if (isset($_POST['contact'])) {
        $from = test_input($_POST['name']);
        $to = test_input($_POST['email']);
        $firstname = $_SESSION['username'];
        $subject = "Message from " . $from . ", <br>";
        $msg = "" . $firstname . " writes,<br>
                 " . $_POST["message"] . ".";
        mail($to, $subject, $msg);
        echo "<p class='text-center'>Message succesfully sent, we will contact you shortly</p>";
    }
}
?>
      <div class="container-fluid padding">
         <div class="col-md-6 mx-auto">
            <div class="card-body">
               <h4 class="card-title">Register</h4>
               <form action="contact.php" method="POST">
                  <div class="form-group">
                     <label>You email</label>
                     <input type="text" class="form-control" name="name" placeholder="Enter email" value="<?php echo $emailFrom; ?>">
                  </div>
                  <div class="form-group">
                     <label>To:</label>
                     <input type="email" class="form-control" name="email" value="<?php echo $emailTo; ?>">
                  </div>
                  <div class="form-group">
                     <label>Your message</label>
                     <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                  </div>
                  <button type="submit" name="contact" class="btn btn-primary">Send</button>
               </form>
            </div>
         </div>
      </div>
      </div>
      <hr class="my-4">
      <!--- Footer -->
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