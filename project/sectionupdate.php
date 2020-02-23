<?php  
$connect=mysqli_connect("localhost","root","","rip");
if (isset($_POST['save'])) {

		$sectionid=$_POST['txtsectionid'];
		$sectionname=$_POST['txtsectionname'];
		
	$Update="UPDATE section
			 SET 
			 sectionid='$sectionid',

			 sectionname='$sectionname'
			
			 WHERE
			 sectionid='$sectionid'";
	$ret=mysqli_query($connect,$Update);

	if($ret)
	{
		echo "<script>window.alert('SUCCESS : Section Updated.')</script>";
		echo "<script>window.location='sectionentry.php'</script>";
		
	}
	else
	{echo "<p>Error : Something went wrong in section Update" . mysqli_error($connect) . "</p>";
		
	}
}

if(isset($_GET['SID'])) 
{
	$SID=$_GET['SID'];

	$section_Query="SELECT * from section Where sectionid='$SID'";

	$section_ret=mysqli_query($connect,$section_Query);
	$section_row=mysqli_fetch_array($section_ret);
	$SCount=mysqli_num_rows($section_ret);

	if ($SCount < 1) 
	{
		echo "<script>window.alert('ERROR : Section Profile Not found'.mysqli_error($connect).)</script>";
		echo "<script>window.location='sectionview.php'</script>";
	}
}


else
{
	$sectionid="";
	echo "<script>window.location='sectionentry.php'</script>";
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Update</title>
	<style type="text/css">
	.save{
		width:150px;
		height:30px;
		border:none;
		background-color: royalblue;
		color:white;
		border-radius:5px;

	}
	.save:hover{
		background-color: blue;
		cursor: pointer;
	}
	.i1{
		width:150px;
		height:20px;
	}
	</style>
</head>
<body>
<form action="sectionupdate.php" method="post">
	
<fieldset class="f1">
 		<legend class="l1"><h2>SECTION UPDATE</h2></legend>
 	<table>
 		<tr>
 			<td>Enter Section Id:</td>
 			<td><input class="i1" type="text" name="txtsectionid" value="<?php echo $section_row['sectionid'] ?>"></td>
 		</tr>
 		
<tr>
<td>Enter Section Name:</td>
<td><input class="i1" type="text" name="txtsectionname" value="<?php echo $section_row['sectionname'] ?>"></td>
</tr>
 		
<tr>
<td></td>
<td><input class="save" type="submit" value="save" name="save"></td>
</tr>


 	</table>
 </fieldset>
</form>
</body>
</html>