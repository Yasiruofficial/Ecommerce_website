<?php 
session_start();

    if (isset($_SESSION['aname'])) {
    header('location: dashboard.php');
  }

?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">

        <link href="../css/admin/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/user/style.css">
        <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
        
        <title>ADMIN-T7S</title>
        

            <style>
                .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }
                
                @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                        font-size: 3.5rem;
                    }
                }
            </style>
           
            
    </head>

    <body class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12"><img class="mb-4 mx-auto" src="../images/admin/logom.png" alt=""> </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form class="form-signin" action="server.php" method="post">
                        <h1 class="h3 mb-3 font-weight-normal">ADMIN - LOGIN</h1>
                        <?php include('errors.php'); ?>
                            <label for="aname" class="sr-only">Username</label>
                            <input type="text" name="aname" id="aname" class="form-control" placeholder="Username" required autofocus pattern="[\w\s]+">
                            <label for="apass" class="sr-only">Password</label>
                            <input type="password" name="apass" id="apass" class="form-control" placeholder="Password" required pattern="[\w\s]+">
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="asignin" value="submit">Sign in</button>
                    </form>
                </div>
            </div>

        </div>

    </body>

    </html>