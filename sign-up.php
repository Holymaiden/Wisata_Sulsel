<?php
$title = "Wisata Sulsel - Sign Up";
require_once './templates/_header.php';
require_once './templates/header.php';
if (isset($_SESSION['username'])) {
    print("<script>window.location.replace('index.php');</script>");
}
?>

<!-- login form -->
<div class="login-area rn-section-gapTop">
    <div class="container">
        <div class="row g-5">
            <div class="offset-2 col-lg-8 col-md-8 ml_md--0 ml_sm--0 col-sm-12">
                <div class="form-wrapper-one registration-area">
                    <h4>Sign up</h4>
                    <form id="signup">
                        <div class="mb-5">
                            <label for="firstName" class="form-label">Username</label>
                            <input type="text" name="username" id="firstName">
                        </div>
                        <div class="mb-5">
                            <label for="newPassword" class="form-label">Create Password</label>
                            <input type="password" name="password" id="newPassword">
                        </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label">Re Password</label>
                            <input type="password" name="password2" id="exampleInputPassword1">
                        </div>
                        <div class="mb-5 rn-check-box">
                            <input type="checkbox" class="rn-check-box-input" id="exampleCheck1">
                            <label class="rn-check-box-label" for="exampleCheck1">Allow to all tearms &
                                condition</label>
                        </div>
                        <button type="submit" class="btn btn-primary mr--15">Sign Up</button>
                        <a href="login.php" class="btn btn-primary-alta">Log In</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login form end -->


<!-- Start Footer Area -->
<div class="rn-footer-one rn-section-gap bg-color--1 mt--100 mt_md--80 mt_sm--80">

</div>
<!-- End Footer Area -->
<?php
require_once("./templates/footer.php")
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#signup').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: './controllers/signup.php',
                data: $(this).serialize(),
            }).then(function(response) {
                console.log(response);
                var jsonData = JSON.parse(response);

                if (jsonData.status == "success") {
                    location.href = 'login.php';
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