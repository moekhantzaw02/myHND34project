<?php 
session_start();

 ?>


 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 	img{
 		border-radius: 44px;
 	}
 	.f1{
 		
 		float:right;
 		width:200px;
 		border:none;
 	}
 	.f2{
 		float:left;
 		width:1010px;
 		border:none;
 	}
 	a{
 		text-decoration: none;
 		color:white;
 	}
 	.b1{
 		background-color: royalblue;
 		color:white;
 		border:none;
 		width:200px;
 		height:70px;
 	}
 	.b1:hover{
 		background-color: blue;
 		
 		font-style: italic;
 	}
 	.a1{
 		color:black;
 	}
 	.b2{
 		border:none;
 		padding:5px;
 	}
 	.b3{
 		width: 100px;
 		visibility: hidden;

 	}
 	</style>
 </head>
 <body>
 	<form action="staffhome.php" method="POST">
 		
 	 <a href="Staff_Profile.php?StaffID=<?php echo $_SESSION['username'] ?>">
 	 	<fieldset class="f1">
 	<table>
 		<tr>
 			<td><img src="<?php echo $_SESSION['image'] ?>" width="70px" height="70px"/></td>

 			
 		</tr>
 		<tr>
<td><p><?php echo $_SESSION['username'] ?></p> 	</td></a>
 		</tr>
 		<tr>
 			<td><button class="b2"><a class="a1" href="">Logout</a></button></td>
 		</tr>
 		</table>
	</fieldset>

 </form>
	
			<fieldset class="f2">
				<table>
			<tr>
				<td><button class="b1"><a href="staffregister.php">Staff Entry</a></button></td>
				
				<td><button class="b1"><a href="studentregister.php">Student Entry</a></button></td>

				<td><button class="b1"><a href="sectionentry.php">Section Entry</a></button></td>

				<td><button class="b1"><a href="courseentry">Course Entry</a></button></td>
			</tr>
			<tr>
				<td><button class="b1"><a href="staffregister.php">Staff view</a></button></td>
				
				<td><button class="b1"><a href="studentview.php">Student view</a></button></td>

				<td><button class="b1"><a href="sectionview.php">Section view</a></button></td>

				<td><button class="b1"><a href="courseview.php">Course view</a></button></td>
			</tr>
		</table>
	</fieldset>
	
<fieldset class="f2">
		<?php 
		if (isset($_POST['btnadd'])) {
		$email=$_POST['txtemail'];
		$username=$_POST['txtusername'];
		$password=$_POST['txtpassword'];
		
		$image=$_FILES['image']['name'];
		$folder="image/";
			
		if ($image) 
			{
				$filename=$folder."_".$image;
				$copy=copy($_FILES['studentimage']['tmp_name'],$filename);  
			if (!$copy) 
			{
				exit("Problem Occured. Cannot upload image."); 
			}

		}
		
		}

		 ?>	
		 <form action="staffhome.php" action="post">
		<table>

			<tr>
				<td>Email</td>
				<td><input type="text" name="txtemail"></td>
				<td>username</td>
				<td><input type="text" name="txtusername"></td>
				<td>Password</td>
				<td><input type="text" name="txtpassword" ></td>
			
				</tr>
				<tr>
				<td>image</td>
				<td><input type="file" name="txtimage"></td>
				<td><input type="submit" value="Add Admin" name="btnadd"></td>
				<td><input type="reset" value="clear"></td>
				</tr>
		</table>
		</form>
		</fieldset>

 </body>
 </html>