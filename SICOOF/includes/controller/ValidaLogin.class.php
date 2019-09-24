<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValidaLogin
 *
 * @author titopsn
 */
class ValidaLogin {
    
    function ValdidarLogin(){
     if(isset($_SESSION['login'])){


}else{
    
    $_SESSION["erro"]=2;
 echo"<script> window.parent.location='index.php';</script>";
}     
        
    }
   
    
    }

?>
