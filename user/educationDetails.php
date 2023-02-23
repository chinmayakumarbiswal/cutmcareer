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

$registrationId=$_GET['registrationId'];
if($_GET['registrationId'])
{
  $registerData=getRegisterDetails($db,$registrationId);
  if ($registerData['email'] == $userData['email']) {
    
    
  }
  else {
    header('location:./index.php');
  }
}
else {
  header('location:./index.php');
}

if(isset($_POST['addEdu'])){
    $education=mysqli_real_escape_string($db,$_POST['education']);
    $institute=mysqli_real_escape_string($db,$_POST['institute']);
    $board=mysqli_real_escape_string($db,$_POST['board']);
    $startdate=mysqli_real_escape_string($db,$_POST['startdate']);
    $enddate=mysqli_real_escape_string($db,$_POST['enddate']);
    $mark=mysqli_real_escape_string($db,$_POST['mark']);
    $cgpa=mysqli_real_escape_string($db,$_POST['cgpa']);



    $certfile_name=$_FILES['certfile']['name'];
    $certfile_type=$_FILES['certfile']['type'];
    $certfile_tmp=$_FILES['certfile']['tmp_name'];
    $certfile_name=date('d-m-Y-H-i').$certfile_name;



    
    // echo $education."<br>";
    // echo $institute."<br>";
    // echo $board."<br>";
    // echo $startdate."<br>";
    // echo $enddate."<br>";
    // echo $mark."<br>";
    // echo $cgpa."<br>";


    // echo $certfile_name."<br>";
    // echo $certfile_tmp."<br>";
    if ($certfile_type=="application/pdf") {
        if(move_uploaded_file($certfile_tmp,"../allfiles/$certfile_name")){
            $query="INSERT INTO educationdetails (registrationlogId,education,Institute,board,startDate,endDate,mark,cgpa,file) VALUES('$registrationId','$education','$institute','$board','$startdate','$enddate','$mark','$cgpa','$certfile_name')";
            $run=mysqli_query($db,$query) or die(mysqli_error($db));
            if ($run) {
                echo"<script>alert('Your Data Inserted !');</script>";
            }
            else {
                echo"<script>alert('Insertion Error !');</script>";
            }
        }
        else {
            echo"<script>alert('File size too large minimum size 100 KB !');</script>";
        }
    }else {
        echo"<script>alert('Please Upload your certificate as PDF file Only');</script>";
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
    <link rel="icon" type="image/png" href="../favicon.png" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">


                    

                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">Add Education</h6>


                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="education" required>
                                    <label for="floatingInput">Education</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="institute" required>
                                    <label for="floatingInput">Institute</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="board" required>
                                    <label for="floatingInput">Board</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingInput" placeholder="" name="startdate" required>
                                    <label for="floatingInput">StartDate</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingInput" placeholder="" name="enddate" required>
                                    <label for="floatingInput">EndDate</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="mark" required>
                                    <label for="floatingInput">Mark</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="cgpa" required>
                                    <label for="floatingInput">CGPA / Percentage </label>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Certificate</label>
                                    <input class="form-control bg-dark" type="file" id="formFile" name="certfile" accept="application/pdf" required>
                                </div>
                                
                                
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addEdu">Save changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>





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
                    <h3 class="text-primary"><img src="../css/images/CUTM-logo.png" height="40px" width="30px">CUTM Career</h3>
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
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <a href="./registerme.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Register</a>
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img src="../css/images/CUTM-logo.png" height="40px" width="30px"></h2>
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
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Hello <?=$registerData['firstName']?> <?=$registerData['lastName']?> Please
                                Add Your Eduaction Details</h6>
                            <button type="submit" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">Add Education</button>
                        </div>
                    </div>


                    <div class="col-sm-12 col-xl-3">
                        <div class="bg-secondary rounded h-100 p-4">
                            <img class="img-fluid" src="../sign/<?=$registerData['sign']?>" alt="">
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-3">
                        <div class="bg-secondary rounded h-100 p-4">
                        <img class="img-fluid" src="../profile/<?=$registerData['photo']?>" alt="">
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Added Details</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Education</th>
                                            <th scope="col">Institute</th>
                                            <th scope="col">Board</th>
                                            <th scope="col">StartDate</th>
                                            <th scope="col">EndDate</th>
                                            <th scope="col">Mark</th>
                                            <th scope="col">CGPA / Percent</th>
                                            <th scope="col">Certificate</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $file=getAllFile($db,$registrationId);          
                                        foreach($file as $fileGet){
                                    ?>

                                        <tr>
                                            <td><?=$fileGet['education']?></td>
                                            <td><?=$fileGet['Institute']?></td>
                                            <td><?=$fileGet['board']?></td>
                                            <td><?=$fileGet['startDate']?></td>
                                            <td><?=$fileGet['endDate']?></td>
                                            <td><?=$fileGet['mark']?></td>
                                            <td><?=$fileGet['cgpa']?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning btn-icon-text" onclick="window.open('../allfiles/<?=$fileGet['file']?>', '_blank');">
                                                    <i class="mdi mdi-whatsapp"></i> Open File
                                                </button>   
                                            </td>
                                        </tr>

                                    <?php
                                        }
                                    ?>
                                        


                                    </tbody>
                                </table>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    
    <script src="../particles/particles.js"></script>
    <script src="../particles/app.js"></script>


    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>