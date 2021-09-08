<?php

     include_once("../../db/conexao.php");
    session_start();

    if( !isset( $_SESSION["adm"] ) && !isset( $_SESSION["senha"] ) )
    {
        header( "location: login.php" );
        
        exit; // encerra todas as funções da página...
    }
?>


<!DOCTYPE html>
<html>
	<head>
		<title>INSERIR USUARIOS</title>
    <link rel="icon" href="../../imagens/logo%20final.jpg" sizes="64x64">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        
		<script type="text/javascript" src="../../js/1.5.2.js"></script>
		<script type="text/javascript" src="../../js/jquery.maskedinput-1.3.min.js"></script>
		<script type="text/javascript" src="../../js/funcoes.js"></script>
        <link rel="stylesheet" type="text/css" href="../../css/style.css"> 
		<script>
			jQuery(function($){
			       $("#idcpf").mask("999.999.999-99");
			       $("#idcep").mask("99.999-999");
			       $("#idtelefone").mask("(99)99999-9999");
			       
				   
			});
		</script>
        
       
	</head>
	<body>


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="../index.php">   
         Home
        </a>
         
      </nav>
		
			<div class="fundo">
        
            <form method="post" action="inserir.php" name="forminserir" id="forminserir">
                     <div class="login-box">
                         <br><br><br>
                        <h1>Inserir</h1>
                        <div class="textbox">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="login" id="idlogin"    maxlength="10" required>
                       </div>

                       <div class="textbox">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="idpassword"   maxlength="10" required placeholder="Password">
                       </div>

                        <div class="textbox">
                        <i class="far fa-address-card"></i>

                        <input type="text" name="cpf" id="idcpf" autocomplete="off"  maxlength="14" placeholder="CPF" onblur="validaCPF(forminserir.cpf)" required>
                       </div>

                      
                        <div class="textbox">
                        <i class="fas fa-map-marked-alt"></i>



                        <input type="text" name="cidade" id="idcidade" autocomplete="off"  maxlength="30" onkeypress="return somenteLetra()" required placeholder="Cidade">
                       </div>



                       <div class="textbox">
                       <i class="fas fa-map-marked-alt"></i>



                        <input type="text" name="rua" id="idrua" autocomplete="off"  maxlength="30" onkeypress="return somenteLetra()" required placeholder="Rua">
                       </div>


                       <div class="textbox">
                      <i class="fas fa-map-marked-alt"></i>


                        <input type="text" name="bairro" id="idbairro" autocomplete="off"  maxlength="20" onkeypress="return somenteLetra()" required placeholder="Bairro">
                       </div>


                       <div class="textbox">
                        <i class="fas fa-map-marked-alt"></i>

                       <input type="text" name="numero" id="idnumero" autocomplete="off"  maxlength="5" onkeypress="return somenteNumeros()"required placeholder="Numero">
                       </div>

                       <div class="textbox">
                       <i class="fas fa-map-marker-alt"></i>
                       
                       <input type="text" name="cep" id="idcep"autocomplete="off"  maxlength="8" placeholder="XX.XXX-XXX" onkeypress="return somenteNumeros()" required placeholder="CEP" autocomplete="off">
                       </div>

                

                      <div class="textbox">
                       <i class="fas fa-mobile-alt"></i>

                       <input type="text" name="telefone" id="idtelefone"autocomplete="off"  maxlength="11" placeholder="(DD)XXXXX-XXXX" onkeypress="return somenteNumeros()" required placeholder="Telefone">
                       </div>

                    

                    <input type="submit" class="btn" value="INSERIR">
        
                    

                    </div>
                                 
                                    
            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
						
	
	</body>
</html>