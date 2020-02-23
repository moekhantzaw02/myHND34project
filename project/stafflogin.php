<?php 
session_start();
$connect=mysqli_connect("localhost","root","","rip");
if (isset($_POST['btnlogin'])) {
	$username=$_POST['txtusername'];
	
	$password=$_POST['txtpassword'];

	 $check="SELECT * from admin where username='$username' and password='$password'";	
	$result=mysqli_query($connect,$check);
$rows=mysqli_fetch_array($result);
	if ($result) {
			$_SESSION['username']=$rows['username'];
		$_SESSION['email']=$rows['email'];
		$_SESSION['image']=$rows['image'];
		echo "<script>window.alert('login successfully')</script>";
		echo "<script>window.location='staffhome.php'</script>";
	}
	else
	{
		echo "<script>window.alert('login fail')</script>";
		echo "<script>window.location='stafflogin.php'</script>";
	}
}


 ?>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 	fieldset{
 		width:400px;
 	}
 	.clear{
 			width:69px;
	height: 30px;
	border:none;
	color:white;
	background-color: red;
 	}
.login{
	width:69px;
	height: 30px;
	border:none;
	color:white;
	background-color: green;

}
.login:hover{
	background-color: lightgreen;
	color:black;
}
.i1{
	width:142px;
	height:30px;
}
</style>
 </head>
 <body>
 	<form action="stafflogin.php" method="post">
 	<fieldset>
 		<legend>Admin Login</legend>
 		<table>
 			<tr>
 				<td>Username</td>
 				<td><input type="text" class="i1" name="txtusername"></td>
 			</tr>
 			<tr>
 				<td></td>
 				<td></td>
 			</tr>
 			<tr>
 				<td>Password</td>
 				<td><input type="password" class="i1" name="txtpassword"></td>
 			</tr>
 			<tr>
 				<td></td>
 				<td><input class="login" type="submit" name="btnlogin" value="LOGIN">    
 					<input class="clear" type="reset"  value="clear"></td>
 			</tr>




 		</table>
	</fieldset>
	</form>
 </body>
 </html>