<?php 

include_once(__DIR__ . '../../database/conexao.php');

$acao = base64_decode($_POST['acao']);

switch ($acao){
    case 'logar':
        logar($conexao);
        break;
    }

function logar($conexao){

    try{
        define('status', 'status');
        define('msg', 'msg');

        $email  = $_POST['email'];
        $senha  = base64_decode($_POST['senha']);
        
        if($email == ''){
            $mensagem = 'Preencha o campo email';
            $resposta = array(status => false, msg => $mensagem);
            return json_encode($resposta);
            exit;
        }
        if($senha == ''){
            $mensagem = 'Preencha o campo senha';
            $resposta = array(status => false, msg => $mensagem);
            return json_encode($resposta);
            exit;
        }
        
        $sql = "SELECT email, senha FROM public.usuarios WHERE email='$email' AND senha='$senha' ";
        $resultado = mysqli_query($conexao, $sql);
       
       
        if (mysqli_num_rows($resultado) >0 ){
            $mensagem = 'Login feito com sucesso';
            $resposta = array(status =>true, msg => $mensagem);
        }else{
            $mensagem = 'Erro ao fazer o login, verifique seu email e senha';
            $resposta = array(status =>false, msg => $mensagem);
            }

        mysqli_close($conexao);
        echo json_encode($resposta);
    
    } catch (Exception $e) {
        $mensagem = 'Erro ao se comunicar com servidor ' . $e->getMessage();
        $resposta = array(status =>false, msg => $mensagem);
        echo json_encode($resposta);
    }
}

?>