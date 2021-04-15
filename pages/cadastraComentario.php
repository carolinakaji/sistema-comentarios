<?php
include_once __DIR__ . "/../config.php";

$msgAlertaComentario = '';
  //$_SESSION['id']=false;
if (isset($_POST['publicar'])) {
  if ($_POST['comentario'] == '') {
    $msgAlertaComentario = "O campo deve conter texto.";
  } else if(!isset($_SESSION['id'])){
    postComentario($_POST['comentario'], null);
    
  } else {
    postComentario($_POST['comentario'], $_SESSION['id']);
  }
}
