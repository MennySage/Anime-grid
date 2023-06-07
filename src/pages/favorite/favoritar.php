<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../../../index.php');
    exit;
}

require_once '../conection/conn.php';

$id_noticia = $_GET['id'];
$id_usuario = $_SESSION['login'];

// Verifica se a notícia já foi favoritada pelo usuário
$sql = "SELECT * FROM favorito WHERE id_usuario = '$id_usuario' AND id_noticia = '$id_noticia'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // A notícia já está favoritada.
    echo "Esta notícia já está favoritada.";
} else {
    // Insere a notícia nos favoritos do usuário
    $sql = "INSERT INTO favorito (id_usuario, id_noticia) VALUES ('$id_usuario', '$id_noticia')";
    if ($conn->query($sql) === TRUE) {
        header('Location: ../favorite/index.php');
        exit;
    } else {
        // Ocorreu um erro ao favoritar a notícia
        echo "Erro ao favoritar a notícia: " . $conn->error;
    }
}

$conn->close();
?>
