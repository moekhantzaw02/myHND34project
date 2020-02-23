<?php 
	$connect=mysqli_connect("localhost","root","","rip");
		$section="SELECT * FROM section ORDER BY sectionid";
	$result=mysqli_query($connect,$section);
	$count=mysqli_num_rows($result);



  
	
if(isset($_POST['btnsearch'])) {
	$Shit=$_POST['txtsearch'];
	$search="SELECT * FROM section WHERE sectionid like '%$Shit%'";
	$result=mysqli_query($connect,$search);
	$num=mysqli_num_rows($result);
if($num==0) {
	echo "<p><no match found</p>";

}
else
{
	for ($a=0; $a < $num; $a+=4) { 
		$Section="SELECT * FROM section where sectionid like '%$Shit%'";
		$res=mysqli_query($connect,$Section);
		$nuo=mysqli_num_rows($res);
		echo "<tr>";

		for ($b=0; $b < $nuo ; $b++) { 
			$row=mysqli_fetch_array($res);
			
			?>
			<b><?php echo $row['sectionid'] ?></b>
			
			<br>
			<b><?php echo $row['sectionname']; ?></b>
			
			<?php 
		}
		echo "</tr>";
	}
}
}
else{
	$searchdata="SELECT * From section order by sectionid";
	 $ret1=mysqli_query($connect,$searchdata);
  	$num_1=mysqli_num_rows($ret1);
 

	for ($c=0; $c < $num_1; $c+=4) { 
		$section1="SELECT * FROM section order by sectionid";
		$retp=mysqli_query($connect,$section1);
		$num_2=mysqli_num_rows($retp);
		echo "<tr>";
		
		
		}
	}
 ?>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
a{
	text-decoration: none;
	color:blue;
}
 	</style>
 </head>
 <body>
 <form actiton="sectionview.php" method="POST"> <fieldset >
 	
<legend><h1>Section List</h1></legend>
<input type="text" name="txtsearch"><input name="btnsearch" type="submit" value="search"></td>
	<table class="t2">
		
 
		<tr>
			<td>No</td>
			<td>sectionid</td>
			<td>sectionname</td>
			<td>Action</td>
		</tr>
		<?php 
$section="SELECT * FROM section ORDER BY sectionid";
$result=mysqli_query($connect,$section);
$count=mysqli_num_rows($result);

for ($i=0; $i < $count; $i++) { 
	$row=mysqli_fetch_array($result);
$secid=$row['sectionid'];
$secname=$row['sectionname'];
echo "<tr>";
echo "<td>".($i+1)."</td>";
echo "<td>".$secid."</td>";
echo "<td>".$secname."</td>";
echo "<td><a href='sectionupdate.php?SID=$secid'>update</a>||<a href='sectiondelete.php?SID=$secid'>Delete</a></td>";
echo "</tr>";

}
?>
	</table>
 </fieldset>
 </body>
 </html>