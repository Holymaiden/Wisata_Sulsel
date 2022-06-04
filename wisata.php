<?php
$title = "Wisata Sulawesi Selatan";
require_once './templates/_header.php';
require_once './controllers/conn.php';
require_once './templates/header.php';
$des = single("SELECT * FROM destinations WHERE slug = '" . $_GET['w'] . "'");
if (!$des) {
    print("<script>window.location = './404.php';</script>");
}
$type = many("SELECT type FROM types WHERE id IN (" . $des['type_id'] . ")");
$images = many("SELECT * FROM images WHERE destination_id = '" . $des['id'] . "'");
$late =  many("SELECT destinations.*,images.image FROM destinations LEFT JOIN images ON destinations.id = images.destination_id ORDER BY destinations.id DESC LIMIT 3");
if (isset($_SESSION['username']))
    tambah("destination_log", "('','" . $_SESSION['id'] . "', '" . $des['id'] . "', '" . date('Y-m-d H:i:s') . "')");
?>
<!-- start page title area -->
<div class="rn-breadcrumb-inner ptb--30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <h5 class="title text-center text-md-start"><?= $des['name'] ?></h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-list">
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="separator"><i class="feather-chevron-right"></i></li>
                    <li class="item current"><?= $des['name'] ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end page title area -->

<!-- start product details area -->
<div class="product-details-area rn-section-gapTop">
    <div class="container">
        <div class="row g-5">
            <!-- product image area -->

            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="product-tab-wrapper rbt-sticky-top-adjust">
                    <div class="pd-tab-inner">
                        <div class="nav rn-pd-nav rn-pd-rt-content nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <span class="rn-pd-sm-thumbnail">
                                    <img src="images/<?= $images[0]['image']  ?>" alt="Nft_Profile">
                                </span>
                            </button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                <span class="rn-pd-sm-thumbnail">
                                    <img src="<?= findImage($images, 1) ?>" alt="Nft_Profile">
                                </span>
                            </button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <span class="rn-pd-sm-thumbnail">
                                    <img src="<?= findImage($images, 2) ?>" alt="Nft_Profile">
                                </span>
                            </button>
                        </div>

                        <div class="tab-content rn-pd-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="rn-pd-thumbnail">
                                    <img src="images/<?= $images[0]['image']  ?>" alt="Nft_Profile">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="rn-pd-thumbnail">
                                    <img src="<?= findImage($images, 1) ?>" alt="Nft_Profile">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <div class="rn-pd-thumbnail">
                                    <img src="<?= findImage($images, 2) ?>" alt="Nft_Profile">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- product image area end -->

            <div class="col-lg-5 col-md-12 col-sm-12 mt_md--50 mt_sm--60">
                <div class="rn-pd-content-area">
                    <div class="pd-title-area">
                        <h4 class="title"><?= $des['name'] ?></h4>
                        <div class="pd-react-area">
                            <div class="heart-count">
                                <i data-feather="heart"></i>
                                <span>33</span>
                            </div>
                            <div class="count">
                                <div class="share-btn share-btn-activation dropdown">
                                    <button class="icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg viewBox="0 0 14 4" fill="none" width="16" height="16" class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z" fill="currentColor"></path>
                                        </svg>
                                    </button>

                                    <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                        <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal">
                                            Share
                                        </button>
                                        <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal">
                                            Report
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <span class="bid">Height bid <span class="price">0.11wETH</span></span> -->
                    <h6 class="title-name">
                        <?= $des['address']  ?>
                    </h6>
                    <div class="catagory-collection">
                        <div class="catagory">
                            <span>Buka <span class="color-body">
                                </span></span>
                            <div class="top-seller-inner-one">
                                <div class="top-seller-content">
                                    <a href="#">
                                        <h6 class="name"><?= ($des['open_day'] == null) ? 'Tiap Hari' : $des['open_day'] ?></h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collection">
                            <span>Harga</span>

                            <div class="top-seller-inner-one">
                                <div class="top-seller-content">
                                    <a href="#">
                                        <h6 class="name"><?= $des['entry_fee'] == 0 ? 'Gratis' : 'Rp. ' . $des['entry_fee'] ?></h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary-alta" href="#">Unlockable content included</a>
                    <div class="rn-bid-details">
                        <div class="tab-wrapper-one">
                            <nav class="tab-button-one">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">Bids</button>
                                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Details</button>
                                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">History</button>
                                </div>
                            </nav>
                            <div class="tab-content rn-bid-content" id="nav-tabContent">
                                <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <!-- single creator -->
                                    <div class="top-seller-inner-one">
                                        <div class="top-seller-wrapper">
                                            <div class="thumbnail">
                                                <a href="#"><img src="assets/images/client/client-3.png" alt="Nft_Profile"></a>
                                            </div>
                                            <div class="top-seller-content">
                                                <span>0.11wETH by <a href="#">Allen Waltker</a></span>
                                                <span class="count-number">
                                                    1 hours ago
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single creator -->
                                    <!-- single creator -->
                                    <div class="top-seller-inner-one">
                                        <div class="top-seller-wrapper">
                                            <div class="thumbnail">
                                                <a href="#"><img src="assets/images/client/client-4.png" alt="Nft_Profile"></a>
                                            </div>
                                            <div class="top-seller-content">
                                                <span>0.09wETH by <a href="#">Joe Biden</a></span>
                                                <span class="count-number">
                                                    1.30 hours ago
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single creator -->
                                </div>
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <!-- single -->
                                    <div class="rn-pd-bd-wrapper">
                                        <div class="top-seller-inner-one">
                                            <!-- <p class="disc">Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    elit. Doloribus debitis nemo deserunt.</p> -->
                                            <h6 class="name-title">
                                                Owner
                                            </h6>
                                            <div class="top-seller-wrapper">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/images/client/client-1.png" alt="Nft_Profile"></a>
                                                </div>
                                                <div class="top-seller-content">
                                                    <a href="#">
                                                        <h6 class="name">Brodband</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <div class="rn-pd-sm-property-wrapper">
                                            <h6 class="pd-property-title">
                                                Property
                                            </h6>
                                            <div class="property-wrapper">
                                                <!-- single property -->
                                                <div class="pd-property-inner">
                                                    <span class="color-body type">HYPE TYPE</span>
                                                    <span class="color-white value">CALM AF (STILL)</span>
                                                </div>
                                                <!-- single property End -->
                                                <!-- single property -->
                                                <div class="pd-property-inner">
                                                    <span class="color-body type">BASTARDNESS</span>
                                                    <span class="color-white value">C00LIO BASTARD</span>
                                                </div>
                                                <!-- single property End -->
                                            </div>
                                        </div>
                                        <!-- single -->
                                        <!-- single -->
                                        <div class="rn-pd-sm-property-wrapper">
                                            <h6 class="pd-property-title">
                                                Catagory
                                            </h6>
                                            <div class="catagory-wrapper">
                                                <?php foreach ($type as $v) : ?>
                                                    <!-- single property -->
                                                    <div class="pd-property-inner">
                                                        <span class="color-white value"><?= $v['type'] ?></span>
                                                    </div>
                                                    <!-- single property End -->
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <!-- single -->
                                    </div>
                                    <!-- single -->
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <!-- single creator -->
                                    <div class="top-seller-inner-one">
                                        <div class="top-seller-wrapper">
                                            <div class="thumbnail">
                                                <a href="#"><img src="assets/images/client/client-3.png" alt="Nft_Profile"></a>
                                            </div>
                                            <div class="top-seller-content">
                                                <span>0.11wETH by<a href="#">Allen Waltker</a></span>
                                                <span class="count-number">
                                                    1 hours ago
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single creator -->
                                    <!-- single creator -->
                                    <div class="top-seller-inner-one mt--20">
                                        <div class="top-seller-wrapper">
                                            <div class="thumbnail">
                                                <a href="#"><img src="assets/images/client/client-2.png" alt="Nft_Profile"></a>
                                            </div>
                                            <div class="top-seller-content">
                                                <span>0.11wETH by<a href="#">Allen Waltker</a></span>
                                                <span class="count-number">
                                                    1 hours ago
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single creator -->
                                    <!-- single creator -->
                                    <div class="top-seller-inner-one mt--20">
                                        <div class="top-seller-wrapper">
                                            <div class="thumbnail">
                                                <a href="#"><img src="assets/images/client/client-4.png" alt="Nft_Profile"></a>
                                            </div>
                                            <div class="top-seller-content">
                                                <span>0.11wETH by<a href="#">Allen Waltker</a></span>
                                                <span class="count-number">
                                                    1 hours ago
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single creator -->
                                    <!-- single creator -->
                                    <div class="top-seller-inner-one mt--20">
                                        <div class="top-seller-wrapper">
                                            <div class="thumbnail">
                                                <a href="#"><img src="assets/images/client/client-5.png" alt="Nft_Profile"></a>
                                            </div>
                                            <div class="top-seller-content">
                                                <span>0.11wETH by<a href="#">Allen Waltker</a></span>
                                                <span class="count-number">
                                                    1 hours ago
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single creator -->
                                    <!-- single creator -->
                                    <div class="top-seller-inner-one mt--20">
                                        <div class="top-seller-wrapper">
                                            <div class="thumbnail">
                                                <a href="#"><img src="assets/images/client/client-8.png" alt="Nft_Profile"></a>
                                            </div>
                                            <div class="top-seller-content">
                                                <span>0.11wETH by<a href="#">Allen Waltker</a></span>
                                                <span class="count-number">
                                                    1 hours ago
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single creator -->
                                </div>
                            </div>
                        </div>
                        <div class="place-bet-area">
                            <div class="rn-bet-create">
                                <div class="bid-list winning-bid">
                                    <h6 class="title">Winning bit</h6>
                                    <div class="top-seller-inner-one">
                                        <div class="top-seller-wrapper">
                                            <div class="thumbnail">
                                                <a href="#"><img src="assets/images/client/client-7.png" alt="Nft_Profile"></a>
                                            </div>
                                            <div class="top-seller-content">
                                                <span class="heighest-bid">Heighest bid <a href="#">Atif
                                                        aslam</a></span>
                                                <span class="count-number">
                                                    0.115wETH
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bid-list left-bid">
                                    <h6 class="title">Auction has ended</h6>
                                    <div class="countdown mt--15" data-date="2025-12-09">
                                        <div class="countdown-container days">
                                            <span class="countdown-value">87</span>
                                            <span class="countdown-heading">D's</span>
                                        </div>
                                        <div class="countdown-container hours">
                                            <span class="countdown-value">23</span>
                                            <span class="countdown-heading">H's</span>
                                        </div>
                                        <div class="countdown-container minutes">
                                            <span class="countdown-value">38</span>
                                            <span class="countdown-heading">Min's</span>
                                        </div>
                                        <div class="countdown-container seconds">
                                            <span class="countdown-value">27</span>
                                            <span class="countdown-heading">Sec</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <a class="btn btn-primary-alta mt--30" href="#">Place a Bid</a> -->
                            <button type="button" class="btn btn-primary-alta mt--30" data-bs-toggle="modal" data-bs-target="#placebidModal">Place a Bid</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End product details area -->

<!-- blog details area start -->
<div class="rn-blog-area rn-blog-details-default rn-section-gapTop">
    <div class="container">
        <div class="row g-6">
            <div class="col-xl-12 col-lg-12">
                <div class="rn-blog-listen">
                    <div class="news-details">

                        <p><?= $des['description'] ?></p>
                    </div>
                    <div class="comments-wrapper pt--40">
                        <div class="comments-area">
                            <div class="trydo-blog-comment">
                                <h5 class="comment-title mb--40">Komentar</h5>
                                <!-- Start Coment List  -->
                                <ul class="comment-list">

                                    <!-- Start Single Comment  -->
                                    <!-- <li class="comment parent">
                                        <div class="single-comment">
                                            <div class="comment-author comment-img">
                                                <img class="comment-avatar" src="assets/images/blog/comment/comment-01.png" alt="Comment Image">
                                                <div class="m-b-20">
                                                    <div class="commenter">Parent</div>
                                                    <div class="time-spent"> August 20, at 8:44
                                                        pm</div>
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                <p>A component that allows for easy creation of menu
                                                    items, quickly
                                                    creating paragraphs of “Lorem Ipsum” and
                                                    pictures with custom
                                                    sizes.</p>
                                            </div>
                                            <div class="reply-edit">
                                                <div class="reply">
                                                    <a class="comment-reply-link" href="#">
                                                        <i class="rbt feather-corner-down-right"></i>
                                                        Reply
                                                    </a>
                                                </div>
                                            </div>
                                        </div> -->
                                    <!-- <ul class="children">
                                            <li class="comment byuser ">
                                                <div class="single-comment">
                                                    <div class="comment-author comment-img">
                                                        <img class="comment-avatar" src="assets/images/blog/comment/comment-01.png" alt="Comment Image">
                                                        <div class="m-b-20">
                                                            <div class="commenter">Admin Comment
                                                            </div>
                                                            <div class="time-spent"> August 20,
                                                                at 8:44 pm
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p>A component that allows for easy creation
                                                            of menu items,
                                                            quickly creating paragraphs of “Lorem
                                                            Ipsum” and
                                                            pictures with custom sizes.</p>
                                                    </div>
                                                    <div class="reply-edit">
                                                        <div class="reply">
                                                            <a class="comment-reply-link" href="#">
                                                                <i class="rbt feather-corner-down-right"></i>
                                                                Reply
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul> -->
                                    <!-- </li> -->
                                    <div id="comments"></div>
                                    <!-- End Single Comment  -->
                                </ul>
                                <!-- End Coment List  -->
                            </div>
                        </div>
                    </div>

                    <!-- comment form area Start -->
                    <?php if (isset($_SESSION['username'])) : ?>

                        <!-- Start Contact Form Area  -->
                        <div class="rn-comment-form pt--60">
                            <div class="inner">
                                <div class="section-title">
                                    <h2 class="title">Tinggalkan Komentar</h2>
                                </div>
                                <form class="mt--40" id="wisatas">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                            <input type="hidden" name="wisata" value="<?= $des['id'] ?>">
                                            <div class="rnform-group"><textarea name="comment" placeholder="Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="blog-btn">
                                                <button type="submit" class="btn btn-primary-alta btn-large w-100"><span>SEND
                                                        MESSAGE</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Contact Form Area  -->
                    <?php endif ?>

                    <!-- comment form area End -->
                    <div class="row g-5 pt--60">
                        <div class="col-lg-12">
                            <h3 class="title">Wisata Terbaru</h3>
                        </div>
                        <?php foreach ($late as $id => $v) : ?>
                            <!-- start single blog -->
                            <div data-sal="slide-up" data-sal-delay="<?= 150 + ($id * 50) ?>" data-sal-duration="800" class="col-xl-4 col-lg-6 col-md-6 col-12">
                                <div class="product-style-one no-overlay">
                                    <div class="card-thumbnail">
                                        <a href="wisata.php?w=<?= $v['slug'] ?>"><img src="images/<?= $v['image'] ?>" alt="NFT_portfolio"></a>
                                    </div>
                                    <div class="product-share-wrapper">
                                        <div class="profile-share">
                                            <a href="author.html" class="avatar" data-tooltip="Jone lee"><img src="assets/images/client/client-1.png" alt="Nft_Profile"></a>
                                            <a href="author.html" class="avatar" data-tooltip="Jone Due"><img src="assets/images/client/client-2.png" alt="Nft_Profile"></a>
                                            <a href="author.html" class="avatar" data-tooltip="Nisat Tara"><img src="assets/images/client/client-3.png" alt="Nft_Profile"></a>
                                            <a class="more-author-text" href="#">9+ Place Bit.</a>
                                        </div>
                                        <div class="share-btn share-btn-activation dropdown">
                                            <button class="icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg viewBox="0 0 14 4" fill="none" width="16" height="16" class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z" fill="currentColor"></path>
                                                </svg>
                                            </button>

                                            <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                                <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal">
                                                    Share
                                                </button>
                                                <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal">
                                                    Report
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="product-details.html"><span class="product-name"><?= $v['name'] ?></span></a>
                                    <span class="latest-bid"><?= substr($v['description'], 0, 120) ?>...</span>
                                    <div class="bid-react-area">
                                        <div class="last-bid"><?= ($v['open_day'] == null) ? 'Buka Tiap Hari' : 'Buka ' . $v['open_day']  ?></div>
                                        <div class="react-area">
                                            <span class="last-bid"><?= $v['entry_fee'] == 0 ? 'Gratis' : 'Rp. ' . $v['entry_fee'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end single blog -->
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog details area end -->



<!-- Modal -->
<div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content share-wrapper">
            <div class="modal-header share-area">
                <h5 class="modal-title">Share this NFT</h5>
            </div>
            <div class="modal-body">
                <ul class="social-share-default">
                    <li><a href="#"><span class="icon"><i data-feather="facebook"></i></span><span class="text">facebook</span></a></li>
                    <li><a href="#"><span class="icon"><i data-feather="twitter"></i></span><span class="text">twitter</span></a></li>
                    <li><a href="#"><span class="icon"><i data-feather="linkedin"></i></span><span class="text">linkedin</span></a></li>
                    <li><a href="#"><span class="icon"><i data-feather="instagram"></i></span><span class="text">instagram</span></a></li>
                    <li><a href="#"><span class="icon"><i data-feather="youtube"></i></span><span class="text">youtube</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="rn-popup-modal report-modal-wrapper modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content report-content-wrapper">
            <div class="modal-header report-modal-header">
                <h5 class="modal-title">Why are you reporting?
                </h5>
            </div>
            <div class="modal-body">
                <p>Describe why you think this item should be removed from marketplace</p>
                <div class="report-form-box">
                    <h6 class="title">Message</h6>
                    <textarea name="message" placeholder="Write issues"></textarea>
                    <div class="report-button">
                        <button type="button" class="btn btn-primary mr--10 w-auto">Report</button>
                        <button type="button" class="btn btn-primary-alta w-auto" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="rn-popup-modal placebid-modal-wrapper modal fade" id="placebidModal" tabindex="-1" aria-hidden="true">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Place a bid</h3>
            </div>
            <div class="modal-body">
                <p>You are about to purchase This Product Form Nuron</p>
                <div class="placebid-form-box">
                    <h5 class="title">Your bid</h5>
                    <div class="bid-content">
                        <div class="bid-content-top">
                            <div class="bid-content-left">
                                <input id="value" type="text" name="value">
                                <span>wETH</span>
                            </div>
                        </div>

                        <div class="bid-content-mid">
                            <div class="bid-content-left">
                                <span>Your Balance</span>
                                <span>Service fee</span>
                                <span>Total bid amount</span>
                            </div>
                            <div class="bid-content-right">
                                <span>9578 wETH</span>
                                <span>10 wETH</span>
                                <span>9588 wETH</span>
                            </div>
                        </div>
                    </div>
                    <div class="bit-continue-button">
                        <a href="connect.html" class="btn btn-primary w-100">Place a bid</a>
                        <button type="button" class="btn btn-primary-alta mt--10" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Footer Area -->
<div class="rn-footer-one rn-section-gap bg-color--1 mt--100 mt_md--80 mt_sm--80">
</div>
<!-- End Footer Area -->
<?php
require_once("./templates/footer.php")
?>
<script type="text/javascript">
    $(document).ready(function() {
        var id = '<?= $des['id'] ?>';
        loadData(id);

        function loadData(id) {
            $.ajax({
                type: "POST",
                url: './controllers/wisata/getComment.php?id=' + id,
            }).then(function(response) {
                $('#comments').html(response);
            });
        }

        $('#wisatas').submit(function(e) {
            console.log($(this).serialize())
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: './controllers/wisata/comment.php',
                data: $(this).serialize(),
            }).then(function(response) {
                var jsonData = JSON.parse(response);

                if (jsonData.status == "success") {
                    loadData(id);
                    iziToast.success({
                        title: 'Successfull.',
                        message: 'Comment!',
                        position: 'topRight',
                        timeout: 1500
                    });
                } else if (jsonData.status == "error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: jsonData.message,
                    })
                } else {
                    Swal.fire(
                        'Invalid Credentials!',
                    )
                }
            });
        });
    });
</script>