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
        <title>T7S-Sign-In</title>

        <link rel="stylesheet" href="css/user/login.css">

        <?php include_once("boostraplink.php"); ?>

    </head>

    <body>

        <div class="main">

            <!-- Sign up form -->
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Sign up</h2>

                            <?php include_once("errors.php"); ?>

                                <form method="POST" class="register-form" id="register-form" action="server.php">

                                    <div class="form-group">
                                        <label for="uname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input type="text" name="uname" id="uname" placeholder="Your Name" required="" />
                                    </div>

                                    <div class="form-group">
                                        <label for="uemail"><i class="zmdi zmdi-email"></i></label>
                                        <input type="email" name="uemail" id="uemail" placeholder="Your Email" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="upass"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="upass" id="upass" placeholder="Password" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="upass2"><i class="zmdi zmdi-lock-outline"></i></label>
                                        <input type="password" name="upass2" id="upass2" placeholder="Repeat your password" required="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required="" />
                                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                                    </div>
                                    <div class="form-group form-button">
                                        <input type="submit" name="usignup" id="usignup" class="form-submit" value="Register" />
                                    </div>
                                </form>
                        </div>
                        <div class="signup-image">
                            <figure><img src="images/user/logom.png" alt="sing up image"></figure>
                            <a href="login.php" class="signup-image-link">I am already member</a>
                            <br>
                            <a href="index.php" class="signup-image-link">
                                <-Back to Home</a>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </body>

    </html>