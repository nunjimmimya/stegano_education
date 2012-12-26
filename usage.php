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
	  <li><a href="index.php" accesskey="1" title="">Utama</a></li>
	  <li class="current_page_item"><a href="#" accesskey="2" title="">Penggunaan</a></li>
	  <li><a href="stegano.php" accesskey="3" title="">Aplikasi</a></li>
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
	  <div>
	   <h2>Bagaimana menggunakan MarkmyRight</h2>
	   <h4>Bagaimana menggunakannya?</h4>
	   <p>apa yang perlu anda buat adalah</p>
       <p>
        <ol>
         <li>Letakkan gambar yang ingin anda letak hakcipta pada sistem kami</li>
         <li>Masukkan kata kunci hakcipta anda</li>
         <li>Proses gamba tersebut dan biarkan kami lakukan prosesnya untuk anda</li>
        </ol>
       </p>
       <p></p>
       <h4>Bagaimana hendak mengetahui hakcipta anda?</h4>
       <p>Setiap fail (gambar) yang anda tempatkan pada sistem ini akan mengeluarkan 2 fail</p>
       <ol>
        <li>fail gambar</li>
        <li>kata kunci hakcipta yang telah anda taip</li>
        <li>Gambar dianggap bukan hakcipta anda sekiranya gambar kata kunci didapati tidak boleh dibaca isi kandungannya</li>
       </ol>
       <p></p>
	   <p class="button-style"><a href="stegano.php">Saya mahu mencuba</a></p>
	  </div>
	 </div>
	</div>
   </div>
  </div>
 </body>
</html>