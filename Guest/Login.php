<?php
session_start();

include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');

if (isset($_POST['btn_log'])) 
{
    $email = $_POST['txt_email'];
    $Password = $_POST['txt_password'];

    $seluser = "select * from tbl_user where user_email='" . $email . "' and user_password='" . $Password . "'";
    $useres = $Con->query($seluser);

    $selworker = "select * from tbl_worker where worker_email='" . $email . "' and worker_password='" . $Password . "'";
    $workerres = $Con->query($selworker);

    $seladmin = "select * from tbl_adminreg where admin_email='" . $email . "' and admin_password='" . $Password . "'";
    $adminres = $Con->query($seladmin);


    if ($userdata = $useres->fetch_assoc()) {
        $_SESSION['uid'] = $userdata['user_id'];
        header("location:../User/Homepage.php");
    }
    elseif ($workerdata = $workerres->fetch_assoc()) {
        $_SESSION['wid'] = $workerdata['worker_id'];
        header("location:../Worker/Homepage.php");
    }
    elseif ($admindata = $adminres->fetch_assoc()) {
        $_SESSION['aid'] = $admindata['admin_id'];
        header("location:../Admin/Homepage.php");
    }
    else {
?>
        <script>
        alert("Invalid Email or Password");
        window.location="Login.php";
        </script>
        <?php
    }
}
?>

<style>
    .login-section {
        background: url('../Assets/Templates/Main/img/carousel-1.jpg') no-repeat center center;
        background-size: cover;
        min-height: 80vh;
        display: flex;
        align-items: center;
        padding: 50px 0;
    }
    .login-box {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(10px);
        padding: 40px;
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255,255,255,0.5);
    }
</style>

<!-- Login Form Start -->
<div class="container-fluid login-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="login-box wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="text-center mb-4">Login</h3>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="txt_email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="txt_email" id="txt_email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="txt_password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="txt_password" id="txt_password" required>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="btn_log" class="btn btn-primary btn-lg">Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <p class="mb-0">Don't have an account? <a href="User.php" class="text-primary fw-bold">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form End -->

<?php
include('Foot.php');
ob_flush();
?>
