<script>
function validation(){
	if(document.getElementById("name").value==""){
		document.getElementById("name").style.border = "1px solid red";
		document.getElementById("name").focus();
		return false;
	}
	if(document.getElementById("email").value==""){
		document.getElementById("email").style.border = "1px solid red";
		document.getElementById("email").focus();
		return false;
	}
	if(document.getElementById("city").value==""){
		document.getElementById("city").style.border = "1px solid red";
		document.getElementById("city").focus();
		return false;
	}
}
</script>
<?php
	if(isset($_REQUEST)){
		$id=$_REQUEST["id"];
		
		//database connection 
		$con = mysqli_connect("localhost","root","","crud");
		$res = mysqli_query($con,"select * from user where id ='$id'");
		if(mysqli_num_rows($res)>0){
			$data = mysqli_fetch_assoc($res);
			
		}else{
			exit("Sorry!");
		}
	}
	?>
<html>
	<head>
		<title>Add User</title>
	</head>
	<body>
	<a href="show.php">Show Data</a>
	<?php
	if(isset($_COOKIE["success"])){
		echo $_COOKIE["success"];
	}
	if(isset($_POST["save"])){
		$name=$_POST["name"];
		$email=$_POST["email"];
		$city=$_POST["city"];
		
		//Database Connection
		$con=mysqli_connect("localhost","root","","crud");
		mysqli_query($con,"update user set name='$name',email='$email',city='$city' where id='$id'");
		if(mysqli_affected_rows($con)>0){
			setcookie("success","User Updated Succssfully",time()+2);
			header("location:edit.php?id=$id");
		}else{
			echo "Unable to Update User";
		}
	}
	?>
		<form action="" method="post" onsubmit="return validation()">
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" id="name" value="<?php echo $data["name"];?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" id="email" value="<?php echo $data["email"];?>"></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input type="text" name="city" id="city" value="<?php echo $data["city"];?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="save" value="Add User"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
