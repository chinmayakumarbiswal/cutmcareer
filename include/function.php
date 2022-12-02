<?php
   function getAdminDetails($db,$email){
        $query="SELECT * FROM admin WHERE email='$email'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }
function getRegisterDetails($db,$registrationId){
    $query="SELECT * FROM registrationlog WHERE id='$registrationId'";
    $run=mysqli_query($db,$query);
    $data=mysqli_fetch_assoc($run);
    return $data;
}

function getAllFile($db,$registrationId){
    $query="SELECT * FROM educationdetails where registrationlogId='$registrationId' ORDER BY id DESC";
    $run=mysqli_query($db,$query);
    $data=array();
    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}

    function getAllFileByAdmin($db){
        $query="SELECT * FROM registrationlog ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getUserDetails($db,$email){
        $query="SELECT * FROM user WHERE email='$email'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllFileByUser($db,$email){
        $query="SELECT * FROM registrationlog WHERE email='$email' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllFileByAdminQualificationWise($db,$qualification){
        $query="SELECT * FROM registrationlog WHERE Qualification='$qualification' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    
?>