<?php
    
    session_start();

    unset( $_SESSION['adm'] );
    unset( $_SESSION['senha'] );

    session_destroy();

    header( "location:login.php" );
?>