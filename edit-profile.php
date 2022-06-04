<?php
$title = "Wisata Sulsel - Profile";
require_once './templates/_header.php';
require_once './templates/header.php';
if (!isset($_SESSION['username'])) {
    print("<script>window.location.replace('index.php');</script>");
}
?>
<!-- start page title area -->
<div class="rn-breadcrumb-inner ptb--30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <h5 class="title text-center text-md-start">Profile</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-list">
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="separator"><i class="feather-chevron-right"></i></li>
                    <li class="item current">Profile</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end page title area -->


<!-- Start tabs area -->
<div class="edit-profile-area rn-section-gapTop">
    <div class="container">
        <div class="row plr--70 padding-control-edit-wrapper pl_md--0 pr_md--0 pl_sm--0 pr_sm--0">
            <div class="col-12 d-flex justify-content-between mb--30 align-items-center">
                <h4 class="title-left">Profile</h4>
                <!-- <a href="author.html" class="btn btn-primary ml--10"><i class="feather-eye mr--5"></i> Preview</a> -->
            </div>
        </div>
        <div class="row plr--70 padding-control-edit-wrapper pl_md--0 pr_md--0 pl_sm--0 pr_sm--0">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <!-- Start tabs area -->
                <nav class="left-nav rbt-sticky-top-adjust-five">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tabs" data-bs-toggle="tab" data-bs-target="#nav-homes" type="button" role="tab" aria-controls="nav-homes" aria-selected="false"><i class="feather-user"></i>Personal Information</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> <i class="feather-unlock"></i>Change Password</button>
                    </div>
                </nav>
                <!-- End tabs area -->
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 mt_sm--30">
                <div class="tab-content tab-content-edit-wrapepr" id="nav-tabContent">
                    <!-- sigle tab content -->
                    <div class="tab-pane fade show active" id="nav-homes" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- start personal information -->
                        <form action="" method="POST" id="formUsername">
                            <input type="hidden" name="id" id="ids" value="<?= $_SESSION['id'] ?>">
                            <div class="nuron-information">
                                <div class="profile-form-wrapper">
                                    <label for="contact-name" class="form-label">Username</label>
                                    <input name="username" id="name" type="text">
                                </div>
                            </div>
                            <div class="button-area save-btn-edit">
                                <a href="#" class="btn btn-primary-alta mr--15" onclick="customAlert.alert('Cancel Edit Profile?')">Cancel</a>
                                <button id="submitUsername" class="btn btn-primary">Save</button>
                                <!-- <a href="#" class="btn btn-primary" onclick="customAlert.alert('Successfully Saved Your Profile?')">Save</a> -->
                            </div>
                        </form>
                    </div>
                    <!-- End single tabv content -->

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form action="" method="POST" id="formPassword">
                            <!-- change password area Start -->
                            <div class="nuron-information">
                                <div class="condition">
                                    <h5 class="title">Create Your Password</h5>
                                </div>
                                <div class="input-two-wrapper mt--15">
                                    <div class="old-password half-wid">
                                        <label for="oldPass" class="form-label">Enter Old Password</label>
                                        <input name="pass" id="oldPass" type="password">
                                    </div>
                                    <div class="new-password half-wid">
                                        <label for="NewPass" class="form-label">Create New Password</label>
                                        <input name="password" id="NewPass" type="password">
                                    </div>
                                </div>
                                <div class="email-area mt--15">
                                    <label for="rePass" class="form-label">Confirm Password</label>
                                    <input name="password2" id="rePass" type="password" value="">
                                </div>
                                <!-- <a href="#" class="btn btn-primary save-btn-edit" onclick="customAlert.alert('Successfully Changed Password?')">Save</a> -->
                                <button id="submitPassword" class="btn btn-primary save-btn-edit">Save</button>
                            </div>
                            <!-- change password area ENd -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
<!-- End tabs area -->


<!-- Start Footer Area -->
<div class="rn-footer-one rn-section-gap bg-color--1 mt--100 mt_md--80 mt_sm--80">
</div>
<!-- End Footer Area -->
<?php
require_once("./templates/footer.php")
?>
<script>
    $(document).ready(function() {
        var id = $("#ids").val();
        $.ajax({
            url: './controllers/profile/get.php?id=' + id,
            type: "GET",
            dataType: "JSON",
        }).then(function(data) {
            if (data.status == "success") {
                $("#name").val(data.data.username);
            } else if (data.status == "error") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message,
                })
            } else {
                Swal.fire(
                    'Invalid Credentials!',
                )
            }
        });;

        $('#submitUsername').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: './controllers/profile/updateUsername.php',
                type: "POST",
                data: $("#formUsername").serialize(),
                dataType: "JSON",
            }).then(function(data) {
                if (data.status == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                    })
                } else if (data.status == "error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message,
                    })
                } else {
                    Swal.fire(
                        'Invalid Credentials!',
                    )
                }
            });
        });

        $('#submitPassword').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: './controllers/profile/updatePassword.php?id=' + id,
                type: "POST",
                data: $("#formPassword").serialize(),
                dataType: "JSON",
            }).then(function(data) {
                if (data.status == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                    }).then(function() {
                        $("#formPassword")[0].reset();
                    })
                } else if (data.status == "error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message,
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