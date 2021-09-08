<?php

     include_once("../../db/conexao.php");
    session_start();

    if( !isset( $_SESSION["adm"] ) && !isset( $_SESSION["senha"] ) )
    {
        header( "location: login.php" );
        
        exit; // encerra todas as funções da página...
    }
?>

<?php
	@$_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../../css/style.css">  
		<title>excluir USUARIOS</title>

		<link rel="icon" href="../../imagens/logo%20final.jpg" sizes="64x64">
	</head>
	<body>
		 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="../index.php">   
         Home
        </a>
         
      </nav>
		 <div class="fundo">
		
			<form method="post" action="excluir.php" name="formexcluir" id="idformexcluir">

				<div class="login-box">
                <br><br><br><br><br>
             	<h1>Excluir</h1>

             	<div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="iduser" value="<?php echo $_id; ?>"  placeholder="ID" required> 

               
              	</div>
	

				<input type="submit" class="btn" name="btnExcluir" id="idbtnExcluir" value="Excluir">

				<input type="reset" class="btn" name="btnlimpar" id="idbtnlimpar" value="Limpar">

				</div>
			</form>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script> 
	</body>
</html>