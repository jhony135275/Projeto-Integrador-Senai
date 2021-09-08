<?php
    $_host = "localhost"; //dependendo pode ser "localhost:3308"
    $_user = "root";
    $_password = "";
    $_database = "projeto";

    $_conexao = mysqli_connect( $_host , $_user , $_password ) or die ( mysqli_error() );
    //antigamente era mysql_connect()

    mysqli_select_db( $_conexao , $_database) or die ( mysqli_error() );
?>

