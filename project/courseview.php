<?php 
	$connect=mysqli_connect("localhost","root","","rip")
 ?>

 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<fieldset>
 		<legend><h2>Course View</h2></legend>
 		<table>
 				<tr>
 				<td>Course Id &nbsp</td>
 				<td></td>
 				<td>Course Name&nbsp</td>
 				<td></td>
 				<td>Entrance Fee</td>
 				<td></td>
 				<td>Action</td>
 			</tr>
 	 	<?php  
 	 		$select="SELECT * from course";
 	 	$ret=mysqli_query($connect,$select);
 	 	$count=mysqli_num_rows($ret);

 	 	for ($i=0; $i < $count; $i++) { 
	$row=mysqli_fetch_array($ret);
$courseid=$row['courseid'];
$coursename=$row['coursename'];
$fee=$row['fee'];
echo "<tr>";
echo "<td>".$courseid."</td>";
echo "<td>"."</td>";
echo "<td>".$coursename."</td>";
echo "<td>"."</td>";
echo "<td>".$fee."</td>";
echo "<td>"."</td>";
echo "<td><a href='courseupdate.php?CID=".$row['courseid']."'>Update</a>||<a href='coursedelete.php?CID=".$row['courseid']."'>Delete</a><td>";
 echo "</tr>";
}


 	 	?>
</table>
 	 	</fieldset>

 </body>
 </html>