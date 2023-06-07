<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: ../../../index.php');
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
          <div class="notice-card">
            <img
              class="notice-img"
              src="../../img/DS-NewTemp.png"
              alt="DS-NewTemp"
            />
            <h2 class="notices">Demon Slayer 3ª temporada Chegou!</h2>
            <p class="notice">
              O fim da temporada 2 de Demon Slayer (Kimetsu no Yaiba) nos trouxe
              a confirmação de que o popular anime terá uma terceira temporada.
              O anúncio gerou hype entre os fãs que anseiam por ver a
              continuação da jornada de Tanjiro Kamado e amigos. No dia
              09/04/2023 tivemos o lançamento do primeiro episódio da nova
              temporada "Vila dos Ferreiros."
            </p>
            <div class="notices-favorite-icons">
              <img
                class="notices-favorite-icons-img"
                src="../../img/favorite.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="notice-card"></div>
        </div>
        <div class="notice-card-container">
          <div class="notice-card"></div>
          <div class="notice-card"></div>
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
</html>
