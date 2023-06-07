<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../../../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Anime Grid</title>
    <link rel="stylesheet" href="../../pages/home/styles.css" />
    <link rel="stylesheet" href="../../../styles.css" />
  </head>
  <body>
    <div>
      <section class="section-hero">
        <div class="barra-navegacao">
          <div class="title-container">
            <h1>Anime</h1>
            <h1 class="titulo">Grid</h1>
          </div>
          <div>
            <a class="link-navegacao">Favoritos</a>
          </div>
          <a href="../home/index.php">
            <button class="home">Voltar</button>
          </a>
        </div>
        <div class="hero-info">
          <div class="hero-info-text-container">
            <h1 class="hero-info-title">Sua área de favoritos!<br /></h1>
            <p class="hero-info-subtitle">
              As suas melhores noticias você encontra aqui!
            </p>
          </div>

          <div>
            <img
              class="hero-info-image"
              src="../../img/favorite-gif.gif"
              alt="Animes"
            />
          </div>
        </div>
      </section>
      <section class="section-notices">
        <div class="title-container">
          <h1>Suas</h1>
          <h1 class="titulo">Noticias</h1>
        </div>
        <div class="notice-card-container">
        <?php
    require_once '../conection/conn.php';
    $idUsuario = $_SESSION['login'];
    $sql = "SELECT n.* FROM noticia n JOIN favorito f ON n.id = f.id_noticia WHERE f.id_usuario = '$idUsuario'";
    $result = $conn->query($sql);

    $count = 0; // Contador de notícias

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_object()) {
        $descricao = $row->descricao;
        $imagem = $row->imagem;
        $nome_anime = $row->nome_anime;

        if ($count % 2 == 0) {
          // Abre uma nova linha para cada par de notícias
          echo '<div class="notice-card-row">';
        }
        ?>
        <div class="notice-card">
          <img class="notice-img" src="../../img/<?php echo $imagem;?>" alt="DS-NewTemp" />
          <h2 class="notices"><?php echo $nome_anime;?></h2>
          <p class="notice"><?php echo $descricao;?></p>
          <div class="notices-favorite-icons">
            <img class="notices-favorite-icons-img" src="../../img/favorite.jpg" alt="" />
          </div>
        </div>
        <?php
        if ($count % 2 == 1) {
          // Fecha a linha após exibir dois cards
          echo '</div>';
        }

        $count++;
      }
    } else {
      echo "<p>Não há notícias favoritadas.</p>";
    }

    // Verifica se a última linha ficou com apenas um card e fecha a linha
    if ($count % 2 == 1) {
      echo '</div>';
    }
    ?>
        </div>
      </section>
    </div>
    <footer>
      <div class="footer-content">
        <div class="title-container footer-content-title">
          <h1>Anime</h1>
          <h1 class="titulo">Grid</h1>
        </div>
      </div>
    </footer>
  </body>
</
