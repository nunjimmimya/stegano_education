<!DOCTYPE html>
<html>
 <script language="javascript" type="text/javascript">
 <!--
 function startUpload()
 { return true; }

 function stopUpload(success)
 { var result = '';
   if (success == 1)
   { result = '<span class="msg">The file was uploaded successfully!<\/span><br/><br/>'; }
   else 
   { result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>'; }
      
     $('#key_image').attr('src','image/message_recovered.png');
     return true;   
   }
   //-->
 </script>
 <head>
  <title>MarkmyRight</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
  <link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
  <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
  <?php 
   session_start(); //we're using sessions so this is required!    
  ?>
 </head>
 <body>
  <div id="header-wrapper">
   <div id="header">
	<div id="logo">
	 <h1><a href="#">Mark myRight</a></h1>
	 <p>Sistem pereka hakcipta fail elektronik anda</p>
	</div>
	<div id="menu">
	 <ul>
	  <li><a href="index.php" accesskey="1" title="">Utama</a></li>
	  <li><a href="usage.php" accesskey="2" title="">Penggunaan</a></li>
	  <li><a href="stegano.php" accesskey="3" title="">Aplikasi</a></li>
	  <li class="current_page_item"><a href="login.php" accesskey="5" title="">Login</a></li>
	  <li><a href="#" accesskey="4" title="">Hubungi Kami</a></li>
	 </ul>
	</div>
   </div>
  </div>
  <div id="wrapper">
   <div id="page-wrapper">
	<div id="page">
	 <div id="wide-content">
      <?php 
	   if($_SESSION['loggedin'] == TRUE) 
       { //loggedin already
         echo "Salam, ".htmlspecialchars($_SESSION['username'])."<br />";
       }
      ?>
	  <div id="proses">
       <h3>Sila ikuti langkah di bawah untuk<br />melihat hakcipta pada gambar anda</h3><br />
       <form action="retrieve.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" > 
        <p><label>Masukkan fail</label><br /><input name="host" type="file" onchange="readURL(this);" /></p>
        <input type="submit" name="submitBtn" class="sbtn" value="Proses" />
       </form>
      </div>
      <div id="preview">
       <div style="float: left; width: 300px;">Gambar Anda<br /><img id="blah" src="#" width="280" /><br /><br /></div>
       <div style="float: left">Kata Kunci Terhasil<br /><img id="key_image" src="#" /></div>
       <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
      </div>
   	  <div class="clear"></div>
	  <div>
	   <p class="button-style"><a href="#" onclick="javascript: self.close();">Tutup Semak Hakcipta</a></p>
	  </div>
	 </div>
	</div>
   </div>
  </div>
  <script type="text/javascript" src="script/jquery-1.8.3.min.js"></script>
  <script>
   function readURL(input) 
   { if (input.files && input.files[0]) 
     { var reader = new FileReader();

       reader.onload = function (e) 
       { $('#blah').attr('src', e.target.result); }
       reader.readAsDataURL(input.files[0]);
     }
   }
  </script>
 </body>
</html>