<style>
body{
	background-image:url("water.jpg");
	background-size:cover    ;
}
h3{
	background-color:cadetblue;
	argin-top: auto;
}
</style>
<?php
session_start();
if(isset($_SESSION['logintrue']))
{
  $id=$_SESSION['logintrue'];
  $con=mysqli_connect("localhost","root","","task");
  $row=mysqli_query($con,"select *from register where id='$id'");
  if(mysqli_num_rows($row)>0)
  { 
  	$data=mysqli_fetch_assoc($row);
  	?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>Home Page</title>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
    <h3 style="margin-top:0px">WELCOME TO HOME <?php echo strtoupper($data['name']); ?></h3>
    <table class="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
		</tr>
		<tr>
			<td><?php echo $data["id"];?></td>
			<td><?php echo $data["name"];?></td>
			<td><?php echo $data["email"];?></td>
			<td><?php echo $data["mobile"];?></td>
			<td><?php echo $data["gender"];?></td>
			<td><?php echo $data["dob"];?></td>
			<td><?php echo $data["address"];?></td>
			<td><?php echo $data["city"];?></td>
			<td><?php echo $data["state"];?></td>
		</tr>
   </table>
   <td><a href="logout.php" class="btn btn-danger">LOGOUT</a></td>
</body>
</html>
  	<?php
  }
}
else
{
  header("location:login.php");
}
?>