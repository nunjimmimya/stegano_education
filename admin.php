<!DOCTYPE html>
<html>
 <head>
  <title>MarkmyRight</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
  <link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
  <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
  <?php
   session_start();

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
	  <li class="current_page_item"><a href="#" accesskey="5" title="">Login</a></li>
	  <li><a href="#" accesskey="4" title="">Hubungi Kami</a></li>
	 </ul>
	</div>
   </div>
  </div>
  <div id="wrapper">
   <div id="page-wrapper">
	<div id="page">
	 <div id="wide-content">
	  <div>
	   <?php 
	     if($_SESSION['loggedin'] == TRUE) 
         { //loggedin already
           echo "Salam, ".htmlspecialchars($_SESSION['username']);
         }
         else
         { //not logged in yet
           header('location: login.php'); //show login page
         }
       ?>
	   <h2>Admin Arena</h2>
	   <div class="user-button-style"><a href="viewall.php">Lihat Semua (Pelanggan+Gambar)</a></div>
	   <br />
	   <br />
	   <br />
	   <br />
	   <br />
	   <br />
	   <br />
	   <br />
	   <br />
	   <br />
   	   <br />
	   <div class="user-button-style"><a href="login.php?do=logout">Logout</a></div>
	  </div>
	 </div>
	</div>
   </div>
  </div>
 </body>
</html>