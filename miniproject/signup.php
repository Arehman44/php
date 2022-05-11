<html>
	<head>
		<title>Signup</title>
	</head>
	<body>
	<a href="showfile.php">Show File</a>
	<?php
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$desig=$_POST['desig'];
		$file=$_FILES['pic'];
		//print_r($file);
		
		$filename=$file['name'];
		$filepath=$file['tmp_name'];
		$fileerror=$file['error'];
		
		if($fileerror == 0)
		{
			$destfile='upload/'.$filename;
			move_uploaded_file($filepath,$destfile);
			
			
			//query
			$conn=mysqli_connect("localhost","root","","arukh");
			mysqli_query($conn,"insert into signup(name,email,desig,pic) values('$name','$email','$desig','$destfile')");
			if(mysqli_affected_rows($conn)>0)
			{
				echo "Query Fine 200";
			}
			else
			{
				echo "Query NOT OK";
			}
		}
	}
	?>
		<form action="" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>Designation</td>
					<td><input type="text" name="desig"></td>
				</tr>
				<tr>
					<td>Upload</td>
					<td><input type="file" name="pic"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="submit"></td>
				</tr>
			</table>
		</form>
		</table>
	</body>
</html>