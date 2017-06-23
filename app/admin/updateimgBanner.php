<?
	include("./AdQuery/dbconnect.php");
  $src=$_GET['url'];
	$no=$_GET['no'];

	$query="UPDATE MeongUnAdBanner SET src='Ad_Images/".$src."' WHERE no=".$no;
	mysqli_query($con,$query);
	$ret=mysqli_query($conn,$query);

	echo "<script>location.href=\"adminAdBanner.php\"</script>";
?>
