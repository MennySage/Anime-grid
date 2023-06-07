<?php
	
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

    require_once 'src/pages/conection/conn.php';

    if(isset($_POST['input-email']) and !empty($_POST['input-email'])){
        $email = $_POST['input-email'];
        $senha = $_POST['input-password'];

        $sql = "SELECT * FROM usuario WHERE email='$email' and senha='$senha'";
        $exec = $conn->query($sql);
        if($exec->num_rows > 0){
            session_start();
            while ($linhas = $exec->fetch_object()){
                $_SESSION['login'] = $linhas->id;
                $_SESSION['nome'] = $linhas->email;
            }
            header('Location: src/pages/home/index.php');
        }else{
            header('Location: index.php?msg=1');
        }

    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Anime Grid - login</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="outh-container">
      <div class="auth-content">
        <div class="auth-content-container">
          <div class="title-container">
            <h1>Anime</h1>
            <h1 class="titulo">Grid</h1>
          </div>
          <h3 class="full-width text-left mt larger">Bem Vindo!</h3>
          <p class="mt small">
            Digite seu e-mail e senha a baixo para ter acesso a sua grade de
            animes.
          </p>
          <form action="" method="post">
            <label class="mt" for="input-email">E-mail</label>
            <input
              placeholder="email@exemplo.com"
              class="mt smaller"
              id="input-email"
              name="input-email"
              type="email"
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
            <button class="full-width mt larger" type="submit">Acessar</button>
            <a href="src/pages/register/index.php" class="mt larger">
              Não tem conta? Faça seu cadastro aqui.
            </a>
          </form>
          
        </div>
      </div>
    </div>
  </body>
</html>
