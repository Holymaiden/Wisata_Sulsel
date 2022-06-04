<?php
$title = "Home";
require_once("./templates/_header.php");
require_once("./templates/header.php");
require_once("./templates/sidebar.php");
require_once("../controllers/conn.php");
$users = counts('users');
$wisata = counts('destinations');
$comments = counts('comments');
$images = counts('images');

?>
<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">
        <div class="page-header d-md-flex justify-content-between">
            <div>
                <h3>Selamat Datang Kembali, <?= $_SESSION['username'] ?></h3>
                <p class="text-muted"></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Users</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <div class="avatar">
                                            <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                                <i class="ti-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="font-weight-bold ml-1 font-size-30 ml-3">Total <?= $users['jumlah'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Wisatas</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <div class="avatar">
                                            <span class="avatar-title bg-info-bright text-info rounded-pill">
                                                <i class="ti-map"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="font-weight-bold ml-1 font-size-30 ml-3">Total <?= $wisata['jumlah'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Comments</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <div class="avatar">
                                            <span class="avatar-title bg-secondary-bright text-secondary rounded-pill">
                                                <i class="ti-email"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="font-weight-bold ml-1 font-size-30 ml-3">Total <?= $comments['jumlah'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">images</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <div class="avatar">
                                            <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                                <i class="ti-dashboard"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="font-weight-bold ml-1 font-size-30 ml-3">Total <?= $images['jumlah'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="row my-3">
                            <div class="col-md-6 ml-auto mr-auto">
                                <figure>
                                    <img class="img-fluid" src="./assets/media/svg/upgrade.svg" alt="upgrade">
                                </figure>
                            </div>
                        </div>
                        <h4 class="mb-3 text-center">Get an Upgrade</h4>
                        <div class="row my-3">
                            <div class="col-md-10 ml-auto mr-auto">
                                <p class="text-muted">Get additional 500 GB space for your documents and files. Expand your storage and enjoy your business. Change plan for more space.</p>
                                <button class="btn btn-primary" data-dismiss="modal">Plan Upgrade</button>
                            </div>
                        </div>
                        <a href="#" class="align-items-center d-flex link-1 small justify-content-center" data-dismiss="modal">
                            <i class="ti-close font-size-10 mr-1"></i>Close
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- ./ Content -->
    <?php
    require_once("./templates/footer.php")
    ?>