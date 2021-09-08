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
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script type="text/javascript" src="../../js/1.5.2.js"></script>
        <script type="text/javascript" src="../../js/jquery.maskedinput-1.3.min.js"></script>
        <script type="text/javascript" src="../../js/funcoes.js"></script>
        <link rel="stylesheet" type="text/css" href="../../css/style.css"> 
        <link rel="icon" href="../../imagens/logo%20final.jpg" sizes="64x64">
        
        <script>
            jQuery(function($){
                   $("#idcpf").mask("999.999.999-99");
                   $("#idcep").mask("99.999-999");
                   $("#idtelefone").mask("(99)99999-9999");
                   
                   
            });
        </script>
        
        <title>ATUALIZAR DADOS</title>
    </head>
    <body>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="../index.php">   
         Home
        </a>
         
      </nav>
       


            <?php
                if( isset( $_POST['id'] ) )
                {
                   


                    
                    $_id = $_POST['id'];
                    
                    $_sql = "SELECT * FROM cliente WHERE cod_cliente = '$_id'";

                    $_sql2 = "SELECT * FROM endereco_cliente WHERE cod_cliente = '$_id'";

                    $_sql3 = "SELECT * FROM telefone_cliente WHERE cod_cliente = '$_id'";


                    
                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error($_conexao) );

                    $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error($_conexao) );

                    $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error($_conexao) );

                    
                    $_line = mysqli_fetch_array( $_query); 

                    $_line2 = mysqli_fetch_array( $_query2); 

                    $_line3 = mysqli_fetch_array( $_query3); 
 
            ?>

                <div class="fundo">
                    <form method="post" action="atualizar.php" name="formatualizar" id="formatualizar">


                        <div class="login-box">

                            <br><br><br>
                            <h1>Atualizar</h1>


                        <div class="textbox">
                            <i class="fas fa-user"></i>

                            <input type="text" name="id" id="id" value="<?php echo $_line['cod_cliente']?>" placeholder="ID">
                       
                       </div>

                       <div class="textbox">
                            <i class="fas fa-user"></i>

                            <input type="text" name="login" value="<?php echo $_line['user']?>" placeholder="Username">
                       
                       </div>

                      

                       <div class="textbox">
                            <i class="fas fa-lock"></i>

                           <input type="text" name="password" value="<?php echo $_line['password']?>" placeholder="password">
                       
                       </div>

                       <div class="textbox">
                             <i class="fas fa-user"></i>

                           <input type="text" name="cpf" onblur="validaCPF(formatualizar.cpf)" id="idcpf" value="<?php echo $_line['CPF']?>" placeholder="CPF">
                       
                       </div>

                       <div class="textbox">
                        <i class="fas fa-map-marked-alt"></i>


                        <input type="text" onkeypress="return somenteNumeros()" name="cep" id="cep" value="<?php echo $_line2['CEP']?>" placeholder="CEP" >

                       </div>


                       <div class="textbox">
                        <i class="fas fa-map-marked-alt"></i>


                       <input type="text" onkeypress="return somenteLetra()"  name="cidade" value="<?php echo $_line2['cidade']?>" placeholder="Cidade" >

                       </div>


                        <div class="textbox">
                        <i class="fas fa-map-marked-alt"></i>


                        <input type="text" name="rua" onkeypress="return somenteLetra()"  value="<?php echo $_line2['rua']?>" placeholder="Rua" >

                       </div>

                        <div class="textbox">
                        <i class="fas fa-map-marked-alt"></i>


                        <input type="text" name="bairro" onkeypress="return somenteLetra()"  value="<?php echo $_line2['bairro']?>" placeholder="Bairro" >

                       </div>

                        <div class="textbox">
                        <i class="fas fa-map-marked-alt"></i>


                        <input type="text" onkeypress="return somenteNumeros()" name="numero" value="<?php echo $_line2['numero']?>"  placeholder="Numero" >

                       </div>

                       <div class="textbox">
                        <i class="fas fa-map-marked-alt"></i>


                        <input type="text" onkeypress="return somenteNumeros()" name="numero" value="<?php echo $_line2['numero']?>"  placeholder="Numero" >

                       </div>


                        <div class="textbox">
                       <i class="fas fa-mobile-alt"></i>

                        <input type="text" onkeypress="return somenteNumeros()" name="telefone" value="<?php echo $_line3['telefone']?>" placeholder="Telefone">
                       </div>


                         <input type="submit" class="btn" name="btnconsultar" id="idbtnconsultar" value="Atualizar">

                         <input type="reset"  class="btn" name="btnlimpar" id="idbtnlimpar" value="Limpar">

                      </div>
                    </form>

                </div>
            <?php
                }
                else
                {
            ?>

                <div class="fundo">
                    <form method="post" action="telaatualizar.php" name="atualizar" id="idforatualizar">

                        <div class="login-box">

                            <br><br><br><br><br>
                            <h1>Atualizar</h1>

                            <div class="textbox">
                            <input type="text" name="id" placeholder="ID" id="id" value="<?php echo $_id ?>" onkeypress="return somenteNumeros()" >
                            </div>

            
                            <p><input type="submit" class="btn" name="btnconsultar" id="idbtnconsultar" value="Atualizar"></p>
                            <p><input type="reset"  class="btn" name="btnlimpar" id="idbtnlimpar" value="Limpar"></p>

                        </div>

                       
                    </form>
                </div>
                        <?php
                            }
                        ?>
                        

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script> 
      
    </body>
</html>