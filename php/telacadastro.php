<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro</title>
        
        <script type="text/javascript" src="../js/1.5.2.js"></script>
        <script type="text/javascript" src="../js/jquery.maskedinput-1.3.min.js"></script>
        <script type="text/javascript" src="../js/funcoes.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" href="../imagens/logo%20final.jpg" sizes="64x64">
        <script>
            jQuery(function($){
                   $("#idcpf").mask("999.999.999-99");
                   $("#idcep").mask("99.999-999");
                   $("#idtelefone").mask("(99)99999-9999");
                   
                   
            });
        </script>

    </head>
    <body>
        <div class="bg-gradient">
            
        <nav>
            <ul class="um">
                <li><a href="../index.html">Home</a></li>
                <li><a href="../html/contato.html">Contato</a></li>
                <li><a href="teladeprodutos.php">Tela de produtos</a></li>
                <!--<li><a href="php/login.php">Login</a></li> -->

            </ul>
        </nav>
    </div>
         <div class="fundo">
        
            <form method="post" action="cadastro.php" name="formcadastro" id="formcadastro">
                     <div class="login-box">
                         <br><br><br><br><br>
                        <h1>Cadastro</h1>
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

                        <input type="text" name="cpf" id="idcpf" autocomplete="off"  maxlength="14" placeholder="CPF" onblur="validaCPF(formcadastro.cpf)" required>
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

                    

                    <input type="submit" class="btn" value="CADASTRAR">
        
                    <a href="login.php"> <input class="btn2" value="LOGIN"> </a>

                    </div>
                                 
                                    
            </form>

        </div>

            <br><br>
            
    </body>
</html>