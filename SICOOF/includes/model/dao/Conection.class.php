<?php
  function AbreConexao() {

    $ip = "localhost";
 
 
   	$user = "root";
   	$pass = "usbw";
   	$database = "sicoof";
 
 
   	$charset = "utf8";
      $link =  mysql_connect($ip,$user,$pass) or die(mysql_connect_error($link)); 
      mysql_select_db ( $database, $link) or die("eqw");
        mysql_set_charset($link, $charset);
     
      //  return $link;
   }

  function FechaConexao($link) {
     @mysql_close($link) or die (mysql_error($link));
  } 
 
  
  
?>
