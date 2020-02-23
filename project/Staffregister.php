<?php 
$connect=mysqli_connect("localhost","root","","rip");
if (isset($_POST['btnsave'])) {
	$id=$_POST['staffid'];
	$name1=$_POST['name1'];
	$staffimage=$_FILES['staffimage']['name'];
		$folder="image/";
			
		if ($staffimage) 
			{
				$filename=$folder."_".$staffimage;
				$copy=copy($_FILES['staffimage']['tmp_name'],$filename);  
			if (!$copy) 
			{
				exit("Problem Occured. Cannot upload image."); 
			}
}
	$age=$_POST['age'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$phonenumber=$_POST['phonenumber'];
	$StaffTypeID=$_POST['cbotype'];
	
	
	$Insert="INSERT INTO staff VALUES('$id','$name1','$staffimage','$age','$email','$address','$phonenumber','$StaffTypeID')";
  	$result=mysqli_query($connect,$Insert);
  	if($result)
  	{
    echo "<script>alert('Register Complete.');</script>";
  	}
  	else
  	{
    echo "<p>Error : " . mysqli_error($connect) . "</p>";
  
}
}
 ?>
<html>
<head>
	<title>Staff Register page</title>
	<style type="text/css">
.i1{
	height:30px;
	width:200px;
	font-size: 15px;
}
 a{
 	text-decoration: none;
 	color:white;

 }
 .b1{
 	background-color:royalblue;
 	color:white;
 	border:none;
 	height:40px;
 	letter-spacing: 4px;

 }
 .b1:hover{
 	background-color:navy;
 	color:white;
 	border-radius:5px;
 }
 .f1{
 	text-align: right;
 	border:none;
 }
 legend{
 	font-size: 20px;
 }
 .reset{
 	border:none;
 	background-color:#CC0000;
 	color:white;
 	width:60px;
 	height:30px;
 }
 .save{
 	border:none;
 	background-color:blue;
 	color:white;
 	padding:5px 4px;
 	width:60px;
 	height:30px;
 }
 .reset:hover{
 	background-color: red;
 }
 body{
 	background-image:url("D:\Xampp\htdocs\project\image\MAA.png");
 }
	</style>
</head>
<body>

	<form action="Staffregister.php" method="POST" enctype="multipart/form-data">
	<fieldset class="f1"><button class="b1"><a href="studentregister.php">STUDENT REGISTER</a></button>
 		<button class="b1"><a href="Staffregister.php">STAFF REGISTER</a></button>
 		</fieldset>
	<fieldset>
		<legend>Staff Register</legend>
<table>
	<tr>
		<td></td>
		<td><?php echo "<body style='background:url(MAA.png);'>"; ?></td>
	</tr>
	<tr><td>Staff Id</td><td><input class="i1" type="text" name="staffid"></td></tr>
	
	<tr>
		<td>Staff Name</td>
		<td><input class="i1" type="text" name="name1"></td>
	</tr>
	
	<tr>
		<td>Staff Image</td>
		<td><input class="i1" type="file" name="staffimage"></td>
	</tr>
	
	<tr>
		<td>Age</td>
		<td><input class="i1" type="Number" name="age"></td>
	</tr>
	
	<tr><td>Email</td><td><input class="i1" type="email" name="email"></td></tr>
	<tr><td>Address</td><td><input class="i1" type="text" name="address"></td></tr>
	<tr><td>Phone Number</td><td><input class="i1" type="number" name="phonenumber"></td></tr>
	

	<tr><td>Type</td>
		<td>
		<select name="cbotype">
	<option>-Choose Staff Type-</option>
	
	
		<?php 
		$StaffType_Query="SELECT * FROM stafftype";
		$StaffType_Ret=mysqli_query($connect,$StaffType_Query);
		$Staff_Count=mysqli_num_rows($StaffType_Ret);

		for($i=0; $i<$Staff_Count;$i++) 
		{ 
			$rows=mysqli_fetch_array($StaffType_Ret);
			$StaffTypeID=$rows['typeid'];
			$StaffType=$rows['typename'];

			echo "<option value='$StaffTypeID'>$StaffTypeID - $StaffType</option>";
		}
	?>
	</select>
</td>
		<tr><td></td><td><input class="save" type="submit" name="btnsave">
			<input class="reset" type="Reset" value="Clear" name="btnclear"></td></tr>
</table>
	</fieldset></form>
</body>
</html>