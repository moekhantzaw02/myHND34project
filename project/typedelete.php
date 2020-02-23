<?php  
$connect=mysqli_connect("localhost","root","","rip");

$typeid=$_GET['TID'];
$Delete="DELETE FROM stafftype WHERE typeid='$typeid'";
$result=mysqli_query($connect,$Delete);

	if($result){
		echo "<script>window.alert('SUCCESS : type  Deleted.')</script>";
		echo "<script>window.location='stafftypeentry.php'</script>";
		}
else
{
	echo "<p>Error : Something went wrong in type Delete" . mysqli_error($connect) . "</p>";
}
?>