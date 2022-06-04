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
                                        <form class="search-form-wrapper" action="wisata-sulsel.php">
                                                <input type="search" placeholder="Search Here" id="cariki" aria-label="Search">
                                                <div class="search-icon">
                                                        <button><i class="feather-search"></i></button>
                                                </div>
                                        </form>
                                </div>
                                <div class="setting-option rn-icon-list d-block d-lg-none">
                                        <div class="icon-box search-mobile-icon">
                                                <button><i class="feather-search"></i></button>
                                        </div>
                                        <form id="header-search-1" action="#" method="GET" class="large-mobile-blog-search">
                                                <div class="rn-search-mobile form-group">
                                                        <button type="submit" class="search-button"><i class="feather-search"></i></button>
                                                        <input type="text" placeholder="Search ...">
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
                                <li><a href="about.html">About</a>
                                </li>
                                <li class="has-droupdown">
                                        <a class="nav-link its_new" href="#">Explore</a>
                                        <ul class="submenu">
                                                <li><a href="explore-one.html">Explore Filter<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="explore-two.html">Explore Isotop<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="explore-three.html">Explore Carousel<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="explore-four.html">Explore Simple<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="explore-five.html">Explore Place Bid<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="explore-six.html">Place Bid With Filter<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="explore-seven.html">Place Bid With Isotop<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="explore-eight.html">Place Bid With Carousel<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="explore-list-style.html">Explore List Style<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="explore-list-column-two.html">Explore List Col-Two<i class="feather-fast-forward"></i></a></li>
                                                <li><a class="live-expo" href="explore-live.html">Live Explore</a></li>
                                                <li><a class="live-expo" href="explore-live-two.html">Live Explore Carousel</a></li>
                                                <li><a class="live-expo" href="explore-live-three.html">Live With Place Bid</a></li>
                                        </ul>
                                </li>
                                <li class="with-megamenu">
                                        <a class="nav-link its_new" href="#">Pages</a>
                                        <div class="rn-megamenu">
                                                <div class="wrapper">
                                                        <div class="row row--0">
                                                                <div class="col-lg-3 single-mega-item">
                                                                        <ul class="mega-menu-item">
                                                                                <li>
                                                                                        <a href="create.html">Create NFT<i data-feather="file-plus"></i></a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="upload-variants.html">Upload Type<i data-feather="layers"></i></a>
                                                                                </li>
                                                                                <li><a href="activity.html">Activity<i data-feather="activity"></i></a></li>
                                                                                <li>
                                                                                        <a href="creator.html">Creators<i data-feather="users"></i></a>
                                                                                </li>
                                                                                <li><a href="collection.html">Our Collection<i data-feather="package"></i></a></li>
                                                                                <li><a href="upcoming_projects.html">Upcoming Projects<i data-feather="loader"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <div class="col-lg-3 single-mega-item">
                                                                        <ul class="mega-menu-item">
                                                                                <li><a href="login.html">Log In <i data-feather="log-in"></i></a></li>
                                                                                <li><a href="sign-up.html">Registration <i data-feather="user-plus"></i></a></li>
                                                                                <li><a href="forget.html">Forget Password <i data-feather="key"></i></a></li>
                                                                                <li>
                                                                                        <a href="author.html">Author/Profile(User) <i data-feather="user"></i></a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="connect.html">Connect to Wallet <i data-feather="pocket"></i></a>
                                                                                </li>
                                                                                <li><a href="privacy-policy.html">Privacy Policy <i data-feather="file-text"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <div class="col-lg-3 single-mega-item">
                                                                        <ul class="mega-menu-item">

                                                                                <li><a href="product.html">Product<i data-feather="folder"></i></a></li>
                                                                                <li><a href="product-details.html">Product Details <i data-feather="layout"></i></a></li>
                                                                                <li><a href="ranking.html">NFT Ranking<i data-feather="trending-up"></i></a></li>
                                                                                <li><a href="blog.html">Our News <i data-feather="message-square"></i></a></li>
                                                                                <li><a href="blog-details.html">Blog Details<i data-feather="book-open"></i></a></li>
                                                                                <li><a href="404.html">404 <i data-feather="alert-triangle"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <div class="col-lg-3 single-mega-item">
                                                                        <ul class="mega-menu-item">
                                                                                <li><a href="about.html">About Us<i data-feather="award"></i></a></li>
                                                                                <li><a href="contact.html">Contact <i data-feather="headphones"></i></a></li>
                                                                                <li><a href="support.html">Support/FAQ <i data-feather="help-circle"></i></a></li>
                                                                                <li><a href="terms-condition.html">Terms & Condition <i data-feather="list"></i></a></li>
                                                                                <li><a href="coming-soon.html">Coming Soon <i data-feather="clock"></i></a></li>
                                                                                <li><a href="maintenance.html">Maintenance <i data-feather="cpu"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </li>
                                <li class="has-droupdown has-menu-child-item">
                                        <a class="nav-link its_new" href="blog.html">Blog</a>
                                        <ul class="submenu">
                                                <li><a href="blog-single-col.html">Blog Single Column<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="blog-col-two.html">Blog Two Column<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="blog-col-three.html">Blog Three Column<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="blog.html">Blog Four Column<i class="feather-fast-forward"></i></a></li>
                                                <li><a href="blog-details.html">Blog Details<i class="feather-fast-forward"></i></a></li>
                                        </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                        </ul>
                        <!-- End Mainmanu Nav -->
                </nav>
        </div>
</div>
<!-- ENd Header Area -->