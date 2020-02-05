<?php
   session_start();
   include_once('conn.php');
    
    if(isset($_POST['search'])){

      $search = $_POST['search'];
      $q = "SELECT * FROM products WHERE pname LIKE '%$search%'";

    }
    else if(isset($_GET['search'])) {

      $search = $_GET['search'];
      $q = "SELECT * FROM products WHERE pname LIKE '%$search%'";

    }
    else{

      $q = "SELECT * FROM products";
    }
    

    $result = mysqli_query($db,$q);
    $NumofRows = mysqli_num_rows($result);
    $CountRows = $NumofRows;


     //counting rows and calculating pages
     if($CountRows == 0)
     {
       $CountRows = 1;
       echo "<script>alert('No Items')</script>";
     }
   
     if (($CountRows%9) == 0 )
     {
       $lastPage = intdiv($CountRows , 9);
     }
   
     else
     {
       $lastPage = intdiv($CountRows, 9)+1;
     }
   
     if (!isset($_GET['page'])) {
   
      $_GET['page'] = 1;
   
     }

     //rederect 404
   
     if (($_GET['page'] < 1) || ($_GET['page'] > $lastPage)) {
   

      header("Location: 404.html"); 
   
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
      <title>T&S-Products</title>
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
   </head>
   <body class="ps-loading">
      <div class="header--sidebar"></div>

      <?php include_once('header.php') ?>
      
      <div class="header-services">
         <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with T7S Store</p>
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with T7S Store</p>
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with T7S Store</p>
         </div>
      </div>
      <main class="ps-main">
         <div class="ps-products-wrap inverse pt-80 pb-80">
            <div class="ps-products" data-mh="product-listing">
               <div class="ps-product__columns">

                  <?php
                     if (isset($_GET['page'])) 
                     {
                     
                       $page = $_GET['page'];
                     
                       $startItem = 9 * ($page -1 );

                      if(isset($_POST['search']) || isset($_GET['search'])){

                        $q = "SELECT * FROM products WHERE pname LIKE '%$search%' LIMIT $startItem , 9 ";
                      }
                      else{

                          $q = "SELECT * FROM products LIMIT $startItem , 9 ";
                      }

                       $result = mysqli_query($db,$q);
                     
                       while ($row = mysqli_fetch_row($result))
                       {

                        $ppid = explode("../",$row[5]);
                     
                       ?>

                  <div class="ps-product__column">
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
                  <?php } }?>

               </div>

               <?php  if(isset($_GET['page']) && ( isset($_POST['search']) || isset($_GET['search'])) ) { ?>

               <div class="ps-product-action">
                  <div class="ps-pagination">
                     <ul class="pagination">
                        <?php if($NumofRows > 0) { ?>
                        <li><a href="product-listing.php?page=1&&search=<?php echo $search ?>">1</a></li>
                        <?php } ?>
                        <?php if($_GET['page'] != 1) { ?>
                        <li><a href="product-listing.php?page=<?php echo $_GET['page'] - 1?>&&search=<?php echo $search ?>"><i class="fa fa-angle-left"></i></a></li>
                        <?php } ?>
                        <?php if($_GET['page'] != $lastPage) { ?>
                        <li><a href="product-listing.php?page=<?php echo $_GET['page'] + 1?>&&search=<?php echo $search ?>"><i class="fa fa-angle-right"></i></a></li>
                        <?php } ?>
                        <?php if($lastPage != 1) { ?>
                        <li>
                           <a href="product-listing.php?page=<?php echo $lastPage ?>&&search=<?php echo $search ?>">
                           <?php echo $lastPage; ?>
                           </a>
                        </li>
                        <?php } ?>
                     </ul>
                  </div>
               </div>
                <?php   }else{ ?>
                <div class="ps-product-action">
                  <div class="ps-pagination">
                     <ul class="pagination">
                        <?php if($NumofRows > 0) { ?>
                        <li><a href="product-listing.php?page=1">1</a></li>
                        <?php } ?>
                        <?php if($_GET['page'] != 1) { ?>
                        <li><a href="product-listing.php?page=<?php echo $_GET['page'] - 1?>"><i class="fa fa-angle-left"></i></a></li>
                        <?php } ?>
                        <?php if($_GET['page'] != $lastPage) { ?>
                        <li><a href="product-listing.php?page=<?php echo $_GET['page'] + 1?>"><i class="fa fa-angle-right"></i></a></li>
                        <?php } ?>
                        <?php if($lastPage != 1) { ?>
                        <li>
                           <a href="product-listing.php?page=<?php echo $lastPage ?>">
                           <?php echo $lastPage; ?>
                           </a>
                        </li>
                        <?php } ?>
                     </ul>
                  </div>
               </div>
              <?php   } ?>
            </div>
            <div class="ps-sidebar" data-mh="product-listing">
               <aside class="ps-widget--sidebar ps-widget--category">
                  <div class="ps-widget__header">
                     <h3>T7S Brand</h3>
                  </div>
                  <div class="ps-widget__content">
                    OUR PRODUCTS
                     <ul class="ps-list">
                        <li class="current">Nike</li>
                        <li>Adidas</li>
                        <li>Women</li>
                        <li>Men</li>
                        <li>Kids</li>
                     </ul>
                  </div>
               </aside>
            </div>
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