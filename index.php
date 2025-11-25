<?php 
include './db/conexao.php'; 

// Buscar todos os imóveis com sua imagem principal
$query = "
    SELECT i.*, 
       (SELECT nome_imagem
        FROM imagens_imovel 
        WHERE imagens_imovel.id_imovel = i.id 
        ORDER BY id ASC LIMIT 1) AS imagem_principal
FROM imoveis i
ORDER BY i.id DESC
";

$result = mysqli_query($conexao, $query);

// Separar imóveis por tipo
$comprar = [];
$alugar = [];

while ($row = mysqli_fetch_assoc($result)) {
    
    // SE NÃO TIVER IMAGEM NO BANCO, USAR UMA PADRÃO
    if (empty($row['imagem_principal'])) {
        $row['imagem_principal'] = "sem-imagem.png";
    }

    if ($row['tipoNegocio'] == 'comprar') {
        $comprar[] = $row;
    } else {
        $alugar[] = $row;
    }
}
?>
<script>
const imoveisDebug = <?php echo json_encode([
        "comprar" => $comprar,
        "alugar" => $alugar
    ], JSON_PRETTY_PRINT); ?>;

console.log("IMÓVEIS RETORNADOS DO PHP:");
console.log(imoveisDebug);
</script>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>S.F Imóveis</title>
  <link rel="icon" href="img/logo.png" />
  <link rel="stylesheet" href="style.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <!-- WhatsApp -->
  <a href="https://wa.me/5516997382695" target="_blank" class="whatsapp-btn">
    <i class="fab fa-whatsapp"></i>
  </a>

  <!-- Cabeçalho -->
  <header>
    <nav>
      <div class="logo"><img src="img/logo.png" alt="Logo"></div>
      <div class="BotaoLogin">
        <a href="login/login.php"><button>Cadastre-se / Login</button></a>
      </div>
    </nav>
  </header>

  <!-- Filtro -->
  <nav class="filtro-wrapper">
    <div class="tabs">
      <button class="tab ativada btnAlugar">Alugar</button>
      <button class="tab btnComprar">Comprar</button>
    </div>

    <div class="Barrapesquisa">
      <div class="buscar">
        <label for="endereco">BUSCAR ENDEREÇO</label>
        <input type="text" id="endereco" placeholder="Buscar cidade, bairro, condomínio ou código" />
      </div>
    </div>
  </nav>

  <!-- LISTAR ALUGAR -->
  <div class="container Alugar">
    <h1 style="background: #c3c3c3;padding: 12px">Alugar</h1>
    <section>

      <?php if(count($alugar) > 0): ?>
      <?php foreach ($alugar as $imovel): ?>

      <div class="CardPropriedade">
        <div class="Carrosel">
          <img src="uploads/imoveis/<?= $imovel['imagem_principal'] ?>" class="ImagemPropriedade"
            alt="<?= $imovel['titulo'] ?>" />
        </div>

        <div class="Detalhes">
          <div class="Valor">R$ <?= number_format($imovel['valor'], 0, ',', '.') ?>/mês</div>
          <div class="Informacoes">
            <span class="Titulo"><?= $imovel['titulo'] ?></span><br />
            <span class="Endereco"><?= $imovel['endereco'] ?></span>
          </div>

          <div class="Acoes">
            <a href="https://wa.me/5516997382695?text=Olá! Tenho interesse no imóvel: <?= urlencode($imovel['titulo']) ?>"
              target="_blank" class="Botao BotaoContato">
              <i class="fab fa-whatsapp"></i> Entrar em contato
            </a>
            <a href="./imoveis/imovel.php?id=<?= $imovel['id'] ?>" target="_blank" class="Botao BotaoContato">
              <i class="fab fa-eye"></i> Ver imóvel
            </a>
          </div>
        </div>
      </div>

      <?php endforeach; ?>
      <?php else: ?>
      <p>Nenhum imóvel disponível para aluguel.</p>
      <?php endif; ?>

    </section>
  </div>

  <!-- LISTAR COMPRAR -->
  <div class="container Comprar">
    <h1 style="background: #c3c3c3;padding: 12px">Comprar</h1>
    <section>

      <?php if(count($comprar) > 0): ?>
      <?php foreach ($comprar as $imovel): ?>

      <div class="CardPropriedade">
        <div class="Carrosel">
          <img src="uploads/imoveis/<?= $imovel['imagem_principal'] ?>" class="ImagemPropriedade"
            alt="<?= $imovel['titulo'] ?>" />
        </div>

        <div class="Detalhes">
          <div class="Valor">R$ <?= number_format($imovel['valor'], 0, ',', '.') ?></div>
          <div class="Informacoes">
            <span class="Titulo"><?= $imovel['titulo'] ?></span><br />
            <span class="Endereco"><?= $imovel['endereco'] ?></span>
          </div>

          <div class="Acoes">
            <a href="https://wa.me/5516997382695?text=Olá! Tenho interesse no imóvel: <?= urlencode($imovel['titulo']) ?>"
              target="_blank" class="Botao BotaoContato">
              <i class="fab fa-whatsapp"></i> Entrar em contato
            </a>
            <a href="./imoveis/imovel.php?id=<?= $imovel['id'] ?>" target="_blank" class="Botao BotaoContato">
              <i class="fab fa-eye"></i> Ver imóvel
            </a>
          </div>
        </div>
      </div>

      <?php endforeach; ?>
      <?php else: ?>
      <p>Nenhum imóvel disponível para compra.</p>
      <?php endif; ?>

    </section>
  </div>

  <script src="script.js"></script>
</body>

</html>