<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include '../db/conexao.php'; // Certifique-se de que conexao.php está na raiz SFIMOVEIS

if(isset($_POST['login'])){
   
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $resultado = $conexao->query($sql);

    if($resultado->num_rows == 1){
        $usuario = $resultado->fetch_assoc();

        if(password_verify($senha, $usuario['senha'])){            
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            header("Location: /SFIMOVEIS/painel/dashboard.php");
            exit();

        } else {
            echo "<script>alert('Senha incorreta!'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('Usuário não encontrado!'); window.history.back();</script>";
    }
    
} else {
    echo "<script>alert('Acesso inválido!'); window.location.href='login.php';</script>";
}