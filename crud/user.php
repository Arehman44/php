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

<html>
	<head>
		<title>Add User</title>
	</head>
	<body>
	<a href="show.php">Show Data</a>
	<?php
	if(isset($_POST["save"])){
		$name=$_POST["name"];
		$email=$_POST["email"];
		$city=$_POST["city"];
		
		//Database Connection
		$con=mysqli_connect("localhost","root","","crud");
		mysqli_query($con,"insert into user (name,email,city) values('$name','$email','$city')");
		if(mysqli_affected_rows($con)>0){
			setcookie("success","User Added Succssfully",time()+2);
			header("location:user.php");
		}else{
			echo "Unable to Add User";
		}
	}
	?>
	<?php
	if(isset($_COOKIE["success"])){
		echo $_COOKIE["success"];
	}
	?>
		<form action="" method="post" onsubmit="return validation()">
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" id="name"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" id="email"></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input type="text" name="city" id="city"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="save" value="Add User"></td>
				</tr>
			</table>
		</form>
	</body>
</html>