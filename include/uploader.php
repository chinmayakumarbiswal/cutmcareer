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
        $sign_image_tmp=$_FILES['sign']['tmp_name'];
        $signfilename=$mobile.date('d-m-Y-H-i').$sign_image_name;


        $cv_name=$_FILES['cv']['name'];
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

        
            if(move_uploaded_file($sign_image_tmp,"../sign/$signfilename")){
                if(move_uploaded_file($cv_tmp,"../cv/$cvfilename")){
                    $query="INSERT INTO registrationlog (Title,firstName,lastName,age,dob,email,mobile,address,postApplied,Qualification,Specialization,Experience,Skills,Remarks,sign,photo,cv,status) VALUES('$title','$fname','$lname','$age','$dob','$email','$mobile','$Address','$post','$qualification','$specialization','$experiance','$skill','$remark','$signfilename','$profile_image_name','$cvfilename','Pending')";
                    $run=mysqli_query($db,$query) or die(mysqli_error($db));
                    if ($run) {
                        $registrationlog_id=mysqli_insert_id($db);
                        header('location:../user/educationDetails.php?registrationId='.$registrationlog_id);
                    }
                    else {
                        echo"<script>alert('Insertion Error !');</script>";
                    }
                }
                else {
                    echo"<script>alert('Pdf size too large minimum size 100 KB !');</script>";
                }
            }
            else {
                echo"<script>alert('Image size too large minimum size 100 KB !');</script>";
            }
        



    }

?>