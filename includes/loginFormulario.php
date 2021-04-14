<?php include('../pages/fazLogin.php') ?>


<div class="row d-flex">
    <div class="col">
      <small>Digite seu login e senha:</small>
    </div>
    <div>
      <small class="msgLoginErro"><?php echo $msgAlerta ?></small>
    </div>
  </div>


<form class="form-inline " method="POST" action=''>
  <label class="sr-only" for="inlineFormInputName2">Nome</label>
  <input type="email" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="botanicshop@email.com" name="email">

  <label class="sr-only" for="inlineFormInputGroupUsername2">Usuário</label>
  <div class="input-group mb-2 mr-sm-2">
    <input type="password" class="form-control" id="inlineFormInputGroupUsername2" placeholder="********" name="senha">
  </div>

  <button type="submit" class="btn btn-green mb-2" name="login">Login</button>
</form>

    <div>
      <p class="cadastre"><a href="../pages/cadastrarUsuario.php">Cadastrar-se</a></p>
    </div>
