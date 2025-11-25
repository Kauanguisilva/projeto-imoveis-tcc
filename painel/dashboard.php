<?php
session_start();
if(!isset($_SESSION['usuario_id'])){
    header("Location: ../login/login.php");
    exit;
}

// Função para definir link ativo
function ativo($arquivo){
    return basename($_SERVER['PHP_SELF']) == $arquivo ? 'ativo' : '';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Painel Administrativo</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
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
    transition: 0.3s;
  }

  .sidebar a:hover {
    background: rgba(255, 255, 255, 0.15);
  }

  .sidebar a.ativo {
    background: rgba(255, 255, 255, 0.3);
    font-weight: bold;
  }

  .content {
    margin-left: 260px;
    padding: 25px;
  }

  .card {
    cursor: pointer;
    transition: .3s;
  }

  .card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.25);
  }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h3>Sistema Imobiliário</h3>
    <a href="dashboard.php" class="<?= ativo('dashboard.php') ?>"><i class="fa-solid fa-house"></i> Dashboard</a>
    <a href="../imoveis/cadastro_imoveis.php" class="<?= ativo('cadastro_imoveis.php') ?>"><i
        class="fa-solid fa-plus"></i> Cadastrar Imóvel</a>
    <a href="../imoveis/gerenciar_imoveis.php" class="<?= ativo('gerenciar_imoveis.php') ?>"><i
        class="fa-solid fa-list"></i> Gerenciar Imóveis</a>
    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
  </div>

  <!-- Conteúdo principal -->
  <div class="content">
    <h2 class="fw-bold mb-4">Bem-vindo, <?= $_SESSION['usuario_nome']?> 👋</h2>

    <div class="row g-4">

      <!-- Card: Cadastrar Imóvel -->
      <div class="col-md-4">
        <div class="card p-4 text-center" onclick="window.location='../imoveis/cadastro_imoveis.php'">
          <i class="fa-solid fa-plus fa-3x mb-3"></i>
          <h5 class="fw-bold">Cadastrar Imóvel</h5>
        </div>
      </div>

      <!-- Card: Gerenciar Imóveis -->
      <div class="col-md-4">
        <div class="card p-4 text-center" onclick="window.location='../imoveis/gerenciar_imoveis.php'">
          <i class="fa-solid fa-pen-to-square fa-3x mb-3"></i>
          <h5 class="fw-bold">Gerenciar Imóveis</h5>
        </div>
      </div>

    </div>
  </div>

</body>

</html>