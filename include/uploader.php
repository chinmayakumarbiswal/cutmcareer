<?php
    require('./database.php');
    require('./function.php');
    if(isset($_POST['register'])){
        $title=mysqli_real_escape_string($db,$_POST['title']);
        $fname=mysqli_real_escape_string($db,$_POST['fname']);
        $lname=mysqli_real_escape_string($db,$_POST['lname']);
        $age=mysqli_real_escape_string($db,$_POST['age']);
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

        $profile_image_name=$_POST['profile'];


        
        // echo $title."<br>";
        // echo $fname."<br>";
        // echo $lname."<br>";
        // echo $age."<br>";
        // echo $dob."<br>";
        // echo $email."<br>";
        // echo $mobile."<br>";
        // echo $Address."<br>";
        // echo $post."<br>";
        // echo $qualification."<br>";
        // echo $specialization."<br>";
        // echo $experiance."<br>";
        // echo $skill."<br>";
        // echo $remark."<br>";


        // echo $sign_image_name."<br>";
        // echo $sign_image_tmp."<br>";

        
            if(move_uploaded_file($sign_image_tmp,"../sign/$sign_image_name")){
                $query="INSERT INTO registrationlog (Title,firstName,lastName,age,dob,email,mobile,address,postApplied,Qualification,Specialization,Experience,Skills,Remarks,sign,photo) VALUES('$title','$fname','$lname','$age','$dob','$email','$mobile','$Address','$post','$qualification','$specialization','$experiance','$skill','$remark','$sign_image_name','$profile_image_name')";
                $run=mysqli_query($db,$query) or die(mysqli_error($db));
                if ($run) {
                    $registrationlog_id=mysqli_insert_id($db);
                    header('location:../user/educationDetails.php?registrationId='.$registrationlog_id);
                }
                else {
                    echo"<script>alert('Insertion Error !');</script>";
                }
            }
        



    }

?>