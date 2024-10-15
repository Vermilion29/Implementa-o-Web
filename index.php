<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'aplicacaoweb';

    $conexao = new mysqli ($dbHost,$dbUsername,$dbPassword,$dbName);

   /* if($conexao->connect_errno){
       echo "Erro";
   } else {
       echo "conexão efetuada com sucesso";
    }
*/
?>