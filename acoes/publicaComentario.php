<?php
include_once __DIR__ . "/../config.php";

$msgAlertaComentario = '';
$idProduto = $_GET['id'];
if (isset($_POST['publicar'])) {
  if ($_POST['comentario'] == '') {
    $msgAlertaComentario = "O campo deve conter texto.";
  } else if(!isset($_SESSION['id'])){
    postComentario($_POST['comentario'], null, $idProduto);
    
  } else {
    postComentario($_POST['comentario'], $_SESSION['id'], $idProduto);
  }
}
