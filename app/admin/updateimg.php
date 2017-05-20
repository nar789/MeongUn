<?
	include("../mysql/dbconnect.php");
  include("../utills/image_resize.php");
  $url=$_GET['url'];
  imagejpeg(resizeImage($path.$url,250,250),$path."thumb-".$url);
  echo "<script>alert('".$path.$url."')</script>";


	$query="INSERT INTO MeongUnSampleImages(no,path) VALUES(NULL,'$url')";
  mysqli_query($con,$query);
	$ret=mysqli_query($conn,$query);

	echo "<script>location.href=\"adminGalary.php\"</script>";
?>
