<div class="container">
  <h2 class="my-5 text-center">Preencha o formulário de cadastro</h2>
  <form class="form-cadastro" method="POST">
    <div class="row">
      <div class="col-5">
        <img src="../src/imgs/cadastro-img.jpg" alt="" width="400">
      </div>
      <div class="col-7">
        <div class="row ">
          <div class="mb-3 col-8">
            <label for="nome" class="form-label">Nome</label>
            <input id="nome" type="text" class="form-control" name="nome">
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-md-8">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-6">
            <label for="cidade" class="form-label">Cidade</label>
            <input id="cidade" type="cidade" class="form-control" name="cidade">
          </div>
          <div class="mb-3 col-2">
            <label for="estado" class="form-label">UF</label>
            <input id="estado" type="text" class="form-control" name="estado">
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-6">
            <label for="exampleInputPassword1" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha">
          </div>
        </div>
        <div class="row">
          <div class="my-3 col-4">
            <input type="file" name="imagem" accept="image/*">
          </div>
        </div>
        <div class="row">
          <div class="col-8 text-right m-3">
            <button type="submit" class="btn btn-green-invert" name="limparCadastro">Limpar</button>
            <button type="submit" class="btn btn-green" name="cadastrar">Cadastrar</button>
          </div>
        </div>
      </div>
  </form>
</div>