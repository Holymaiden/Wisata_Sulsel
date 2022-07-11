<!-- start header area -->
<!-- Start Header -->
<header class="rn-header haeder-default header--sticky">
        <div class="container">
                <div class="header-inner">
                        <div class="header-left">
                                <div class="logo-thumbnail logo-custom-css">
                                        <a class="logo-light" href="index.php"><img src="assets/images/logo/logo-white.png" alt="nft-logo"></a>
                                        <a class="logo-dark" href="index.php"><img src="assets/images/logo/logo-dark.png" alt="nft-logo"></a>
                                </div>
                                <div class="mainmenu-wrapper">
                                        <nav id="sideNav" class="mainmenu-nav d-none d-xl-block">
                                                <!-- Start Mainmanu Nav -->
                                                <ul class="mainmenu">
                                                        <li>
                                                                <a href="index.php">Home</a>
                                                        </li>
                                                        <li>
                                                                <a href="help.php">Help</a>
                                                        </li>
                                                </ul>
                                                <!-- End Mainmanu Nav -->
                                        </nav>
                                </div>
                        </div>
                        <div class="header-right">
                                <div class="setting-option d-none d-lg-block">
                                        <form class="search-form-wrapper" action="wisata-sulsel.php?v=">
                                                <input type="search" placeholder="Search Here" name="v" id="cariki" aria-label="Search">
                                                <div class="search-icon">
                                                        <button><i class="feather-search"></i></button>
                                                </div>
                                        </form>
                                </div>
                                <div class="setting-option rn-icon-list d-block d-lg-none">
                                        <div class="icon-box search-mobile-icon">
                                                <button><i class="feather-search"></i></button>
                                        </div>
                                        <form id="header-search-1" action="wisata-sulsel.php?v=" method="GET" class="large-mobile-blog-search">
                                                <div class="rn-search-mobile form-group">
                                                        <button type="submit" class="search-button"><i class="feather-search"></i></button>
                                                        <input type="text" name="v" placeholder="Search ...">
                                                </div>
                                        </form>
                                </div>

                                <!-- <div class="setting-option header-btn rbt-site-header" id="rbt-site-header">
                                        <div class="icon-box">
                                                <a id="connectbtn" class="btn btn-primary-alta btn-small" href="connect.html">Wallet connect</a>
                                        </div>
                                </div> -->

                                <div class="setting-option rn-icon-list user-account notification-badge">
                                        <div class="icon-box">

                                        </div>
                                </div>


                                <div class="setting-option rn-icon-list user-account notification-badge">
                                        <div class="icon-box">
                                                <?php if (isset($_SESSION['username'])) : ?>
                                                        <a><i class="feather-user"></i><span class="badge bg-danger">Out </span></a>
                                                        <div class="rn-dropdown">
                                                                <div class="rn-inner-top">
                                                                        <h4 class="title"><a href="product-details.html"><?= $_SESSION['username']  ?></a></h4>
                                                                        <span><a href="#">Set Display Name</a></span>
                                                                </div>
                                                                <div class="add-fund-button mt--20 pb--20">
                                                                        <a class="btn btn-primary-alta w-100" href="edit-profile.php">My Profile</a>
                                                                </div>
                                                                <ul class="list-inner">
                                                                        <li><a href="controllers/logout.php">Sign Out</a></li>
                                                                </ul>
                                                        </div>
                                                <?php else : ?>
                                                        <a href="login.php"><i class="feather-user"></i><span class="badge">In</span></a>
                                                <?php endif ?>
                                        </div>
                                </div>



                                <div class="setting-option mobile-menu-bar d-block d-xl-none">
                                        <div class="hamberger">
                                                <button class="hamberger-button">
                                                        <i class="feather-menu"></i>
                                                </button>
                                        </div>
                                </div>

                                <div id="my_switcher" class="my_switcher setting-option">
                                        <ul>
                                                <li>
                                                        <a href="javascript: void(0);" data-theme="light" class="setColor light">
                                                                <img class="sun-image" src="assets/images/icons/sun-01.svg" alt="Sun images">
                                                        </a>
                                                </li>
                                                <li>
                                                        <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                                                                <img class="Victor Image" src="assets/images/icons/vector.svg" alt="Vector Images">
                                                        </a>
                                                </li>
                                        </ul>
                                </div>


                        </div>
                </div>
        </div>
</header>
<!-- End Header Area -->

<div class="popup-mobile-menu">
        <div class="inner">
                <div class="header-top">
                        <div class="logo logo-custom-css">
                                <a class="logo-light" href="index.php"><img src="assets/images/logo/logo-white.png" alt="nft-logo"></a>
                                <a class="logo-dark" href="index.php"><img src="assets/images/logo/logo-dark.png" alt="nft-logo"></a>
                        </div>
                        <div class="close-menu">
                                <button class="close-button">
                                        <i class="feather-x"></i>
                                </button>
                        </div>
                </div>
                <nav>
                        <!-- Start Mainmanu Nav -->
                        <ul class="mainmenu">
                                <li>
                                        <a href="index.php">Home</a>
                                </li>
                                <li>
                                        <a href="help.php">Help</a>
                                </li>
                        </ul>
                        <!-- End Mainmanu Nav -->
                </nav>
        </div>
</div>
<!-- ENd Header Area -->