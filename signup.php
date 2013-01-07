<?php
  
  // panggil semua maklumat daripada post
  $nama = $_POST["nama"];
  $alamat = $_POST["alamat"];
  $telefon = $_POST["telefon"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  // connect to DB
  $mysqli = new mysqli("localhost", "root", "gampang", "stegano");

  // check connection
  if ($mysqli->connect_errno) 
  { printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  } 
  
  // masukkan data ke dalam DB
  $query = "insert into userdetail values('$email','$nama','$alamat','$telefon')";
  $mysqli->query($query);
  
  // masukkan data ke user sesudah masuk ke userdetail
  $query = "insert into user values('','$email','$password','customer')";
  $mysqli->query($query);
  
  // lompat ke login.php sesudah siap proses
  header('location: login.php');
?> 