<?php
$title = "comments";
require_once("./templates/_header.php");
require_once("./templates/header.php");
require_once("./templates/sidebar.php");


?>


<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header">
            <div class="row mx-1" style="justify-content:space-between">
                <div>
                    <h3><?= ucfirst($title) ?></h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Tabel</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?= ucfirst($title) ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="mt-2">

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="example1_length"><label>Show <select name="optionss" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm optionss">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" id="cariki" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="dataku"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="contentx" role="status" aria-live="polite"></div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                                <ul class="pagination twbs-pagination">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Content -->
    <?php
    require_once("./templates/footer.php");
    ?>