<?php
  require_once '../conection/conn.php';
  if(isset($_POST['input-email']) and !empty($_POST['input-email'])){
    $nome = $_POST['input-name'];
    $email = $_POST['input-email'];
    $senha = $_POST['input-password'];

    $sql = "INSERT INTO usuario VALUES (NULL, '$nome','$email','$senha')";
    $exec = $conn->query($sql);
    header('Location: ../../../index.php');

}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Anime Grid - cadastrar</title>
    <link rel="stylesheet" href="../../../styles.css" />
  </head>
  <body>
    <div class="outh-container">
      <div class="auth-content">
        <div class="auth-content-container">
          <div class="title-container">
            <h1>Anime</h1>
            <h1 class="titulo">Grid</h1>
          </div>
          <h3 class="full-width text-left mt larger">Novo Cadastro!</h3>
          <p class="mt small">
            Insira sua senha e seu e-mail para ter acesso a sua grade de animes.
          </p>
          <form id="form-register" class="mt" method="post">
          <label for="input-name">Nome</label>
            <input
              placeholder="Insira sua senha"
              class="mt smaller"
              id="input-name"
              name="input-name"
              type="text"
              required
            />
            <label class="mt" for="input-email">E-mail</label>
            <input
              placeholder="email@exemplo.com"
              class="mt smaller"
              id="input-email"
              name="input-email"
              type="email"
              required
            />
            <label for="input-password">Senha</label>
            <input
              placeholder="Insira sua senha"
              class="mt smaller"
              id="input-password"
              name="input-password"
              type="password"
              required
            />
            
            <button type="submit" class="full-width mt larger">
              cadastrar
            </button>
          </form>
          <a href="../../../index.php" class=" mt larger"
            >Já possui uma conta? Faça seu login</a
          >
        </div>
      </div>
    </div>
  </body>
</html>
