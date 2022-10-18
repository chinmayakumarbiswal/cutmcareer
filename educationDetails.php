<?php
require('./include/database.php');
require('./include/function.php');
$registrationId=$_GET['registrationId'];
if($_GET['registrationId'])
{
  $registerData=getRegisterDetails($db,$registrationId);
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
    $certfile_tmp=$_FILES['certfile']['tmp_name'];



    
    // echo $education."<br>";
    // echo $institute."<br>";
    // echo $board."<br>";
    // echo $startdate."<br>";
    // echo $enddate."<br>";
    // echo $mark."<br>";
    // echo $cgpa."<br>";


    // echo $certfile_name."<br>";
    // echo $certfile_tmp."<br>";

        if(move_uploaded_file($certfile_tmp,"./allfiles/$certfile_name")){
            $query="INSERT INTO educationdetails (registrationlogId,education,Institute,board,startDate,endDate,mark,cgpa,file) VALUES('$registrationId','$education','$institute','$board','$startdate','$enddate','$mark','$cgpa','$certfile_name')";
            $run=mysqli_query($db,$query) or die(mysqli_error($db));
            if ($run) {
                echo"<script>alert('Your Data Inserted !');</script>";
            }
            else {
                echo"<script>alert('Insertion Error !');</script>";
            }
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">


                    

                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">Add Education</h6>


                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="" name="education">
                                    <label for="floatingInput">Education</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="" name="institute">
                                    <label for="floatingInput">Institute</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="" name="board">
                                    <label for="floatingInput">Board</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingInput"
                                        placeholder="" name="startdate">
                                    <label for="floatingInput">StartDate</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingInput"
                                        placeholder="" name="enddate">
                                    <label for="floatingInput">EndDate</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="" name="mark">
                                    <label for="floatingInput">Mark</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="" name="cgpa">
                                    <label for="floatingInput">CGPA / Percentage </label>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Certificate</label>
                                    <input class="form-control bg-dark" type="file" id="formFile" name="certfile">
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
                            <img class="img-fluid" src="./sign/<?=$registerData['sign']?>" alt="">
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-3">
                        <div class="bg-secondary rounded h-100 p-4">
                        <img class="img-fluid" src="./profile/<?=$registerData['photo']?>" alt="">
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
                                                <button type="button" class="btn btn-outline-warning btn-icon-text" onclick="location.href='./allfiles/<?=$fileGet['file']?>';">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>