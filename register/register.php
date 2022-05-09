<script>
	function validation()
	{
		if(document.getElementById("name").value=="")
		{
			alert("Enter your Name");
			document.getElementById("name").focus();
			return false;
		}
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
		if(document.getElementById("mobile").value=="")
		{
			alert("Enter your Mobile Number");
			document.getElementById("mobile").focus();
			return false;
		}
		if(document.getElementById("dob").value=="")
		{
			alert("Enter your DOB");
			document.getElementById("dob").focus();
			return false;
		}
		if(document.getElementById("address").value=="")
		{
			alert("Enter your Address");
			document.getElementById("address").focus();
			return false;
		}
		if(document.getElementById("city").value=="")
		{
			alert("Enter your City");
			document.getElementById("city").focus();
			return false;
		}
	}
</script>
<style>
     *{margin-top:0px;}

	body{
		background-image:url("wood.jpg");
		background-size:cover;
		
	}
	h1{
		background-color:#000033;
		opacity:0.6;
	}
	
</style>
<html>
	<head>
		<title>Register Here</title>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<h1 style="margin-top:0px"><marquee>Register Here</marquee></h1>
	<body>
	<?php
	if(isset($_POST["save"]))
	{
		$name=$_POST["name"];
		$email=$_POST["email"];
		$password=md5($_POST["password"]);
		$mobile=$_POST["mobile"];
		$gender=$_POST["gender"];
		$dob=$_POST["dob"];
		$address=$_POST["address"];
		$city=$_POST["city"];
		$state=$_POST["state"];
		$terms=$_POST["terms"];
		$con=mysqli_connect("localhost","root","","task");
		mysqli_query($con,"insert into register (name,email,password,mobile,gender,dob,address,	city,state,terms) values('$name','$email','$password','$mobile','$gender','$dob','$address','$city','$state','$terms')");
		if(mysqli_affected_rows($con)>0)
		{
			setcookie("success","Register Successfully Done",time()+2);
			header("location:register.php");
		}
		else
		{
			echo "Sorry! Unable to Register";
		}
	}
	?>
	<?php
	if(isset($_POST["success"]))
	{
		echo $_POST["success"];
	}
	?>
		<form action="" method="post" onsubmit="return validation()">
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" id="name" class="form-control" placeholder="enter your name"></td>
				</tr><tr>
					<td>Email</td>
					<td><input type="text" name="email" id="email" class="form-control" placeholder="xyz@gmail.com"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" id="password" class="form-control" placeholder="*****"></td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td><input type="text" name="mobile" id="mobile" class="form-control" placeholder="+911234567890"></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><input type="radio" name="gender" value="male" id="gender">Male<input type="radio" name="gender" value="female" id="gender">Female</td>
				</tr>
				<tr>
					<td>DOB</td>
					<td><input type="text" name="dob" placeholder="yyyy-mm-dd" class="form-control" id="dob"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><textarea name="address" id="address" class="form-control"placeholder="Amerpeet Beside Naresh IT hyd"></textarea></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input type="text" name="city" id="city" class="form-control" placeholder="hydrabad"></td>
				</tr>
				<tr>
					<td>State</td>
					<td><select id="state" name="state" class="form-control">
							<option value="">--select state--</option>
							<option value="Andhrapradesh">Andhrapradesh</option>
							<option value="Telangana">Telangana</option>
							<option value="Maharastra">Maharastra</option>
						</select></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<label><input type="checkbox" value="yes" name="terms" id="terms" class="" ><span>*</span> Please accept terms and Conditions</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="save" value="Register" class="btn btn-primary">|<button class="btn btn-success"><a href="login.php">Go to Login Page</a></button></td>
				</tr>
				</table>
		 </form>
	</body>
</html>