<?php include_once('../pages/cadastraComentario.php') ?>
<div class='container'>

<h2 class='my-5 text-center display-4'>Conheça nossos produtos</h2>

<div class="row mx-auto my-5">
  <div class="col-lg-4 col-md-6 col-sm-12 my-3">
    <div class="card" style="width: 18rem;">
    <img src="../src/imgs/01-286.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Óleos essenciais</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-12 my-3">
<div class="card" style="width: 18rem;">
  <img src="../src/imgs/04-286.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Sabonetes artesanais</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>

<div class="col-lg-4 col-md-6 col-sm-12 my-3">
<div class="card" style="width: 18rem;">
  <img src="../src/imgs/03-286.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Cremes hidratantes</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
</div>
<?php echo date('d/m/Y H:m')?>

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
  <div class="col-7">
    <?php 
    $listaComentario = getComentarios();
          echo $listaComentario; ?>
  </div>
  </div>
</div>

