<?php
 $result = 0;
 
 $file_ext = $_FILES["host"]["name"];
 
 move_uploaded_file($_FILES["host"]["tmp_name"],"image/temp/" .$file_ext);
 exec ("/opt/local/bin/convert -size 100x80+15+2 stegano:image/temp/" .$file_ext. " image/message_recovered.png");
 $result = 1;
?>

<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result; ?>);</script>  