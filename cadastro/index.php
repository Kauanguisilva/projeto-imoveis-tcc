<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Cadastro de Usuário</h2>

    <form method="POST" action="">
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="email" name="email" placeholder="E-mail" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>

        <button type="submit" name="salvar">Cadastrar</button>
    </form>

</body>
</html>

<?php
if(isset($_POST['salvar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografar senha

    $sql = "INSERT INTO usuarios (nome, email, senha)
            VALUES ('$nome', '$email', '$senha')";

    if ($conexao->query($sql) === TRUE) {
        echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
    } else {
        echo "Erro: " . $conexao->error;
    }
}
?>
