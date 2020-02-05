<?php session_start(); 

if (isset($_SESSION['uemail'])) {
    header('location: index.php');
  }

?>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign In - T7S</title>

        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/user/login.css">

        <?php include_once("boostraplink.php"); ?>

    </head>

    <body>

        <div class="main">

            <!-- Sing in  Form -->
            <section class="sign-in">
                <div class="container ">
                    <div class="signin-content">
                        <div class="signin-image">
                            <figure><img src="images/user/logom.png" alt="sing up image"></figure>
                            <a href="register.php" class="signup-image-link">Create an account</a>
                            <a href="index.php" class="signup-image-link">
                                <-Back to Home</a>
                        </div>

                        <div class="signin-form">
                            <h2 class="form-title">Sign in</h2>

                            <?php include_once("errors.php") ?>

                                <form method="POST" class="register-form" id="login-form" action="server.php">

                                    <div class="form-group">
                                        <label for="uemail"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input type="email" name="uemail" id="uemail" placeholder="Email" required="" />
                                    </div>

                                    <div class="form-group">
                                        <label for="upass"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="upass" id="upass" placeholder="Password" required="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="remember" id="remember" class="agree-term" />
                                        <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                                    </div>
                                    <div class="form-group form-button">
                                        <input type="submit" name="usignin" id="signin" class="form-submit" value="Log_in" />
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
            </section>

        </div>

    </body>

    </html>