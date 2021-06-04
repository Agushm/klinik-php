<?php
    $conn = mysqli_connect("localhost","root","passw0rd","klinik");
    //$db = mysqli_select_db("klinik");

   // Check connection
if ($conn-> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }else{
      echo'Terhubung';
  }
  
?>
