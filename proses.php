<?php
 // get POST data
 $result = 0;
 $key = $_POST["kunci"]; 
  
 //Setting up untuk filename dan extension
 $allowedExts = array("jpg", "jpeg", "png", "JPG", "JPEG", "PNG");
  
 //For getting the file extension 
 $file_ext = pathinfo($_FILES["host"]["name"]);

 //Directory for images 
 $dir  = "image/";
 
 //Remove white space from filename
 $white_space = str_replace(" ","_",$file_ext['basename']);
 
 //Set filename after processing with extension and any other filtering
 $filename = $white_space;
 
 //Only the new filename without the extension
 $file_x_ext = basename($filename,'.'.$file_ext['extension']);
 
 //upload an image file
 if ($_FILES["host"]["error"] > 0)
 { echo "Error: " . $_FILES["host"]["error"] . "<br>"; }
 
 else
 
 //Checking for file extension
 if(in_array($file_ext['extension'],$allowedExts))
 { echo "FILE UPLOAD SUCCESS <br>";
   //Information for the uploaded file
   echo "Upload: " . $_FILES["host"]["name"] . "<br>";
   echo "Type: " . $_FILES["host"]["type"] . "<br>";
   echo "Size: " . ($_FILES["host"]["size"] / 1024) . " kB<br>";
   echo "Tmp Files Stored In: " . $_FILES["host"]["tmp_name"]."<br>";
 	
   //Copy the file to designated directory 
   move_uploaded_file($_FILES["host"]["tmp_name"],"image/" .$filename);
   echo "Stored in: " . "image/" . $white_space;
   echo "<p>";
	
   if($file_ext['extension'] != "png")
   { $im = new Imagick();
  	 $im->readImage($dir."".$filename);
   		
   	 // change format to png
   	 $im->setImageFormat("png");
     
   	 //Write image to folder with PNG extension
   	 $im->writeImage($dir."".$file_x_ext.".png");
   		
   	 //New filename created
   	 $new_filename = $dir."".$file_x_ext.".png";
   		
   	 //Remove old file 
   	 unlink($dir."".$filename);
   } 
   else
    //New Filename 
    $new_filename = $dir."".$filename;
	
   // convert keystring to image.png
   exec ("/opt/local/bin/convert -gravity center -size 100x80 label:\"$key\" image/message.png");
 
   // jom steganokan gambar
   exec ("/opt/local/bin/composite image/message.png ".$new_filename." -stegano +15+2 image/image_stegano.png");
 	
   // mari buat perbandingan bagaimana kunci diletakkan dalam gambar
   exec ("/opt/local/bin/compare -metric PAE $new_filename image/image_stegano.png image/compare.png");
   
   // delete gambar dan kemudian renamekan gambar yang dah disteganokan kepada nama asal
   unlink($new_filename);
   rename($dir."image_stegano.png", $new_filename);
   
   /* 
   $filetype = pathinfo($new_filename, PATHINFO_EXTENSION);
   $image = file_get_contents($new_filename);
   $image64 = 'data:image/' . $filetype . ';base64,' . base64_encode($image);
   */
   
   // start session untuk simpan url gamba
   session_start();
   $_SESSION['gambar'] = $new_filename;
   $_SESSION['stego'] = $dir."compare.png";
   $_SESSION['kunci'] = $key;
   
   //jom kutip balik key
   //exec ("/opt/local/bin/convert -size 100x80+15+2 stegano:image/image_stegano.png image/message_recovered.png");
   echo "<p> FILE SUCCESSFULLY PROCESS";
   $result = 1;

 } 
 else
  echo "Wrong File Type Uploaded. Only jpg,jpeg and png allowed to be uploaded";
?>

<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result; ?>, '<?php echo $new_filename; ?>');</script>  