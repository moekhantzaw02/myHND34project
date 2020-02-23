<?php 
 $connect=mysqli_connect("localhost","root","","rip");
if (isset($_POST['btn'])) {
	$typeid=$_POST['typeid'];
	$typename=$_POST['typename'];

	$insert="INSERT INTO stafftype VALUES('$typeid','$typename')";
	$result=mysqli_query($connect,$insert);

	if ($result) {
		echo "<script>alert('Type saved)</script>";
	}
	else
	{
		echo "<p>Error : Something went wrong in Staff Entry " . mysqli_error($connect) . "</p>";
	}
}

 ?>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 	body
 	{
 	
 	}
 	.btn{
 		background-color: blue;
 		color:white;
 		border:none;
 		padding:7px;
 	}
 	.f1{
 		width:400px; 

 	}
 	.i1{
 		height:30px;
 		padding:3px;
 	}
 	.f2{
 		height:500px;
 	}

 	</style>
 </head>
 <form action="stafftypeentry.php" method="post">	
 <body>
 	<fieldset>
 		<legend><h3>Role Entry</h3></legend>
 	<table>
 		<tr>
 			<td>Role id</td>
 			<td><input class="i1" type="text" name="typeid" placeholder="Eg.3"></td>
 		</tr>
 		
 	 	<tr>
 	 		<td>Role Name</td>
 	 		<td><input class="i1" type="text" name="typename" placeholder="Eg.Staff"></td>
 	 	</tr>
 		<tr></tr><tr></tr><tr></tr>
 		<tr>
 			<td></td>
 			<td><input type="submit" name="btn" class="btn"></td>
 		</tr>

 	</table>
</fieldset>

	
<?php 
$type="SELECT * FROM stafftype ORDER BY typeid";
$result=mysqli_query($connect,$type);
$count=mysqli_num_rows($result);
?>
<fieldset>
	<legend>Type View</legend>
			<table>

			<tr>
			<td>Type ID</td>
			<td>Type Name</td>
			<td>Action</td>
		</tr>


<?php  
for ($i=0; $i < $count; $i++) { 
$row=mysqli_fetch_array($result);
$typeid=$row['typeid'];
$typename=$row['typename'];
echo "<tr>";
echo "<td>".$typeid."</td>";
echo "<td>".$typename."</td>";
echo "<td><a href='typeupdate.php?TID=".$row['typeid']."'>Update</a> || <a href='typedelete.php?TID=".$row['typeid']."'>Delete</a></td>";
echo "</tr>";

}
?>
	</table>
	
</fieldset>
 </body>
 </form>
 </html>