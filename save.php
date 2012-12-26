<!DOCTYPE html>
<html>
 <head>
  <title>MarkmyRight</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
  <link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
  <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
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
	  <li class="current_page_item"><a href="usage.php" accesskey="2" title="">Penggunaan</a></li>
	  <li><a href="stegano.php" accesskey="3" title="">Aplikasi</a></li>
	  <li><a href="login.php" accesskey="5" title="">Login</a></li>
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
	    if (isset($_SESSION['loggedin']))
	    { if($_SESSION['loggedin'] == TRUE) 
          { //loggedin already
            echo "Salam, ".htmlspecialchars($_SESSION['username'])."<br />";
            
            //$link = mysql_connect('localhost', 'root', 'gampang') or die(mysql_error());
            //$db_selected = mysql_select_db('stegano', $link) or die(mysql_error());
            
            $mysqli = new mysqli("localhost", "root", "gampang", "stegano");

            // check connection
            if ($mysqli->connect_errno) 
            { printf("Connect failed: %s\n", $mysqli->connect_error);
              exit();
            }      

            // simpan url gambar dalam DB
	        $username = $_SESSION['username'];
	        $gambar = $_SESSION['gambar'];
	        $kunci = $_SESSION['kunci'];
            $query = "insert into image values('$gambar','$kunci','$username',CURDATE()) ";
            //mysql_query($query) or die(mysql_error());
            $mysqli->query($query);
 
            // padam session gambar dan key sesudah save dalam DB
            unset($_SESSION['gambar']);
            unset($_SESSION['kunci']);
            unset($_SESSION['stego']);
            
            // padam fail compare dan copyright
            unlink('image/compare.png');
            unlink('image/message.png');

            // close connection
            $mysqli->close();
            //mysql_close($link);
          }
        }
        else
        { //not logged in yet
          header('location: login.php'); //show login page
          $_SESSION['refer'] = 'save.php';
        }
       ?>
	  <div>
	   <?php
	   ?>
	   <p></p>
	   <p class="button-style"><a href="stegano.php">Tambah Gambar</a></p>
	   <p class="button-style"><a href="login.php">>> Ke Login Panel</a></p>
	  </div>
	 </div>
	</div>
   </div>
  </div>
 </body>
</html>