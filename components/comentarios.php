<?php include_once('../acoes/publicaComentario.php') ?>
<div class="container">
<?php echo getProdutoId($_GET['id'])?>;
<div>

<div class='container'>
  <div class="row p-3">
    <div class="col-7">
      <div class="form-group ">
        <form action="" method="post">
          <label for="exampleFormControlTextarea1 ">Deixe seu comentário</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="comentario"></textarea>
          <button type='submit' class="btn btn-green my-2" name="publicar">Publicar</button> <span class="msgAlertaComentario"><?php echo $msgAlertaComentario ?></span>
        </form>
      </div>
    </div>
  </div>
  <div class="row p-3">
    <div class="col-6">
    <?php echo getComentariosProduto($_GET['id']) ?>
    </div>
    <div class='col-2'>
        <span><i class='bi bi-pencil-fill px-2 text-warning'></i></span>
        <button type='submit' class='deletarComentario' name='deletarComentario'><i class='bi bi-trash-fill text-danger'></i></button>
        </div>
  </div>
</div>
</div>