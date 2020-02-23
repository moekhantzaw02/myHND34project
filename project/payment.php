<?php 
	$connect=mysqli_connect("localhost","root","","gg");
	$student="SELECT * FROM student ORDER BY studentid";
	$result=mysqli_query($connect,$student);
	$count=mysqli_num_rows($result);

 ?>

 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 	table,td,tr{
 		border:1px solid black;
 	}
 	</style>
 </head>
 <body>
 	
 	<select name="studentid">
 		<option>---Select Student ID---<option>
 			<?php 
$selectid="SELECT DISTINCT studentid from student";
$idresult=mysqli_query($selectid);
$idcound=mysql_num_rows($idresult);
for ($i=0; $i < $idcound ; $i++) { 
	$row=mysqli_fetch_array($idresult);
	$id=$row['studentid'];
	echo "<option> $id </option>";
}
?>
<input type=text>
<?php

 			 ?>

 	</select>
 				</table>
 </body>
 </html>