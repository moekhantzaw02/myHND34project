<?php 
$connect=mysqli_connect("localhost","root","","rip")
 ?>
<html>
<head>
	<title></title>
</head>
<body>
<fieldset>
	<legend>Student List</legend>
	
		<?php   
	 
	$student="SELECT * FROM student ORDER BY studentid";
	$result=mysqli_query($connect,$student);
	$count=mysqli_num_rows($result);
	?>
	 	<table class="table1">
 		
 		<th class="th"><p>Student Id</p></th>
 		<th></th>
 				<th class="th"><p>Section</p></th>
 				<th></th>
		<th class="th"><p>Email</p></th>
		<th></th>
		<th class="th"><p>Phone Number</p></th>
		<th></th>
	
		<th class="th"><p>Action</p></th>
 		</td>
		<?php 
			for ($i=0; $i < $count ; $i++) { 
				$arr=mysqli_fetch_array($result);

				echo "<tr>";
				
				echo "<td class='td'>".$arr['studentid']."</td>";
			echo "<td>"."</td>";
				echo "<td class='td'>".$arr['sectionid']."</td>";
				echo "<td>"."</td>";
				echo "<td class='td'>".$arr['email']."</td>";
				echo "<td>"."</td>";
				echo "<td class='td'>".$arr['phonenumber']."</td>";
echo "<td>"."</td>";

				

				echo "<td class='td'><a class='shi' href='student.php?SID=".$arr['studentid']."'>View</a> </td>";
				echo "</tr>";
				
			}
		 ?>
		
	</table>

</fieldset>
</body>
</html>
