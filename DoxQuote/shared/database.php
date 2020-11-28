<?php
  
  $DATABASE_HOST = 'localhost';
  $DATABASE_USER = 'root';
  $DATABASE_PASS = '';
  $DATABASE_NAME = 'doxquote';
  // Try and connect using the info above.
  $conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

  if ($conn) {
    // echo "Connection Done : )";
  } else {
    die("Connection getting failed because of".mysqli_connect_error());
  }
  
  if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
  
?>