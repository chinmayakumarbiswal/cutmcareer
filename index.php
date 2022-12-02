<?php
    require('./include/database.php');
    require('./include/function.php');
    if(isset($_POST['LoginInto'])){
        $name=mysqli_real_escape_string($db,$_POST['name']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password=mysqli_real_escape_string($db,$_POST['password']);
        $password=md5($password);

        $profile_image_name=$_FILES['profile']['name'];
        $profile_image_tmp=$_FILES['profile']['tmp_name'];

        if(move_uploaded_file($profile_image_tmp,"./profile/$profile_image_name")){
            $query="INSERT INTO user (name,email,password,image) VALUES('$name','$email','$password','$profile_image_name')";
            $run=mysqli_query($db,$query) or die(mysqli_error($db));
            if ($run) {
                echo"<script>alert('Your account created successfully !');</script>";
            }
            else {
                echo"<script>alert('Insertion Error !');</script>";
            }
        }
        else {
            echo"<script>alert('Insertion Error minimum size 100 KB !');</script>";
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
    <link href="img/favicon.ico" rel="icon">

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
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>CUTM Career</h3>
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
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
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
                                    <a href="index.html" class="">
                                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>CUTM Career</h3>
                                    </a>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="name">
                                    <label for="floatingInput">Full Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"  name="email">
                                    <label for="floatingInput">User Email address</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Profile Photos</label>
                                    <input class="form-control bg-dark" type="file" id="formFile" name="profile">
                                </div>
                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="LoginInto">Create Account</button>
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>