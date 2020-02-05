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

  $q = "SELECT * FROM users";
  $result = mysqli_query($db,$q);
  $cbase = mysqli_num_rows($result);

  $q = "SELECT * FROM products WHERE aid = $aid[0] and pcat = 'nike'";
  $result = mysqli_query($db,$q);
  $nike = mysqli_num_rows($result);

  $q = "SELECT * FROM products WHERE aid = $aid[0] and pcat = 'adidas'";
  $result = mysqli_query($db,$q);
  $adidas = mysqli_num_rows($result);

  $q = "SELECT * FROM products WHERE aid = $aid[0] and pcat = 'men'";
  $result = mysqli_query($db,$q);
  $men = mysqli_num_rows($result);

  $q = "SELECT * FROM products WHERE aid = $aid[0] and pcat = 'women'";
  $result = mysqli_query($db,$q);
  $women = mysqli_num_rows($result);

  $q = "SELECT * FROM products WHERE aid = $aid[0] and pcat = 'kids'";
  $result = mysqli_query($db,$q);
  $kids = mysqli_num_rows($result);

  $q = "SELECT SUM(pprice) FROM products WHERE aid = $aid[0]";
  $result = mysqli_query($db,$q);
  $row = mysqli_fetch_row($result);

  $TotalproductsSUM = $row[0];

  $q = "SELECT pprice , pdown FROM products WHERE aid = $aid[0]";
  $result = mysqli_query($db,$q);
  $totalSale = 0;

  while ($row = mysqli_fetch_row($result)) {
      $price = $row[0];
      $qunt = $row[1];
     $totalSale = $totalSale + ($price*$qunt);

  }
  


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>ADMIN-DB</title>
        
        <link href="../css/admin/sb-admin-2.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/admin/style.css">
  


    </head>

    <body id="page-top">

        <h1 align="center">Team 7 Store Dashboard</h1>
        <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <div class="container-fluid">

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customer Base of T7S</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $cbase; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-circle fa-3x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Products</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo ($nike+$kids+$women+$men+$adidas); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Sale</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rs.<?php echo $totalSale; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Product SUM</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rs.<?php echo round($TotalproductsSUM,2); ?></div>
                                            </div>
                                            <div class="col-auto">
                                               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nike</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $nike; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Adidas</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $adidas; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Women</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $women; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Men</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $men; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kids</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $kids; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            

                        </div>

                        <p>You have logged as <?php echo $aname ?><a href="add.php"> | ADD ITEM  </a><a href="delete.php"> | DELETE ITEM | </a><a href="server.php?logout=1">  LOGOUT | </a></p>

                    </div>

    

                </div>


    </body>

    </html>