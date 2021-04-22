<?php

	include "connect.php";
session_start();
if($_POST)
{
	$name=$_SESSION['patientid'];
    $msg=$_POST['msg'];
    
	$sql="INSERT INTO `chat`('id', 'name','message',`Patient_Id`,'Doctor_Id',role) VALUES ('1','Bas','".$msg."', '".$name."','0','1')";

	$query = mysqli_query($conn,$sql);
	if($query)
	{
		header('Location: chatpage.php');
	}
	else
	{
		echo "Something went wrong";
		echo $msg;
		echo $name;
	}
	
	}

?>

