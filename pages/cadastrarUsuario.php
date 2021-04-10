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

  postUsuario($nome, $email, $cidade,  $estado, $senhaSegura, 'mariaj.jpg');
  $alertaSucesso = 'Cadastro realizado com sucesso';
  header("Location: ../index.php");
}

if (isset($_POST['limparCadastro'])) {
  $_POST['nome'] = '';
  $_POST['email'] = '';
  $_POST['cidade'] = '';
  $_POST['estado'] = '';
  $_POST['senha'] = '';
}


include PATH_ROOT . "/includes/header.php";
include PATH_ROOT . "/includes/formCadastroUsuario.php";
include PATH_ROOT . "/includes/footer.php";
