<?php
    require('./database.php');
    require('./function.php');
    if(isset($_POST['register'])){
        $title=mysqli_real_escape_string($db,$_POST['title']);
        $fname=mysqli_real_escape_string($db,$_POST['fname']);
        $lname=mysqli_real_escape_string($db,$_POST['lname']);
        
        $dob=mysqli_real_escape_string($db,$_POST['dob']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $mobile=mysqli_real_escape_string($db,$_POST['mobile']);
        $Address=mysqli_real_escape_string($db,$_POST['address']);
        $post=mysqli_real_escape_string($db,$_POST['post']);
        $qualification=mysqli_real_escape_string($db,$_POST['qualification']);
        $specialization=mysqli_real_escape_string($db,$_POST['specialization']);
        $experiance=mysqli_real_escape_string($db,$_POST['experiance']);
        $skill=mysqli_real_escape_string($db,$_POST['skill']);
        $remark=mysqli_real_escape_string($db,$_POST['remark']);


        $sign_image_name=$_FILES['sign']['name'];
        $sign_image_type=$_FILES['sign']['type'];
        $sign_image_tmp=$_FILES['sign']['tmp_name'];
        $signfilename=$mobile.date('d-m-Y-H-i').$sign_image_name;


        $cv_name=$_FILES['cv']['name'];
        $cv_type=$_FILES['cv']['type'];
        $cv_tmp=$_FILES['cv']['tmp_name'];
        $cvfilename=$mobile.date('d-m-Y-H-i').$cv_name;


        $profile_image_name=$_POST['profile'];

        $age=(date('Y') - date('Y',strtotime($dob)));
        
        echo $title."<br>";
        echo $fname."<br>";
        echo $lname."<br>";
        echo $age."<br>";
        echo $dob."<br>";
        echo $email."<br>";
        echo $mobile."<br>";
        echo $Address."<br>";
        echo $post."<br>";
        echo $qualification."<br>";
        echo $specialization."<br>";
        echo $experiance."<br>";
        echo $skill."<br>";
        echo $remark."<br>";


        echo $sign_image_name."<br>";
        echo $sign_image_tmp."<br>";
        echo $signfilename."<br>";

        echo $cv_name."<br>";
        echo $cv_tmp."<br>";
        echo $cvfilename."<br>";

        if ($cv_type == "application/pdf") {
            if ($sign_image_type=="image/jpeg" || $sign_image_type=="image/jpg" || $sign_image_type=="image/png") {
                if(move_uploaded_file($sign_image_tmp,"../sign/$signfilename")){
                    if(move_uploaded_file($cv_tmp,"../cv/$cvfilename")){
                        $query="INSERT INTO registrationlog (Title,firstName,lastName,age,dob,email,mobile,address,postApplied,Qualification,Specialization,Experience,Skills,Remarks,sign,photo,cv,status) VALUES('$title','$fname','$lname','$age','$dob','$email','$mobile','$Address','$post','$qualification','$specialization','$experiance','$skill','$remark','$signfilename','$profile_image_name','$cvfilename','Pending')";
                        $run=mysqli_query($db,$query) or die(mysqli_error($db));
                        if ($run) {
                            $registrationlog_id=mysqli_insert_id($db);
                            header('location:../user/educationDetails.php?registrationId='.$registrationlog_id);
                        }
                        else {
                            echo"<script>alert('Insertion Error !');window.location.href = '../user/registerme.php';</script>";
                        }
                    }
                    else {
                        echo"<script>alert('Pdf size too large minimum size 100 KB !');window.location.href = '../user/registerme.php';</script>";
                    }
                }
                else {
                    echo"<script>alert('Image size too large minimum size 100 KB !');window.location.href = '../user/registerme.php';</script>";
                }
            }else {
                echo"<script>alert('Please Upload your sign as JPEG,JPG or PNG file Only');window.location.href = '../user/registerme.php';</script>";
            }
            
        }else {
            echo"<script>alert('Please Upload your CV as PDF file Only');window.location.href = '../user/registerme.php';</script>";
        }
            
    }




    if(isset($_POST['registerEdit'])){
        $registrationId=mysqli_real_escape_string($db,$_POST['registrationId']);
        $title=mysqli_real_escape_string($db,$_POST['title']);
        $fname=mysqli_real_escape_string($db,$_POST['fname']);
        $lname=mysqli_real_escape_string($db,$_POST['lname']);
        
        $dob=mysqli_real_escape_string($db,$_POST['dob']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $mobile=mysqli_real_escape_string($db,$_POST['mobile']);
        $Address=mysqli_real_escape_string($db,$_POST['address']);
        $post=mysqli_real_escape_string($db,$_POST['post']);
        $qualification=mysqli_real_escape_string($db,$_POST['qualification']);
        $specialization=mysqli_real_escape_string($db,$_POST['specialization']);
        $experiance=mysqli_real_escape_string($db,$_POST['experiance']);
        $skill=mysqli_real_escape_string($db,$_POST['skill']);
        $remark=mysqli_real_escape_string($db,$_POST['remark']);


        $sign_image_name=$_FILES['signUpdate']['name'];
        $sign_image_tmp=$_FILES['signUpdate']['tmp_name'];
        $sign_image_type=$_FILES['signUpdate']['type'];
        $signfilename=$mobile.date('d-m-Y-H-i').$sign_image_name;


        $cv_name=$_FILES['cvUpdate']['name'];
        $cv_tmp=$_FILES['cvUpdate']['tmp_name'];
        $cv_type=$_FILES['cvUpdate']['type'];
        $cvfilename=$mobile.date('d-m-Y-H-i').$cv_name;


        $profile_image_name=$_POST['profile'];

        $age=(date('Y') - date('Y',strtotime($dob)));
        
        echo $title."<br>";
        echo $fname."<br>";
        echo $lname."<br>";
        echo $age."<br>";
        echo $dob."<br>";
        echo $email."<br>";
        echo $mobile."<br>";
        echo $Address."<br>";
        echo $post."<br>";
        echo $qualification."<br>";
        echo $specialization."<br>";
        echo $experiance."<br>";
        echo $skill."<br>";
        echo $remark."<br>";


        echo $sign_image_name."<br>";
        echo $sign_image_tmp."<br>";
        echo $signfilename."<br>";

        echo $cv_name."<br>";
        echo $cv_tmp."<br>";
        echo $cvfilename."<br>";

        echo "image is ".$sign_image_type. "<br>";
        echo "cv is ".$cv_type. "<br>";

        if ($_FILES['signUpdate']['name'] && $_FILES['cvUpdate']['name']) {
            if ($cv_type == "application/pdf") {
                if ($sign_image_type=="image/jpeg" || $sign_image_type=="image/jpg" || $sign_image_type=="image/png") {
                    if(move_uploaded_file($sign_image_tmp,"../sign/$signfilename")){
                        if(move_uploaded_file($cv_tmp,"../cv/$cvfilename")){
                            $query="UPDATE registrationlog SET Title='$title', firstName='$fname', lastName='$lname', age='$age', dob='$dob', mobile='$mobile', address='$Address', postApplied='$post', Qualification='$qualification', Specialization='$specialization', Experience='$experiance', Skills='$skill', Remarks='$remark', sign='$signfilename', cv='$cvfilename', status='Update Signature and CV By applicant' WHERE id='$registrationId'";
                            $run=mysqli_query($db,$query) or die(mysqli_error($db));
                            if ($run) {
                                $registrationlog_id=mysqli_insert_id($db);
                                header('location:../user/index.php');
                            }
                            else {
                                echo"<script>alert('Insertion Error !');</script>";
                            }
                        }
                        else {
                            echo"<script>alert('Pdf size too large minimum size 100 KB !');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
                        }
                    }
                    else {
                        echo"<script>alert('Image size too large minimum size 100 KB !');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
                    }
                }else {
                    echo"<script>alert('Please Upload your sign as JPEG,JPG or PNG file Only');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
                }
                
            }else {
                echo"<script>alert('Please Upload your CV as PDF file Only');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
            }
            
        }elseif ($_FILES['signUpdate']['name']) {
            if ($sign_image_type == "image/jpeg" || $sign_image_type == "image/jpg" || $sign_image_type == "image/png") {
                if(move_uploaded_file($sign_image_tmp,"../sign/$signfilename")){
                    $query="UPDATE registrationlog SET Title='$title', firstName='$fname', lastName='$lname', age='$age', dob='$dob', mobile='$mobile', address='$Address', postApplied='$post', Qualification='$qualification', Specialization='$specialization', Experience='$experiance', Skills='$skill', Remarks='$remark', sign='$signfilename', status='Update Signature By applicant' WHERE id='$registrationId'";
                    $run=mysqli_query($db,$query) or die(mysqli_error($db));
                    if ($run) {
                        $registrationlog_id=mysqli_insert_id($db);
                        header('location:../user/index.php');
                    }
                    else {
                        echo"<script>alert('Insertion Error !');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
                    }
                }
                else {
                    echo"<script>alert('Image size too large minimum size 100 KB !');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
                }
                echo "notfound".$sign_image_type;
            }else {
                echo"<script>alert('Please Upload your sign as JPEG,JPG or PNG file Only');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
                echo "found";
            }
            
        }elseif ($_FILES['cvUpdate']['name']) {
            if ($cv_type == "application/pdf") {
                if(move_uploaded_file($cv_tmp,"../cv/$cvfilename")){
                    $query="UPDATE registrationlog SET Title='$title', firstName='$fname', lastName='$lname', age='$age', dob='$dob', mobile='$mobile', address='$Address', postApplied='$post', Qualification='$qualification', Specialization='$specialization', Experience='$experiance', Skills='$skill', Remarks='$remark', cv='$cvfilename', status='Update CV By applicant' WHERE id='$registrationId'";
                    $run=mysqli_query($db,$query) or die(mysqli_error($db));
                    if ($run) {
                        $registrationlog_id=mysqli_insert_id($db);
                        header('location:../user/index.php');
                    }
                    else {
                        echo"<script>alert('Insertion Error !');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
                    }
                }
                else {
                    echo"<script>alert('Pdf size too large minimum size 100 KB !');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
                }
            }else {
                echo"<script>alert('Please Upload your CV as PDF file Only');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
            }
            
        }else {
            $query="UPDATE registrationlog SET Title='$title', firstName='$fname', lastName='$lname', age='$age', dob='$dob', mobile='$mobile', address='$Address', postApplied='$post', Qualification='$qualification', Specialization='$specialization', Experience='$experiance', Skills='$skill', Remarks='$remark', status='Update By applicant' WHERE id='$registrationId'";
            $run=mysqli_query($db,$query) or die(mysqli_error($db));
            if ($run) {
                $registrationlog_id=mysqli_insert_id($db);
                header('location:../user/index.php');
            }
            else {
                echo"<script>alert('Insertion Error !');window.location.href = '../user/registermeEdit.php?registrationId=".$registrationId."';</script>";
            }
        }
            
    }
?>