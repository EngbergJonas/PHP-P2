<!--"md" is the breakpoint where it switching from mobile to expanded
the rest is bootstrap designs-->
<nav class="navbar navbar-expand-md navbar-light sticky-top">
    <div class="container-fluid">
        <!--The logo-->
        <a class="navbar-brand" href="index.php">EC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive" />
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#aboutUs">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="staff.php">Staff</a>
            </li>
            <?php
if (isset($_SESSION['admin_loggedin'])) {
    echo "<li class='nav-item'><a class='nav-link' href='admin.php'>Administration</a></li>";
}
if (isset($_SESSION['loggedin'])) {
    echo "<li class='nav-item'><a class='nav-link' href='yourpage.php'>" . $_SESSION['username'] . "</a></li>";
    echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Log out</a></li>";
} else {
    echo "<li class='nav-item'><a class='nav-link' href='login.php'>Sign in</a></li>";
    echo "<li class='nav-item'><a class='nav-link' href='register.php'>Sign up</a></li>";
}

?>
        </ul>
    </div>
    </div>
</nav>