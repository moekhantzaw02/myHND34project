<?php 
 $connect=mysqli_connect("localhost","root","","rip");
	if (isset($_POST['btnsave'])) {
	$courseid=$_POST['courseid'];
	$coursename=$_POST['coursename'];
$fee=$_POST['fee'];
	$insert="INSERT INTO course VALUES('$courseid','$coursename','$fee')";
	$result=mysqli_query($connect,$insert);

	if ($result) {
		echo "<script>alert('Type saved)</script>";
	}
	else
	{
		echo "<script>alert('Cannto saved)</script>";
		echo "<p>Error : " . mysqli_error($connect) . "</p>";
	}
}


	



 ?>

 <html>
 	<head>
 		<title></title>

 		<style type="text/css">
body{

}
.i1{
	width:200px;
}
.s1{
	background-color:royalblue;
	border:none;
	
	color:white;
	width:60px;
	height:30px;
}
.r1
{
	background-color:red;
	border:none;
	
	color:white;
	width:60px;
	height:30px;
}





 		</style>
 	</head>
 	<body>
 		<form action="courseentry.php" method="post">
 		<fieldset>
 			<legend>Course Entry</legend>
 		<table>
 			<tr>
 				<td>Course ID</td>
 				<td><input type="number" name="courseid" class="i1" placeholder="Eg.4"></td>
 			</tr> 
 			<tr>
 				<td>Course</td>
 				<td><input type="text" name="coursename" class="i1" placeholder="Eg.Mixed Martial Art"></td>
 			</tr>

 			<tr>
 				<td>Entrance Fee</td>
 				<td><input type="text" name="fee" placeholder="Eg.$ or " class="i1"></td>
 			</tr>

 			<tr>

 			</tr>

 			<tr>
 				<td></td>
 				<td><input type="submit" name="btnsave" class="s1" value="SAVE">
 					<input type="reset" class="r1" value="CLEAR">
 				</td>
 			</tr>

 		</table>
 		</fieldset>
 		<fieldset>
 			<legend>COURSE VIEW</legend>

<?php
$course="SELECT * FROM course ORDER BY courseid";


$result=mysqli_query($connect,$course);
$count=mysqli_num_rows($result);
  if ($count < 1)
 {
echo "<p>Ooaps, No result found</p>";
 }
 	
 else{


?>
	<table class="t2">
		<tr>
			<th>Courseid</th>
			<th>Course Name</th>
			<th>Entrance Fee</th>
			<th>Action</th>
		</tr>
		<?php 

for ($i=0; $i < $count; $i++) { 
	$row=mysqli_fetch_array($result);

echo "<tr>";
echo "<td>".$row['courseid']."</td>";
echo "<td>".$row['coursename']."</td>";
echo "<td>".$row['fee']."</td>";
echo "<td><a href='courseupdate.php?CID=".$row['courseid']."'>Update</a>||<a href='coursedelete.php?CID=".$row['courseid']."'>Delete</a><td>";
	echo "</tr>";

}
}
?>

 		</fieldset>
 		</form>
 	</body>
 	</html>	