<?
	include("../mysql/dbconnect.php");
  $src=$_GET['src'];
  $url=$_GET['url'];

	$query="INSERT INTO MeongUnRecommendApp(no,src,url) VALUES(NULL,'$src','$url')";
  mysqli_query($con,$query);
	$ret=mysqli_query($conn,$query);

	echo "<script>location.href=\"adminRecommendApp.php\"</script>";
?>
