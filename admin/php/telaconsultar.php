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
	<title>CONSULTAR USUARIOS</title>
  <link rel="icon" href="../../imagens/logo%20final.jpg" sizes="64x64">

	
</head>
<body>

	<div class="fundo">
	
		<form method="post" action="telaconsultar" name="formconsultar" id="idformconsultar">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="../index.php">   
         Home
        </a>
         
      </nav>

			<div class="login-box">
                <br><br>
                <h1>Consultar</h1>
<?php

	if(isset($_POST['id']))
	{
		

		$_id = $_POST['id'];
		$_sql = "SELECT * FROM cliente WHERE cod_cliente='$_id'";
		$_query = mysqli_query($_conexao , $_sql) or die (mysqli_error($_conexao));
		$_line = mysqli_fetch_array($_query);



		$_sql2 =  "SELECT * FROM endereco_cliente WHERE cod_cliente='$_id'";
		$_query2 = mysqli_query($_conexao , $_sql2) or die (mysqli_error($_conexao));
		$_line2 = mysqli_fetch_array($_query2);


		$_sql3 = "SELECT * FROM telefone_cliente WHERE cod_cliente='$_id'";
		$_query3 = mysqli_query($_conexao , $_sql3) or die (mysqli_error($_conexao));
		$_line3 = mysqli_fetch_array($_query3);


		

?>

		 <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" name="id" id="id" placeholder="ID" value="<?php echo $_line['cod_cliente']?>">
             
        </div>

        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" name="login" placeholder="Username" value="<?php echo $_line['user']?>">
             
        </div>


         <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="text" name="password" placeholder="Password" value="<?php echo $_line['password']?>">
             
        </div>

        <div class="textbox">
           <i class="far fa-address-card"></i>
            <input type="text" name="cpf" placeholder="CPF" value="<?php echo $_line['CPF']?>">
             
        </div>	

        <div class="textbox">
          <i class="fas fa-map-marked-alt"></i>
            <input type="text" name="cep" placeholder="CEP" value="<?php echo $_line2['CEP']?>">
             
        </div>	

        <div class="textbox">
          <i class="fas fa-map-marked-alt"></i>
            <input type="text" name="cidade" placeholder="Cidade" value="<?php echo $_line2['cidade']?>">
             
        </div>	


        <div class="textbox">
          <i class="fas fa-map-marked-alt"></i>
            <input type="text" name="rua" placeholder="Rua" value="<?php echo $_line2['rua']?>">
             
        </div>	

         <div class="textbox">
          <i class="fas fa-map-marked-alt"></i>
           <input type="text" name="bairro" placeholder="Bairro" value="<?php echo $_line2['bairro']?>">
             
        </div>	

         <div class="textbox">
          <i class="fas fa-map-marked-alt"></i>
          <input type="text" name="numero" placeholder="Numero" value="<?php echo $_line2['numero']?>">
             
        </div>	

         <div class="textbox">
           <i class="fas fa-mobile-alt"></i>
         <input type="text" name="telefone" placeholder="(DD)XXXXX-XXXX" value="<?php echo $_line3['telefone']?>">
             
        </div>	


<?php
	}
	else
	{

?>
		

		<div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" name="id" id="id" placeholder="ID" value="<?php echo $_id ?>">
             
        </div>

        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" name="login" placeholder="Username">
             
        </div>


         <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" name="password" placeholder="Password"> 
             
        </div>

        <div class="textbox">
           <i class="far fa-address-card"></i>
            <input type="text" name="cpf" placeholder="CPF"> 
             
        </div>	

        <div class="textbox">
          <i class="fas fa-map-marked-alt"></i>
            <input type="text" name="cep" placeholder="CEP"> 
             
        </div>	

        <div class="textbox">
          <i class="fas fa-map-marked-alt"></i>
            <input type="text" name="cidade" placeholder="Cidade">
             
        </div>	


        <div class="textbox">
          <i class="fas fa-map-marked-alt"></i>
            <input type="text" name="rua" placeholder="Rua"> 
             
        </div>	

         <div class="textbox">
          <i class="fas fa-map-marked-alt"></i>
           <input type="text" name="bairro" placeholder="Bairro"> 
             
        </div>	

         <div class="textbox">
          <i class="fas fa-map-marked-alt"></i>
          <input type="text" name="numero" placeholder="Numero">
             
        </div>	

         <div class="textbox">
          <i class="fas fa-mobile-alt"></i>
         <input type="text" name="telefone" placeholder="(DD)XXXXX-XXXX"> 
             
        </div>	
		

<?php
	}
?>

		
		

		<input type="submit" class="btn" value="CONSULTAR">

		

		<!--<p><input type="reset" name="btnlimpar" id="idbtnlimpar" value="Limpar"></p>-->



		</form>

	</div>



		

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>



</body>
</html>