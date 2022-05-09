<?php session_start();?>
<script>
	function validation()
	{
		if(document.getElementById("email").value=="")
		{
			alert("Enter your Email");
			document.getElementById("email").focus();
			return false;
		}
		if(document.getElementById("password").value=="")
		{
			alert("Enter your Password");
			document.getElementById("password").focus();
			return false;
		}
	}
</script>
<style>
	body{
		background-image:url("php.jpg");
		background-size:cover;
		center;
	}
	h1{
		background-color:blue;
		opacity:0.5;
	}
</style>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<h1 style="margin-top:0px;color:skyblue;"><marquee>Login Here</marquee></h1>
	<body>
	<?php
	if(isset($_POST["login"]))
	{
	$email=$_POST["email"];
	$password=md5($_POST["password"]);
	$con=mysqli_connect("localhost","root","","task");
	$query=mysqli_query($con,"select *from register where email='$email' && password='$password'");
	if(mysqli_num_rows($query)>0)
	{
		$res=mysqli_fetch_assoc($query);
		$_SESSION["logintrue"]=$res["id"];
		header("location:home.php");
	}
	else
	{
		echo "Sorry! Invalid Email And Password";
	}
	}
	?>
		<form action="" method="post" onsubmit="return validation()">
			<table>
				<tr>
					<td	>Email</td>
					<td><input type="text" name="email" id="email" class="form-control"></td>
				</tr>
				<tr>
					<td	>Password</td>
					<td><input type="password" name="password" id="password" class="form-control"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="login" value="Login" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</body>
</html>