<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>LOGIN</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">    
    </head>
     <body>
         <div class="bg-gradient">
            
        <nav>
            <ul class="um">
                <li><a href="../index.html">Home</a></li>
                <li><a href="../html/contato.html">Contato</a></li>
                <li><a href="teladeprodutos.php">Tela de produtos</a></li>
                <link rel="icon" href="../imagens/logo%20final.jpg" sizes="64x64">
                <!--<li><a href="php/login.php">Login</a></li> -->

            </ul>
        </nav>
    </div>
        <div class="fundo">
        <form method="post" name="formulario" action="autenticar.php">
            
            <div class="login-box">
                <br><br><br><br><br><br><br><br>
              <h1>Login</h1>
              <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="login" id="idlogin"  autocomplete="on" autofocus required>
              </div>

              <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" id="idpassword" autocomplete="off" required>
              </div>

              <input type="submit" class="btn" value="LOGAR">
        
              <a href="telacadastro.php"> <input class="btn2" value="CADASTRE-SE"> </a>
         
            </div>
        </form>
        </div>
       
    </body>
</html>