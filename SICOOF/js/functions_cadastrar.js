/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
   	
	$('[data-toggle="popover"]').popover();
	
	
	
	
	
	var status = $("#status").val();
	var sub_status = $("#sub_status").val();
	
	
	
	$("#status").change(function(){
		
		 var resposavel = $("#responsavel").val();
		 var id=$(this).val();
		
		 if(resposavel==="Selecione..."){
			
			 $("#resultado_status").html("É nescessário ter um responsável!<button type='button' class='close' data-dismiss='alert'>×</button>");
			
		 }
		 else{
		 if(id==status){
			
			 $("#enviar_status").prop( "disabled", true );
			 
		 }else  if(id==11 || id==12 || id==13 || id==14 || id==15){
			 
			 $.ajax({  
	                type: "POST",  
	                url: "includes/controller/CadastrarController.php",  
	                data: {id:id,acao:"buscar_sub"},
	                beforeSend: function(){
	                	$("#sub").html("<option>Carregando..</option>");
	                },
	                success: function(data)  
	                {  
	                   
	                    $(".td_sub").html(data);
	                    $("#sub").removeAttr('disabled');
	                    $("#enviar_sub_status").removeAttr('disabled');
	                        
	                }  
	            });  
			
		 }else{
        if(id==4){
        	$("#myModal").modal();
        }
	       $.ajax({  
	                type: "POST",  
	                url: "includes/controller/CadastrarController.php",  
	                data: {id:id,acao:"buscar_sub"},
	                beforeSend: function(){
	                	$("#sub").html("<option>Carregando..</option>");
	                },
	                success: function(data)  
	                {  
	                   
	                    $(".td_sub").html(data);
	                    $("#enviar_status").removeAttr('disabled');
	                        
	                }  
	            });  
		 }
		 }
	
	});
	
	
	$("#responsavel").change(function(){
		
		
		 var id_responsavel=$(this).val();
		 var id_demanda = $('#id_demanda').val();
		 var status = $('#status').val();
		 var sub_status = $("#sub").val();
		 
     
	       $.ajax({  
	                type: "POST",  
	                url: "includes/controller/CadastrarController.php",  
	                data: {sub_status:sub_status, status:status,id_demanda:id_demanda, id_responsavel: id_responsavel,acao:"alterar_responsavel"},
	                beforeSend: function(){
	                	$("resultado_funcionario").html("<img src='img/loading.gif'/>");
	                },
	                success: function(data)  
	                {  
	                	$("#resultado_funcionario").addClass('label label-success span3');
	                    $("#resultado_funcionario").html(data);
	                        
	                }  
	            });  
      
  });
	
	
	$("#base").change(function(){
		
		
		
		 var id_demanda = $('#id_demanda').val();
		 var id_base = $(this).val();
		
		
    
	       $.ajax({  
	                type: "POST",  
	                url: "includes/controller/CadastrarController.php",  
	                data: {id_demanda:id_demanda, id_base: id_base,acao:"alterar_base"},
	                beforeSend: function(){
	                	$("resultado_base").html("<img src='img/loading.gif'/>");
	                },
	                success: function(data)  
	                {  
	                	$("#resultado_base").addClass('alert alert-success');
	                	$("#resultado_base").html(data) ;
	                	
	                	setTimeout(function(){
	                		$("#myModal").modal("hide");
	                		}, 2000);
 
	                	  
	                   
	                        
	                }  
	            });  
     
 });
	
	
	$('input[type=radio][name=tipo]').change(function() {
	
		
        if (this.value == '2') {
            $(".cenarios").hide();
        }
        else if (this.value == '1') {
        	 $(".cenarios").show();
        }
    });
	

	
	
	
	$("#enviar_status").click(function(){
		
		var id_responsavel=$("#responsavel").val();
		 var id_status=$('#status').val();
		 var id_demanda = $('#id_demanda').val();
		 var id_sub = $('#sub').val();
		 $("#enviar_status").prop( "disabled", true );
	       $.ajax({  
	                type: "POST",  
	                url: "includes/controller/CadastrarController.php",  
	                data: {id_demanda:id_demanda,id_responsavel: id_responsavel, id_status: id_status, id_sub:id_sub, acao:"alterar_status"},
	                beforeSend: function(){
	                	$("resultado_status").html("<img src='img/loading.gif'/>");
	                },
	                success: function(data)  
	                {  
	                	
	                	$("#resultado_status").addClass('label label-success span3');
	                    $("#resultado_status").html(data);
	                        
	                }  
	            });  
     
 });
	
	$("#enviar_sub_status").click(function(){
		
		var id_responsavel=$("#responsavel").val();
		 var id_status=$('#status').val();
		 var id_demanda = $('#id_demanda').val();
		 var id_sub = $('#sub').val();
		 $("#enviar_sub_status").prop( "disabled", true );
	       $.ajax({  
	                type: "POST",  
	                url: "includes/controller/CadastrarController.php",  
	                data: {id_responsavel: id_responsavel,id_demanda:id_demanda, id_status: id_status, id_sub:id_sub, acao:"alterar_status"},
	                beforeSend: function(){
	                	$("resultado_sub_status").html("<img src='img/loading.gif'/>");
	                },
	                success: function(data)  
	                {  
	                	
	                	$("#resultado_status").addClass('label label-success span3');
	                    $("#resultado_status").html(data);
	                        
	                }  
	            });  
    
});
	
	
	$("#codigo").mask("99999?-99999");

	$("#codigo_editar").mask("99999?-99999");
	
	$('#cenarios').mask("9?9");
	$('#cenarios_editar').mask("9?9");
	
    $("#voltar").click(function(){
           var novaURL = "painel.php ";
            $(window.document.location).attr('href',novaURL);
       
    });
    $("#cancelar").click(function(){
         $.ajax({  
                type: "POST",  
                url: "includes/controller/CadastrarController.php",  
                data: {acao:"inicio"},
                beforeSend: function(){
                    $('#resultado').html("<img src='img/loading.gif'/>");
                },
                success: function(data)  
                {  
                   
                    $("#corpo").html(data);
                        
                }  
            });  
        
    });
    $(".editar").click(function(){
      
        var id=$(this).val();
          
       $.ajax({  
                type: "POST",  
                url: "includes/controller/CadastrarController.php",  
                data: {id:id,acao:"editar"},
                beforeSend: function(){
                	$("#aguardaModal").modal();
                },
                success: function(data)  
                {  
                	$("#aguardaModal").modal("hide");
                    $("#corpo").html(data);
                        
                }  
            });  
        
    });
   
    
    $(".detalhar").click(function(){
        
        var id=$(this).val();
     //   window.parent.location='detalhar.php?id='+id;
        
        
       $.ajax({  
                type: "POST",  
                url: "includes/controller/CadastrarController.php",  
                data: {id:id,acao:"detalhar"},
                beforeSend: function(){
                	$("#aguardaModal").modal();
                },
                success: function(data)  
                {  
                	$("#aguardaModal").modal("hide");
                    $("#corpo").html(data);
                        
                }  
            });  
        
    });
    
$("#refresh").click(function(){
        
        var id=$(this).val();
        
       $.ajax({  
                type: "POST",  
                url: "includes/controller/CadastrarController.php",  
                data: {id:id,acao:"detalhar"},
                beforeSend: function(){
                	$("#aguardaModal").modal();
                },
                success: function(data)  
                {  
                	
                	$("#aguardaModal").modal("hide");
                    $("#corpo").html(data);
                        
                }  
            });  
        
    });
    
    
    //$("#data").mask("99/99/9999");
    $('#data').datepicker();
    
    $("div.holder").jPages({
        containerID : "clientes",
        previous : "←",
        next : "→",
        perPage : 6,
        delay : 6
    });
   
//Envio de comando pesquisar///////////////////////////////

  $('#search').validate({ 
           
      
            
        submitHandler: function( form ){  
               
            var dados = $( form ).serialize();  
  
            $.ajax({  
                type: "POST",  
                url: "includes/controller/CadastrarController.php",  
                data: dados,
                beforeSend: function(){
                    $('#tabela').html("<img src='img/loading.gif'/>");
                },
                success: function(data)  
                {  
                  
                    $("#tabela").html(data);
                        
                }  
            });  
  
            return false;  
        }
           
            
    }); 


/////////////////////////////////////////////////
                       
                       
                       
    
  var validate=  $('#form_cliente').validate({ 
           
        rules: {  
        	
        	 codigo: {
                 required: true,
                 remote: "valida.php"
             } ,
             cenarios: {
                 required: true
             } ,
        	
            nome:{
                required:true,
                remote: "valida.php"
            }
          
             
           
        },
        messages: {  
               
        	 codigo: {
                 required: 'Preencha o Código da Demanda!',
                 remote:jQuery.format("Código '{0}' já foi cadastrado")
             },
             
             cenarios: {
                 required: 'Preencha o Número de cenários!'
             },
        	
            nome: {
                required: 'Preencha o Nome da Demanda!',
                remote:jQuery.format("Nome '{0}' já foi cadastrado")
            } 
               
                
                         
  
        }, 
            
        submitHandler: function( form ){  
               
            var dados = $( form ).serialize();  
  
            $.ajax({  
                type: "POST",  
                url: "includes/controller/CadastrarController.php",  
                data: dados,
                beforeSend: function(){
                    $('#resultado').html("<img src='img/loading.gif'/>");
                },
                success: function(data)  
                {  
                    $('#resultado').addClass('alert alert-success');   
                    $('#resultado').html(data);   
                    validate.resetForm();
                    $('form').get(0).reset();
                        
                }  
            });  
  
            return false;  
        }
           
            
    });  
        					
    $('#form_cliente_editar').validate({ 
           
        rules: {  
        	 codigo_editar: {
                 required: true
             } ,
             cenarios_editar: {
                 required: true
             } ,
        	
            nome_editar:{
                required:true
            }
        },
        messages: {  
               
        	codigo_editar: {
                required: 'Preencha o Código da Demanda!'
            },
            
            cenarios_editar: {
                required: 'Preencha o Número de cenários!'
            },
       	
           nome_editar: {
               required: 'Preencha o Nome da Demanda!'
           }                
  
        }, 
            
        submitHandler: function( form ){  
               
            var dados = $( form ).serialize();  
  
            $.ajax({  
                type: "POST",  
                url: "includes/controller/CadastrarController.php",  
                data: dados,
                beforeSend: function(){
                    $('#resultado').html("<img src='img/loading.gif'/>");
                },
                success: function(data)  
                {  
                    $('#resultado').addClass('alert alert-success');   
                    $('#resultado').html(data);   
                    $('#voltar').html("<button class='btn' id='voltar'><i class='icon-arrow-left'></i>Voltar</button>");   
                    
                        
                }  
            });  
  
            return false;  
        }
           
            
    });  
        					
          
                   
    
});
        
         