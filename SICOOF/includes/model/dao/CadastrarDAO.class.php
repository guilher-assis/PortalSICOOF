<?php

require_once "includes/model/dao/Conection.class.php";

class CadastrarDAO {
	
	function calcularValidacao($consulta){
		
		
		$conn=AbreConexao();
		
		/*$sq_historico = mysql_query("SET @inicio = (SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=1);
		SET @fim = (SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=2);
		
		SET @total = @fim - @inicio;
		SELECT @total;");
		
		$t=mysql_result($sq_historico,0);*/
		
		$sq_inicio = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=1" );
		$sq_fim = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=2" );
		
		$sq_inicio_parada = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=13" );
		$sq_fim_parada = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=14" );
		
		$inicio = mysql_fetch_row($sq_inicio);
		$fim = mysql_fetch_row($sq_fim);
		$inicio_parada = mysql_fetch_row($sq_inicio_parada);
		$fim_parada = mysql_fetch_row($sq_fim_parada);
		
		if($inicio[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio[0] = time();
		}
		
		
		if($fim[0]==0){
			if($inicio_parada[0]<0){
				$fim[0] = $inicio_parada[0];
				
			}else{
				date_default_timezone_set('America/Sao_Paulo');
				$fim [0]= time();
			}
		}
		
		if($inicio_parada[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio_parada[0]= time();
		}
		
		if($fim_parada[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$fim_parada[0]= time();
		}
		//echo "(".$fim_parada." - ".$inicio_parada.") - (".$fim."-".$inicio.")";
		$total = ($fim_parada[0]-$inicio_parada[0]) - ($fim[0] - $inicio[0]);
		
		
	
		
	return abs($total);
		FechaConexao($conn);;
	}
	
	function calcularConstrucao($consulta){
		
		
		$conn=AbreConexao();
	
	
		$sq_inicio = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=3" );
		$sq_fim = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=4" );
	
		$sq_inicio_parada = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=15" );
		$sq_fim_parada = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=16" );
	
		$inicio = mysql_fetch_row($sq_inicio);
		$fim = mysql_fetch_row($sq_fim);
		$inicio_parada = mysql_fetch_row($sq_inicio_parada);
		$fim_parada = mysql_fetch_row($sq_fim_parada);
		
		if($inicio[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio[0] = time();
		}
		
		
		if($fim[0]==0){
			if($inicio_parada[0]<0){
				$fim[0] = $inicio_parada[0];
				
			}else{
				date_default_timezone_set('America/Sao_Paulo');
				$fim [0]= time();
			}
		}
		
		if($inicio_parada[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio_parada[0]= time();
		}
		
		if($fim_parada[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$fim_parada[0]= time();
		}
		//echo "(".$fim_parada." - ".$inicio_parada.") - (".$fim."-".$inicio.")";
		$total = ($fim_parada[0]-$inicio_parada[0]) - ($fim[0] - $inicio[0]);
	
	
		return abs($total);
		FechaConexao($conn);
	}
	
	function calcularTeste($consulta){
	
		
		$conn=AbreConexao();
	
	
		$sq_inicio = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=5" );
		$sq_fim = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=6" );
	
		$sq_inicio_parada = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=17" );
		$sq_fim_parada = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=18" );
	
		$inicio = mysql_fetch_row($sq_inicio);
		$fim = mysql_fetch_row($sq_fim);
		$inicio_parada = mysql_fetch_row($sq_inicio_parada);
		$fim_parada = mysql_fetch_row($sq_fim_parada);
		
		if($inicio[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio[0] = time();
		}
		
		
		if($fim[0]==0){
			if($inicio_parada[0]<0){
				$fim[0] = $inicio_parada[0];
				
			}else{
				date_default_timezone_set('America/Sao_Paulo');
				$fim [0]= time();
			}
		}
		
		if($inicio_parada[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio_parada[0]= time();
		}
		
		if($fim_parada[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$fim_parada[0]= time();
		}
		//echo "(".$fim_parada." - ".$inicio_parada.") - (".$fim."-".$inicio.")";
		$total = ($fim_parada[0]-$inicio_parada[0]) - ($fim[0] - $inicio[0]);
	
	
	
		return abs($total);
		FechaConexao($conn);
	}
	
	
	function calcularImplatacao($consulta){
	
		
		$conn=AbreConexao();
	
	
		$sq_inicio = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=7" );
		$sq_fim = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=8" );
	
		$sq_inicio_parada = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=19" );
		$sq_fim_parada = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=20" );
	
		$inicio = mysql_fetch_row($sq_inicio);
		$fim = mysql_fetch_row($sq_fim);
		$inicio_parada = mysql_fetch_row($sq_inicio_parada);
		$fim_parada = mysql_fetch_row($sq_fim_parada);
		
		if($inicio[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio[0] = time();
		}
		
		
		if($fim[0]==0){
			if($inicio_parada[0]<0){
				$fim[0] = $inicio_parada[0];
				
			}else{
				date_default_timezone_set('America/Sao_Paulo');
				$fim [0]= time();
			}
		}
		
		if($inicio_parada[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio_parada[0]= time();
		}
		
		if($fim_parada[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$fim_parada[0]= time();
		}
		//echo "(".$fim_parada." - ".$inicio_parada.") - (".$fim."-".$inicio.")";
		$total = ($fim_parada[0]-$inicio_parada[0]) - ($fim[0] - $inicio[0]);
	
	
		return abs($total);
		FechaConexao($conn);
	}
	
	function calcularValidacaoProducao($consulta){
	
		
		$conn=AbreConexao();
	
	
		$sq_inicio = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=9" );
		$sq_fim = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=10" );
	
		$sq_inicio_parada = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=21" );
		$sq_fim_parada = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=22" );
	
		$inicio = mysql_fetch_row($sq_inicio);
		$fim = mysql_fetch_row($sq_fim);
		$inicio_parada = mysql_fetch_row($sq_inicio_parada);
		$fim_parada = mysql_fetch_row($sq_fim_parada);
		
		if($inicio[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio[0] = time();
		}
		
		
		if($fim[0]==0){
			if($inicio_parada[0]<0){
				$fim[0] = $inicio_parada[0];
				
			}else{
				date_default_timezone_set('America/Sao_Paulo');
				$fim [0]= time();
			}
		}
		
		if($inicio_parada[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio_parada[0]= time();
		}
		
		if($fim_parada[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$fim_parada[0]= time();
		}
		//echo "(".$fim_parada." - ".$inicio_parada.") - (".$fim."-".$inicio.")";
		$total = ($fim_parada[0]-$inicio_parada[0]) - ($fim[0] - $inicio[0]);
		return abs($total);
		FechaConexao($conn);
	}
	
	function calcularReteste($consulta){
	
		
		$conn=AbreConexao();
	
	
		$sq_inicio = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=11" );
		$sq_fim = mysql_query("SELECT SUM(data) from controle_tempo where id_demanda=".$consulta." and codigo=12" );
	
		
		$inicio = mysql_fetch_row($sq_inicio);
		$fim = mysql_fetch_row($sq_fim);
		
	
		if($inicio[0]==0){
			date_default_timezone_set('America/Sao_Paulo');
			$inicio[0] = time();
		}
	
	
		if($fim[0]==0){
			
				date_default_timezone_set('America/Sao_Paulo');
				$fim[0] = time();
			}
		
	
		
		//echo "(".$fim_parada." - ".$inicio_parada.") - (".$fim."-".$inicio.")";
		$total = ($fim[0] - $inicio[0]);
	
	
	
	
		return abs($total);
		FechaConexao($conn);
	}
	
	function finalizarDemanda($consulta){
		
		$conn=AbreConexao();
		date_default_timezone_set('America/Sao_Paulo');
		$data = date("Y-m-d");
		$sq_historico = mysql_query("UPDATE demanda SET finalizada=1, data_fim='".$data."' where id=".$consulta->getId());
	//echo "UPDATE demanda SET finalizada=1, data_fim='".$data."' where id=".$consulta->getId();
		FechaConexao($conn);
	}
	
	function registraHistoricoResponsavel($consulta){
		
		$conn=AbreConexao();
		
		$sq_historico = mysql_query("INSERT INTO historico (responsavel, executante, id_demanda, acao, data, status, sub_status)
				Values (".$consulta->getResponsavel().",".$consulta->getExecutante().",".$consulta->getId().", 'Alterar Responsável','".$consulta->getDataInicio()."',".$consulta->getStatus().",".$consulta->getSubStatus().")");
				
		FechaConexao($conn);
		}
		
		function registraHistoricoStatus($consulta){
			
			$conn=AbreConexao();
			
			$sq_historico = mysql_query("INSERT INTO historico (responsavel, executante, id_demanda, acao, data, status, sub_status)
				Values (".$consulta->getResponsavel().",".$consulta->getExecutante().",".$consulta->getId().", 'Alterar Status','".$consulta->getDataFim()."',".$consulta->getStatus().",".$consulta->getSubStatus().")");
		
			FechaConexao($conn);
		}
	
	function alterarResponsavel($consulta) {
		
		$conn=AbreConexao();
	
		$sq_Demanda = mysql_query("UPDATE demanda set responsavel=".$consulta->getResponsavel()." where id=".$consulta->getId());
		//echo "SELECT id, nome FROM usuario where ativo=1 and id!=".$id." ORDER BY nome";
		
		if($sq_Demanda){
			return TRUE;
		}else{
			//echo"INSERT INTO Demanda (nome_Demanda, ativo, segmento_mercado, descricao, ultima_alteracao) VALUES ('".$Demanda->getNome()."',".$Demanda->getAtivo().", '".$Demanda->getSegmento()."', '".$Demanda->getDescricao()."', ".$Demanda->getUltimaModicacao().")";
			return FALSE;
		}
		
	
		FechaConexao($conn);
	
	}
	
	
	function alterarBasel($consulta) {
	
		$conn=AbreConexao();
	
		$sq_Demanda = mysql_query("UPDATE demanda set base=".$consulta->getBase()." where id=".$consulta->getId());
		//echo "UPDATE demanda set base=".$consulta->getBase()." where id=".$consulta->getId();
	
		if($sq_Demanda){
			return TRUE;
		}else{
			//echo"INSERT INTO Demanda (nome_Demanda, ativo, segmento_mercado, descricao, ultima_alteracao) VALUES ('".$Demanda->getNome()."',".$Demanda->getAtivo().", '".$Demanda->getSegmento()."', '".$Demanda->getDescricao()."', ".$Demanda->getUltimaModicacao().")";
			return FALSE;
		}
	
	
		FechaConexao($conn);
	
	}
	
	function inserirTempo($consulta) {
		
		$conn=AbreConexao();
	
		$sq_Demanda = mysql_query("INSERT INTO controle_tempo (id_demanda, data, codigo)
				VALUES (".$consulta->getId().",".$consulta->getDataInicio().",".$consulta->getTempo().")");
/*echo "INSERT INTO controle_tempo (id_demanda, data, codigo)
			VALUES (".$consulta->getId().",".$consulta->getDataInicio().",".$consulta->getTempo().")";		
		*/
		if($sq_Demanda){
			return TRUE;
		}else{
			//echo"INSERT INTO Demanda (nome_Demanda, ativo, segmento_mercado, descricao, ultima_alteracao) VALUES ('".$Demanda->getNome()."',".$Demanda->getAtivo().", '".$Demanda->getSegmento()."', '".$Demanda->getDescricao()."', ".$Demanda->getUltimaModicacao().")";
			return FALSE;
		}
	
	
		FechaConexao($conn);
	
	}
	
	
	function retirarResponsavel($consulta) {
	
		$conn=AbreConexao();
	
		$sq_Demanda = mysql_query("UPDATE demanda set responsavel=0 where id=".$consulta->getId());
		
		if($sq_Demanda){
			return TRUE;
		}else{
			//echo"INSERT INTO Demanda (nome_Demanda, ativo, segmento_mercado, descricao, ultima_alteracao) VALUES ('".$Demanda->getNome()."',".$Demanda->getAtivo().", '".$Demanda->getSegmento()."', '".$Demanda->getDescricao()."', ".$Demanda->getUltimaModicacao().")";
			return FALSE;
		}
	
	
		FechaConexao($conn);
	
	}
	
	
	
	
	function alterarStatus($consulta) {
		
		$conn=AbreConexao();
	
		$sq_Demanda = mysql_query("UPDATE demanda set status=".$consulta->getStatus().", sub_status=".$consulta->getSubStatus()." where id=".$consulta->getId());
		//echo "UPDATE demanda set status=".$consulta->getStatus().", sub_status=".$consulta->getSubStatus()." where id=".$consulta->getId();
	
		if($sq_Demanda){
			return TRUE;
		}else{
			//echo"INSERT INTO Demanda (nome_Demanda, ativo, segmento_mercado, descricao, ultima_alteracao) VALUES ('".$Demanda->getNome()."',".$Demanda->getAtivo().", '".$Demanda->getSegmento()."', '".$Demanda->getDescricao()."', ".$Demanda->getUltimaModicacao().")";
			return FALSE;
		}
	
	
		FechaConexao($conn);
	
	}
	
     function preencheSelectResponsavel($id) {
        
        $conn=AbreConexao();

        $sq_Demanda = mysql_query("SELECT id, nome FROM usuario where ativo=1 and perfil = 1 and id!=".$id." ORDER BY nome");
		//echo "SELECT id, nome FROM usuario where ativo=1 and id!=".$id." ORDER BY nome";
        return $sq_Demanda;
        FechaConexao($conn);
        
    }
    
    function preencheSelectResponsavelPesquisa() {
    
    	$conn=AbreConexao();
    
    	$sq_Demanda = mysql_query("SELECT id, nome FROM usuario where ativo=1 and perfil = 1 ORDER BY nome");
    	//echo "SELECT id, nome FROM usuario where ativo=1 and id!=".$id." ORDER BY nome";
    	return $sq_Demanda;
    	FechaConexao($conn);
    
    }
    
    
    function preencheSelectStatus($id,$tipo) {
    	
    	$conn=AbreConexao();
    
    	$sq_Demanda = mysql_query("SELECT s.id, s.status FROM status s, status_grupo g where g.grupo =".$id." and s.id=g.id_status and g.tipo=".$tipo." ORDER BY s.id");
    	//echo "SELECT s.id, s.status FROM status s, status_grupo g where g.grupo =".$id." and id=id_status ORDER BY s.id";
    	return $sq_Demanda;
    	FechaConexao($conn);
    
    }
    
    function preencheSelectBases() {
    	 
    	$conn=AbreConexao();
    
    	$sq_Demanda = mysql_query("SELECT * FROM bases ORDER BY base");
    	//echo "SELECT s.id, s.status FROM status s, status_grupo g where g.grupo =".$id." and id=id_status ORDER BY s.id";
    	return $sq_Demanda;
    	FechaConexao($conn);
    
    }
    
    
    function preencheSelectSubStatus($id) {
    	
    	$conn=AbreConexao();
    
    	$sq_Demanda = mysql_query("SELECT id, sub_status FROM sub_status where id_status =".$id->getId()." ORDER BY id");
    	//echo "SELECT id, sub_status FROM sub_status where id_status =".$id->getId()." ORDER BY id";
    	return $sq_Demanda;
    	FechaConexao($conn);
    
    }
    
    function buscaHistorico($id){
    
    	
    	$conn=AbreConexao();
    
    	$sq_nome = mysql_query("SELECT * FROM historico where id_demanda=".$id." order by id desc");
    	
    	//echo $nome_segmento;
    	return $sq_nome;
    	FechaConexao($conn);
    
    }
    
    
    function buscaPopover(){
    
    	 
    	$conn=AbreConexao();
    
    	$sq_nome = mysql_query("SELECT count(d.id) as total, s.status as nome, d.status  FROM  demanda d, status s where d.finalizada=0 and s.id=d.status group by d.status");
    	 
    	//echo $nome_segmento;
    	return $sq_nome;
    	FechaConexao($conn);
    
    }
    
    
    function buscaNomeResponsavel($id){
        
      
        $conn=AbreConexao();

        $sq_nome = mysql_query("SELECT nome FROM usuario where id=".$id);
$nome=  mysql_fetch_row($sq_nome);
//echo $nome_segmento;
        return $nome[0];
        FechaConexao($conn);  
        
    }
    
    function buscaNomeBase($id){
    
    
    	$conn=AbreConexao();
    
    	$sq_nome = mysql_query("SELECT base FROM bases where id=".$id);
    	$nome=  mysql_fetch_row($sq_nome);
    	//echo $nome_segmento;
    	return $nome[0];
    	FechaConexao($conn);
    
    }
    
function buscaStatusDemanda($cliente){
	
	$conn=AbreConexao();
	
	$sq_status = mysql_query("SELECT status FROM demanda where id=".$cliente->getId());
	$status=  mysql_fetch_row($sq_status);
	//echo $nome_segmento;
	return $status[0];
	FechaConexao($conn);
	
}

function buscaCodigoDemanda($id){
	
	$conn=AbreConexao();

	$sq_codigo = mysql_query("SELECT codigo FROM demanda where id=".$id);
	$codigo = mysql_fetch_row($sq_codigo);
	return $codigo[0];
	FechaConexao($conn);

}

    function buscaNomeStatus($id){
    
    	
    	$conn=AbreConexao();
    
    	$sq_status = mysql_query("SELECT status FROM status where id=".$id);
    	$status=  mysql_fetch_row($sq_status);
    	//echo $nome_segmento;
    	return $status[0];
    	FechaConexao($conn);
    
    }
    
    function buscaNomeSubStatus($id){
    
    	
    	$conn=AbreConexao();
    
    	$sq_sub = mysql_query("SELECT sub_status FROM sub_status where id=".$id);
    	$sub=  mysql_fetch_row($sq_sub);
    	//echo $nome_segmento;
    	return $sub[0];
    	FechaConexao($conn);
    
    }
    
    function buscaSubStatusAjax($id){
    
    	
    	$conn=AbreConexao();
    
    	$sq_sub = mysql_query("SELECT id, sub_status FROM sub_status where grupo=".$id->getId());
    	
    	//echo "SELECT id, sub_status FROM sub_status where grupo='".$id."'";
    	
    	return $sq_sub;
    	FechaConexao($conn);
    
    }
    
    function pesquisarDemanda($Demanda) {
        require_once("../model/bean/Cadastrar.class.php");
        $responsavel ="";
        $conn=AbreConexao();
        
		if($Demanda->getResponsavel()!=0){
			
			$responsavel="and responsavel='".$Demanda->getResponsavel()."'";
		}
        $sq_Demanda = mysql_query("SELECT * FROM demanda where finalizada = ".$Demanda->getFinalizada()." and (nome like '".$Demanda->getNome()."%' or codigo like '".$Demanda->getNome()."%') ".$responsavel." ORDER BY codigo");
        
      // echo "SELECT * FROM demanda where finalizada = ".$Demanda->getFinalizada()." and (nome like '".$Demanda->getNome()."%' or codigo like '".$Demanda->getNome()."%')  ORDER BY codigo";
        
        return $sq_Demanda;
        FechaConexao($conn);
        
    }
    
    function listaDemanda() {
    	
        $conn=AbreConexao();

        $sq_Demanda = mysql_query("SELECT * FROM demanda where finalizada =0 ORDER BY codigo");
        
        return $sq_Demanda;
        
        
        FechaConexao($conn);
        
    }

    function cadastraDemanda($Demanda) {
    	
require_once "../bean/Cadastrar.class.php";
        
 $conn=AbreConexao();

        $sq_inserir = mysql_query("INSERT INTO demanda (id,nome, codigo, tipo, data_inicio, status, sub_status, finalizada, cenarios,data_exp) VALUES (NULL, '".$Demanda->getNome()."', '".$Demanda->getCodigo()."','".$Demanda->getTipo()."' , '".$Demanda->getDataInicio()."', '1','1','0','".$Demanda->getCenarios()."','".$Demanda->getDataFim()."')");
echo"INSERT INTO `sicoof`.`demanda` (id,nome, codigo, tipo, data_inicio, status, sub_status, finalizada, cenarios) VALUES (NULL, '".$Demanda->getNome()."', '".$Demanda->getCodigo()."','".$Demanda->getTipo()."' , '".$Demanda->getDataInicio()."', '1','1','0'".$Demanda->getCenarios().")";
if($sq_inserir){
        return TRUE;
}else{
    //echo"INSERT INTO Demanda (nome_Demanda, ativo, segmento_mercado, descricao, ultima_alteracao) VALUES ('".$Demanda->getNome()."',".$Demanda->getAtivo().", '".$Demanda->getSegmento()."', '".$Demanda->getDescricao()."', ".$Demanda->getUltimaModicacao().")";
    return FALSE;
}
     FechaConexao($conn);  
    }
    
    
    function editaDemanda($Demanda) {
require_once("../model/bean/Cadastrar.class.php");
        
 $conn=AbreConexao();


 $sq_inserir = mysql_query("UPDATE demanda SET nome='".$Demanda->getNome()."', codigo='".$Demanda->getCodigo()."', cenarios='".$Demanda->getCenarios()."', tipo='".$Demanda->getTipo()."' WHERE id=".$Demanda->getId());

if($sq_inserir){
	
	//echo "UPDATE demanda SET nome='".$Demanda->getNome()."', codigo='".$Demanda->getCodigo()."', cenarios='".$Demanda->getCenarios()."', tipo='".$Demanda->getTipo()."' WHERE id=".$Demanda->getId();
	
	
        return TRUE;
}else{
  
	//echo "UPDATE demanda SET nome='".$Demanda->getNome()."', codigo='".$Demanda->getCodigo()."', cenarios='".$Demanda->getCenarios()."', tipo='".$Demanda->getTipo()."' WHERE id=".$Demanda->getId();
    return FALSE;
}
     FechaConexao($conn);  
    }
    
    function buscaDemanda($id){
        //require_once("../model/bean/Demanda.class.php");
     
        $conn=AbreConexao();

       $sq_Demanda = mysql_query("SELECT * FROM demanda WHERE id=".$id->getId());

       return $sq_Demanda;
       
       FechaConexao($conn);   
        
    }
    

}

?>
