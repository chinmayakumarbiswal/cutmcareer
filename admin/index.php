<?php
require('../include/database.php');
require('../include/function.php');
$email=$_SESSION['email'];
if($_SESSION['email'])
{
  $adminData=getAdminDetails($db,$email);
}
else {
  header('location:../include/logout.php');
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
                        <img class="rounded-circle" src="./img/<?=$adminData['image']?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$adminData['name']?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    
                    <a href="index.php" class="nav-item nav-link active">
                        <i class="fa fa-tachometer-alt me-2"></i>
                        Dashboard
                    </a>
                    <a href="qualification.php" class="nav-item nav-link">
                        <i class="fa fa-table"></i>
                        Qualification
                    </a>
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
                            <img class="rounded-circle me-lg-2" src="./img/<?=$adminData['image']?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?=$adminData['name']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="../include/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->





            


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Details</h6>
                        <button type="button" class="btn btn-outline-warning btn-icon-text btn-lg" onclick="printTable()">
                                Print
                            </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableData">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Applied Post</th>
                                    <th scope="col">Qualification</th>
                                    <th scope="col">Specialization</th>
                                    <th scope="col">Experience</th>
                                    <th scope="col">Skills</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Sign</th>
                                    <th scope="col">View Resume</th>
                                    <th scope="col">Details View</th>
                                    <th scope="col">Application Status</th>
                                    <th scope="col">Reject</th>
                                    <th scope="col">Approve</th>
                                </tr>
                            </thead>
                            <tbody>



                                <?php
                                    $file=getAllFileByAdmin($db);          
                                    foreach($file as $fileGet){
                                ?>

                                <tr>
                                    <td><?=$fileGet['Title']?> <?=$fileGet['firstName']?> <?=$fileGet['lastName']?></td>
                                    <td><?=$fileGet['age']?></td>
                                    <td><?=$fileGet['dob']?></td>
                                    <td><?=$fileGet['email']?></td>
                                    <td><?=$fileGet['mobile']?></td>
                                    <td><?=$fileGet['address']?></td>
                                    <td><?=$fileGet['postApplied']?></td>
                                    <td><?=$fileGet['Qualification']?></td>
                                    <td><?=$fileGet['Specialization']?></td>
                                    <td><?=$fileGet['Experience']?></td>
                                    <td><?=$fileGet['Skills']?></td>
                                    <td><?=$fileGet['Remarks']?></td>
                                    <td><?=$fileGet['Time']?></td>
                                    <td><img src="../profile/<?=$fileGet['photo']?>" height="50px" width="50px"></td>
                                    <td><img src="../sign/<?=$fileGet['sign']?>" height="auto" width="50px"></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning btn-icon-text" onclick="window.open('../cv/<?=$fileGet['cv']?>', '_blank');">
                                            <i class="mdi mdi-whatsapp"></i> Open Resume
                                        </button> 
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning btn-icon-text" onclick="location.href='./educationDetails.php?registrationId=<?=$fileGet['id']?>';">
                                            <i class="mdi mdi-whatsapp"></i> Open File
                                        </button> 
                                    </td>
                                    <td><div class="p-2 mb-2 bg-info text-dark"><?=$fileGet['status']?></div></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger m-2" onclick="location.href='../include/reject.php?id=<?=$fileGet['id']?>';">
                                            <i class="mdi mdi-whatsapp"></i> Reject
                                        </button> 
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success m-2" onclick="location.href='../include/approve.php?id=<?=$fileGet['id']?>';">
                                            <i class="mdi mdi-whatsapp"></i> Approve
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
            <!-- Recent Sales End -->



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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js" integrity="sha512-r22gChDnGvBylk90+2e/ycr3RVrDi8DIOkIGNhJlKfuyQM4tIRAI062MaV8sfjQKYVGjOBaZBOA87z+IhZE9DA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="../js/main.js"></script>
    <script>
        function printTable(){
            let data=document.getElementById('tableData');
            var fp=XLSX.utils.table_to_book(data,{sheet:'cutm'});
            XLSX.write(fp,{
                bookType:'xlsx',
                type:'base64'
            });
            XLSX.writeFile(fp,'qualificationData.xlsx')
        }
    </script>
</body>

</html>