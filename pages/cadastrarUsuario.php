<?php

include __DIR__ . '/../config.php';

$senha = isset($_POST['senha']) ?? $_POST['senha'];
if (isset($_POST['cadastrar'])) {
  $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
  postUsuario($nome, $email, $cidade, $estado, $senhaSegura, $imagem);
}


include PATH_ROOT . "/includes/header.php";
include PATH_ROOT . "/includes/formCadastroUsuario.php";
include PATH_ROOT . "/includes/footer.php";
