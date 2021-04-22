<?php
session_start();
include('header2.php');
if(isset($_SESSION['patientid']))
  {
?>

<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>

<form method="POST" name="regUser" action="imp.php" enctype="multipart/form-data">
    <label style="margin-left: 10px">Select Doctor To Send Message </label>

<br>
  <select name="shop" class="form-control" style="margin-left: 10px, margin-right:10px;">
    <option value="">Select Doctor</option>
            <?php 
            include 'connect.php';


                                $sql = "SELECT * FROM doctor";
                    $query = mysqli_query($conn,$sql);
                    while($row= mysqli_fetch_assoc($query)){
                        # code...
                        $category_options=<<<SPLIT
                        <option value="{$row['doctorid']}">{$row['doctorname']}</option>
 
SPLIT;
echo $category_options;

                    }





             ?>
    
  </select>
  <br> 
  		<input type="submit" name="submit" value="Select" style="margin-left: 10px">
          
  </form>


</body>
</html>
<?php

  }

  else if(isset($_SESSION['doctorid']))
  {
?>

<!DOCTYPE html>
<html>
<head>
  <title> </title>
</head>
<body>

<form method="POST" name="regUser" action="imppat.php" enctype="multipart/form-data">
    <label>Select Patient To Send Message </label>


  <select name="shop" class="form-control">
    <option value="">Select Patient</option>
            <?php 
            include 'connect.php';


                                $sql = "SELECT * FROM patient";
                    $query = mysqli_query($conn,$sql);
                    while($row= mysqli_fetch_assoc($query)){
                        # code...
                        $category_options=<<<SPLIT
                        <option value="{$row['patientid']}">{$row['patientname']}</option>
 
SPLIT;
echo $category_options;

                    }





             ?>
    
  </select> 
      <input type="submit" name="submit" value="Select">
          
  </form>


</body>
</html>
<?php

  }
else

  {
    echo "doctor is ";;
  }
?>


