<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" href="../img/logo3.png" sizes="64x64" type="image/png" />

  <!-- CSS -->
  <link rel="stylesheet" href="login.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700;900&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <?php 
// SE CADASTRO FOI FEITO COM SUCESSO, ABRE TELA DE LOGIN
$abrirLogin = (isset($_GET['msg']) && $_GET['msg'] === 'cadastro_sucesso');
?>

  <!-- LOGO -->
  <div class="logo">
    <a href="../TelaInicial.html">
      <img class="nav-logo" src="../img/logo.png" alt="logo">
    </a>
  </div>

  <div class="container">

    <!-- TOASTS -->
    <?php if(isset($_GET['msg'])): ?>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">

      <?php if($_GET['msg'] == 'cadastro_sucesso'): ?>
      <div id="toastMsg" class="toast align-items-center text-bg-success border-0" role="alert">
        <div class="d-flex">
          <div class="toast-body">Cadastro realizado com sucesso!</div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      </div>

      <?php elseif($_GET['msg'] == 'login_erro'): ?>
      <div id="toastMsg" class="toast align-items-center text-bg-danger border-0" role="alert">
        <div class="d-flex">
          <div class="toast-body">Usuário ou senha incorretos!</div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      </div>
      <?php endif; ?>

    </div>
    <?php endif; ?>


    <!-- CADASTRO -->
    <div class="content first-content <?= $abrirLogin ? 'show-login' : '' ?>">

      <div class="first-column">
        <h2 class="title title-primary">Bem-Vindo</h2>
        <p class="description description-primary">Para continuar conectado conosco,</p>
        <p class="description description-primary">faça login com suas informações pessoais</p>
        <button id="signin" class="btn btn-primary">Clique aqui</button>
      </div>

      <div class="second-column">
        <h2 class="title title-second">Cadastro</h2>
        <p class="description description-second">Ou use seu e-mail para criar sua conta:</p>

        <form class="form" action="cadastro.php" method="POST">
          <label class="label-input">
            <i class="far fa-user icon-modify"></i>
            <input type="text" placeholder="Nome" name="nome" required>
          </label>

          <label class="label-input">
            <i class="far fa-envelope icon-modify"></i>
            <input type="email" placeholder="Email" name="email" required>
          </label>

          <label class="label-input">
            <i class="fas fa-lock icon-modify"></i>
            <input type="password" placeholder="Senha" name="senha" required>
          </label>

          <button class="btn btn-second" type="submit" name="cadastrar">Cadastrar</button>
        </form>
      </div>

    </div>

    <!-- LOGIN -->
    <div class="content second-content <?= $abrirLogin ? 'show-login' : '' ?>">

      <div class="first-column">
        <h2 class="title title-primary">Olá, Amigo!</h2>
        <p class="description description-primary">Primeira vez aqui?</p>
        <p class="description description-primary">Cadastre-se abaixo!</p>
        <button id="signup" class="btn btn-primary">Cadastrar</button>
      </div>

      <div class="second-column">
        <h2 class="title title-second">Login</h2>
        <p class="description description-second">Use seu e-mail cadastrado:</p>

        <form class="form" method="POST" action="validar_login.php">
          <label class="label-input">
            <i class="far fa-envelope icon-modify"></i>
            <input type="email" name="email" placeholder="Email" required>
          </label>

          <label class="label-input">
            <i class="fas fa-lock icon-modify"></i>
            <input type="password" name="senha" placeholder="Senha" required>
          </label>

          <a class="password" href="#">Esqueceu sua Senha?</a>

          <button class="btn btn-second" type="submit" name="login">Entrar</button>
        </form>
      </div>

    </div>

  </div>

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="login.js"></script>

  <?php if(isset($_GET['msg'])): ?>
  <script>
  if (window.location.search.includes("msg")) {
    const novaURL = window.location.pathname;
    window.history.replaceState({}, document.title, novaURL);
  }
  var toastEl = document.getElementById('toastMsg');
  if (toastEl) new bootstrap.Toast(toastEl).show();
  </script>
  <?php endif; ?>

</body>

</html>