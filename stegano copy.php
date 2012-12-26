<!DOCTYPE html>
<html>
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
	  <li><a href="login.php" accesskey="5" title="">Admin</a></li>
	  <li><a href="#" accesskey="4" title="">Hubungi Kami</a></li>
	 </ul>
	</div>
   </div>
  </div>
  <div id="wrapper">
   <div id="page-wrapper">
	<div id="page">
	 <div id="wide-content">
      <form id="proses" method="post" enctype="multipart/form-data" action="">
       <p><label>Masukkan fail</label><br /><input name="host" type="file" onchange="readURL(this);" /></p>
       <p><label>Masukkan kata kunci</label><br /><input name="kunci" type="text" value="" placeholder="Kata Kunci Anda" /></p>
       <input type="button" value="proses" onclick="post_process();" />
      </form>
      <div id="preview">
       <img id="blah" src="#" width="320" />
       <img id="key_image" src="#" />
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
   
   function post_process() 
   { //alert($('input[name=kunci]').val());
     $.ajax(
       { url: "proses.php",
         type: "post",
         data: {kunci: $('input[name=kunci]').val()}
       })
       .done(function()
       { $('#key_image').attr('src','image/message.png')});
   }
  </script>
 </body>
</html>