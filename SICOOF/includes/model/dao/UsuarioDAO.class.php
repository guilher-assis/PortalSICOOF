<?php

//Como iremos usar nesta classe o que foi setado para a classe Bean, � necess�rio importar a classe Bean aqui.
require_once "Conection.class.php";


class UsuarioDAO{

  

    function autenticaUsuario($usuario){
            session_start();
         
	$conn = AbreConexao();
		//$sql = "select login,senha,id,perfil,nome from usuario where login='".$usuario->getLogin()."' and ativo=1 ";
        $sq_login= mysql_query("select login,senha,id,perfil,nome from usuario where login='".$usuario->getLogin()."' and ativo=1 ");
       // echo "select login,senha,id,perfil,nome from usuario where login='".$usuario->getLogin()."' and ativo=1 ";
        
        $login= mysql_fetch_assoc($sq_login) or die("teste1333");
        //echo $login['senha'] ;
        $senha_md5=  md5($usuario->getSenha());
       
        
        $login2 = strtoupper($login['login']);
       
		$login3 = strtoupper($usuario->getLogin());
		
	
		
		
		if( $login3 ==  $login2 && $senha_md5 == $login['senha']){
		//echo"teste";
			
		
                $_SESSION['login']=$login;
                
                    return true;
		}
		else{
                   
			return false;
		}
		FechaConexao($conn);
	}
        
         function preencheSelectUsuario() {
        
        $conn=AbreConexao();

        $sq_clientes = mysql_query("SELECT id_usuario, nome_usuario FROM usuario where ativo=1 ORDER BY nome_usuario");

        return $sq_clientes;
        FechaConexao($conn);
    }

    function buscaNomeUsuario($id) {

       
        $conn=AbreConexao();

        $sq_nome_usuario = mysql_query("SELECT nome_usuario FROM usuario where id_usuario=" . $id);
        $nome_usuario = mysql_fetch_assoc($sq_nome_usuario);
//echo $nome_usuario;
        return $nome_usuario;
        FechaConexao($conn);
    }
    

    

    function cadastraUsuario($usuario) {
        require_once("../model/bean/Usuario.class.php");
       
        $conn=AbreConexao();
 $sq_dem=mysql_query("SELECT COUNT(login) FROM usuario where login='".$usuario->getLogin()."'");
 //echo "SELECT COUNT(login) FROM usuario where login='".$usuario->getLogin()."'";
    $login= mysql_fetch_row($sq_dem);

    if($login[0]>0){

        $valid='nok';
        return $valid;
    }else{
        $sq_inserir = mysql_query("INSERT INTO usuario (nome, ativo, senha, email, perfil, login) VALUES ('" . $usuario->getNome() . "'," . $usuario->getAtivo() . ",'" . $usuario->getSenha() . "','" . $usuario->getEmail() . "', " . $usuario->getPerfil() . ",' " . $usuario->getLogin() . "')");

        if ($sq_inserir) {
        	
            return TRUE;
        } else {
            //echo"INSERT INTO cliente (nome_cliente, ativo, usuario, descricao, ultima_alteracao) VALUES ('".$cliente->getNome()."',".$cliente->getAtivo().", '".$cliente->getUsuario()."', '".$cliente->getDescricao()."', ".$cliente->getUltimaModicacao().")";
            return FALSE;
        }
       FechaConexao($conn);
    }
    }

    function editaUsuario($usuario) {
	require_once("../model/bean/Usuario.class.php");
       
        $conn=AbreConexao();
///echo "UPDATE cliente SET nome_cliente='".$cliente->getNome()."',ativo=".$cliente->getAtivo().", id_usuario='".$cliente->getUsuario()."', descricao='".$cliente->getDescricao()."', ultima_alteracao=".$cliente->getUltimaModicacao()." WHERE id_cliente=".$cliente->getId()."<br>";

      if($usuario->getSenha()==""){
          $sq_inserir = mysql_query("UPDATE usuario SET nome='" . $usuario->getNome() . "',ativo=" . $usuario->getAtivo() . ", login='" . $usuario->getLogin() . "', email='" . $usuario->getEmail() . "', perfil=" . $usuario->getPerfil() . " WHERE id=" . $usuario->getId());

      }else{

        $sq_inserir = mysql_query("UPDATE usuario SET nome='" . $usuario->getNome() . "',ativo=" . $usuario->getAtivo() . ", senha='" . md5($usuario->getSenha()) . "', login='" . $usuario->getLogin() . "', email='" . $usuario->getEmail() . "', perfil=" . $usuario->getPerfil() ." WHERE id=" . $usuario->getId());
      }
        if ($sq_inserir) {
            return TRUE;
        } else {
   // echo "UPDATE usuario SET nome='" . $usuario->getNome() . "',ativo=" . $usuario->getAtivo() . ", senha='" . md5($usuario->getSenha()) . "', login='" . $usuario->getLogin() . "', email='" . $usuario->getEmail() . "', perfil=" . $usuario->getPerfil() ." WHERE id_usuario=" . $usuario->getId();

            return FALSE;
        }
        FechaConexao($conn);
    }

    function buscaUsuario($id) {
        require_once("../model/bean/Usuario.class.php");
       
        $conn=AbreConexao();

        $sq_clientes = mysql_query("SELECT * FROM usuario WHERE id=" . $id->getId());


        return $sq_clientes;
        FechaConexao($conn);
    }
    
    
    function pesquisarUsuario($id) {
    	require_once("../model/bean/Usuario.class.php");
    	 
    	$conn=AbreConexao();
    
    	$sq_clientes = mysql_query("SELECT * FROM usuario WHERE nome like '" . $id->getNome()."%'");
    
    
    	return $sq_clientes;
    	FechaConexao($conn);
    }
        
    function listaUsuario() {
    	//require_once("../model/bean/Cliente.class.php");
    	 
    	$conn=AbreConexao();
    
    	$sq_clientes = mysql_query("SELECT * FROM usuario");
    
    
    	return $sq_clientes;
    	FechaConexao($conn);
    }

}

?>