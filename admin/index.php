<?php
    include_once("../db/conexao.php");
    session_start();

    if( !isset( $_SESSION["adm"] ) && !isset( $_SESSION["senha"] ) )
    {
        header( "location: php/login.php" );
        
        exit; // encerra todas as funções da página...
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Adm</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
   

	<style type="text/css">
	
          
	</style>
	<link rel="icon" href="../imagens/logo%20final.jpg" sizes="64x64">
</head>
<body>

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    
         <ul class="navbar-nav mr-auto"> <!--classe mr-auto (margin-right:auto) faz o espaçamento automático entre cada item do menu -->       

          <li class="nav-item dropdown navbar-brand" >
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">CRUD</a>

            <div class="dropdown-menu">
              <a class="dropdown-item" href="php/telainserir.php">Inserir um Usuário</a>
              <a class="dropdown-item" href="php/telaconsultar.php">Consultar um Usuário</a>
              <a class="dropdown-item" href="php/telaatualizar.php">Atualizar um Usuário</a>
              <a class="dropdown-item" href="php/telaexcluir.php">Excluir um usuario</a>             
            </div>
            
          </li>

        <li class="nav-item dropdown navbar-brand" >
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Listar</a>

            <div class="dropdown-menu">
              <a class="dropdown-item" href="php/telalistaitenscat.php">Listar Itens por categorias</a>
              <a class="dropdown-item" href="php/telalistaitensforn.php">Listar Itens por Fornecedor</a>
              <a class="dropdown-item" href="php/telalistapedidostatus.php">Listar Pedidos por Status</a>
                        
            </div>
            
          </li>

          <li class="nav-item navbar-brand">
            <a class="nav-link" href="php/logout.php">Sair</a>
          </li>
        

        </ul>

    </nav>

    <div class="jumbotron">
          <h1 class="display-1">Bem vindo!</h1>
          <p class="lead">Tela destinada ao ADM do sistema</p>
          <hr class="my-4">
          <p>O ADM pode realizar o CRUD do sistema, navegar pelo site e listar itens e pedidos</p>
         

               
          <!-- Modal -->
          <div id="meuModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                  
                <div class="modal-content">                
                  <div class="modal-header">
                    <h4 class="modal-title">Nokia</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                     
                  <div class="modal-body">
                    <p>A Nokia é uma empresa multinacional finlandesa fundada em 12 de maio de 1865 como uma única operação de fábrica de papel. No século XIX, a empresa se expandiu, ramificando-se em vários produtos diferentes. Em 1967, a corporação Nokia foi formada. </p>
                         
                  </div>        

                </div>
              </div>
          </div>
          
      </div>

             <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script> 

	

	


	

</body>
</html>