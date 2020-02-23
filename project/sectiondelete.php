<?php  
$connect=mysqli_connect("localhost","root","","rip");

$sectionid=$_GET['SID'];
$Delete="DELETE FROM section WHERE sectionid='$sectionid'";
$result=mysqli_query($connect,$Delete);

	if($result){
		echo "<script>window.alert('SUCCESS : Staff Account Deleted.')</script>";
		echo "<script>window.location='sectionview.php'</script>";
		}
else
{
	echo "<p>Error : Something went wrong in Staff Delete" . mysqli_error($connect) . "</p>";
}
?>