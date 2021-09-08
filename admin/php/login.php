<!DOCTYPE html>
<html lang="pt-br">

    <head>
         <link rel="stylesheet" type="text/css" href="../../css/style.css">  
         <link rel="icon" href="../../imagens/logo%20final.jpg" sizes="64x64">
        <meta charset="utf-8">
        <title>adm</title>
        
    </head>
    <body>
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
        
             
         
            </div>
        </form>
        </div>
            
        
        
    </body>
</html>