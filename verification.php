<?php
    require('./mailer.php');
    require('./include/database.php');
    require('./include/function.php');
    if (isset($_GET['vemail'])) {
        $uemail=$_GET['vemail'];
        $userDetails=getUserDetails($db,$uemail);
        if (!$userDetails) {
            echo"<script>alert('Email Not Found !');window.location.href = './index.php';</script>";
        }else {
            
        }
    }else {
        echo"<script>window.location.href = './index.php';</script>";
    }


    if(isset($_POST['verifyKey'])){
        $keyIs=mysqli_real_escape_string($db,$_POST['key']);
        if ($userDetails['verifyCode'] == $keyIs) {
            $query="UPDATE user SET status='verify' WHERE email='$uemail'";
            $run=mysqli_query($db,$query) or die(mysqli_error($db));
            if ($run) {
                echo"<script>alert('Email verified');window.location.href = './userlogin.php';</script>";
            }else {
                echo"<script>alert('Email verified but backend error please contact to admin');window.location.href = './userlogin.php';</script>";
            }
        }else {
            echo"<script>alert('Enter a Valid No !');</script>";
        }  
    }

    if(isset($_POST['reSend'])){
        $verifyKey=randPassNo();
        $msg="Use ".$verifyKey." as your verification code";
        $isMailSend=smtp_mailer($uemail,'Verify Career Cutm',$msg);
        if ($isMailSend == "Sent") {
            $query="UPDATE user SET verifyCode='$verifyKey' WHERE email='$uemail'";
            $run=mysqli_query($db,$query) or die(mysqli_error($db));
            if ($run) {
                echo"<script>alert('Please check your email');</script>";
            }else {
                echo"<script>alert('Unable to update security key please update after some time');</script>";
            }
        }else {
            echo"<script>alert('We are sorry somthing wrong in my mailer!');</script>";
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="particleImg"></div>
    <div class="particleclass" id="particles-js"></div>
    
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3 open">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img src="./css/images/CUTM-logo.png" height="40px" width="30px"> CUTM Career</h3>
                </a>
                
                <div class="navbar-nav w-100">
                    
                    <a href="./index.php" class="nav-item nav-link active"><i class="fa fa-id-card me-2"></i>Register</a>
                    <a href="./adminlogin.php" class="nav-item nav-link"><i class="fa fa-lock me-2"></i>Admin Login</a>
                    <a href="./userlogin.php" class="nav-item nav-link"><i class="fa fa-lock me-2"></i>User Login</a>
                   
                </div>


            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content open">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img src="./css/images/CUTM-logo.png" height="40px" width="30px"></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    
                    <div class="nav-item dropdown">
                        <a href="./adminlogin.php" class="nav-link">
                            <i class="fa fa-lock me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Admin Login</span>
                        </a>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="./userlogin.php" class="nav-link">
                            <i class="fa fa-lock me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">User Login</span>
                        </a>
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
                                        <h3 class="text-primary">Verify Email</h3>
                                    </a>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" placeholder="User Verify Key" id="floatingInputemail"  name="key">
                                    <label for="floatingInput">User Verify Key </label>
                                </div>
                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="verifyKey">Verify</button>
                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="reSend">Resend Verification Code </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>





            



            <!-- Footer Start -->
            <?php
                include_once('./include/footer.php')
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
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    
    <script src="./particles/particles.js"></script>
    <script src="./particles/app.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        
    </script>
</body>

</html>