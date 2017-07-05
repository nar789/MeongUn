<?
	include("./AdQuery/dbconnect.php");
  $src=$_GET['url'];
	$no=$_GET['no'];

	$query="UPDATE MeongUnAdExit SET src='Ad_Images/".$src."' WHERE no=".$no;
	mysqli_query($con,$query);
	$ret=mysqli_query($conn,$query);
	echo "<script>location.href=\"adminAdFull.php\"</script>";
?>
