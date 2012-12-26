<!DOCTYPE html>
  <?php 
   session_start(); //we're using sessions so this is required! 
  ?>
<html>
 <script language="javascript" type="text/javascript">
  <!--
  function startUpload()
  { return true; }

  function stopUpload(success, stego)
  { var result = '';
    if (success == 1)
    { result = '<span class="msg">The file was uploaded successfully!<\/span><br/><br/>'; }
    else 
    { result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>'; }
      
    $('#key_image').attr('src','image/message.png');
    $('#stego').attr('src',stego);
    $('#stegano').attr('src','image/compare.png');
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
	  <li class="current_page_item"><a href="#" accesskey="3" title="">Aplikasi</a></li>
	  <li><a href="login.php" accesskey="5" title="">Login</a></li>
	  <li><a href="contactus.php" accesskey="4" title="">Hubungi Kami</a></li>
	 </ul>
	</div>
   </div>
  </div>
  <div id="wrapper">
   <div id="page-wrapper">
	<div id="page">
	 <div id="wide-content">
      <?php 
	   if (isset($_SESSION['loggedin']))
	    if($_SESSION['loggedin'] == TRUE) 
        { //loggedin already
          echo "Salam, ".htmlspecialchars($_SESSION['username'])."<br />";
        }
      ?>
	  <div id="proses">
	   <h3>Sila ikuti langkah di bawah untuk<br />meletakkan hakcipta pada gambar anda</h3><br />
        <form action="proses.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" > 
        <p><label>Masukkan fail</label><br /><input name="host" type="file" onchange="readURL(this);" /></p>
        <p><label>Masukkan kata kunci</label><br /><input name="kunci" type="text" value="" placeholder="Kata Kunci Anda" /></p>
        <input type="submit" name="submitBtn" class="sbtn" value="Proses" />
       </form>
      </div>
      <div id="preview">
       <div style="float: left; width: 300px;">Gambar Asal<br /><img id="blah" src="#" width="280" /><br /><br /></div>
       <div style="float: left; width: 300px;">Gambar yang diletakkan kunci<br /><img id="stegano" src="#" width="280" /><br /><br /></div>
       <div class="clear"></div>
       <div style="float: left; width: 300px;">Gambar Hakcipta<br /><img id="stego" src="#" width="280" /></div>
       <div style="float: left">Kata Kunci Anda<br /><img id="key_image" src="#" /></div>
       <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
      </div>
	 </div>
	 <div class="clear"></div>
	 <p></p>
     <p class="button-style"><a href="save.php">Saya mahu Simpan</a></p>
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