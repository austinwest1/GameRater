<?php
require_once('View/Common/header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Game Rater</title>

    <link href="CSS/registerStyles.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">My Games</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Control/ControlLogout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../register.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <h3>Sign Up Here</h3>
            </div>

            <!-- Login Form -->
            <form action="Control/ControlUserInsert.php" method="POST">
                <input type="text" id="login" class="fadeIn second" name="username" placeholder="Email">
                <input type="text" id="login" class="fadeIn second" name="firstName" placeholder="First Name">
                <input type="text" id="login" class="fadeIn second" name="lastName" placeholder="Last Name">

                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Sign Up">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="underLineHover" href="login.php">Already Have an Account?</a>
            </div>

        </div>
    </div>

</body>

<?php
require_once('View/Common/footer.php');
?>


</html>

<style>

</style>