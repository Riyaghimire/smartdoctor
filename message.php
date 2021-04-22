<?PHP
include('header2.php');
session_start();
	if(isset($_SESSION['patientid']))
	{

		include "connect.php"; 

		$a=$_SESSION['patientid'];
	



		$b="SELECT * FROM `doctormessage`";
		$query1 = mysqli_query($conn,$b);

				while($row= mysqli_fetch_assoc($query1))	
		{
			$as=$row['Doctor_Id'];

		}



    	$sql="SELECT * FROM `chat` where Patient_Id=$a AND Doctor_Id=$as";

		$query = mysqli_query($conn,$sql);


		if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
			echo "&nbsp &nbsp &nbsp".$row['name'].":&nbsp";

          echo $row['message']."<br>"."<br>";

          echo "<img src='uploads/".$row['image']."' style='width:50%' />";         
		}
	}?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
</head>
<body>

	<form method="POST" name="regUser" action="insertRecord.php" enctype="multipart/form-data">
	<fieldset style="margin-left: 20px; ">
		<legend>Message Box</legend>
		<label>Message</label>
		<input type="text" name="message">
		<input type="file" name="file">
		</br>
		</br>
		
		
		<input type="submit" name="submit" value="Send">

	</fieldset>
</form>

<!-- <form method="POST" name="regUser" action="insertRecord.php" enctype="multipart/form-data">
	<fieldset style="margin-left: 20px; ">
		<legend>Message Box</legend>
		<label>Message</label>
		<input type="text" name="message">
		</br>
		</br>
		
		
		<input type="submit" name="submit" value="Send">

	</fieldset>
</form> -->

</body>
</html>




<?php	}else if(isset($_SESSION['doctorid'])){

		{

		include "connect.php"; 

		$a=$_SESSION['doctorid'];
	



		$b="SELECT * FROM `patientmessage`";
		$query1 = mysqli_query($conn,$b);

				while($row= mysqli_fetch_assoc($query1))	
		{
			$as=$row['Patient_Id'];

		}



    	$sql="SELECT * FROM `chat` where Patient_Id=$as AND Doctor_Id=$a";

		$query = mysqli_query($conn,$sql);


		if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
			echo "&nbsp &nbsp &nbsp".$row['name'].":&nbsp";

          echo $row['message']."<br>"."<br>";         
		}
	}




	}?>

	
<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
</head>
<body>
<form method="POST" name="regUser" action="insertRecord.php" enctype="multipart/form-data">
	<fieldset style="margin-left: 20px; ">
		<legend>Message Box</legend>
		<label>Message</label>
		<input type="text" name="message">
		<input type="file" name="file">
		</br>
		</br>
		
		
		<input type="submit" name="submit" value="Send">

	</fieldset>
</form>

</body>
</html>



<?php
	}
?>
