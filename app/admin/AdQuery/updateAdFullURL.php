<?
	include("dbconnect.php");
  $url=$_GET['url'];
	$no=$_GET['no'];

	$query="UPDATE MeongUnAdFull SET url='".$url."' WHERE no=".$no;
	mysqli_query($con,$query);
	$ret=mysqli_query($conn,$query);
?>
