<?php
session_start();
include_once __DIR__ . '/../config.php';
include_once PATH_ROOT . "/db/bancoDados.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../src/style/style.css">
  <link rel="shortcut icon" href="../src/imgs/icon.ico" type="image/x-icon">

  <title>produtos</title>
</head>

<body>
  <div class="pt-3 ">
    <header class="container-fluid">
      <nav class="row px-5">
        <div class="col-lg-2 col-md-3">
          <ul class="nav">
            <li class="nav-item">
              <a class="navbar-brand" href="../index.php">
                <img src="../src/imgs/logo.png" class="d-inline-block align-top" alt="Logo da loja Botanic shop">
              </a>

            </li>
          </ul>
        </div>
        <div class="col-lg-10 col-md-9 d-flex">
          <div class="ml-auto"> 
          <?php isset($_SESSION['email'])  ?  include('loginAtivo.php') : include('loginFormulario.php'); ?>
          </div>
        </div>
      </nav>
    </header>
  </div>