<?php 
	
$connect=mysqli_connect("localhost","root","","rip");
if (isset($_POST['btnsave'])) {

		$courseid=$_POST['txtcourseid'];
		$coursename=$_POST['txtcoursename'];
		$fee=$_POST['txtfee'];
		
	 $Update="UPDATE course
			 SET 
			 courseid='$courseid',
			 coursename='$coursename',
			 fee='$fee'
			
			 WHERE
			 courseid='$courseid'";
	$ret=mysqli_query($connect,$Update);

	if($ret)
	{
		echo "<script>window.alert('SUCCESS : Course Updated.')</script>";
		echo "<script>window.location='courseentry.php'</script>";
		
	}
	else
	{echo "<p>Error : " . mysqli_error($connect) . "</p>";
		
	}
}

if(isset($_GET['CID'])) 
{
	$CID=$_GET['CID'];

	$course_query="SELECT * from course Where courseid='$CID'";

	$course_ret=mysqli_query($connect,$course_query);
	$course_row=mysqli_fetch_array($course_ret);
	$SCount=mysqli_num_rows($course_ret);

	if ($SCount < 1) 
	{
		echo "<script>window.alert('ERROR : Course Profile Not found'.mysqli_error($connect).)</script>";
		
	}
}


else
{
	$courseid="";
	
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
 	<form action="courseupdate.php" method="post">
 		<fieldset>
 			<legend>Course Update</legend>
 		<table>
 			<tr>
 				<td>Course ID</td>
 				<td><input type="number" name="txtcourseid" class="i1" value="<?php echo $course_row['courseid']?>" readonly></td>
 			</tr> 
 			<tr>
 				<td>Course name</td>
 				<td><input type="text" name="txtcoursename" class="i1" value="<?php echo $course_row['coursename'] ?>"></td>
 			</tr>

 			<tr>
 				<td>Entrance Fee</td>
 				<td><input type="text" name="txtfee" value="<?php echo  $course_row['fee'] ?>" class="i1"></td>
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
 </body>	
 </html>