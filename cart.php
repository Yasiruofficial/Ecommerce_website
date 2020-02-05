<!DOCTYPE html>
<?php
   session_start();
   
   if (!isset($_SESSION['uemail'])) {
       header('location: index.php');
     }
   
     include_once('conn.php');
     include_once('header.php');
   
     $uemail = $_SESSION['uemail'];
     $q = "SELECT uid FROM users WHERE uemail = '" . $uemail ."'";
     $result = mysqli_query($db,$q);
     $uid = mysqli_fetch_row($result);
   
   ?>
<html lang="en">
   <head>
      <script src="js/admin/uc/jquery.min.js"></script>
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
      <title>Cart-TeaM7StorE</title>
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
      <link rel="stylesheet" href="css/admin/style1.css">
      <!--Delete item-->
      <script type="text/javascript">
         $(document).ready(function() {
         
             $('.ps-remove').click(function() {
         
                 var id = $(this).attr('id');
         
                 var FinalDes = confirm("Do you wan to delete Item permenently?");
         
                 if (FinalDes) {
                     $.ajax({
         
                         url: "server.php",
                         type: "POST",
                         data: {
                             oid: id
                         },
                         success: function(data) {
         
                             alert(data);
         
                         }
         
                     });
         
                     window.location = "cart.php";
         
                 }
         
             });
         
         });
      </script>
      <!--PAY-->
      <script type="text/javascript">
         $(document).ready(function() {
         
             $('#psbtn').click(function() {
         
                 var pid = $(this).val();
         
                 $.ajax({
         
                     url: "server.php",
                     type: "POST",
                     data: {
                         pay: pid
                     },
                     success: function(data) {
         
                         alert(data);
         
                     }
         
                 })
                 window.location = "cart.php";
         
             });
         
         });
      </script>
   </head>
   <body>
      <div class="header--sidebar"></div>

      <?php include_once('header.php') ?>
      
      <div class="ps-content pt-80 pb-80">
      <div class="ps-container">
         <div class="ps-cart-listing">
            <table class="table ps-cart__table">
               <thead>
                  <tr>
                     <th colspan="5">
                        <center>
                           <a href="index.php">
                           <img src="images/admin/logom.png">
                           </a>
                        </center>
                        <br>
                        <h1 align="center">MY CART</h1>
                     </th>
                  </tr>
               </thead>
               <thead>
                  <tr>
                     <th>PRODUCT NAME</th>
                     <th>Product ID</th>
                     <th>Order ID</th>
                     <th>PRICE</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <!--Add Products-->
                  <?php
                     $total = 0;
                     $q = "SELECT * FROM products INNER JOIN orders ON (orders.pid = products.pid) AND (orders.uid = $uid[0]) ";
                     $result = mysqli_query($db,$q);
                     
                     while($row = mysqli_fetch_row($result)){ ?>
                  <tr>
                     <td>
                        <a class="ps-product__preview" href="product-detail.html">
                        <?php echo $row[1] ?>
                        </a>
                     </td>
                     <td>
                        <?php echo $row[0] ?>
                     </td>
                     <td>
                        <?php echo $row[8] ?>
                     </td>
                     <td>Rs.
                        <?php echo $row[2] ?>
                     </td>
                     <td>
                        <div class="ps-remove" id="
                           <?php echo $row[8] ?>">
                        </div>
                     </td>
                  </tr>
                  <?php  
                     $total = $total + $row[2];
                      } 
                      ?>
                  <!--End-->
                  <tr>
                     <td colspan="3">
                        <h2 align="center">Total</h2>
                     </td>
                     <td>
                        <h2>Rs.
                           <?php echo $total ?>
                        </h2>
                     </td>
                     <td>
                        <button type="button" name="pay" value="
                           <?php echo $uid[0] ?>" class="ps-btn mb-10" id="psbtn">Buy
                        </button>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
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
      <script type="text/javascript" src="js/admin/main.js"></script>
   </body>
</html>