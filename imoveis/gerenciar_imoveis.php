<!-- COLOCAR ENVIO NOTIFICACAO EM TEMPO REAL / PAGINA DO IMOVEL -->

<?php
session_start();
if(!isset($_SESSION['usuario_id'])){
    header("Location: ../login/login.php");
    exit;
}

include '../db/conexao.php'; // ajuste conforme sua estrutura

// Buscar todos os imóveis
$query = "SELECT * FROM imoveis ORDER BY id DESC";
$result = mysqli_query($conexao, $query);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Gerenciar Imóveis</title>

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
  }

  .sidebar a:hover {
    background: rgba(255, 255, 255, 0.15);
  }

  .content {
    margin-left: 260px;
    padding: 25px;
  }

  .table img {
    width: 100px;
    border-radius: 8px;
  }
  </style>
</head>

<body>

  <div class="sidebar">
    <h3>Sistema Imobiliário</h3>
    <a href="../painel/dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
    <a href="../imoveis/cadastro_imoveis.php"><i class="fa-solid fa-plus"></i> Cadastrar Imóvel</a>
    <a href="gerenciar_imoveis.php"><i class="fa-solid fa-list"></i> Gerenciar Imóveis</a>
    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
  </div>

  <div class="content">
    <h2 class="fw-bold mb-4">Gerenciar Imóveis</h2>

    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Título</th>
            <th>Endereço</th>
            <th>Preço</th>
            <th>Tipo</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php if(mysqli_num_rows($result) > 0): ?>
          <?php while($imovel = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $imovel['id'] ?></td>
            <td><img src="../uploads/imoveis/<?= $imovel['imagem'] ?>" alt="<?= $imovel['titulo'] ?>"></td>
            <td><?= $imovel['titulo'] ?></td>
            <td><?= $imovel['endereco'] ?></td>
            <td>R$ <?= number_format($imovel['valor'], 0, ',', '.') ?></td>
            <td><?= ucfirst($imovel['tipo']) ?></td>
            <td>
              <a href="editar_imovel.php?id=<?= $imovel['id'] ?>" class="btn btn-sm btn-primary">
                <i class="fa-solid fa-pen"></i>
              </a>
              <a href="excluir_imovel.php?id=<?= $imovel['id'] ?>" class="btn btn-sm btn-danger"
                onclick="return confirm('Deseja realmente excluir este imóvel?')">
                <i class="fa-solid fa-trash"></i>
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
          <?php else: ?>
          <tr>
            <td colspan="7" class="text-center">Nenhum imóvel cadastrado.</td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>