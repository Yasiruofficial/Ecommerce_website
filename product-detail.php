<?php
session_start();
include_once('conn.php');

if(!(isset($_GET['pid'])))
{

  header("Location: index.php");

}
else{

  $pid = $_GET['pid'];
  $products = "SELECT * FROM products WHERE pid = $pid";
    $result = mysqli_query($db,$products);
  $row = mysqli_fetch_row($result);

  if(mysqli_num_rows($result) == 0)
  {
    header("Location: index.php");
  }
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <script src="js/user/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="apple-touch-icon.png" rel="apple-touch-icon">
        <link href="favicon.png" rel="icon">
        <meta name="author" content="Nghia Minh Luong">
        <meta name="keywords" content="Default Description">
        <meta name="description" content="Default keyword">
        <title>T7S - Product Detail</title>
        <!-- Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="plugins/ps-icon/style.css">
        <!-- CSS Library-->
        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.css">
        <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
        <link rel="stylesheet" href="plugins/slick/slick/slick.css">
        <link rel="stylesheet" href="plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="plugins/Magnific-Popup/dist/magnific-popup.css">
        <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="plugins/revolution/css/settings.css">
        <link rel="stylesheet" href="plugins/revolution/css/layers.css">
        <link rel="stylesheet" href="plugins/revolution/css/navigation.css">
        <!-- Custom-->
        <link rel="stylesheet" href="css/user/style.css">

        <script type="text/javascript">
            $(document).ready(function() {

                $('#psbtn').click(function() {

                    var pid = $(this).val();

                    $.ajax({

                        url: "server.php",
                        type: "POST",
                        data: {
                            addtocart: pid
                        },
                        success: function(data) {

                            alert(data);

                        }

                    })

                });

            });
        </script>

    </head>

    <body class="ps-loading">
        <div class="header--sidebar"></div>

        <?php include_once('header.php') ?>
        
        <div class="header-services">
            <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
                <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
                <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
            </div>
        </div>
        <main class="ps-main">
            <div class="test">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-product--detail pt-60">
                <div class="ps-container">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 col-lg-offset-1">
                            <div class="ps-product__thumbnail">

                                <div class="ps-product__image">

                                    <?php $ppid = explode("../",$row[5]); ?>

                                    <div align="center"><img width="100%" src="<?php echo $ppid[1] ?>" alt=""></div>
                                </div>
                            </div>

                            <div class="ps-product__info">
                                <div class="ps-product__rating">
                                    <select class="ps-rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <h1><?php echo $row[1] ?></h1>
                                <p class="ps-product__category">
                                    <a href="#">
                                        <?php echo $row[4] ?>
                                    </a>
                                </p>
                                <h3 class="ps-product__price">Rs.<?php echo $row[2] ?></h3>
                                <div class="ps-product__block ps-product__quickview">
                                    <h4>QUICK REVIEW</h4>
                                    <p>
                                        <?php echo $row[3] ?>
                                    </p>
                                </div>

                                <form action="server.php" method="POST">

                                    <div class="ps-product__shopping">

                                        <button type="button" name="addtocart" value="<?php echo $pid ?>" class="ps-btn mb-10" id="psbtn">Add to cart</button>

                                    
                                    </div>
                            </div>

                            </form><div class="clearfix"></div>
                    </div>
                </div>
            </div>
            </div>
        </main>
        <!-- JS Library-->
        <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
        <script type="text/javascript" src="plugins/owl-carousel/owl.carousel.min.js"></script>
        <script type="text/javascript" src="plugins/gmap3.min.js"></script>
        <script type="text/javascript" src="plugins/imagesluser/oaded.pkgd.js"></script>
        <script type="text/javascript" src="plugins/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="plugins/jquery.matchHeight-min.js"></script>
        <script type="text/javascript" src="plugins/slick/slick/slick.min.js"></script>
        <script type="text/javascript" src="plugins/elevatezoom/jquery.elevatezoom.js"></script>
        <script type="text/javascript" src="plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
        <script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <!-- Custom scripts-->
        <script type="text/javascript" src="js/user/main.js"></script>

    </body>

    </html>