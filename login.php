<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial">
        <title>Game Rater</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- <link rel="stylesheet" href="homepage/css/styles2.css" /> -->
        <link rel="stylesheet" href="CSS/loginStyles.css" />

        <script src="scripts/scripts.js" defer></script>
    </head>

<header>
    <div class="head">
        <div class="title">
            <label for="">Game Rater</label>
            <a href="#">Home</a>
        </div>
        <div class="nav">
            <a href="../Control/ControlLogout.php">Logout</a>
            <a href="../register.php">Sign Up</a>
        </div>
    </div>

</header>

<body>
        <main>
            <section class="glass-login">
                <div class="login-form">
                    <div class="wrapper fadeInDown">
                        <div id="formContent">
                            <div class="fadeIn first">
                                <h3>Login</h3>
                            </div>
                        <!-- Login Form -->
                        <form action="Control/ControlLogin.php" method="POST">
                            <input type="text" id="login" class="fadeIn second" name="username" placeholder="Email">
                            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
                            <input type="submit" class="fadeIn fourth" value="Log In">
                        </form>
                        <div id="formFooter">
                            <a class="underLineHover" href="register.php">Don't Have an Account?</a>
                        </div>

                        </div>
                     </div>


                </div>
            </section>
                

            
        </main>

        <div class="circle1"></div>
        <div class="circle2"></div>

    </body>


</html>