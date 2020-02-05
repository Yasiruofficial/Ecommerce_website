<?php 
session_start();

include_once("conn.php");


 ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <script type="text/javascript" src="js/admin/uc/jquery.min.js"></script>
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
        <title>T7S-HOME</title>

        <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="plugins/ps-icon/style.css">

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

        <link rel="stylesheet" href="css/user/style.css">

        <style type="text/css">
            .MyFilter
            {
                display: none;
            }
        </style>

        <script type="text/javascript">
          $(document).ready(function(){

            $('a.Nike').click(function(){

            $('div.nike').removeClass('MyFilter');
            $('div.adidas').addClass('MyFilter');
            $('div.men').addClass('MyFilter');
            $('div.women').addClass('MyFilter');
            $('div.kids').addClass('MyFilter');

            });
            $('a.Adidas').click(function(){

            $('div.nike').addClass('MyFilter');
            $('div.adidas').removeClass('MyFilter');
            $('div.men').addClass('MyFilter');
            $('div.women').addClass('MyFilter');
            $('div.kids').addClass('MyFilter');

            });
            $('a.Men').click(function(){

           $('div.nike').addClass('MyFilter');
            $('div.adidas').addClass('MyFilter');
            $('div.men').removeClass('MyFilter');
            $('div.women').addClass('MyFilter');
            $('div.kids').addClass('MyFilter');;

            });
            $('a.Women').click(function(){

            $('div.nike').addClass('MyFilter');
            $('div.adidas').addClass('MyFilter');
            $('div.men').addClass('MyFilter');
            $('div.women').removeClass('MyFilter');
            $('div.kids').addClass('MyFilter');

            });
            $('a.Kids').click(function(){
            
            $('div.nike').addClass('MyFilter');
            $('div.adidas').addClass('MyFilter');
            $('div.men').addClass('MyFilter');
            $('div.women').addClass('MyFilter');
            $('div.kids').removeClass('MyFilter');

            });

            $('a.All').click(function(){

            $('div.nike').removeClass('MyFilter');
            $('div.adidas').removeClass('MyFilter');
            $('div.men').removeClass('MyFilter');
            $('div.women').removeClass('MyFilter');
            $('div.kids').removeClass('MyFilter');

            });

          });  
        </script>

    </head>

    <body class="ps-loading">
        <div class="header--sidebar"></div>

        <?php include_once('header.php') ?>

            <div class="header-services">
                <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                    <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Team 7 Store</p>
                    <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Team 7 Store</p>
                    <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Team 7 Store</p>
                </div>
            </div>
            <main class="ps-main">
                <div class="ps-banner">
                    <div class="rev_slider fullscreenbanner" id="home-banner">
                        <ul>
                            <li class="ps-banner" data-index="rs-2972" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0"><img class="rev-slidebg" src="images/user/slider/3.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
                                <div class="tp-caption ps-banner__header" id="layer-1" data-x="left" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-150','-120','-150','-170']" data-width="['none','none','none','400']" data-type="text" data-responsive_offset="on" data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                                    <p>March 2002
                                        <br> Nike SB Dunk Low Pro</p>
                                </div>
                                <div class="tp-caption ps-banner__title" id="layer21" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-60','-40','-50','-70']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                                    <p class="text-uppercase">Team 7 Store</p>
                                </div>
                                <div class="tp-caption ps-banner__description" id="layer211" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['30','50','50','50']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                                    <p>Our lucky team is natually blessed with <br> 
                                       high team spirit as its memeber have equally <br> contributed to the success of this project. <br> A team to be reckoned with</p>
                                </div><a class="tp-caption ps-btn" id="layer31" href="product-listing.php" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['120','140','200','200']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">Purchase Now<i class="ps-icon-next"></i></a>
                            </li>
                            <li class="ps-banner ps-banner--white" data-index="rs-100" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0"><img class="rev-slidebg" src="images/user/slider/2.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
                                
                              
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100"  >
                    <div class="ps-container" >

                        <div class="ps-section__header mb-50" >
                            <h3 class="ps-section__title" data-mask="features">- Features Products</h3>
                            <ul class="ps-masonry__filter" >
                                <li class="current"><a href="#" class="All">All</a></li>
                                <li><a href="#" class="Nike" >Nike</a></li>
                                <li><a href="#" class="Adidas" >Adidas</a></li>
                                <li><a href="#" class="Men" >Men</a></li>
                                <li><a href="#" class="Women" >Women</a></li>
                                <li><a href="#" class="Kids" >Kids</a></li>
                            </ul>
                        </div>

                        <div class="ps-section__content pb-50" >
                            <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%" >

                                <div class="ps-masonry" >
                                    <div class="grid-sizer" ></div>

                                    <?php

                    $products = "SELECT * FROM products ORDER BY pid DESC";

                    $result = mysqli_query($db,$products); 

                    
                    $i = 0;
                    while (($row = mysqli_fetch_row($result)) && ($i < 8)) {

                    $ppid = explode("../",$row[5]); 

                ?>

                                        <div class="grid-item">
                                            <div class="grid-item__content-wrapper <?php echo $row[4] ?>">
                                                <div class="ps-shoe mb-30">
                                                    <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>

                                                        <img src="<?php echo $ppid[1]; ?>" alt="">
                                                        <a class="ps-shoe__overlay" href="product-detail.php?pid=<?php echo $row[0] ?>"></a>
                                                    </div>
                                                    <div class="ps-shoe__content">

                                                        <div class="ps-shoe__variants">
                                                            <select class="ps-rating ps-shoe__rating">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select>
                                                        </div>

                                                        <div class="ps-shoe__detail">
                                                            <a class="ps-shoe__name" href="product-detail.php?pid=<?php echo $row[0] ?>">
                                                                <?php echo $row[1]; ?>
                                                            </a>
                                                            <p class="ps-shoe__categories">
                                                                <a href="#">
                                                                    <?php echo $row[4] ?>
                                                                </a>
                                                            </p>
                                                            <span class="ps-shoe__price"><?php echo "<br> RS " .  $row[2] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php $i++; } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ps-section--offer">
                    <div class="ps-column">
                        <a class="ps-offer" href="product-listing.html"><img src="images/user/banner/hb1.png" alt=""></a>
                    </div>
                    <div class="ps-column">
                        <a class="ps-offer" href="product-listing.html"><img src="images/user/banner/hb2.png" alt=""></a>
                    </div>
                </div>

                <div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-80">
                    <div class="ps-container">

                        <div class="ps-section__header mb-50">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                                    <h3 class="ps-section__title" data-mask="BEST SALE">- Top Sales</h3>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                                </div>
                            </div>
                        </div>

                        <div class="ps-section__content">
                            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">

                                <?php

                    $products = "SELECT * FROM products ORDER BY pdown DESC";
                    $result = mysqli_query($db,$products); 
                    $i = 0;
                    while (($row = mysqli_fetch_row($result)) && ($i < 5)) {
                    $ppid = explode("../",$row[5]);

                ?>

                                    <div class="ps-shoes--carousel">
                                        <div class="ps-shoe">
                                            <div class="ps-shoe__thumbnail">
                                                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="<?php echo $ppid[1]; ?> " alt="">
                                                <a class="ps-shoe__overlay" href="product-detail.php?pid=<?php echo $row[0] ?>"></a>
                                            </div>
                                            <div class="ps-shoe__content">
                                                <div class="ps-shoe__variants">
                                                    <select class="ps-rating ps-shoe__rating">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select>
                                                </div>
                                                <div class="ps-shoe__detail">
                                                    <a class="ps-shoe__name" href="product-detail.php?pid=<?php echo $row[0] ?>">
                                                        <?php echo $row[1]; ?>
                                                    </a>
                                                    <p class="ps-shoe__categories">
                                                        <?php echo $row[4]; ?></p><span class="ps-shoe__price"><?php echo "<br> RS " .  $row[2] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $i++; } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="ps-home-testimonial bg--parallax pb-80" data-background="images/user/background/parallax.jpg">
                    <div class="container">
                        <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">

                            <div class="ps-testimonial">
                                <div class="ps-testimonial__thumbnail"><img src="images/user/testimonial/logo.png" alt=""><i class="fa fa-quote-left"></i></div>
                                <header>
                                    <select class="ps-rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <p>Lucky7 Team</p>
                                </header>
                                <footer>
                                    <p>Our lucky team is natually blessed with high team spirit as its memeber have equally contributed to the success of this project. A teame to be reckoned with </p>
                                </footer>
                            </div>

                            <div class="ps-testimonial">
                                <div class="ps-testimonial__thumbnail"><img src="images/user/testimonial/1.jpg" alt=""><i class="fa fa-quote-left"></i></div>
                                <header>
                                    <select class="ps-rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <p>NSBM Green University</p>
                                </header>
                                <footer>
                                    <p>NSMB is an oasis in the desert of Sri Lanka's Higher Education. A fine resourceful location, both material and huamn, where students can easily quench their hunger for knoledge to transform them into global citizens </p>
                                </footer>
                            </div>

                            <div class="ps-testimonial">
                                <div class="ps-testimonial__thumbnail"><img src="images/user/testimonial/2.jpg" alt=""><i class="fa fa-quote-left"></i></div>
                                <header>
                                    <select class="ps-rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <p>Naji</p>
                                </header>
                                <footer>
                                    <p>Our lecturer, Mr. Naji, is none other than an extension of duishen clan of teachers whose dedication to sow the seed of high quality education in his students, in the midst of numerous difficulties, is simply remarkable</p>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ps-home-contact">
                    <div id="contact-map" data-address="New York, NY" data-title="BAKERY LOCATION!" data-zoom="17"></div>
                    <div class="ps-home-contact__form">
                        <header>
                            <h3>Contact Us</h3>
                            <p>Learn about our company profile, communityimpact, sustainable motivation, and more.</p>
                        </header>
                        <footer>
                            <form action="product-listing.html" method="post">
                                <div class="form-group">
                                    <label>Name<span>*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Email<span>*</span></label>
                                    <input class="form-control" type="email">
                                </div>
                                <div class="form-group">
                                    <label>Your message<span>*</span></label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button class="ps-btn">Send Message<i class="fa fa-angle-right"></i></button>
                                </div>
                            </form>
                        </footer>
                    </div>
                </div>
                <div class="ps-subscribe">
                    
                </div>
            
            </main>
            <!-- JS Library-->
            <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
            <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
            <script type="text/javascript" src="plugins/owl-carousel/owl.carousel.min.js"></script>
            <script type="text/javascript" src="plugins/gmap3.min.js"></script>
            <script type="text/javascript" src="plugins/imagesloaded.pkgd.js"></script>
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