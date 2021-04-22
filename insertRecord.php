<?php
session_start();
include "connect.php";


	if (isset($_POST['submit'])){

	//retriving the form data
	$message=$_POST['message'];
		$id=$_SESSION['patientid'];
		$did=$_SESSION['doctorid'];

		if($id>0)
	{

		$sql="SELECT * FROM `patient` where patientid=$id";
		$query = mysqli_query($conn,$sql);

		while($row= mysqli_fetch_assoc($query))	
		{
        $a= $row['patientname'];
		}

				$b="SELECT * FROM `doctormessage`";
		$query1 = mysqli_query($conn,$b);

				while($row= mysqli_fetch_assoc($query1))	
		{
			$as=$row['Doctor_Id'];

		}



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
   
  } 
}

$image = $_FILES['file']['name'];




$query="INSERT INTO Chat (`name`, `message`, `Patient_Id`, `Doctor_Id`, `Role`,`image`) VALUES ('$a','$message', '$id','$as','1','$image')";

mysqli_query($conn, $query);

if($query)
	{
		header('Location: message.php');
	}
	else
	{
		echo "Something went wrong";
	}




	}elseif ($did>0) {
		# code...
				$sql="SELECT * FROM `doctor` where doctorid=$did";
		$query = mysqli_query($conn,$sql);

		while($row= mysqli_fetch_assoc($query))	
		{
        $a= $row['doctorname'];
		}

		$b="SELECT * FROM `patientmessage`";
		$query1 = mysqli_query($conn,$b);

				while($row= mysqli_fetch_assoc($query1))	
		{
			$as=$row['Patient_Id'];

		}


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
   
  } 
}

$image = $_FILES['file']['name'];




$query="INSERT INTO Chat (`name`, `message`, `Patient_Id`, `Doctor_Id`, `Role`,`image`) VALUES ('$a','$message', '$as','$did','1','$image')";

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



$query="INSERT INTO Chat (`name`, `message`, `Patient_Id`, `Doctor_Id`, `Role`) VALUES ('Ashmita','$message', '1','0','1')";

//echo $query;
			//exit();


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
