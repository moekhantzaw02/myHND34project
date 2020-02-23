<?php 
	include('autoid.php');
	$connect=mysqli_connect("localhost","root","","rip");
	if (isset($_POST['save'])) {
		$courseid=$_POST['courseid'];
		$sectionid=$_POST['sectionid'];
		$sectionname=$_POST['sectionname'];
		$monthlyfee=$_POST['monthlyfee'];
		$insert="INSERT INTO section values ('$courseid','$sectionid','$sectionname','$monthlyfee')";
		$insert_result=mysqli_query($connect,$insert);

		if ($insert_result) {
			echo "<scrtipt>window.alert('section saved')</script>";
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
 	body{
 		background-color: #111;
 		color:white;
 	}
 	input{
 		width:200px;
 		height:30px;
 	}
 	.save:hover
 	{
 		background-color: blue;
 		
 	}
 	table
 	{
 		line-height: 70px;
 	}
 	.l1{
 		letter-spacing: 5px;
 		font-size: 20px;

 	}
 .save{
 	background-color: royalblue;
 	color:white;
 	border:none;
 	font-size:15px;
 	letter-spacing: 7px;
 	padding-right: 10px;

 }
 .clear
 {
 	background-color: darkred;
 	color:white;
 }
 .f1{
 	width:400px;
 	height:400px;

 }
 .t2
 {
 	letter-spacing: 2px;
 	line-height: 20px;
 }
 .b1{
 	border:none;
 text-decoration: overline;
 text-decoration: none;
 background-color: royalblue;
padding:4px;
float: right;
 }
 .a1
 {
 	text-decoration: none;
 	color:white;

 }
 	</style>
 </head>
 <body>
 	<form action="sectionentry.php" method="post">
 	<fieldset class="f1">
 		<legend class="l1"><h2>SECTION ENTRY</h2></legend>
 	<table>
 		
 		<tr>
 			<td>Enter Section Id:</td>
 			<td><input type="text" name="sectionid" value="<?php echo AutoId('section','sectionid','S-',4) ?>"></td>
 		</tr>
<tr>
<td>Enter Section Name:</td>
<td><input type="text" name="sectionname" placeholder="Eg.MC@1"></td>
</tr>
 	<td>Choose Course</td>
 	<td><select>ct>
 		<?php 

$courseid="SELECT courseid from course";
$idresult=mysqli_query($courseid);
$idcount=mysql_num_rows($idresult);
for ($i=0; $i < $idcount ; $i++) { 
	$row=mysqli_fetch_array($idresult);
	$id=$row['studentid'];
	echo "<option> $id </option>";
}
?>	
 		 ?>

 	</select></td>
<tr>
<td></td>
<td><input class="save" type="submit" value="save" name="save"></td>
</tr>


 	</table>
 </fieldset>
 </form>

 <fieldset >
<legend><h2>Section Entry</h2></legend>

	<button class="b1"><a class="a1" href="sectionview.php">Click me to update and delete</a></button>
 <?php
$section="SELECT * FROM section ORDER BY sectionid";


$result=mysqli_query($connect,$section);
$count=mysqli_num_rows($result);
  if ($count < 1)
 {
echo "<p>window.alert('Ooaps, No result found')</p>";
 }
 	
 else{


?>
	<table class="t2">
		<tr>
			<th>No</th>
			<th>sectionid</th>
			<th>sectionname</th>
		</tr>
		<?php 

for ($i=0; $i < $count; $i++) { 
	$row=mysqli_fetch_array($result);
$secid=$row['sectionid'];
$secname=$row['sectionname'];
echo "<tr>";
echo "<td>".($i+1)."</td>";
echo "<td>".$secid."</td>";
echo "<td>".$secname."</td>";
	echo "</tr>";

}
}
?>
	</table>
 </fieldset>
 </body>
 </html>