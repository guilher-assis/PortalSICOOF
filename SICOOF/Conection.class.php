<?php

    
   function AbreConexao() {
// NOVA CONEXAO BD OI

   	




   	$ip = "localhost";
 
 
   	$user = "root";
   	$pass = "usbw";
   	$database = "sicoof";

/*
    $user = "u442578958_root"; //produção
   	  $pass = "sicoof2015"; // produção
   	  $database = "u442578958_ofe";
 */
 
   	$charset = "utf8";
      $link =  @mysqli_connect($ip,$user,$pass, $database) or die(mysqli_connect_error($link)); 
        mysqli_set_charset($link, $charset);
        return $link;
   }

  function FechaConexao($link) {
     @mysqli_close($link) or die (mysqli_error($link));
  } 
 
  function DBEscape($dados){
  	
  	$link = AbreConexao();
  	
  	$dados = mysqli_real_escape_string($link,$dados);
  	
  	FechaConexao($link);
  }
  
?>
