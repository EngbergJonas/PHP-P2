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
    <h1>Project 2</h1>
</div>
</div>
<div class="main">
<div class="container-right">
    <form action="insert.php" method="POST">
    <p>Put a product for sale</p>
    <div class="col-25">Title</div>
    <div class="col-75"><input type="text" name="title" /><br></div>
    <div class="col-25">Description</div>
    <div class="col-75"><input type="text" name="description" /><br></div>
    <div class="col-25">Merchant</div>
    <div class="col-75"><input type="text" name="merchant" /><br></div>
    <div class="col-25">Price</div>
    <div class="col-75"><input type="text" name="price" /><br></div>
    <input type="submit" name="insert" value="Insert" />
    </form>

<?php
include "dbaccess.php";
include "testinput.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";
if (isset($_POST['insert'])) {
    $title = test_input($_POST['title']);
    $description = test_input($_POST['description']);
    $merchant = test_input($_POST['merchant']);
    $price = test_input($_POST['price']);
    $date = "2019-01-11"; //TODO: date()
    $sql = "INSERT INTO shop (title, description, merchant, price, date)
            VALUES ('$title', '$description', '$merchant', '$price', '$date');";

    $result = $conn->query($sql);
    if ($conn->affected_rows > 0) {
        echo "Insert succesfull!";
    } else {
        echo "Insert unsuccesfull!";
    }
}
$conn->close();
?>
</div>
</div>
</div>
</body>
</html>