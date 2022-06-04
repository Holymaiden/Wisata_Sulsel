<?php
$title = "Wisata Sulsel - Login";
require_once './templates/_header.php';
require_once './templates/header.php';
if (isset($_SESSION['username'])) {
    print("<script>window.location.replace('index.php');</script>");
}
?>

<!-- login form -->
<div class="login-area rn-section-gapTop">
    <div class="container">
        <div class=" offset-2 col-lg-8 col-md-8 ml_md--0 ml_sm--0 col-sm-12">
            <div class="form-wrapper-one">
                <h4>Login</h4>
                <form action="" method="POST" id="login">
                    <div class="mb-5">
                        <label for="exampleInputUsername1" class="form-label">Username</label>
                        <input type="username" name="username" id="exampleInputUsername1">
                    </div>
                    <div class="mb-5">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="mb-5 rn-check-box">
                        <input type="checkbox" class="rn-check-box-input" id="exampleCheck1">
                        <label class="rn-check-box-label" for="exampleCheck1">Remember me leter</label>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary mr--15">Log In</button>
                    <a href="sign-up.php" class="btn btn-primary-alta">Sign Up</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- login form end -->


<!-- Start Footer Area -->
<div class="rn-footer-one rn-section-gap bg-color--1 mt--50 mt_md--30 mt_sm--30">
</div>
<!-- End Footer Area -->
<?php
require_once("./templates/footer.php")
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#login').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: './controllers/login.php',
                data: $(this).serialize(),
            }).then(function(response) {
                console.log(response);
                var jsonData = JSON.parse(response);

                if (jsonData.status == "success") {
                    if (jsonData.data == "admin")
                        window.location.replace("./dashboard");
                    else
                        location.href = 'index.php';
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