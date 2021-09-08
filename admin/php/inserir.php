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


$_login  = $_POST['login'];
$_password  = $_POST['password'];
$_cpf = $_POST['cpf'];
$_cidade = $_POST['cidade'];
$_rua = $_POST['rua'];
$_bairro = $_POST['bairro'];
$_numero = $_POST['numero'];
$_cep = $_POST['cep'];
$_telefone = $_POST['telefone'];
//$_password = md5($_password); //criptografar a senha

if( $_login == null|| $_password == null || $_cpf == null|| $_cidade == null|| $_rua == null|| $_bairro == null|| $_numero == null|| $_cep == null || $_telefone ==null)
    {
        echo"<script>
        alert('Preencha os campos corretamente');
        window.location.href='telainserir.php';
        </script>";
        exit();
    }
$_password = md5($_password);
$_login = md5($_login);

$_sql = "INSERT INTO cliente(user,password,CPF) VALUES ('$_login','$_password','$_cpf')";

$_query = mysqli_query($_conexao,$_sql) or die (mysqli_error($_conexao)); //query se torna uma variavel logica V OU F

$_sql4 = "SELECT * FROM cliente ORDER BY cod_cliente DESC LIMIT 1";

$_query4 = mysqli_query($_conexao,$_sql4) or die (mysqli_error($_conexao));

$_line = mysqli_fetch_array($_query4);

$_id = $_line['cod_cliente']; 

$_sql2 = "INSERT INTO endereco_cliente(cod_cliente,cidade,rua,bairro,numero,CEP) VALUES ('$_id','$_cidade','$_rua','$_bairro','$_numero','$_cep')";

$_sql3 = "INSERT INTO telefone_cliente(cod_cliente,telefone)  VALUES  ('$_id','$_telefone');";


$_query2 = mysqli_query($_conexao,$_sql2) or die (mysqli_error($_conexao)); //query se torna uma variavel logica V OU F

$_query3 = mysqli_query($_conexao,$_sql3) or die (mysqli_error($_conexao)); //query se torna uma variavel logica V OU F


if($_query && $_query2 && $_query3)
{
	echo"<script>
        alert('Usuário cadastrado com sucesso');
        window.location.href='../index.php';
        </script>";
        exit();
}
else
{
	echo"<script>
        alert('Erro ao cadastrar usuário');
        window.location.href='telainserir.php';
        </script>";
        exit();
	
}


?>