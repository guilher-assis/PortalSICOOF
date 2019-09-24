<?php

class CadastrarView {

    
    function imprimeSelectBase($resultado) {


        while ($base = mysql_fetch_array($resultado)) {
            echo" <option value='" . $base['id']."'>".$base['base']."</option>";


         
        }
        
    }
    
    
    function imprimePopover($resultado) {
    $trabalhando='';
    $parado = '';
    $aguardando='';
    $i=0;
    $a=0;
    $t=0;
    $p=0;
    	while ($popover = mysql_fetch_array($resultado)) {
    		
    if($popover['status']==1 || $popover['status']==3 || $popover['status']==5 || $popover['status']==7 || $popover['status']==17){
    	$aguardando.= $popover['total']." - ".$popover['nome']."<br/>";
    	$a=$a+$popover['total'];
    }
    	
    if($popover['status']==2 || $popover['status']==4 || $popover['status']==6 || $popover['status']==8 || $popover['status']==10){
    	$trabalhando.= $popover['total']." - ".$popover['nome']."<br/>";
    	$t=$t+$popover['total'];
    }
    	
    if($popover['status']==11 || $popover['status']==12 || $popover['status']==13 || $popover['status']==14 || $popover['status']==15){
    	$parado.= $popover['total']." - ".$popover['nome']."<br/>";
    	$p= $p+$popover['total'];
    }
    	}
    	
    	$i=$a+$t+$p;
    	
    	echo "
    			<div class='lg-parada' data-toggle='popover' title='Parada' data-placement='left' data-content='".$parado."'>$p</div>
    			
    			<div class='lg-aguarda' data-toggle='popover' title='Aguardando' data-placement='left' data-content='".$aguardando."'>$a</div>
    		  
    		  <div class='lg-trabalha' data-toggle='popover' title='Trabalhando' data-placement='left' data-content='".$trabalhando."'>$t</div>
    			
    	<div class='lg-total' data-toggle='popover' title='Total de Demandas' data-placement='left' data-content='Total de Demandas na Esteira'>".$i."</div>
    		
    		  		";
    
    }
    
    
    
    function impremeHoraMinutoSegundo($seconds){
    	
    	
    	
    	$hours = floor($seconds / 3600);
    	$seconds -= $hours * 3600;
    	$minutes = floor($seconds / 60);
    	$seconds -= $minutes * 60;
    	if($hours<10){
    		$hours="0".$hours;
    	}
    	if($minutes<10){
    		$minutes="0".$minutes;
    		}
    		if($seconds<10){
    			
    			$seconds="0".$seconds;
    		}
    		$segundo = explode(".", $seconds);
    	$tempo = "$hours:$minutes:".$segundo[0];
    	return $tempo;
    	
    }
    
    
    function imprimeResultadoAlterarResponsavel($resultado){
    	
    	if ($resultado) {
    		echo 'Responsável Alterado! <button type="button" class="close" data-dismiss="alert">×</button>';
    	} else {
    		echo 'Erro ao efetuar o login. Dados incorretos!';
    	}
    }
    
    function imprimeResultadoAlterarBase($resultado){
    	 
    	if ($resultado) {
    		echo 'Base alterada! <button type="button" class="close" data-dismiss="alert">×</button>';
    	} else {
    		echo 'Erro ao alterar a base. Dados incorretos!';
    	}
    }
    
    
    function imprimeResultadoAlterarStatus($resultado){
    	 
    	if ($resultado) {
    		echo 'Status Alterado com sucesso! <button type="button" class="close" data-dismiss="alert">×</button>';
    	} else {
    		echo 'Erro ao efetuar o login. Dados incorretos!';
    	}
    }
    
    function painel($resultado){
    	
    	$cadastrarDAO = new CadastrarDAO();
    	
    	
    echo "<script src='js/functions_cadastrar.js'></script>
    		<br>
    		
    		<p class = 'label label-info'>Filtros de pesquisa</p>
 <form id='search' name='search' class='navbar-search pull-left'>
 <input type='hidden' name='acao' value='pesquisar'/>
     <input type='text' class='search-query span3' placeholder='Pesquisar Nome ou Código' name='pesquisa_demanda'> <span style='margin-left:10px; margin-right:10px'><b>Finalizada</b>
    		<input type='radio' checked name='finalizada' value='0'/> <span>Não</span>
    		<input type='radio'  name='finalizada' value='1'/> <span>Sim</span>
    		</span>
    		<span>
    		<select name='responsavel'>
    		<option value='0'>Selecione...</option>";
    
    	$responsavel = $cadastrarDAO->preencheSelectResponsavelPesquisa();
    	while ($cliente = mysql_fetch_array($responsavel)) {
    		echo" <option value='" . $cliente['id']."'>".$cliente['nome']."</option>";}
    echo"		</select>
    		</span>
    		<button class='btn' type='submit'><i class='icon-search'></i></button>
    		<button class='btn' type='reset'><i class='icon-trash'></i></button>
    		
</form>
    		
    		
    		";
    		
    $this->imprimePopover($cadastrarDAO->buscaPopover());
    
    	echo"	
    			
    		<br>
    			<br><br>
    		<br>
    		<p class='label label-info'>Painel de Demandas</p>
    		<br>
    		<br>
    		<div id = 'tabela'>
    	<table class='table table-bordered'>
    	<thead>
    	<tr>
    	<th>Código</th>
    	<th>Responsável</th>
    	<th>Status</th>
    			<th>Data Início</th>
    		<th>Data Estimada</th>
    		<th>Tipo</th>
    		<th>Ação</th>
    	
    	</tr>
    	</thead>
    	<tbody >";
    
   
    	while ($demandas = mysql_fetch_array($resultado)) {
    	if ($demandas['tipo'] == '1') {
    			$tipo = 'Ofertas';
    	} else {
    			$tipo = 'Mailling';
    	}
    			echo"<tr>
    			<td title='" . $demandas['nome'] . "'>
    			" . $demandas['codigo'] . "
    	
    					</td>
    					<td>";
    			if($demandas['responsavel']!=0){
    			echo $cadastrarDAO->buscaNomeResponsavel( $demandas['responsavel']);
    			}
    					echo "</td>
    					<td>" .$cadastrarDAO->buscaNomeStatus( $demandas['status'] ). "</td>
    					<td>" .$this->converterData($demandas['data_inicio']). "</td>
    					<td>" .$this->converterData($demandas['data_exp']). "</td>
    					<td>
    					" . $tipo. "
    	
    					</td>
    					<td>
    					 <button class='btn detalhar' id='detalhar' title='Detalhar'  value='" . $demandas['id'] . "' href='#'> <i class='icon-tasks'></i></button>
    						<button class='btn editar' id='editar' title='Editar'  value='" . $demandas['id'] . "' href='#'> <i class='icon-pencil'></i></button>
    				
    	
    					</td>
    					</tr>
    					 
    					";
        }
        echo"  </tbody>
    					</table>
        		
        		</div>";
        
        
      echo'<!-- Modal -->
  <div class="modal fade" id="aguardaModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <img src="img/ajax-loader.gif"/>
      </div>
      
    </div>
  </div>
    ';
      
      
      echo'<!-- Modal -->
  <div id="modalCartao" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h2>Gerar Hash Cartão de Crédito</h2>
  </div>
  <div class="modal-body">
    <input type="number" class="span3" id="contrato" placeholder="Número do contrato"/>
     <input type="number" class="span3" id="hash" value="1"/> 	
      		<div id="resultadoHash" class="success"></div>
  </div>
  <div class="modal-footer">
        <button class="btn btn-warning" id="gerar">Gerar Hash</button>
  </div>
</div>
    ';
    
      
     
    }
    
    
    
    
    function paginaInicial() {

      


        echo"


<div class='square_white'>
    <p class='label label-info fonte20'>Cadastrar Demandas</p>
    <div class='cadastro' >

        <form action='#' method='post' name='form_cliente' id='form_cliente'>

            <table class='table'>
                <tr>
                    <td>Código:</td>
                    <td><input type='text' name='codigo' placeholder='Código do Projeto'id='codigo' value=''class='input-xxlarge '/>
                                        
                    </td>
                </tr>
        		<tr>
                    <td>Nome:</td>
                    <td><input type='text' name='nome' placeholder='Nome da demanda'id='nome' value=''class='input-xxlarge '/>
                                        
                    </td>
                </tr>
        		
        	
        		
        		
        		
                <tr>
                    <td>Tipo:</td>
                    <td>
                        <input type='radio'  name='tipo' checked value='1'  />
                        <span> Oferta</span>

                        <input type='radio' name='tipo'  value='2' />
                        <span>Mailling</span>
                    </td>
                </tr>
              <tr class='cenarios' >
                  <td>Cenarios:</td>
                    <td><input type='text' name='cenarios' placeholder='Quantidade de cenários' id='cenarios' value='' class='input-xxlarge '/>
                             
              </tr>              
                            </table>

                            <div align = 'center'>

                            <table>
                            <tr>
                            <td>
                            <input type = 'hidden' name = 'acao' value = 'cadastrar'/>
                            <button type = 'submit' class = 'btn btn-success' >Cadastrar</button>
                            <input type = 'reset' class = 'btn ' value = 'Limpar'/>
                            </td>
                            </tr>
                            </table>


                            </div>


                            </form>
        		<br>
                            <div id = 'resultado'></div>
                            </div>
                            </div>

                           
                         ";
        /*
                            <p class = 'label label-info'>Lista de clientes cadastrados</p>
 <form id='search' name='search' class='navbar-search pull-left'>
 <input type='hidden' name='acao' value='pesquisar'/>
     <input type='text' class='search-query span8' placeholder='Buscar Cliente' name='pesquisa_cliente'> <button class='btn' type='submit'><i class='icon-search'></i></button>
</form>
                            <div id = 'tabela'>
  
<table class='table table-bordered'>
    <thead>
    <tr>
        <th>Cliente</th>
        <th>Ativo</th>
        <th>Ação</th>
      
    </tr>
    </thead>
    <tbody id='clientes'>";
        while ($clientes = mysql_fetch_array($resultado)) {
            if ($clientes['ativo'] == '1') {
                $ativo = 'Ativo';
            } else {
                $ativo = 'Inativo';
            }
            echo"<tr>        
            <td>
               " . $clientes['nome_cliente'] . " 
                
            </td>
            <td>
               " . $ativo . " 
                
            </td>
            <td>
                <button class='btn editar' id='editar' title='Editar'  value='" . $clientes['id_cliente'] . "' href='#'> <i class='icon-pencil'></i></button>
             
               
                    
            </td>
        </tr>         
         
";
        }*/
        echo"  </tbody>
    </table>
 </div> 

<div class='holder'></div>

                            </div>
                             ";
    }

    function resultadoInserir($resultado) {

        if ($resultado) {
            echo 'Cadastro realizado com sucesso! <button type="button" class="close" data-dismiss="alert">×</button>';
        } else {
            echo 'Erro ao efetuar o login. Dados incorretos!';
        }
    }

    function resultadoEditar($resultado) {

        if ($resultado) {
            echo 'Cadastro alterado com sucesso!';
        } else {
            echo 'Erro ao efetuar o cadastro!';
        }
    }
    
    function imprimeSubStatus($resultado){
    	
    	echo"<select name='substatus' id='sub' disabled>";
    			while($sub = mysql_fetch_array($resultado)){
    		echo" <option value='". $sub['id'] ."'>" . $sub['sub_status'] . "</option>";
    		 		
    		 		
    }	
    echo "</select>
    		 		
    		 		";
    /*<button id='enviar_sub_status' class=' btn btn btn-info' disabled><i class=' icon-ok'></i></button>
            		<br>
     		 		<div  id='resultado_sub_status'></div>*/
    }

    function retornoPesquisar($resultado) {
    	$cadastrarDAO = new CadastrarDAO();
    	
echo" 
<script src='js/functions_cadastrar.js'></script>    

    	<table class='table table-bordered'>
    	<thead>
    	<tr>
    	<th>Código</th>
    	<th>Responsável</th>
    	<th>Status</th>
    		<th>Data Início</th>
    			<th>Data Estimada</th>
    		<th>Tipo</th>
    		<th>Ação</th>
    	
    	</tr>
    	</thead>
    	<tbody id='clientes'>";


    	while ($demandas = mysql_fetch_array($resultado)) {
    	if ($demandas['tipo'] == '1') {
    			$tipo = 'Ofertas';
    	} else {
    			$tipo = 'Mailling';
    	}
    			echo"<tr>
    			<td title='" . $demandas['nome'] . "'>
    			" . $demandas['codigo'] . "
    	
    					</td>
    					<td>";
    			if($demandas['responsavel']!=0){
    			echo $cadastrarDAO->buscaNomeResponsavel( $demandas['responsavel']);
    			}
    					echo "</td>
    					<td>" .$cadastrarDAO->buscaNomeStatus( $demandas['status'] ). "</td>
    					<td>" .$this->converterData($demandas['data_inicio']). "</td>
    					<td>" .$this->converterData($demandas['data_exp']). "</td>
    					<td>
    					" . $tipo. "
    	
    					</td>
    					<td>
    					 <button class='btn detalhar' id='detalhar' title='Detalhar'  value='" . $demandas['id'] . "' href='#'> <i class='icon-tasks'></i></button>
    					<button class='btn editar' id='editar' title='Editar'  value='" . $demandas['id'] . "' href='#'> <i class='icon-pencil'></i></button>
    					
    	
    					</td>
    					</tr>
    					 
    					";
        }
        echo"  </tbody>
    					</table>
        		
        		";
        
    
    
    }
    
    function editarVisualizar($resultado) {
       

        $demanda = mysql_fetch_array($resultado);
       
        $oferta = '';
        $mailling = '';
        if ($demanda['tipo'] == '1') {
            $oferta = 'checked';
        } else {
            $mailling = 'checked';
        }
        echo"
            <script src='js/functions_cadastrar.js'></script>
  <div class='square_grey'>
<p class='label label-info fonte20'>Editar Demanda</p>  

  <div id='resultado'>
 <form action='#' method='post' name='form_cliente_editar' id='form_cliente_editar'>
 
    <table class='table'>
       <tr>
            <td>Código:</td>
            <td><input type='text' name='codigo_editar' id='codigo_editar' value='" . $demanda['codigo'] . "'class='input-xxlarge limit'/>
             
</td>
        		
        		
        		<tr>
            <td>Nome:</td>
            <td><input type='text' name='nome_editar' id='nome_editar' value='" . $demanda['nome'] . "'class='input-xxlarge limit'/>
             
</td>
        </tr>
        <tr>
            <td>Tipo:</td>
            <td>
            <input type='radio'  name='tipo' value='1' " . $oferta. " />
            <span> Oferta </span>

            <input type='radio' name='tipo' value='2' " . $mailling. " />
            <span>Mailling</span>
            </td>
        </tr>
        <tr class='cenarios' >
                  <td>Cenarios:</td>
                    <td><input type='text' name='cenarios_editar'  id='cenarios_editar' value='" . $demanda['cenarios'] . "' class='input-xxlarge '/>
                             
              </tr> 
        
    </table>
 <input type='hidden' name='acao' value='editar_demanda'/>   
 <input type='hidden' name='id' value='" . $demanda['id'] . "'/>   
        <button type='submit' class='btn btn-success' id='teste'>Enviar</button>	
       <button class='btn' id='cancelar'>Cancelar</button>	
</form>
</div>
<div id='voltar'></div>
</div>";
    }
    
    function  converterData($data){
    	date_default_timezone_set('America/Sao_Paulo');
    	$convertida = date('d/m/Y', strtotime($data));
    	return $convertida;
    }
    
    function  converterDataHora($data){
    	date_default_timezone_set('America/Sao_Paulo');
    	$convertida = date('d/m/Y H:i:s', strtotime($data));
    	return $convertida;
    }
    
    function detalharVisualizar($resultado) {
    	 
    	$cadastrarDAO = new CadastrarDAO();
    	$demanda = mysql_fetch_array($resultado);
    	$busca_historico = $cadastrarDAO->buscaHistorico($demanda['id']);
    	
    	$des_usuario='';
    	if($demanda['status']==9){$des_usuario='disabled';}
    	
    	
    	if ($demanda['tipo'] == '1') {
    		$tipo = 'Oferta';
    	} else {
    		$tipo = 'Mailling';
    	}
    	
    	if($demanda['data_fim']!='0000-00-00'){
$data_fim=	$this->converterData($demanda['data_fim']);}else{$data_fim='';}
    	
    	
    	echo"
            <script src='js/functions_cadastrar.js'></script>
    			
  <div class='square_white'>
    
  <div id='resultado'></div>
<p class='label label-warning'>Dados da Demanda</p>
    <br>
    <table class='table table-condensed' >
       <tr class='success'><td>Código</td><td>Nome</td><td>Tipo</td><td>Base</td><td>Cenários</td><td>Data Início</td><td>Data Estimada</td><td>Data Fim</td></tr>
    	
    			<tr>
    			
            <td>" . $demanda['codigo'] . "</td>
       

            
            <td>" . $demanda['nome'] . "</td>
       	<td> ".$tipo."</td>
 <td>" .$cadastrarDAO->buscaNomeBase( $demanda['base'] ). "</td>
 		<td>".$demanda['cenarios']."</td>
        
     <td>" . $this->converterData($demanda['data_inicio']) . "</td>
     		<td>" .   $this->converterData($demanda['data_exp']). "</td>
     		<td>" .  $data_fim . "</td>
     
     		
    </table>
<br>
     		<p class='label label-warning'>Status da Demanda</p>
     		<br>
     		<table class='table table-condensed'>
       <tr><td>Responsável</td><td>Status</td><td>Sub-Status</td><td></td></tr>
    	
    			<tr>
    			
            <td><select name='responsavel' id='responsavel' ".$des_usuario.">";
    	if($demanda['responsavel']!=0){
     		echo "<option value='".$demanda['responsavel']."'>".$cadastrarDAO->buscaNomeResponsavel($demanda['responsavel'])."</option>
     		
     		";
    	}else{echo "<option >Selecione...</option>";}
    	$responsavel = $cadastrarDAO->preencheSelectResponsavel($demanda['responsavel']);
    	while ($cliente = mysql_fetch_array($responsavel)) {
    		echo" <option value='" . $cliente['id']."'>".$cliente['nome']."</option>";}
     		 
     		 
     		 echo "</select>
     		 		<br>
     		 		<br>
     		 		<div  id='resultado_funcionario'></div>
     		 		</td>
       <td><select name='status' id='status'>
     		 		<option value='".$demanda['status']."'>". $cadastrarDAO->buscaNomeStatus($demanda['status']) ."  </option>";
     		 $status = $cadastrarDAO->preencheSelectStatus($demanda['status'], $demanda['tipo']);
     		 while ($cliente = mysql_fetch_array($status)) {
     		 	echo" <option value='" . $cliente['id']."'>".$cliente['status']."</option>";}
       
       echo "</select>
       		<button id='enviar_status' class=' btn btn-success' disabled><i class=' icon-ok'></i></button>
       		<br>
       		<br>
     		 		<div  id='resultado_status'></div>
       		</td>

            
            <td class='td_sub'><select name='substatus' id='sub' disabled><option value='".$demanda['sub_status']."'>" . $cadastrarDAO->buscaNomeSubStatus($demanda['sub_status']) . "</option>";
    
            
            echo"
            		
            		
            		</select>
            		
            		
            		</td>
            		<td ><button id='enviar_sub_status' class=' btn btn btn-info' disabled><i class=' icon-ok'></i></button>
            		
</tr>
     		
    </table>
            		<br>
		<p class='label label-warning'>Gestão de Tempo</p>
		<br>
		
		<table class='table table-condensed'>
		<tr>
		<td><b>Validação</b></td><td>";
	
	
	echo $this->impremeHoraMinutoSegundo($cadastrarDAO->calcularValidacao($demanda['id']));
		echo"</td>
		</tr>	
		<tr>
		<td><b>Construção</b></td><td>";
		echo $this->impremeHoraMinutoSegundo($cadastrarDAO->calcularConstrucao($demanda['id']));
		echo"</td>
		</tr>
		<tr>
		<td><b>Teste</b></td><td>";
			echo $this->impremeHoraMinutoSegundo($cadastrarDAO->calcularTeste($demanda['id']));	
		echo"</td>
		</tr>
		<tr>
		<td><b>Implantação</b></td><td>";
		echo $this->impremeHoraMinutoSegundo($cadastrarDAO->calcularImplatacao($demanda['id']));
		echo"</td>
		</tr>
		<tr>
		<td><b>Validação em Produção</b></td><td>";
		echo $this->impremeHoraMinutoSegundo($cadastrarDAO->calcularValidacaoProducao($demanda['id']));
		echo"</td>
		</tr>
				<tr>
		<td><b>Reteste</b></td><td>";
		echo $this->impremeHoraMinutoSegundo($cadastrarDAO->calcularReteste($demanda['id']));
		echo"</td>
		</tr>
		</table>
            		
       <button class='btn btn-primary' id='cancelar'>Voltar</button>
				
<input type='hidden' name='id_demanda' id='id_demanda' value='".$demanda['id']."'/>
		
		<button class='btn btn-info' id='refresh' title='Refresh'  value='" . $demanda['id'] . "' href='#'> <i class='icon-refresh'></i></button>
		<br><br>
		<br>
		<p class='label label-warning'>Histórico da Demanda</p>
		<br>
		
		<table class='table table-condensed'>
		<tr> <td><b>Código</b></td><td><b>Status</b></td><td><b>Sub-Status</b></td><td><b>Responsável</b></td><td><b>Data</b></td><td><b>Executante</b></td><td><b>Ação</b></td>
		</tr>";
		
		while($historico=mysql_fetch_array($busca_historico)){
			echo "<tr>";
			echo "<td>". $cadastrarDAO->buscaCodigoDemanda($historico['id_demanda'])."</td>";
			echo "<td>".$cadastrarDAO->buscaNomeStatus($historico['status'])."</td>";
			echo "<td>".$cadastrarDAO->buscaNomeSubStatus($historico['sub_status'])."</td>";
			echo "<td>".$cadastrarDAO->buscaNomeResponsavel($historico['responsavel'])."</td>";
			echo "<td>".$this->converterDataHora($historico['data'])."</td>";
			echo "<td>".$cadastrarDAO->buscaNomeResponsavel($historico['executante'])."</td>";
			echo "<td>".$historico['acao']."</td>";
			echo "</tr>";
		}
		
		echo"</table>
</div>
<div id='voltar'></div>
		
</div>";
     	echo '<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Escolha a base</h4>
        </div>
        <div class="modal-body">
         <select name"base" id="base">
     	<option>Selecione...</option>';
     		$this->imprimeSelectBase($cadastrarDAO->preencheSelectBases())	;
     			
     	echo'</select>
     			<p id="resultado_base"></p>
        </div>
        
      </div>
    </div>
  </div>
</div> ';	 
       
     	echo'<!-- Modal -->
  <div class="modal fade" id="aguardaModal" role="dialog">
    <div class="modal-dialog">
     	
      <!-- Modal content-->
      <div class="modal-content">
        <img src="img/ajax-loader.gif"/>
      </div>
     	
    </div>
  </div>
    ';
     	
    }

}

?>