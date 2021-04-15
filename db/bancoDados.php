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
function postUsuario($nome, $email, $cidade, $estado, $senhaSegura, $foto)
{
  $sql = "insert into usuarios (nome, email, cidade, estado, senha, imagem) values (:nome, :email, :cidade, :estado, :senha, :imagem)";
  $result = abrirConnection()->prepare($sql);
  $result->bindValue(':nome', $nome);
  $result->bindValue(':email', $email);
  $result->bindValue(':cidade', $cidade);
  $result->bindValue(':estado', $estado);
  $result->bindValue(':senha', $senhaSegura);
  $result->bindValue(':imagem', $foto);
  $result->execute();
  fecharConexao();

  $alertaMensagem = "Cadastro realizado com sucesso";
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
function getComentarios()
{
  $comments = '';
  $sql = "select * from usuarios right join comentarios on usuarios.id = comentarios.usuario";
  $result = abrirConnection()->prepare($sql);
  $result->execute();
  $usuarios = $result->fetchAll(PDO::FETCH_ASSOC);

  foreach($usuarios as $usuario){
      if($usuario['usuario'] == null){
        $usuario['nome'] = 'Anônimo';
        $usuario['imagem'] = 'anonim.jpg';
      }
      $dataEHora = dataBrasil($usuario['date']);
      $comments .="
      <div class='row'>
        <div class='col-2'>
          <img src='../src/imgs/{$usuario['imagem']}' width='80' height='80'>
        </div>
        <div class='col-8'>
          <div class='d-inline-flex'>
            <h5>{$usuario['nome']} - {$dataEHora}</h5>
          </div>
          <p>{$usuario['comentario']}</p>
        </div>
        <div class='col-2'>
        <span><i class='bi bi-pencil-fill px-2 text-warning'></i></span>
        <button type='submit' class='deletarComentario' name='deletarComentario'><i class='bi bi-trash-fill text-danger'></i></button>
        </div>
      </div>
      <hr>";
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

function verificaQuemEstaLogado($email){
  $sql = "select id from usuarios where email=:email";
  $result = abrirConnection()->prepare($sql);
  $result->bindValue(':email', $email);
  $result->execute();
  $usuarios = $result->fetchAll(PDO::FETCH_ASSOC);
  };
  




function deleteComentario($id)
{
  $sql = "delete from comentarios where id = :id";
  $result = abrirConexao()->prepare($sql);
  $result->bindValue(':id', $id);
  $result->execute();
  fecharConexao();
}