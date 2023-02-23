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

// Enable editing
$getRegisterData="";
if(isset($_GET['registrationId']))
{
    $registrationId=$_GET['registrationId'];
  $registerData=getRegisterDetails($db,$registrationId);
//   echo $registerData['email'];
//   echo $userData['email'];
  if ($registerData['email'] == $userData['email']) {
    $getRegisterData=getAllRegisterData($db,$email);
    
  }else {
    header('location:./index.php');
  }
}else {
    header('location:./index.php');
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
    <link rel="icon" type="image/png" href="../favicon.png" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

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
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img src="../css/images/CUTM-logo.png" height="40px" width="30px"> CUTM Career</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../profile/<?=$userData['image']?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$userData['name']?></h6>
                        <span>User</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <a href="./registerme.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Register</a>

                    <a href="./changePassword.php" class="nav-item nav-link"><i class="fa fa-lock"></i>Change Password</a>
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img src="../css/images/CUTM-logo.png" height="40px" width="30px"> </h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               
                <div class="navbar-nav align-items-center ms-auto">
                    
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../profile/<?=$userData['image']?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?=$userData['name']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="../include/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Registration</h6>
                            <form action="../include/uploader.php" method="post" enctype="multipart/form-data">

                                <input type="hidden" value="<?=$registrationId?>" name="registrationId">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Title</label>
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="title" value="<?=$getRegisterData['Title']?>" required>
                                        <option value="<?=$getRegisterData['Title']?>" selected><?=$getRegisterData['Title']?> .</option>
                                        <option value="Mr">Mr .</option>
                                        <option value="Mrs">Mrs .</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname" value="<?=$getRegisterData['firstName']?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lname" value="<?=$getRegisterData['lastName']?>" required>
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">DOB</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dob" value="<?=$getRegisterData['dob']?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?=$userData['email']?>" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Mobile</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mobile" value="<?=$getRegisterData['mobile']?>" required>
                                </div>

                                <div class="form-floating">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                    <textarea class="form-control" placeholder="Address"
                                        id="floatingTextarea" style="height: 150px;" name="address" required><?=$getRegisterData['address']?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Post Applied</label>
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="post" value="<?=$getRegisterData['firstName']?>" required>
                                        <option value="<?=$getRegisterData['postApplied']?>" selected><?=$getRegisterData['postApplied']?></option>
                                        <option value="Teaching">Teaching</option>
                                        <option value="Non Teaching">Non Teaching</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Highest Qualification</label>
                                    
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="qualification" required>
                                        <option value="<?=$getRegisterData['Qualification']?>" selected><?=$getRegisterData['Qualification']?></option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Graduation">Graduation</option>
                                        <option value="PG">PG</option>
                                        <option value="Ph.D">Ph.D</option>
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Specialization</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="specialization" value="<?=$getRegisterData['Specialization']?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Experience</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="experiance" value="<?=$getRegisterData['Experience']?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Skills</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="skill" value="<?=$getRegisterData['Skills']?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Remarks</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="remark" value="<?=$getRegisterData['Remarks']?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload New Signature(If required)</label>
                                    <input class="form-control bg-dark" type="file" id="formFile" name="signUpdate" accept="image/*">
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload New Resume(If required)</label>
                                    <input class="form-control bg-dark" type="file" id="formFile" name="cvUpdate" accept="application/pdf">
                                </div>

                                
                                <input class="form-control bg-dark" type="hidden" value="<?=$userData['image']?>" name="profile">
                                

                                <button type="submit" class="btn btn-primary" name="registerEdit">Update</button>
                            </form>
                        </div>
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

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>

    <script src="../particles/particles.js"></script>
    <script src="../particles/app.js"></script>
    
</body>

</html>