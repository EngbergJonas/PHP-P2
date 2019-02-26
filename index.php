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

            <!--- Image Slider-->
            <?php include 'slider.php'?>
                <!--- Jumbotron -->
                <div class="container-fluid">
                    <div class="row jumbotron">
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                            <?php isLoggedIn();?>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                        </div>
                    </div>
                </div>
                <!--- Welcome Section -->
                <div class="container-fluid padding">
                    <div class="row welcome text-center">
                        <div class="col-12">
                            <h1 class="display-4">Engberg Camping</h1>
                        </div>
                        <hr>
                        <div class="col-12">
                            <p class="lead">Welcome to Engberg Camping.</p>
                        </div>
                    </div>
                </div>
                <!--- Three Column Section -->
                <div class="container-fluid padding">
                    <div class="row text-center padding">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <i class="far fa-id-badge fa-lg"></i>
                            <a href="#"><h3>Open positions</h3></a>
                            <p>Apply for open positions</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <i class="fas fa-map-marked"></i>
                            <a href="login.php"><h3>Trip planner</h3></a>
                            <p>Plan your trips</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <i class="far fa-comments"></i>
                            <a href="staff.php"><h3>Contact</h3></a>
                            <p>Contact our administration</p>
                        </div>
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
                <!--- Cards -->
                <div class="container-fluid padding">
                    <div class="row padding">
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="img/house.jpg">
                                <div class="card-body">
                                    <h4 class="card-title">Discover</h4>
                                    <p class="card-text">Discover trips and comment on other peoples memories from around the world.
                                    </p>
                                    <a href="discover.php" class="btn btn-outline-secondary">Check it out!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="img/drops.jpg">
                                <div class="card-body">
                                    <h4 class="card-title">Share</h4>
                                    <p class="card-text">With a registered account you can also share your memories with people around the world.
                                    </p>
                                    <a href="#" class="btn btn-outline-secondary">Check it out!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="img/magic.jpg">
                                <div class="card-body">
                                    <h4 class="card-title">Campers</h4>
                                    <p class="card-text">Join the community of campers right now! Here we help eachother and give you tips.
                                    </p>
                                    <a href="register.php" class="btn btn-outline-secondary">Check it out!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <!--- Two Column Section -->
                <div class="container-fluid padding">
                    <div class="row padding">
                        <div class="col-lg-6">
                            <a name="aboutUs" class="a-dark"><h2>About us</h2></a>
                            <br>
                            <p>Engberg Camping was founded in 2019, by Jonas Engberg as a school project.
                            </p>
                            <p>The idea of this website is for campers to join together and build a community between guides and beginners,
                                from around the world, everyone is welcome to join!.
                            </p>
                            <p>Engberg Camping lets users make requests with specified locations and price points.
                                Ones a request is made, our employees will be notified and users will be able to discuss the
                                terms of these trips, and come to a conclusion.
                            </p>
                            <p>Our staff is always happy to help as well as our growing community.
                            </p>
                            <p class="lead">Join our community by
                                <a href="register.php" class="register-link">registering</a> today!
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <img src="img/plane.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                <!--- Connect -->
                <!--- Footer -->
                <?php
function isLoggedIn()
{
    if (isset($_SESSION['loggedin'])) {
        echo "<p class='lead'>Welcome back, " . $_SESSION['username'] . ".</p>";
        echo "Today is " . date("Y-m-d") . "<br>";
    } else {
        echo "<p class='lead'>You are not logged in.</p>";
        echo "<p>This is a trip planner made by Jonas Engberg.</p>";
    }
}
?>
                    <?php include "footer.php"?>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

    </html>