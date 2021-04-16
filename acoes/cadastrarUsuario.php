<?php

include_once __DIR__ . '/../config.php';
include_once PATH_ROOT . "/db/bancoDados.php";

$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);


if (isset($_POST['cadastrar'])) {
  $foto = $_FILES['foto'];

  if($foto['name']!== ''){
    $nomeImagem = md5($foto['name'] . rand(0,9999));
    $tipo = substr($foto['name'], -4);
    $nomeTipoImagem = "{$nomeImagem}{$tipo}";
    
    $imagem = $foto['tmp_name'];
    move_uploaded_file($imagem, "../src/imgs/{$nomeTipoImagem}");
    var_dump($_FILES['foto']);
  }

  var_dump($_FILES);
  postUsuario($nome, $email, $cidade,  $estado, $senhaSegura, $nomeTipoImagem);
  header("Location: ../index.php");
}

if (isset($_POST['limparCadastro'])) {
  $_POST['nome'] = '';
  $_POST['email'] = '';
  $_POST['cidade'] = '';
  $_POST['estado'] = '';
  $_POST['senha'] = '';
}


