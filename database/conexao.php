<?php 

    $servername = 'iisoul-cadastro-db-1';
    $username = 'root';
    $password = 'root';
    $db = 'public';

    $conexao = NEW mysqli($servername,$username,$password,$db);

    if($conexao->connect_errno){
        die("Erro na conexão com o banco de dados" . $conexao->connect_errno);    
    }
    return $conexao;
    /*else{
        echo "conexao efetuada com sucesso";
    }*/
    
    
?>