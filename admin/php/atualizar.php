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
    

    $_id = $_POST['id'];
    $_login  = $_POST['login'];
    $_password  = $_POST['password'];
    $_cpf = $_POST['cpf'];
    $_cidade = $_POST['cidade'];
    $_rua = $_POST['rua'];
    $_bairro = $_POST['bairro'];
    $_numero = $_POST['numero'];
    $_cep = $_POST['cep'];
    $_telefone = $_POST['telefone'];
    //$_password = md5( $_password );

    $_sql = "UPDATE cliente SET user = '$_login' , password = '$_password' , CPF = '$_cpf' WHERE cod_cliente = '$_id'";

    $_sql2 = "UPDATE endereco_cliente SET cidade ='$_cidade' , rua = '$_rua' , bairro = '$_bairro',  numero = '$_numero',  CEP = '$_cep' WHERE cod_cliente = '$_id'";

   

    $_sql3 = "UPDATE  telefone_cliente SET telefone = '$_telefone'  WHERE cod_cliente = '$_id'";


    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error($_conexao) );

    $_query2 = mysqli_query($_conexao,$_sql2) or die (mysqli_error($_conexao)); //query se torna uma variavel logica V OU F

    $_query3 = mysqli_query($_conexao,$_sql3) or die (mysqli_error($_conexao)); //query se torna uma variavel logica V OU F


    if($_query && $_query2 && $_query3)
    {
        echo"<script>
            alert('Usuário alterado com sucesso!');
            window.location.href='../index.php';
            </script>";
            exit();
    }
    else
    {
        echo"<script>
            alert('Erro ao alterar usuário');
            window.location.href='telaatualizar.php.php';
            </script>";
            exit();
        
    }

?>