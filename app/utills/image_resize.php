<?php
  $path="../sample_images/";

  //$filename=$_GET['src'];
  //$filename="amazing-animal-beautiful-beautifull.jpg";
  function resizeImage($filename, $max_width, $max_height)
  {
      list($orig_width, $orig_height) = getimagesize($filename);

      $width = $orig_width;
      $height = $orig_height;

      # taller
      if ($height > $max_height) {
          $width = ($max_height / $height) * $width;
          $height = $max_height;
      }

      # wider
      if ($width > $max_width) {
          $height = ($max_width / $width) * $height;
          $width = $max_width;
      }

      $image_p = imagecreatetruecolor($width, $height);

      $image = imagecreatefromjpeg($filename);

      imagecopyresampled($image_p, $image, 0, 0, 0, 0,
                                       $width, $height, $orig_width, $orig_height);

      return $image_p;
  }
  //echo imagejpeg(resizeImage($path.$filename,250,250),$path."thumb-".$filename);
  //echo "dest".$path."thumb-".$filename;
?>
