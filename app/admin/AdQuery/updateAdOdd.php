<?
	include("dbconnect.php");
  $odd=$_GET['odd'];

	$query="UPDATE MeongUnAdOdd SET odd=".$odd." WHERE no=0";
	mysqli_query($con,$query);
	$ret=mysqli_query($conn,$query);
?>
