<?php
session_start();
if(!isset($_SESSION['usuario_id'])){
    header("Location: ../login/login.php");
    exit;
}

include '../db/conexao.php';

if(!isset($_GET['id'])){
    header("Location: gerenciar_imoveis.php");
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM imoveis WHERE id = $id";
$result = mysqli_query($conexao, $sql);
$imovel = mysqli_fetch_assoc($result);

if(!$imovel){
    header("Location: gerenciar_imoveis.php");
    exit;
}

if(isset($_POST['salvar'])){
    $titulo = $_POST['titulo'];
    $endereco = $_POST['endereco'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];

    // Se enviou nova imagem
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0){
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $nomeImagem = uniqid() . "." . $extensao;
        move_uploaded_file($_FILES['imagem']['tmp_name'], "../uploads/imoveis/".$nomeImagem);
        $sqlUpdate = "UPDATE imoveis SET titulo='$titulo', endereco='$endereco', valor='$valor', tipo='$tipo', imagem='$nomeImagem' WHERE id=$id";
    } else {
        $sqlUpdate = "UPDATE imoveis SET titulo='$titulo', endereco='$endereco', valor='$valor', tipo='$tipo' WHERE id=$id";
    }

    if(mysqli_query($conexao, $sqlUpdate)){
        header("Location: gerenciar_imoveis.php");
        exit;
    } else {
        $erro = "Erro ao atualizar: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Imóvel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <style>
  body {
    background: #f1f3f9;
  }

  .sidebar {
    width: 250px;
    min-height: 100vh;
    background: #004AAD;
    position: fixed;
  }

  .sidebar h3 {
    color: #fff;
    padding: 20px;
    font-weight: bold;
  }

  .sidebar a {
    display: block;
    color: #fff;
    padding: 14px 20px;
    text-decoration: none;
    font-size: 17px;
  }

  .sidebar a:hover,
  .sidebar a.ativo {
    background: rgba(255, 255, 255, 0.15);
  }

  .content {
    margin-left: 260px;
    padding: 25px;
  }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h3>Sistema Imobiliário</h3>
    <a href="../painel/dashboard.php" class="<?= basename($_SERVER['PHP_SELF'])=='dashboard.php'?'ativo':'' ?>"><i
        class="fa-solid fa-house"></i> Dashboard</a>
    <a href="./cadastro_imoveis.php" class="<?= basename($_SERVER['PHP_SELF'])=='cadastro_imoveis.php'?'ativo':'' ?>"><i
        class="fa-solid fa-plus"></i> Cadastrar Imóvel</a>
    <a href="./gerenciar_imoveis.phpgerenciar_imoveis.php"
      class="<?= basename($_SERVER['PHP_SELF'])=='gerenciar_imoveis.php'?'ativo':'' ?>"><i class="fa-solid fa-list"></i>
      Gerenciar Imóveis</a>
    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
  </div>

  <!-- Conteúdo principal -->
  <div class="content">
    <h2>Editar Imóvel</h2>

    <?php if(isset($erro)): ?>
    <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" value="<?= $imovel['titulo'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Endereço</label>
        <input type="text" name="endereco" class="form-control" value="<?= $imovel['endereco'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Valor</label>
        <input type="number" name="valor" class="form-control" value="<?= $imovel['valor'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Tipo</label>
        <select name="tipo" class="form-select" required>
          <option value="alugar" <?= $imovel['tipo']=='alugar'?'selected':'' ?>>Alugar</option>
          <option value="comprar" <?= $imovel['tipo']=='comprar'?'selected':'' ?>>Comprar</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Imagem Atual</label><br>
        <img src="../uploads/imoveis/<?= $imovel['imagem'] ?>" width="200"><br><br>
        <label class="form-label">Nova Imagem (opcional)</label>
        <input type="file" name="imagem" class="form-control">
      </div>
      <button type="submit" name="salvar" class="btn btn-primary">Salvar Alterações</button>
      <a href="gerenciar_imoveis.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>

</body>

</html>