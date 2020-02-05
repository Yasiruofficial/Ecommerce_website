<!DOCTYPE html>

<?php

session_start();

if (!isset($_SESSION['aname'])) {
    header('location: index.php');
  }

  include_once('conn.php');

  $aname = $_SESSION['aname'];
  $q = "SELECT aid FROM admins WHERE aname = '" . $aname ."'";
  $result = mysqli_query($db,$q);
  $aid = mysqli_fetch_row($result);

  $q = "SELECT * FROM products WHERE aid = $aid[0]";
  $result = mysqli_query($db,$q);
  $CountRows = mysqli_num_rows($result);
  if($CountRows == 0)
  {
    $CountRows = 1;
    echo "<script>alert('No Items')</script>";
  }

  if (($CountRows%10) == 0 )
  {
    $lastPage = intdiv($CountRows , 10);
  }
  else
  {
    $lastPage = intdiv($CountRows, 10)+1;
  }

?>

    <html lang="en">

    <head>

        <script src="../js/admin/uc/jquery.min.js"></script>

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
        <title>T7S - Delete Item</title>

        <link rel="stylesheet" href="../css/admin/style1.css">
        <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">

   
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
                                pid: id
                            },
                            success: function(data) {

                                alert(data);
                                location = "delete.php";

                            }

                        });

                    }

                });

            });
        </script>

    </head>

    <body>
        <div class="ps-content pt-80 pb-80">
            <div class="ps-container">

                <div class="ps-cart-listing">
                    <table class="table ps-cart__table">
                        <thead>
                            <tr>
                                <th colspan="5">
                                    <center>
                                        <a href="dashboard.php"><img src="../images/admin/logom.png"></a>
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>PRODUCT NAME</th>
                                <th>PRICE</th>
                                <th>SOLD ITEMS</th>
                                <th>Product ID</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                <?php

                if (!isset($_GET['page'])) {

                $_GET['page'] = 1;

                }
                if (($_GET['page'] < 1) || ($_GET['page'] > $lastPage)) {
                
                header('location: 404.php');
                }

              if (isset($_GET['page'])) 
              {

                $page = $_GET['page'];

                $startItem = 10 * ($page -1 );

                $q = "SELECT * FROM products WHERE aid = $aid[0] LIMIT $startItem , 10 ";
                $result = mysqli_query($db,$q);

                while ($row = mysqli_fetch_row($result)) 

                {

                ?>

                                <tr>
                                    <td>
                                        <a class="ps-product__preview" href="product-detail.html">
                                            <?php echo $row[1] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $row[2] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[6] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[0] ?>
                                    </td>
                                    <td>
                                        <div class="ps-remove" id="<?php echo $row[0] ?>"></div>
                                    </td>
                                </tr>

                                <?php  
                  }
              }

            ?>

                        </tbody>

                    </table>

                    <a href="delete.php?page=1">First Page</a> |

                    <?php if($_GET['page'] != 1) { ?>
                        <a href="delete.php?page=<?php echo $_GET['page'] - 1?>">Previous Page</a> |
                        
                    <?php } ?>

                            <?php if($_GET['page'] != $lastPage) { ?>
                                <a href="delete.php?page=<?php echo $_GET['page'] + 1?>">Next Page</a> | 
                                
                            <?php } ?>

                                    <?php if($lastPage != 1) { ?>
                                        <a href="delete.php?page=<?php echo $lastPage ?>">Last Page</a>|
                                        
                                    <?php } ?>

                </div>
                <p>You have logged as <?php echo $_SESSION['aname'] ?><a href="add.php"> | ADD ITEM  </a><a href="delete.php"> | DELETE ITEM | </a><a href="server.php?logout=1">  LOGOUT | </a></p>
            </div>

            <!-- JS Library-->
            <script type="text/javascript" src="../plugins/jquery/dist/jquery.min.js"></script>
            <script type="text/javascript" src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="../plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
            <script type="text/javascript" src="../plugins/owl-carousel/owl.carousel.min.js"></script>
            <script type="text/javascript" src="../plugins/gmap3.min.js"></script>
            <script type="text/javascript" src="../plugins/imagesloaded.pkgd.js"></script>
            <script type="text/javascript" src="../plugins/isotope.pkgd.min.js"></script>
            <script type="text/javascript" src="../plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
            <script type="text/javascript" src="../plugins/jquery.matchHeight-min.js"></script>
            <script type="text/javascript" src="../plugins/slick/slick/slick.min.js"></script>
            <script type="text/javascript" src="../plugins/elevatezoom/jquery.elevatezoom.js"></script>
            <script type="text/javascript" src="../plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
            <script type="text/javascript" src="../plugins/jquery-ui/jquery-ui.min.js"></script>
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
            <script type="text/javascript" src="../plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
            <script type="text/javascript" src="../plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
            <script type="text/javascript" src="../plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
            <script type="text/javascript" src="../plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
            <script type="text/javascript" src="../plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
            <script type="text/javascript" src="../plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
            <script type="text/javascript" src="../plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
            <script type="text/javascript" src="../plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
            <!-- Custom scripts-->
            <script type="text/javascript" src="../js/admin/main.js"></script>
    </body>

    </html>