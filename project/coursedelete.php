<?php  
$connect=mysqli_connect("localhost","root","","rip");

$courseid=$_GET['CID'];
echo  $Delete="DELETE FROM course WHERE courseid='$courseid'";
$result=mysqli_query($connect,$Delete);

	if($result){
		echo "<script>window.alert('SUCCESS : course Deleted.')</script>";
	}
	else
	{
	echo "<p>Error :" . mysqli_error($connect) . "</p>";
	}
	?>