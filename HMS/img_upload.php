<?php
// Upload images without canvas
 function uploadwithoutcanvas($reqWidth, $reqHeight, $width, $height, $temp_dir, $perm_dir, $imageName, $image, $type)
 {    
  if($width>$reqWidth) $newWidth=$reqWidth;      
  else $newWidth=$width;
  
  $newHeight=floor(($newWidth/$width)*$height);
  
  if($newHeight>$reqHeight) {   
   $newWidth=$newWidth*($reqHeight/$newHeight);
   $newHeight=$reqHeight;
  }
  
  //creates a new image according to the type of image
  if(substr_count($type, "jpeg") || substr_count($type, "jpg"))  {
   $img=imagecreatefromjpeg($temp_dir);
   $img_type="jpeg";
   $extn=".jpg";
  }else if(substr_count($type, "gif")) {
   $img=imagecreatefromgif($temp_dir);
   $img_type="gif";
   $extn=".gif";
  }else if(substr_count($type, "png")) {
   $img=imagecreatefrompng($temp_dir);
   $img_type="png";
   $extn=".png";
  }

  if($type =='gif' || $type =='jpg' || $type =='jpeg' || $type =='png' || $type =='bmp' || $type =='GIF' || $type =='JPG' || $type =='JPEG' || $type =='PNG' || $type =='BMP')
  $image="$perm_dir"."$imageName".$extn;
  
  //creates a new temporary image according to the type
  $tmp_img=imagecreatetruecolor($newWidth, $newHeight);
  $imageBg = imagecolorallocate($tmp_img, 255, 255, 255);
  //imagefill($tmp_img, 0, 0, $imageBg);
    
  //debugbreak();
  //finally creates the image and returns the new image name
  imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
  switch($img_type) {
   case 'jpeg': imagejpeg($tmp_img, "$image"); break;
   case 'gif': imagegif($tmp_img, "$image"); break;
   case 'png': imagepng($tmp_img, "$image"); break;
  }
  $temp = strstr($imageName ,"_");
  $imageName1 = "";
  if($temp){
   $a=strlen($imageName);
   $b=$a-2 ;
   $imageName1 = substr($imageName,0,$b);
  }else{
      $imageName1 = $imageName ;
  }
  return $imageName1 ; 
 }
 ?>
