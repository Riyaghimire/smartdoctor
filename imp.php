<?php
session_start();
include "connect.php";


	if (isset($_POST['submit'])){


	$message=$_POST['shop'];

$query="INSERT INTO doctormessage (`Doctor_Id`) VALUES ('$message')";

mysqli_query($conn, $query);

if($query)
	{
		header('Location: message.php');
	}
	else
	{
		echo "Something went wrong";
	}




	}


?>
