<?php  
	$connect=mysqli_connect("localhost","root","","rip");
		
		if(isset($_REQUEST['SID']))
		{
 		$studentid=$_REQUEST['SID'];
 		$student="SELECT * from student where studentid='$studentid'";
 		$result=mysqli_query($connect,$student);
 		$arr=mysqli_fetch_array($result);
 		$studentimage=$arr['studentimage'];
 		$name1=$arr['name1'];
 		$section=$arr['sectionid'];
 		$guardian=$arr['name2'];
 		$startdate=$arr['startdate'];

 		$age=$arr['age'];
 	}
?>

<html>
<head>
	<title></title>
	<style type="text/css">
table,td,tr{
	
}
table{
	width:300px;
}
fieldset{
	width:500px;
	line-height: 2px;
	
}
.update{
	background-color: royalblue;
	color:white;
	border:none;
	width:50px;
	height:25px;
}
.delete{

	background-color: red;
	color:white;
	border:none;
	width:50px;
	height:25px;
}

a{
	text-decoration: none;

	color:white;
}
	</style>
</head>
<body>
	<fieldset>
		<legend><h2>Student Information</h2></legend>
	<table >
		<tr>
			<td></td>
	<td><img src="../<?php echo $studentimage ?>" width="70px" height="70px"/></td>
		</tr>
<tr>
	<td>Student ID</td><td><?php echo $studentid ?></td>

</tr>
<tr><td>Student Name</td><td><?php echo $name1 ?></td></tr>
<tr><td>Age</td><td><?php echo $age; ?>Years Old</td></tr>
<tr><td>Start Date</td><td><?php echo $startdate; ?></td></tr>
<tr><td>Guardian Name</td><td><?php echo $guardian ?></td></tr>
<tr><td>Section Name</td><td><?php echo $section; ?></td></tr>

<tr><td>student image</td><td><?php echo $studentimage; ?></td></tr>
<tr>
	<td></td>
	<td><button class="update"><a href="">Update</a></button>
	<button class="delete"><a href="">Delete</a></button></td>
</tr>
	</table>
	</fieldset>
	</body>

</html>