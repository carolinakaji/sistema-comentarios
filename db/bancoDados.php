<?php
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

// CADASTRO USUÁRIO

function postUsuario($nome, $email, $cidade, $estado, $senhaSegura, $imagem)
{
  $sql = "insert into usuarios (nome, email, cidade, estado, senha, imagem) values (:nome, :email, :cidade, :estado, :senha, :imagem)";
  $result = abrirConnection()->prepare($sql);
  $result->bindValue(':nome', $nome);
  $result->bindValue(':email', $email);
  $result->bindValue(':cidade', $cidade);
  $result->bindValue(':estado', $estado);
  $result->bindValue(':senha', $senhaSegura);
  $result->bindValue(':imagem', $imagem);
  $result->execute();
  //fecharConexao();

  $alertaMensagem = "Cadastro realizado com sucesso";
}

// 
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
      header("location: ../index.php");
    }
  }
}

// GET COMENTÁRIOS
/*function getComentarios()
{
  $sql = "select * from comentarios";
  $result = abrirConnection()->prepare($sql);
  $result->execute();
  $usuarios = $result->fetchAll(PDO::FETCH_ASSOC);
  foreach($comentarios as )
}
*/
/*
function delete($id)
{
  $sql = "delete from comentarios where id = :id";
  $result = abrirConexao()->prepare($sql);
  $result->bindValue(':nome', $id);
  $result->execute();
  fecharConexao();
}

function update($nome, $email)
{
  $sql = "update clientes set (cidade= :cidade, estado = :estado, ) where email= :email";
  $var = abrirConexao();
  $result = $var->prepare($sql);
  $result->bindValue(':estado', $estado);
  $result->bindValue(':cidade', $cidade);
  $result->bindValue(':email', $email);
  $result->bindValue(':email', $email);
  $result->execute();
  fecharConexao();
}
*/
/** TODO
 * Continuar update.
 * 
 *//*
function getComentarios()
{
  $sql="select * from clientes";
}
*/