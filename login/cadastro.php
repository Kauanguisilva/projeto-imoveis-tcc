<?php
include_once("../db/conexao.php");

// Pegando dados do formulário
$nome  = $_POST['nome'];
$email = $_POST['email'];

// Criptografando a senha corretamente
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// Inserindo no banco
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if (mysqli_query($conexao, $sql)) {
    // Se deu certo → redireciona para o login
    header("Location: login.php?msg=cadastro_sucesso");
    exit();
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}
?>