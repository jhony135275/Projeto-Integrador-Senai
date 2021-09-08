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


$_iduser = $_POST['iduser'];

$_sql = "DELETE FROM cliente WHERE cod_cliente = '$_iduser'" ;

$_sql2 = "DELETE FROM telefone_cliente WHERE cod_cliente =  '$_iduser'";

$_sql3 = "DELETE FROM endereco_cliente  WHERE cod_cliente =  '$_iduser'";

$_query = mysqli_query($_conexao,$_sql) or die (mysqli_error($_conexao)); //query se torna uma variavel logica V OU F

$_query2 = mysqli_query($_conexao,$_sql2) or die (mysqli_error($_conexao)); //query se torna uma variavel logica V OU F


$_query3 = mysqli_query($_conexao,$_sql3) or die (mysqli_error($_conexao)); //query se torna uma variavel logica V OU F



if($_query&&$_query2&&$_query3)
{
	echo"<script>
            alert('Usuário deletado com sucesso!');
            window.location.href='../index.php';
            </script>";
            exit();
}
else
{
	

     echo"<script>
	    	alert('Erro ao deletar usuário');
	        window.location.href='telaexcluir.php';
	        </script>";
	        exit();
	        
  }


?>