<?php

class Cadastrar{

	var $id;
	var $codigo;
	var $nome;
	var $responsavel;
	var $finalizada;
	var $status;
	var $sub_status;
	var $data_inicio;
	var $data_fim;
	var $tipo;
	var $base;
	var $cenarios;
	var $executante;
	var $codigo_tempo;
	
	//Id
	function getId(){
		return $this -> id;
	}
	function setId($valor){
		$this -> id = $valor;
	}
	
	
	//Id
	function getCodigo(){
		return $this -> codigo;
	}
	function setCodigo($valor){
		$this -> codigo = $valor;	
	}
	
	//Nome
	function getNome(){
		return $this -> nome;
	}
	function setNome($valor){
		$this -> nome = $valor;	
	}
	
	//Email
	function getResponsavel(){
		return $this -> responsavel;
	}
	function setResponsavel($valor){
		$this -> responsavel = $valor;	
	}
	function getFinalizada(){
		return $this -> finalizada;
	}
	function setFinalizada($valor){
		$this -> finalizada = $valor;	
	}
	
	//Login
	function getStatus(){
		return $this -> status;
	}
	function setStatus($valor){
		$this -> status = $valor;	
	}
		
	//Senha
	function getSubStatus(){
		return $this -> sub_status;
	}
	function setSubStatus($valor){
		$this -> sub_status = $valor;	
	}

	function getDataInicio(){
		return $this -> data_inicio;
	}
	function setDataInicio($valor){
		$this ->  data_inicio= $valor;
	}
	
	function getDataFim(){
		return $this -> data_fim;
	}
	function setDataFim($valor){
		$this ->  data_fim= $valor;
	}
	
	
	function getBase(){
		return $this -> base;
	}
	function setBase($valor){
		$this ->  base= $valor;
	}
	
	function getTipo(){
		return $this -> tipo;
	}
	function setTipo($valor){
		$this ->  tipo= $valor;
	}
	
	function getCenarios(){
		return $this -> cenarios;
	}
	function setCenarios($valor){
		$this ->  cenarios= $valor;
	}
	
	
	function getExecutante(){
		return $this -> executante;
	}
	function setExecutante($valor){
		$this ->  executante= $valor;
	}
	
	function getTempo(){
		return $this -> codigo_tempo;
	}
	function setTempo($valor){
		$this ->  codigo_tempo= $valor;
	}
	
	
	
}

?>