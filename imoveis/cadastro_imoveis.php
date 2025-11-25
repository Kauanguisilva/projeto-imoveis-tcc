<?php include '../db/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Cadastrar Imóvel</title>
  <style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    background: #f4f4f4;
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
    margin-left: 270px;
    padding: 25px;
    width: 100%;
  }

  h1 {
    margin-bottom: 20px;
  }

  form {
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    width: 700px;
  }

  label {
    font-weight: bold;
    margin-top: 12px;
    display: block;
  }

  input,
  textarea,
  select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-top: 5px;
  }

  button {
    background: #1e3d59;
    color: #fff;
    border: none;
    padding: 12px;
    width: 100%;
    cursor: pointer;
    margin-top: 20px;
    font-size: 16px;
    border-radius: 6px;
  }

  button:hover {
    background: #284d73;
  }
  </style>
</head>

<body>

  <div class="sidebar">
    <h3>Sistema Imobiliário</h3>
    <a href="../painel/dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
    <a href="../imoveis/cadastro_imoveis.php"><i class="fa-solid fa-plus"></i> Cadastrar Imóvel</a>
    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
  </div>

  <div class="content">
    <h1>Cadastrar Imóvel</h1>

    <form action="../imoveis/salvar_imovel.php" method="POST" enctype="multipart/form-data">

      <label>Título</label>
      <input type="text" name="titulo" required>

      <label>Descrição</label>
      <textarea name="descricao" rows="4" required></textarea>

      <label>Endereço</label>
      <input type="text" name="endereco" required>

      <label>Cidade</label>
      <input type="text" name="cidade" required>

      <label>Estado</label>
      <input type="text" name="estado" maxlength="2" placeholder="UF (ex: SP)" required>

      <label>Valor</label>
      <input type="number" step="0.01" name="valor" required>

      <label>Tipo</label>
      <select name="tipo" required>
        <option value="Casa">Casa</option>
        <option value="Apartamento">Apartamento</option>
        <option value="Terreno">Terreno</option>
        <option value="Comercial">Comercial</option>
      </select>

      <label>Negócio</label>
      <select name="tipoNegocio" required>
        <option value="alugar">Alugar</option>
        <option value="comprar">Comprar</option>
      </select>

      <label>Imagens do Imóvel</label>
      <input type="file" name="imagens[]" accept="image/*" multiple required>

      <button type="submit">Salvar Imóvel</button>

    </form>
  </div>

</body>

</html>