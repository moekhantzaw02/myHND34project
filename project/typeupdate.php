<?php  
$connect=mysqli_connect("localhost","root","","rip");
if (isset($_POST['save'])) {

		$typeid=$_POST['typeid'];
		$typename=$_POST['typename'];
		
	$Update="UPDATE stafftype
			 SET 
			 typeid='$typeid',
			 typename='$typename'
			 WHERE
			 typeid='$typeid'";
	$ret=mysqli_query($connect,$Update);

	if($ret)
	{
		echo "<script>window.alert('SUCCESS : type Updated.')</script>";
		echo "<script>window.location='stafftypeentry.php'</script>";
		
	}
	else
	{echo "<p>Error : Something went wrong in type Update" . mysqli_error($connect) . "</p>";
		
	}
}

if(isset($_GET['TID'])) 
{
	$TID=$_GET['TID'];

	$type="SELECT * from stafftype Where typeid='$TID'";

	$type_ret=mysqli_query($connect,$type);
	$type_row=mysqli_fetch_array($type_ret);
	$SCount=mysqli_num_rows($type_ret);

	if ($SCount < 1) 
	{
		echo "<script>window.alert('ERROR : Section Profile Not found'.mysqli_error($connect).)</script>";
		
	}
}


else
{
	$typeid="";
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Type Update</title>
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
	fieldset{
		width:500px;
	}
	</style>
</head>
<body>
<form action="typeupdate.php" method="post">
	
<fieldset class="f1">
 		<legend class="l1"><h2>Type UPDATE</h2></legend>
 	<table>
 		<tr>
 			<td>Enter Role Id:</td>
 			<td><input class="i1" type="text" name="typeid" value="<?php echo $type_row['typeid'] ?>"></td>
 		</tr>
 		<tr>
 			<td>Enter Role Name:</td>
 			<td><input class="i1" type="text" name="typename" value="<?php echo $type_row['typename'] ?>"></td>

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