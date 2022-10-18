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
                    
                    <a href="./index.php" class="nav-item nav-link"><i class="fa fa-id-card me-2"></i>Register</a>
                    <a href="./adminlogin.php" class="nav-item nav-link"><i class="fa fa-lock me-2"></i>Admin Login</a>
                   
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
                    
                   
                </div>
            </nav>
            <!-- Navbar End -->


            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Registration</h6>
                            <form action="./include/uploader.php" method="post" enctype="multipart/form-data">



                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Title</label>
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="title">
                                        <option value="Mr">Mr .</option>
                                        <option value="Mrs">Mrs .</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="fname">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="lname">
                                </div>

                                

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Age</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="age">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">DOB</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="dob">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Mobile</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="mobile">
                                </div>

                                <div class="form-floating">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                    <textarea class="form-control" placeholder="Address"
                                        id="floatingTextarea" style="height: 150px;" name="address"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Post Applied</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="post">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Qualification</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="qualification">
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Specialization</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="specialization">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Experience</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="experiance">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Skills</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="skill">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Remarks</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="remark">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Signature</label>
                                    <input class="form-control bg-dark" type="file" id="formFile" name="sign">
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Profile Photos</label>
                                    <input class="form-control bg-dark" type="file" id="formFile" name="profile">
                                </div>

                                <button type="submit" class="btn btn-primary" name="register">Register</button>
                            </form>
                        </div>
                    </div>




                </div>
            </div>


            



            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="https://sakhyat.tech/">sakhyat.tech</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                             Designed By <a href="https://chinmayakumarbiswal.in/">Chinmaya Kumar Biswal</a>
                        </div>
                    </div>
                </div>
            </div>
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