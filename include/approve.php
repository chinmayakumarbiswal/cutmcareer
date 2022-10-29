<?php
require 'database.php';
require './function.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $myid=getRegisterDetails($db,$id);
    echo $id;
    
    $query="UPDATE `registrationlog` SET `status`='Approved' WHERE id=$id";
    mysqli_query($db,$query);
    header('location:../admin/index.php');
    

    
}
?>