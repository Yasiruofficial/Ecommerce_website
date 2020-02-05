<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>309 Dampe , Pitipana Rd - Hotline: 0115 445 000 </p>
                </div>

                <?php 

                if (isset($_SESSION['uemail'])) 

                { 

                $uemail = $_SESSION['uemail']; 
                $getname = "SELECT uname FROM users WHERE uemail = '" . $uemail . "'"; 
                $result = mysqli_query($db,$getname);
                $uname = mysqli_fetch_row($result);

                ?>

                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="header__actions">
                            <a href="">
                                <?php echo "Welcome " . $uname[0] ?>
                            </a>
                            <a href="server.php?logout=1">Logout</a>
                        </div>
                    </div>

                    <?php } else { ?>

                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="header__actions">
                                <a href="login.php">Login</a>
                                <a href="register.php">Regiser</a>
                            </div>
                        </div>

                        <?php } ?>

            </div>

        </div>
    </div>
    <nav class="navigation">
        <div class="container-fluid">
            <div class="navigation__column left">
                <div class="header__logo">
                    <a class="ps-logo" href="index.php"><img src="images/user/logo.png" alt=""></a>
                </div>
            </div>
            <div class="navigation__column center">
                        <ul class="main-menu menu">
                            <li class="menu-item menu-item-has-children dropdown"><a href="index.php">Home</a></li>
                            <li class="menu-item menu-item-has-children has-mega-menu"><a href="product-listing.php">Products</a></li>
                            <li class="menu-item"><a href="about.html">About Us</a></li>
                            <li class="menu-item menu-item-has-children dropdown"><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
            <div class="navigation__column right">
                <form class="ps-search--header" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="Search Product…">
                    <button><i class="ps-icon-search"></i></button>
                </form>
                <?php 

                if(isset($_SESSION['uemail'])) 

                { ?>

                    <div class="ps-cart"><a class="ps-cart__toggle" href="cart.php"><i class="ps-icon-shopping-cart"></i></a></div>

                    <?php } ?>

                        <div class="menu-toggle"><span></span></div>
            </div>
        </div>
    </nav>
</header>