<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: ../../../index.php');
    }

    // Verificar se o valor de 'id_usuario' está sendo definido corretamente
    $idUsuario = $_SESSION['login'];
    if (!is_numeric($idUsuario)) {
        // Redirecionar ou exibir uma mensagem de erro, se necessário
        // Por exemplo:
        echo "Erro: O ID do usuário não é um valor numérico.";
        exit;
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Anime Grid</title>
    <link rel="stylesheet" href="styles.css" />
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
            <a class="link-navegacao">Noticias</a>
            <a class="link-navegacao">Sobre nós</a>
            <a href="../favorite/index.php" class="link-navegacao">Favoritos</a>
          </div>
          <a href="../../../index.php">
            <button class="home">Sair</button>
          </a>
        </div>
        <div class="hero-info">
          <div class="hero-info-text-container">
            <h1 class="hero-info-title">Sejam bem vindos!<br /></h1>
            <p class="hero-info-subtitle">
              Essa é a sua página oficial sobre as noticias do mundo dos animes!
            </p>
          </div>

          <div>
            <img
              class="hero-info-image"
              src="../../img/gif 2.gif"
              alt="Animes"
            />
          </div>
        </div>
      </section>
      <section class="section-notices">
        <div class="title-container">
          <h1>Principais</h1>
          <h1 class="titulo">Noticias</h1>
        </div>
        <?php
          $x = 0;
          require_once '../conection/conn.php';
          $sql = "SELECT * FROM noticia";
          $exec = $conn->query($sql);
          if($exec->num_rows > 0){
              while ($linhas = $exec->fetch_object()){
                $descricao = $linhas->descricao;
                $hora = $linhas->hora;
                $data = $linhas->data;
                $imagem = $linhas->imagem;
                $nome_anime = $linhas->nome_anime;
                $id = $linhas->id;

                if ($x == 0 or $x == 2){
                  $x = 0;
                  echo "<div class=\"notice-card-container\">";
                }
                if (isset($_POST['favoritar'])) {
                  // Obtém o ID da notícia e do usuário
                  $id_noticia = $_POST['id_noticia'];
                  $id_usuario = $_POST['id_usuario'];
      
                  // Insere o favorito no banco de dados
                  $sql = "INSERT INTO favorito (id_noticia, id_usuario) VALUES ('$id_noticia', '$id_usuario')";
                  $resultado = mysqli_query($conn, $sql);
      
                  if ($resultado) {
                      echo "Notícia favoritada com sucesso!";
                  } else {
                      echo "Erro ao favoritar a notícia.";
                  }
                }
?>
        <div class="notice-card">
            <img
              class="notice-img"
              src="../../img/<?php echo $imagem;?>"
              alt="DS-NewTemp"
            />
            <h2 class="notices"><?php echo $nome_anime;?></h2>
            <p class="notice"><?php echo $descricao;?></p>
            <div class="notices-favorite-icons">
              <a href="../favorite/favoritar.php?id=<?php echo $linhas->id; ?>">
              <img
                class="notices-favorite-icons-img"
                src="../../img/favorite.jpg"
                alt=""
              />
              </a>
            </div>
          </div>
<?php
            if ($x == 1){
              echo "</div>";
            }
            $x++;

              }
              
          }else{
              
          }
?>
          
          
        </div>
        
      </section>
      <section class="section-aboutUs">
        <div class="title-container">
          <h1>Sobre</h1>
          <h1 class="titulo">Nós</h1>
        </div>
        <div class="notice-card-container">
          <div class="aboutUs-card">
            <img class="aboutUs-img" src="../../img/Rafael.gif" alt="" />
            <h2 class="about">Rafael</h2>
          </div>
          <div class="aboutUs-card">
            <img class="aboutUs-img" src="../../img/lucas.gif" alt="" />
            <h2 class="about">Lucas</h2>
          </div>
          <div class="aboutUs-card">
            <img class="aboutUs-img" src="../../img/Regis.jpg" alt="" />
            <h2 class="about">Regivaldo</h2>
          </div>
          <div class="aboutUs-card">
            <img class="aboutUs-img" src="../../img/gif.gif" alt="" />
            <h2 class="about">Victor Hugo</h2>
          </div>
          <div class="aboutUs-card">
            <img class="aboutUs-img" src="../../img/Vitor.jpg" alt="" />
            <h2 class="about">Vitor</h2>
          </div>
          <div class="aboutUs-card">
            <img class="aboutUs-img" src="../../img/Max.gif" alt="" />
            <h2 class="about">Max</h2>
          </div>
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
