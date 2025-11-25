<?php
include '../db/conexao.php';

// Verifica se recebeu um ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Imóvel não encontrado!'); window.location.href='../index.php';</script>";
    exit;
}

$id = intval($_GET['id']); // segurança

// Buscar dados do imóvel
$sql = "SELECT * FROM imoveis WHERE id = $id LIMIT 1";
$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Imóvel não encontrado!'); window.location.href='../index.php';</script>";
    exit;
}

$imovel = mysqli_fetch_assoc($result);

// Buscar imagens do imóvel
$sql_img = "SELECT nome_imagem FROM imagens_imovel WHERE id_imovel = $id ORDER BY id ASC";
$imgs_result = mysqli_query($conexao, $sql_img);

$imagens = [];
while ($img = mysqli_fetch_assoc($imgs_result)) {
    $imagens[] = $img['nome_imagem'];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $imovel['titulo'] ?> - S.F Imóveis</title>

  <link rel="icon" href="../img/logo.png" />
  <link rel="stylesheet" href="../style.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
</head>

<body>

  <!-- Botão WhatsApp -->
  <a href="https://wa.me/5516997382695?text=Tenho interesse no imóvel: <?= urlencode($imovel['titulo']) ?>"
    target="_blank" class="whatsapp-btn">
    <i class="fab fa-whatsapp"></i>
  </a>

  <!-- Cabeçalho -->
  <header>
    <nav>
      <div class="logo"><img src="../img/logo.png" alt="Logo"></div>
      <div class="BotaoLogin">
        <a href="../login/login.php">
          <button>Cadastre-se / Login</button>
        </a>
      </div>
    </nav>
  </header>

  <!-- Título -->
  <nav class="filtro-wrapper">
    <div class="tabs">
      <button class="tab ativada">Detalhes do Imóvel</button>
    </div>

    <div class="Barrapesquisa">
      <div class="buscar">
        <label for="endereco">BUSCAR ENDEREÇO</label>
        <input type="text" placeholder="Buscar cidade, bairro, condomínio ou código" />
      </div>
    </div>
  </nav>

  <!-- Conteúdo -->
  <div class="container" style="padding: 20px; max-width: 1200px; margin: auto;">

    <!-- Galeria -->
    <div class="galeria" style="display: flex; gap: 15px; overflow-x: auto; padding-bottom: 10px;">

      <?php if (count($imagens) > 0): ?>
      <?php foreach ($imagens as $img): ?>
      <img src="../uploads/imoveis/<?= $img ?>" alt="Imagem do imóvel"
        style="height: 300px; border-radius: 8px; object-fit: cover;">
      <?php endforeach; ?>
      <?php else: ?>
      <!-- Caso ainda tenha imagem antiga salva na tabela imoveis -->
      <img src="../uploads/imoveis/<?= $imovel['imagem'] ?>" alt="Imagem principal"
        style="height: 300px; border-radius: 8px;">
      <?php endif; ?>

    </div>

    <!-- Informações -->
    <div class="containerImovel">
      <h1><?= $imovel['titulo'] ?></h1>

      <h2 style="color:#004AAD; margin-top: 10px;">
        R$ <?= number_format($imovel['valor'], 0, ',', '.') ?>
        <?php if ($imovel['tipoNegocio'] == 'alugar'): ?>/ mês<?php endif; ?>
      </h2>

      <p style="font-size: 18px; margin-top: 10px;">
        <i class="fa-solid fa-location-dot"></i>
        <?= $imovel['endereco'] ?> - <?= $imovel['cidade'] ?>/<?= $imovel['estado'] ?>
      </p>

      <hr style="margin: 25px 0;">

      <h3>Descrição do Imóvel</h3>
      <p style="font-size: 16px; line-height: 1.6;">
        <?= nl2br($imovel['descricao']) ?>
      </p>

      <br>

      <!-- Botão WhatsApp -->
      <a href="https://wa.me/5516997382695?text=Olá! Tenho interesse no imóvel <?= urlencode($imovel['titulo']) ?>"
        target="_blank" class="Botao" style="padding: 12px 20px; background: #25d366; color: white; 
              font-size: 18px; border-radius: 8px; display: inline-block; text-decoration: none;">
        <i class="fab fa-whatsapp"></i> Falar no WhatsApp
      </a>

    </div>
  </div>

  <script src="../script.js"></script>
</body>

</html>