<?
	include("dbconnect.php");
  $odd=$_GET['odd'];
	$no=$_GET['no'];

	$query="UPDATE MeongUnAdFull SET odd=".$odd." WHERE no=".$no;
	mysqli_query($con,$query);
?>
