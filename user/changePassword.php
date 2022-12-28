<?php
require('../include/database.php');
require('../include/function.php');
$email=$_SESSION['email'];
if($_SESSION['email'])
{
  $userData=getUserDetails($db,$email);
}
else {
  header('location:../include/logout.php');
}

if(isset($_POST['ChangePassword'])){
    $oldpassword=mysqli_real_escape_string($db,$_POST['opldpassword']);
    $oldpassword=md5($oldpassword);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $newpassword=mysqli_real_escape_string($db,$_POST['cpassword']);
    if ($oldpassword == $userData['password']) {
        if ($password == $newpassword) {
            $password=md5($password);
            $query="UPDATE user SET password='$password' WHERE email='$email'";
            $run=mysqli_query($db,$query) or die(mysqli_error($db));
            if ($run) {
                echo"<script>alert('Your Password Changed!');</script>";
            }
                else {
                    echo"<script>alert('Error in Change Password');</script>";
            }
        }else{
            echo"<script>alert('Your Password and Confirm Password not matched!');</script>";
        }
    }else {
        echo"<script>alert('Your Old Password not Matched!');</script>";
    }
    
    

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CUTM Career</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png" />

    <meta property="og:site_name" content="CUTM Career">
    <meta property="og:title" content="CUTM Career" />
    <meta property="og:description" content="Centurion University Of Technology and Management" />
    <meta property="og:image" itemprop="image" content="favicon.png">
    <meta property="og:type" content="website" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="particleImg"></div>
    <div class="particleclass" id="particles-js"></div>

    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img src="../css/images/CUTM-logo.png" height="40px" width="30px"> CUTM
                        Career</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../profile/<?=$userData['image']?>" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$userData['name']?></h6>
                        <span>User</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <a href="./registerme.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Register</a>

                    <a href="./changePassword.php" class="nav-item nav-link"><i class="fa fa-lock"></i>Change
                        Password</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img src="../css/images/CUTM-logo.png" height="40px" width="30px">
                    </h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../profile/<?=$userData['image']?>" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?=$userData['name']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="../include/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->





            <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <a href="index.php" class="">
                                        <h3 class="text-primary">Change Password</h3>
                                    </a>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password" name="opldpassword" required>
                                    <label for="floatingPassword">Old Password</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password" name="password" required>
                                    <label for="floatingPassword">New Password</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password" name="cpassword" required>
                                    <label for="floatingPassword">Confirm Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4"
                                    name="ChangePassword">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>









            <!-- Footer Start -->
            <?php
                include_once('../include/footer.php')
            ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="../particles/particles.js"></script>
    <script src="../particles/app.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>