<?php
if(isset($_REQUEST["id"]))
{
	$id=$_REQUEST["id"];
	$con=mysqli_connect("localhost","root","","crud");
	mysqli_query($con,"delete from user where id=$id");
	if(mysqli_affected_rows($con)>0)
	{
		setcookie("success","Friends Deleted Successfully",time()+2);
		header("location:show.php");
	}
}
?>