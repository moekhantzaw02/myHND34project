<?php 
include('autoid.php');
$connect=mysqli_connect("localhost","root","","rip");
	if(isset($_POST['btnsave']))
	{ 
		$SID=$_POST['studentid'];
		$name1=$_POST['name1'];
		
		
		$age=$_POST['age'];
		$birthdate=$_POST['birthdate'];
		$education=$_POST['el'];
		
		$name2=$_POST['name2'];
		$email=$_POST['email'];
		$phonenumber=$_POST['phonenumber'];
		$studentimage=$_FILES['studentimage']['name'];
		$folder="image/";
			
		if ($studentimage) 
			{
				$filename=$folder."_".$studentimage;
				$copy=copy($_FILES['studentimage']['tmp_name'],$filename);  
			if (!$copy) 
			{
				exit("Problem Occured. Cannot upload image."); 
			}

		}
	$check="SELECT * FROM student where studentid='$SID'";
		$ret=mysqli_query($connect,$check);
		$count=mysqli_num_rows($ret);
		if ($count!==0) {
			echo "<script>alert('ID already taken')</script>";
		}
		else{
   $Insert="INSERT INTO student VALUES('$SID','$name1','$startdate','$age','$birthdate','$education','$section','$course','$name2','$email','$phonenumber','$studentimage')";	
  $result=mysqli_query($connect,$Insert);

  	if($result)
  	{
    echo "<script>alert('Register Complete.');</script>";
  	}
  	else
  	{
    echo "<script>alert('Cannot Register.');</script>";
    echo "<p>Error : " . mysqli_error($connect) . "</p>";
  }
}
}


 ?>
 <html>
 <head>
 	<title>Student Register</title>
 	<style type="text/css">
 	body{
 		background-color:#111;
 		margin:auto;
 		color:white;
 		
 	}
 
 p{
 	text-align: center;
 	color:green;
 }
 .l2{
 	font-size:23;
 	color:Blue;
 	text-align:left;
 }
 .l1{
 	font-size:30;
 	color:royalblue;

 }
 .a1{
 	text-transform: 
 }
 .f1{
 	float:left;
 	width:615px;
 	height:300px;
 }
 .f2{
 	float: right;
 	width: 635px;
 	height: 300px;}
 .f3{
 	border:2px groove;
 	}
 .f4{
 	border:none;
 	width: 650px;
 	height:70px;
 }
 .save{
 	width:60px;
 	height:30px;
 	background-color: blue;
 	color:white;
 	border:none;}
 .save:hover{
 	background-color: royalblue;
 	cursor: pointer;

 }
 .clear:hover{
 	background-color: darkred;
 	cursor:pointer;
 }
 .clear{
 	width:60px;
 	height:30px;
 	color:white;
 	border:none;
 	background-color: red;
 }
 .input{
 	width:200px;
 	height:30px;
 	
 } 
 .g{
 	border:none;
 	text-align:right;
 }
 .input:hover{

 }
 .s1{
 	width:200px;
 	height:30px;
 	size:20;
 }
 a{
 	text-decoration:none;
 	color:white;

 }
 .b1{
 	background-color:royalblue;
 	color:white;
 	border:none;
 	height:40px;
 	letter-spacing: 4px;

 }
 .b1:hover{
 	
 	color:white;
 	border-radius: 5px;
 	font-style: italic;
 	background-color:navy;
 }
 .th{
 	border:1px solid black;
 	
 }
 .td{
 	border:1px solid black;
 }
 .shi{
 	color:blue;
 }

 	</style>
 </head>
 <body>
 	<form action="studentregister.php" method="post" enctype="multipart/form-data">
 		<fieldset class="g">
 		<button class="b1"><a href="">STUDENT</a></button>
 		<button class="b1"><a href="Staffregister.php">STAFF</a></button>
 		<button class="b1"><a href="">SECTION</a></button>
 		<button class="b1"><a href="">ROLE</a></button>
		</fieldset>
 		
<fieldset class="f3">
	<legend class="l1">OFFICAL MEMBER APPLICATION FORM</legend>

	<fieldset class="f1">
	<legend class="l2">Student Information</legend>
<table>
<tr><td>StudentID</td><td><input type="text" class="input" name="studentid" value="<?php echo AutoId('student','studentid','S-',6) ?>" require/></td></tr>
<tr><td>Name</td><td><input class="input" type="text" name="name1" placeholder="Eg.Jim Peg"></td></tr>

<tr><td>Age</td><td> <input class="input" type="text" name="age"></td></tr>
<tr><td>Birth Date </td><td><input class="input" type="date" name="birthdate"></td></tr>
<tr><td>Education Level</td><td><select name="el" class="s1"><option>Low</option><option>Middle</option><option>High</option></select></td></tr>
<tr><td></td></tr>	<tr><td>Section</td>
		<td>
		<select name="section">
	<option>-Choose section-</option>
	<?php 
		$section_query="SELECT * FROM section";
		$section_ret=mysqli_query($connect,$section_query);
		$section_count=mysqli_num_rows($section_ret);

		for($i=0; $i<$section_count;$i++) 
		{ 
			$rows=mysqli_fetch_array($section_ret);
			$sectionid=$rows['sectionid'];
			$sectionname=$rows['sectionname'];
			

			echo "<option value='$sectionid'>$sectionid - $sectionname</option>";
		}
	?>

</td>
	</select>
<tr>	<td>Course</td>
	<td>
		<select name="course">
			<option>-Choose Course-</option>
			<?php 
			$course_query="SELECT * FROM course";
			$course_ret=mysqli_query($connect,$course_query);
			$course_count=mysqli_num_rows($course_ret);
			for ($i=0; $i < $course_count; $i++) { 
				$rows=mysqli_fetch_array($course_ret);
				$courseid=$rows['courseid'];
				$coursename=$rows['coursename'];
				
				echo "<option value='$courseid'>$courseid - $coursename</option>";
			}

		 ?>
	</select></td>
</tr>
</table>
	
</fieldset>	
<fieldset class="f2">
	<legend class="l2">Guardian infromation</legend>
	<table>
<tr><td>Name</td><td><input class="input" type="text" name="name2"></td></tr>
<tr><td>Email Address</td><td><input type="email" class="input" name="email"></td></tr>

<tr><td>Phone Number</td><td><input class="input" type="number" name="phonenumber" require/></td></tr>
<tr><td>Student Image</td><td><input type="file" name="studentimage"></td></tr>

	</table>
</fieldset>		<br><br>										
	<fieldset class="f4">
		<table>
			<tr>
				<td></td>
		<td><input class="save" type="submit" name="btnsave" value="save">
		<input class="clear" type="reset" value="Clear"></td>
		</tr>
		</table>
	</fieldset>	
</fieldset>
<fieldset>
	<legend>Student List</legend>
	
		<?php   
	 
	$student="SELECT * FROM student s, section se where s.sectionid=se.sectionid ORDER BY studentid";
	$result=mysqli_query($connect,$student);
	$count=mysqli_num_rows($result);
	?>
	 	<table class="table1">
 		
 		<th class="th"><p>Student Id</p></th>
 				<th class="th"><p>Section</p></th>
		<th class="th"><p>Email</p></th>
		<th class="th"><p>GURDIAN NAME</p></th>
		<th class="th"><p>Phone Number</p></th>
	
		<th class="th"><p>Action</p></th>
 		</td>
		<?php 
			for ($i=0; $i < $count ; $i++) { 
				$arr=mysqli_fetch_array($result);

				echo "<tr>";
				
				echo "<td class='td'>".$arr['studentid']."</td>";
			
				echo "<td class='td'>".$arr['sectionname']."</td>";
				echo "<td class='td'>".$arr['email']."</td>";
				echo "<td class='td'>".$arr['name2']."</td>";
				echo "<td class='td'>".$arr['phonenumber']."</td>";


				

				echo "<td class='td'><a class='shi' href='student.php?SID=".$arr['studentid']."'>View</a> </td>";
				echo "</tr>";
				
			}
		 ?>
		
	</table>

</fieldset>
 	</form>
 </body>
 </html>