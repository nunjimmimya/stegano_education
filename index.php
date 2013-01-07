<!DOCTYPE html>
<html>
 <head>
  <title>MarkmyRight</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
  <link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
  <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
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
	  <li class="current_page_item"><a href="#" accesskey="1" title="">Utama</a></li>
	  <li><a href="usage.php" accesskey="2" title="">Penggunaan</a></li>
	  <li><a href="stegano.php" accesskey="3" title="">Aplikasi</a></li>
	  <li><a href="login.php" accesskey="5" title="">Login</a></li>
	  <li><a href="#" accesskey="4" title="">Hubungi Kami</a></li>
	 </ul>
	</div>
   </div>
  </div>
  <div id="banner">
   <div class="img-border"> <a href="#"><img src="image/horizon-binari.png" width="600" alt="" /></a> </div>
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
	  <div>
	   <h2>Selamat Datang ke MarkmyRight</h2>
	   <p>Aplikasi ini membolehkan anda meletakkan hakcipta pada fail elektronik anda.</p>
       <p>Sekiranya anda seorang jurugambar, ini adalah tempat yang tepat untuk anda.</p>
	   <p class="button-style"><a href="usage.php">Maklumat Lanjut</a></p>
	  </div>
	 </div>
	</div>
   </div>
  </div>
 </body>
</html>