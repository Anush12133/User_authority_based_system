<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:index.php');
}
//Restrict User or admin to Access moderator.php page
if($_SESSION['user']['role'] !='sadmin' && $_SESSION['user']['role']!='admin_sul'){
 //header('location:admin_pun.php');
    echo"YOU DO NOT HAVE PEMISSION.";
    exit;
}
    $conn = mysqli_connect("localhost", "root", "", "organisation");	
	$sql = $conn->prepare("DELETE  FROM `images` WHERE id=?");  
	$sql->bind_param("i", $_GET["id"]);
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:gallery-solapur.php');		
?>