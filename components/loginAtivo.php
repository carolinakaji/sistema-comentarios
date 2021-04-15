<?php include_once ('../acoes/verificaUsuarioLogado.php') ?>
<ul class="nav">
  <li class="nav-item">
  <span class="nav-link">Olá, <?php echo verificaQuemEstaLogado($_SESSION['email']); ?></span>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../acoes/logout.php">Sair</a>
  </li>
</ul>

