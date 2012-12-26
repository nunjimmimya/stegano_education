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
   session_start(); //we're using sessions so this is required! 
   
   $mysqli = new mysqli("localhost", "root", "gampang", "stegano");

   // check connection
   if ($mysqli->connect_errno) 
   { printf("Connect failed: %s\n", $mysqli->connect_error);
     exit();
   }
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
	  <div id="proses">
       <?php 
	    if($_SESSION['loggedin'] == TRUE) 
        { //loggedin already
          echo "Salam, ".htmlspecialchars($_SESSION['username'])."<br />";
        }
       ?>
      </div>
	  <div id="preview">
	   <div id="gallery">
	    <h3>Berikut adalah gambar-gambar anda dalam sistem ini (Klik untuk melihatnya)</h3>
   	    <?php 
	     // panggil links gambar dari DB
	     $username = $_SESSION['username'];
         $query = "select * from image where emailid = '$username'";
         $result = $mysqli->query($query);
         while ($row = $result->fetch_array(MYSQLI_ASSOC))
	     { echo " <a href='#'><img src='".$row['image']."' width='100' /></a>\n";  }

         // free result set
         $result->free(); 

         // close connection
         $mysqli->close();
 	    ?>
 	   </div>
	  </div>
	  <div class="clear"></div>
	  <div>
	   <p class="button-style"><a href="#" onclick="javascript: self.close();">Tutup Preview</a></p>
	  </div>
	 </div>
	</div>
   </div>
  </div>
  <script type="text/javascript" src="script/jquery-1.8.3.min.js"></script>
 </body>
</html>