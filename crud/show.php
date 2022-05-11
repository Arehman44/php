<html>
	<head>
		<title>Show Data</title>
	</head>
	<body>
	<a href="user.php">User add</a>
	<?php
	$con = mysqli_connect("localhost","root","","crud");
	$res=mysqli_query($con,"select * from user");
	if(mysqli_num_rows($res)>0){
	?>
		<table border="1px">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>email</th>
				<th>city</th>
				<th>Action</th>
			</tr>
			<?php
			while($data=mysqli_fetch_assoc($res))
			{
			?>
			<tr>
				<td><?php echo $data["id"];?></td>
				<td><?php echo $data["name"];?></td>
				<td><?php echo $data["email"];?></td>
				<td><?php echo $data["city"];?></td>
				<td><a href="edit.php?id=<?php echo $data["id"];?>">Edit</a>
				|<a href="javascript:void(0)" onclick="deleteRec(<?php echo $data["id"];?>)">Delete</a></td>
			</tr>
			<?php
			}
			?>
		</table>
		<?php
	}else{
		echo "Data Doe's not exist";
	}
		?>
		<script>
		function deleteRec(id)
		{
			var c=confirm("Do you want to Delete");
			if(c==true)
			{
				window.location="deleteuser.php?id="+id;
			}
		}
	</script>
	</body>
</html>
