<?php


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


  function execInBackground($cmd) {

    if (substr(php_uname(), 0, 7) == "Windows"){
        pclose(popen("start /B ". $cmd, "r"));  
    }

    else {
        exec($cmd . " > /dev/null &");
    }
  }

  

  $resultCode=null;

  // Live
//   $servername = "localhost";
//   $username = "u843180945_test";
//   $password = "DBCode@1423";
//   $dbname = "u843180945_app";

  // Local
  $servername = "localhost";
  $username = "test";
  $password = "password";
  $dbname = "bhambrisolar";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // function indian_number_format($num){
  //       $num=explode('.',$num);
  //       $dec=(count($num)==2)?'.'.$num[1]:'.00';
  //       $num = (string)$num[0];
  //       if( strlen($num) < 4) return $num;
  //       $tail = substr($num,-3);
  //       $head = substr($num,0,-3);
  //       $head = preg_replace("/\B(?=(?:\d{2})+(?!\d))/",",",$head);
  //       return $head.",".$tail.$dec;
  //   }
?>