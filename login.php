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
   
   if (isset($_GET['do']))
    if($_GET['do'] == "logout") 
    { unset($_SESSION['loggedin']);
      unset($_SESSION['username']);
    }
   
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
	  <li class="current_page_item"><a href="#" accesskey="5" title="">Login</a></li>
	  <li><a href="contactus.php" accesskey="4" title="">Hubungi Kami</a></li>
	 </ul>
	</div>
   </div>
  </div>
  <div id="wrapper">
   <div id="page-wrapper">
	<div id="page">
	 <div id="wide-content">
	  <div id="proses">
	   <h2>Login Masuk</h2>
	   <?php
        if($_SESSION['loggedin'] == TRUE) 
        { // loggedin already
          // autojump kalau user adalah admin(admin.php) atau customer(customer.php)
          $login_name = $_SESSION['username'];
          $query = "select role from user where email = '$login_name' ";
          $result = $mysqli->query($query);
          
          $user = $result->fetch_assoc();
          if ($user['role'] == "admin")
          { header("location: admin.php");
          }
          else if ($user['role'] == "customer")
          { header("location: customer.php");
          }
          
          // free result set
          $result->free();
        }
        else if(isset($_POST['submitLogin'])) 
        { //form submitted?
          //verify login from user input

          $username = mysql_real_escape_string($_POST['username']);
          $password = mysql_real_escape_string($_POST['password']);

          $query = "select count(id) as amount from user where email = '$username' and password = '$password' ";
          $result = $mysqli->query($query);

          $user = $result->fetch_assoc();
          $amount_found = (int)$user['amount']; //amount of users found by the query

          if($amount_found > 0) 
          { $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $username;
            
            // autojump kalau user masuk daripada save.php (http_referer)
            if(stristr($_SESSION['refer'], "save.php"))
            { // jump ke page save.php untuk savekan gambar ke DB
              unset($_SESSION['refer']);
              header('location: save.php');
            }
            else
            { // autojump kalau user adalah admin(admin.php) atau customer(customer.php)
              $query = "select role from user where email = '$username' ";
              $result = $mysqli->query($query);    
              $user = $result->fetch_assoc();
              if ($user['role'] == "admin")
               header("location: admin.php");
              else if ($user['role'] == "customer")
               header("location: customer.php");
            
              // free result set
              $result->free();
            }
          }
          else
          { echo "Invalid login! Try again."; ?>

            <form method="POST" action="login.php">
             <b>Username:</b> <br /> <input type="text" name="username" placeholder="User ID Anda"> <p>
             <b>Password:</b> <br /> <input type="password" name="password" placeholder="Kata Laluan Anda"> <p>
             <input type="submit" name="submitLogin" value="Login!">
            </form>
            </div>
          <?php
            // free result set
            $result->free();
          }

        }
        else
        { //show login form
       ?>

       <form method="POST" action="login.php">
        <b>Username:</b> <br /> <input type="text" name="username" placeholder="User ID Anda"> <p>
        <b>Password:</b> <br /> <input type="password" name="password" placeholder="Kata Laluan Anda"> <p>
        <input type="submit" name="submitLogin" value="Login!">
       </form>
       </div>
       <?php
        }
        
        // close connection
        $mysqli->close();
       ?>
      <div id="preview" style="width: 650px">
       <div align="center"><h1>Daftar Sekarang</h1></div>
       <div style="margin-left: 100px">
        <p></p>
        <form method="post" action="signup.php">
         <label style="padding: 25px 52px 25px 0px">Nama Anda</label><input type="text" name="nama" placeholder="Masukkan Nama Anda" size="55" />
         <label style="padding: 25px 47px 25px 0px">Alamat Anda</label><input type="text" name="alamat" placeholder="Masukkan Alamat Anda" size="55" />
         <label style="padding: 25px 27px 25px 0px">No Telefon Anda</label><input type="text" name="telefon" placeholder="Masukkan No Telefon Anda" size="55" />
         <label style="padding: 25px 54px 25px 0px">Email Anda</label><input type="text" name="email" placeholder="Masukkan Email Anda" size="55" />
         <label style="padding: 25px 31px 25px 0px">Password Anda</label><input type="password" name="password" placeholder="Masukkan Password Anda" size="55" />
         <div style="margin-top: 30px"><input type="submit" value="Daftar!" /></div>
        </form>
       </div>
	  </div>
	 </div>
	</div>
   </div>
  </div>
 </body>
</html>