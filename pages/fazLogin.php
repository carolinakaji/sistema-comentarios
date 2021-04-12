<?php
include_once __DIR__ . "/../config.php";
//include PATH_ROOT . "/db/bancoDados.php";
$msgAlerta = '';
if (isset($_POST['login'])) {
  if ($_POST['email'] == '' && $_POST['senha'] == '') {
    $msgAlerta = 'Os campos devem ser preenchidos';
  } else {
    login($_POST['email'], $_POST['senha']);
  }
}
