<?php
require 'includes/model/dao/Conection.class.php';
$conn=AbreConexao();


if(isset($_GET['login'])){
	$codigo= $_GET['login'] ;

	$sq_verifica = mysql_query("Select COUNT(*) from usuario where login='".$codigo."'");
	$verifica = mysql_fetch_row($sq_verifica);
	if($verifica[0]!=0){

		echo "false";

	}else{

		echo "true";
	}

}



if(isset($_GET['codigo'])){
$codigo= $_GET['codigo'] ;

$sq_verifica = mysql_query("Select COUNT(*) from demanda where codigo='".$codigo."'");
$verifica = mysql_fetch_row($sq_verifica);
if($verifica[0]!=0){

	echo "false";

}else{
	
	echo "true";
}

}


if(isset($_GET['nome'])){
	$nome= $_GET['nome'] ;

	$sq_verifica = mysql_query("Select COUNT(*) from demanda where nome='".$nome."'");
	$verifica = mysql_fetch_row($sq_verifica);
	if($verifica[0]!=0){

		echo "false";

	}else{

		echo "true";
	}

}

?>
