<?php
date_default_timezone_set('America/Sao_Paulo');
include_once __DIR__ . "/../config.php";

function abrirConnection()
{
  try {
    $connection = new PDO(db['host'], db['user'], db['pass']);
    return $connection;
  } catch (Exception $error) {
    echo "Ocorreu o seguinte erro: {$error->getMessage()}";
    exit;
  }
}
function fecharConexao()
{
  $connection = NULL;
  return $connection;
}

// CADASTRO USUÁRIO
function postUsuario($nome, $email, $cidade, $estado, $senhaSegura, $nomeTipoImagem)
{
  $sql = "insert into usuarios (nome, email, cidade, estado, senha, imagem) values (:nome, :email, :cidade, :estado, :senha, :imagem)";
  $result = abrirConnection()->prepare($sql);
  $result->bindValue(':nome', $nome);
  $result->bindValue(':email', $email);
  $result->bindValue(':cidade', $cidade);
  $result->bindValue(':estado', $estado);
  $result->bindValue(':senha', $senhaSegura);
  $result->bindValue(':imagem', $nomeTipoImagem);
  $result->execute();
  fecharConexao();

  $cadastrado = true;
  return $cadastrado;
}


// LOGAR
function login($email, $senha)
{

  $sql = "select * from usuarios";
  $result = abrirConnection()->prepare($sql);
  $result->execute();
  $usuarios = $result->fetchAll(PDO::FETCH_ASSOC);
  foreach ($usuarios as $usuario) {
    if (password_verify($senha, $usuario['senha']) && $usuario['email'] === $email) {
      
      $_SESSION['email'] = $usuario['email'];
      $_SESSION['id'] = $usuario['id'];
     // echo 'Quem logado: ' . $_SESSION['id'];
      header("location: ../index.php");

    }
  }
}

/****************** COMENTÁRIOS ******************/

// POST COMENTARIO
function postComentario($comentario, $idUsuarioLogado)
{
  
  $currentDateTime = date('Y-m-d H:i:s');
  $sql = "insert into comentarios (comentario, date, usuario) values (:comentario, :date, :usuario)";
  $result = abrirConnection()->prepare($sql);
  $result->bindValue(':comentario', $comentario);
  $result->bindValue(':date', $currentDateTime);
  $result->bindValue(':usuario', $idUsuarioLogado);

  $result->execute();
  fecharConexao();

  $alertaMensagem = "Cadastro realizado com sucesso";
}

// GET COMENTÁRIOS
function getComentariosProduto($id)
{
  $comments = '';
  $sql = "select * from 
          usuarios 
          inner join comentarios on usuarios.id = comentarios.usuario";
  $result = abrirConnection()->prepare($sql);
  $result->execute();
  $usuarios = $result->fetchAll(PDO::FETCH_ASSOC);

  foreach($usuarios as $usuario){
      if($usuario['produto'] == $id){
        
      $dataEHora = dataBrasil($usuario['date']);
      $comments .="
      <div class='row'>
        <div class='col-2'>
          <img src='../src/imgs/{$usuario['imagem']}' width='80' height='80'>
        </div>
        <div>
          <div class='d-inline-flex'>
            <h5>{$usuario['nome']} - {$dataEHora}</h5>
          </div>
          <p>{$usuario['comentario']}</p>
        </div>
        
      </div>
      <hr>";
    }
  }
  return $comments;
}

// GET COMENTÁRIOS POR ID
// function getComentariosEmail($id)
// {
//   $editarBtn = verificaQuemEstaLogado();
//   $comments = '';
//   $sql = "select * from usuarios 
//           inner join comentarios 
//           on usuarios.id = comentarios.usuario where usuario.id=:id";
//   $result = abrirConnection()->prepare($sql);
//   $result->bindValue(':id', $id);
//   $result->execute();
//   $usuarios = $result->fetchAll(PDO::FETCH_ASSOC);
//   foreach($usuarios as $usuario){
//     $dataEHora = dataBrasil($usuario['date']);
//     $comments .="
//                   <div>
//                     <div class='d-inline-flex'>
//                       <h5>{$usuario['nome']} - {$dataEHora}</h5> {$editarBtn}<button class='btn ml-4'> asdfasdf</button>
//                     </div>
//                     <p>{$usuario['comentario']}</p>
//                   </div>";
//   }
//   return $comments;
// }

// UPDATE COMENTÁRIOS
function update($id,$comentario)
{
  $sql = "update comentarios set (comentario=:comentario) where id=:id";
  $var = abrirConexao();
  $result = $var->prepare($sql);
  $result->bindValue(':comentario', $comentario);
  $result->bindValue(':id', $id);
  $result->execute();
  fecharConexao();
}

function dataBrasil($data){
  return date('d/m/Y H:i', strtotime($data));
}

function verificaQuemEstaLogado($email)
{
  $sql = "select id, nome from usuarios where email=:email";
  $result = abrirConnection()->prepare($sql);
  $result->bindValue(':email', $email);
  $result->execute();
  $usuario = $result->fetchAll(PDO::FETCH_ASSOC);
  return $usuario[0]['nome'];
  };
  

function deleteComentario($id)
{
  $sql = "delete from comentarios where id = :id";
  $result = abrirConexao()->prepare($sql);
  $result->bindValue(':id', $id);
  $result->execute();
  fecharConexao();
}

// PRODUTOS

function getProdutos()
{
  $card = '';
  $sql = "select * from produtos";
  $result = abrirConnection()->prepare($sql);
  $result->execute();
  $produtos = $result->fetchAll(PDO::FETCH_ASSOC);

  foreach($produtos as $produto){
    $card .= "
    <div class='col-lg-4 col-md-6 col-sm-12 my-3'>
    <div class='card' style='width: 18rem;'>
      <img src='../src/imgs/{$produto['imagem']}' class='card-img-top'>
      <div class='card-body'>
        <h5 class='card-title'>{$produto['titulo']}</h5>
        <p class='card-text'>{$produto['descricao']}</p>
        <a href='../pages/comentariosProduto.php?id={$produto['id']}' class='btn btn-primary'>Comentários</a>
      </div>
    </div>
  </div>";
      
    }
  return $card;
}

function getProdutoId($id){
  $produtoSelecionado ='';
  $sql = "select * from produtos where id=:id";
  $result = abrirConnection()->prepare($sql);
  $result->bindValue(':id', $id);
  $result->execute();
  $produto = $result->fetchAll(PDO::FETCH_ASSOC);
  $produtoSelecionado ="
  <div class='row'>
  <div class='col-3'><img src='../src/imgs/{$produto[0]['imagem']}'></div>
  <div class='col-9'>
    <h2>{$produto[0]['titulo']}</h2>
    <p>{$produto[0]['descricao']}</p>
    </div>
    </div>";
  return $produtoSelecionado;
}