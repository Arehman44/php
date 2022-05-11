<html>
	<head>
		<title>Show Friends</title>
	</head>
	<body>
	<a href="signup.php">Signup</a>
	<?php
	$con=mysqli_connect("localhost","root","","arukh");
	$res=mysqli_query($con,"select * from signup");
	if(mysqli_num_rows($res)>0)
	{
	?>
		<table border="1">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Photo</th>
			</tr> 
			<?php
			while($data=mysqli_fetch_assoc($res))
			{
			?>
			<tr>
				<td><?php echo $data["id"];?></td>
				<td><?php echo $data["name"];?></td>
				<td><?php echo $data["email"];?></td>
				<td><img src="<?php echo $data["pic"];?>" width="100" height="50	"></td>
			</tr>
			<?php
			}
			?>
		</table>
	<?php
	}
	else
	{
		echo "Sorry! record not Found";
	}
	?>
	</body>
</html>