<?php
  function AbreConexao() {
// NOVA CONEXAO BD OI

   	$ip = "10.32.214.210:3306";
  	$user = "jboss3";
   	$pass = "f4sc0r0s4";
   	$database = "BDSGCART";



/*
   	$ip = "localhost";
 
 
   	$user = "root";
   	$pass = "usbw";
   	$database = "sicoof";
 */
/*
    $user = "u442578958_root"; //produção
   	  $pass = "sicoof2015"; // produção
   	  $database = "u442578958_ofe";
 */
 
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
