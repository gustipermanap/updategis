<?php

setlocale(LC_ALL, 'id-ID', 'id_ID');
//time zone
date_default_timezone_set('Asia/Jakarta');
//database connection
//$con=mysqli_connect("localhost","root","","digicon");
$con=mysqli_connect("localhost","root","","gisupdate");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

  ?>
