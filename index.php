<?php
$title = "Wisata Sulawesi Selatan";
require_once './templates/_header.php';
require_once './controllers/conn.php';
require_once './templates/header.php';
$destination = many("SELECT * FROM destinations  ORDER BY id DESC LIMIT 6");
$populer = many("SELECT destinations.* FROM destinations  LEFT JOIN destination_log ON destination_log.destination_id = destinations.id GROUP BY destinations.id ORDER BY COUNT(destination_log.id) DESC LIMIT 6");
?>



<!-- start banner area -->
<div class="slider-one rn-section-gapTop">
    <div class="container">
        <div class="row row-reverce-sm align-items-center">
            <div class="col-lg-5 col-md-6 col-sm-12 mt_sm--50">
                <h2 class="title" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">Objek Wisata Sulawesi Selatan</h2>
                <p class="slide-disc" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">Temukan objek wisata terpopuler di Sulawesi Selatan kesukaan Anda.</p>
                <div class="button-group">
                    <a class="btn btn-large btn-primary" href="#semuas" data-sal-delay="400" data-sal="slide-up" data-sal-duration="800">Telusuri Wisata</a>
                    <!-- <a class="btn btn-large btn-primary-alta" href="create.html" data-sal-delay="500" data-sal="slide-up" data-sal-duration="800">Create</a> -->
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 offset-lg-1">
                <div class="slider-thumbnail">
                    <img src="images/Sulawesi Selatan.jpg" alt="Slider Images">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End banner area -->

<!-- Explore Style Carousel -->
<div class="rn-live-bidding-area rn-section-gapTop">
    <div class="container">
        <div class="row mb--50">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3 class="title mb--0 live-bidding-title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Wisata Populer</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-one-slick slick-activation-03 slick-arrow-style-one rn-slick-dot-style slick-gutter-15">
                    <?php foreach ($populer as $id => $v) : ?>
                        <!-- start single product -->
                        <div class="single-slide-product">
                            <div class="product-style-one">
                                <div class="card-thumbnail">
                                    <?php
                                    $image = single("SELECT * FROM images WHERE destination_id='" . $v['id'] . "'");
                                    ?>
                                    <a href="wisata.php?w=<?= $v['slug'] ?>"><img src="images/<?= $image['image'] ?>" alt="NFT_portfolio"></a>
                                    <!-- <div class="countdown" data-date="2022-11-09">
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
                                    </div> -->
                                </div>
                                <div class="product-share-wrapper">
                                    <div class="profile-share">
                                        <?php
                                        $images = many("SELECT * FROM images WHERE destination_id='" . $v['id'] . "'");
                                        foreach ($images as $i => $im) :
                                        ?>
                                            <a class="avatar" data-tooltip="Image <?= $i + 1 ?>"><img src="images/<?= $im['image'] ?>" alt="Wisata"></a>
                                        <?php endforeach ?>
                                        <a class="more-author-text" href="#"><?php $type = many("SELECT `type` FROM types where id IN (" . $v['type_id'] . ")");
                                                                                $type = array_column($type, 'type');
                                                                                echo substr(implode(', ', $type), 0, 30);
                                                                                ?></a>
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
                                        </div>

                                    </div>

                                </div>
                                <a href="wisata.php?w=<?= $v['slug'] ?>"><span class="product-name"><?= $v['name'] ?></span></a>
                                <span class="latest-bid"><?= substr($v['description'], 1, 50) ?></span>
                                <div class="bid-react-area">
                                    <div class="last-bid"><?= ($v['open_day'] == null) ? ('Buka Tiap Hari') : substr($v['open_day'], 0, 20) ?></div>
                                    <div class="react-area">
                                        <span class="last-bid"><?= $v['entry_fee'] == 0 ? 'Gratis' : 'Rp. ' . number_format($v['entry_fee']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end single product -->
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Explore Style Carousel End-->

<!-- start service area -->
<div class="rn-service-area rn-section-gapTop">
    <div class="container">
        <div class="row">
            <div class="col-12 mb--50">
                <h3 class="title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Hal Yang Perlu Diperhatikan Saat Pergi Berwisata</h3>
            </div>
        </div>
        <div class="row g-5">
            <!-- start single service -->
            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="rn-service-one color-shape-7">
                    <div class="inner">
                        <div class="icon">
                            <img src="assets/images/icons/shape-1.png" alt="Shape">
                        </div>
                        <div class="subtitle">Step-01</div>
                        <div class="content">
                            <h4 class="title"><a href="#">Persiapkan kesehatan dan kebugaran fisik</a></h4>
                            <p class="description">Dengan kesehatan dan kebugaran fisik yang maksimal, wisata kalian akan semakin menyenangkan. Namun jika kamu memiliki riwayat penyakit, kamu bisa membawa obat-obatan yang diperlukan untuk langkah antisipasi. Perlu diingat kesehatan merupakan prioritas utama.</p>
                            <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                        </div>
                    </div>
                    <a class="over-link" href="#"></a>
                </div>
            </div>
            <!-- End single service -->
            <!-- start single service -->
            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div data-sal="slide-up" data-sal-delay="200" data-sal-duration="800" class="rn-service-one color-shape-1">
                    <div class="inner">
                        <div class="icon">
                            <img src="assets/images/icons/shape-5.png" alt="Shape">
                        </div>
                        <div class="subtitle">Step-02</div>
                        <div class="content">
                            <h4 class="title"><a href="#">Membawa barang bawaan yang diperlukan</a></h4>
                            <p class="description">Jangan pernah lupa untuk membawa barang bawaan yang diperlukan. Barang yang diperlukan saat berwisata, biasanya meliputi identitas serta dokumen penting dan barang pribadi seperti baju ganti atau barang lainnya. Barang pribadi sangat penting untuk dipersiapkan sebelum berwisata.</p>
                            <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                        </div>
                    </div>
                    <a class="over-link" href="#"></a>
                </div>
            </div>
            <!-- End single service -->
            <!-- start single service -->
            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div data-sal="slide-up" data-sal-delay="250" data-sal-duration="800" class="rn-service-one color-shape-5">
                    <div class="inner">
                        <div class="icon">
                            <img src="assets/images/icons/shape-7.png" alt="Shape">
                        </div>
                        <div class="subtitle">Step-03</div>
                        <div class="content">
                            <h4 class="title"><a href="#">Membawa uang secukupnya</a></h4>
                            <p class="description"> Tempat wisata pada umumnya memiliki tarif sesuai ketentuan masing-masing tempat wisata.
                                Selain itu kamu memerlukan uang untuk transportasi menuju tempat wisata tersebut.
                                kamu juga memerlukan uang untuk membeli makanan atau camilan dalam perjalanan atau di tempat wisata tersebut.</p>
                            <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                        </div>
                    </div>
                    <a class="over-link" href="#"></a>
                </div>
            </div>
            <!-- End single service -->
        </div>
    </div>
</div>
<!-- End service area -->

<!-- New items Start -->
<div class="rn-new-items rn-section-gapTop" id="semuas">
    <div class="container">
        <div class="row mb--50 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Wisata Terbaru</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <a class="btn-transparent" href="wisata-sulsel.php">Lihat Semua<i data-feather="arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <?php foreach ($destination as $id => $v) : ?>
                <!-- start single product -->
                <div data-sal="slide-up" data-sal-delay="<?= 150 + ($id * 50) ?>" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                            <?php $image = single("SELECT * FROM images WHERE destination_id='" . $v['id'] . "'") ?>
                            <a href="wisata.php?w=<?= $v['slug'] ?>"><img src="images/<?= $image['image'] ?>" alt="NFT_portfolio"></a>
                        </div>
                        <div class="product-share-wrapper">
                            <div class="profile-share">
                                <?php
                                $images = many("SELECT * FROM images WHERE destination_id='" . $v['id'] . "'");
                                foreach ($images as $i => $im) :
                                ?>
                                    <a class="avatar" data-tooltip="Image <?= $i + 1 ?>"><img src="images/<?= $im['image'] ?>" alt="Wisata"></a>
                                <?php endforeach ?>
                                <a class="more-author-text" href="#"><?php $type = many("SELECT `type` FROM types where id IN (" . $v['type_id'] . ")");
                                                                        $type = array_column($type, 'type');
                                                                        echo substr(implode(', ', $type), 0, 50);
                                                                        ?></a></a>
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
                                </div>

                            </div>
                        </div>
                        <a href="wisata.php?w=<?= $v['slug'] ?>"><span class="product-name"><?= $v['name'] ?></span></a>
                        <span class="latest-bid"><?= substr($v['description'], 0, 120) ?>...</span>
                        <div class="bid-react-area">
                            <div class="last-bid"><?= ($v['open_day'] == null) ? 'Buka Tiap Hari' : substr($v['open_day'], 0, 20)  ?></div>
                            <div class="react-area">
                                <span class="last-bid"><?= $v['entry_fee'] == 0 ? 'Gratis' : 'Rp. ' . number_format($v['entry_fee']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single product -->
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- New items End -->

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
<!-- Start Footer Area -->
<div class="rn-footer-one rn-section-gap bg-color--1 mt--100 mt_md--80 mt_sm--80">
    <div class="container">
    </div>
</div>
<?php
require_once("./templates/footer.php")
?>