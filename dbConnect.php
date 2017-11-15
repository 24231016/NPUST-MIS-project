<?php
 //Change the values according to your database
 
 define('HOST','mysql.hostinger.in');
 define('USER','root');
 define('PASS','1234');
 define('DB','myapp');
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');