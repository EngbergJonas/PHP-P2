<?php
session_start();
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>PHP Project 2</title>
      <meta name="viewport" content="width=device-width", initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="css/style.css"/>
   </head>
   <body>
      <div class="header">
         <h1 class="title">&lt;?Projekt 2&gt;</h1>
      </div>
      <?php include "navbar.php"?>
      <div class="row">
         <div class="side">
            <div class="container-left">
               <h1>MySQL database</h1>
            </div>
         </div>
         <div class="main">
            <div class="container-right">
               <?php
include "dbaccess.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

//When succesfull connection select something form the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        //refer to array element name because of assosiative array
        echo "id: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . " - Role: " . $row["role"] . "<br>";
    }
} else {
    echo "0 results";
}
//ALWAYS CLOSE THE DATABASE CONNECTION WHEN DONE
$conn->close();
?>
            </div>
         </div>
      </div>
   </body>
</html>