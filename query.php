<?php
  $mysqli = new mysqli("localhost", "root", "gampang", "stegano");

  // check connection
  if ($mysqli->connect_errno) 
  { printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
    
  // panggil links gambar dari DB
  $username = 'tinbang@gmail.com';
  $query = "select * from image where emailid = '$username'";
  $result = $mysqli->query($query);

  while ($row = $result->fetch_array(MYSQLI_ASSOC))
  { print " <img src='".$row['image']."' width='100' />"; }
   	    
  // free result set
  $result->free();

  // close connection
  $mysqli->close();
?>