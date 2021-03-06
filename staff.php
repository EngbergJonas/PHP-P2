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

            <!--Staff page-->
            <div class="container-fluid padding">
                <div class="row welcome text-center">
                    <div class="col-12">
                        <h1 class="display-4">Staff</h1>
                    </div>
                    <hr>
                    <div class="col-12">
                        <p class="lead">At Engberg Camping we are always happy to help</p>
                    </div>
                </div>
            </div>
            <div class="container-fluid padding">
                <div class="row text-center padding">
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="img/jonas.jpg">
                            <div class="card-body">
                                <h4 class="card-title">Jonas</h4>
                                <p class="card-text">Founder of Engberg Camping.
                                </p>
                                <form action="contact.php" method="GET">
                                    <button type="submit" name="contact" class="btn btn-outline-secondary">Contact!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="img/matts.jpg">
                            <div class="card-body">
                                <h4 class="card-title">Matts</h4>
                                <p class="card-text">Content.
                                </p>
                                <a href="#" class="btn btn-outline-secondary">Contact!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="img/niklas.jpg">
                            <div class="card-body">
                                <h4 class="card-title">Niklas</h4>
                                <p class="card-text">Content.
                                </p>
                                <a href="#" class="btn btn-outline-secondary">Contact!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="img/matias.jpg">
                            <div class="card-body">
                                <h4 class="card-title">Matias</h4>
                                <p class="card-text">Vietnam vet.
                                </p>
                                <a href="#" class="btn btn-outline-secondary">Contact!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <!--- Footer -->
            <?php include "footer.php"?>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

    </html>