<?php
 // get POST data
 $key = $_POST["kunci"]; 
 
 //upload an image file
 if ($_FILES["host"]["error"] > 0)
 { echo "Error: " . $_FILES["host"]["error"] . "<br>"; }
 else
 { echo "Upload: " . $_FILES["host"]["name"] . "<br>";
   echo "Type: " . $_FILES["host"]["type"] . "<br>";
   echo "Size: " . ($_FILES["host"]["size"] / 1024) . " kB<br>";
   echo "Stored in: " . $_FILES["host"]["tmp_name"];
 }

 move_uploaded_file($_FILES["host"]["tmp_name"],"image/" . $_FILES["host"]["name"]);
 echo "Stored in: " . "image/" . $_FILES["host"]["name"];

 $allowedExts = array("jpg", "jpeg");
 $extension = end(explode(".", $_FILES["host"]["name"]));
 // check extension and convert to .png if others than .png and .gif
 if ((($_FILES["host"]["type"] == "image/jpeg") || ($_FILES["host"]["type"] == "image/pjpeg")) 
 && in_array($extension, $allowedExts))
 { $im = new Imagick();
   
   $im->readImage("image/".$_FILES["host"]["name"]);
   // change format to png
   $im->setImageFormat("png");
     
   // strip != .png
   $extension = explode(".", $_FILES["host"]["name"]);
   $im->writeImage("image/".$extension[0].".png");
   
   // delete != .png host file
   unlink("image/".$_FILES["host"]["name"]);   
 }
 
 // info pada sistem yang file tu namanya di sini
 $host = $extension[0]. ".png";
    
 // using php exec to create stegano image and retrieve it value
 header('Content-type: image/png');
 
 // convert keystring to image.png
 exec ("/opt/local/bin/convert -gravity center -size 100x80 label:\"$key\" image/message.png");
 
 // jom steganokan gambar
 //exec ("/opt/local/bin/composite image/message.png image/" .$host. " -stegano +15+2 image/image_stegano.png");
 
 // jom kutip balik key
 //exec ("/opt/local/bin/convert -size 100x80+15+2 stegano:image/image_stegano.png image/message_recovered.png");
 
 //echo "<img src='image_stegano.png' />";
 //echo "<img src='message_recovered.png' />";
?>