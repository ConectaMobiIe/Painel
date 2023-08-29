<?php
include_once('conexao.php');
session_start();
$login = $_SESSION['painel']['login'];
$result_produtos_login = "SELECT * FROM usuario WHERE login LIKE '$login'";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while ($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)) {
  $db_usuario = $row_produto_login['login'];
  $nome = $row_produto_login['user'];
  $db_user_id = $row_produto_login['id'];
  $db_usuario_expirar = $row_produto_login['expirar'];
  $db_adm_permiss = $row_produto_login['permiss'];
  $db_usuario_acess = $row_produto_login['permiss'];
  $perm = $row_produto_login['permiss'];
  $user_id = $db_user_id;
}

if (mysqli_real_escape_string($conn, $_GET['func']) == "del_user") {

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $result_usuario = "DELETE FROM usuario WHERE id='$id' ";
  $resultado_usuario = mysqli_query($conn, $result_usuario);

  $result_usuario = "DELETE FROM app_config WHERE user_id='$id' ";
  $resultado_usuario = mysqli_query($conn, $result_usuario);

  $result_usuario = "DELETE FROM categoria WHERE user_id='$id' ";
  $resultado_usuario = mysqli_query($conn, $result_usuario);

  $result_usuario = "DELETE FROM config WHERE user_id='$id' ";
  $resultado_usuario = mysqli_query($conn, $result_usuario);
  if (mysqli_query($conn, $result_usuario)) {
    //echo "<script>alert('Todos os dados do usuário foram apagados com sucesso!'); window.location='/admin';</script>";
    $_SESSION['message'] = 'Deletado com sucesso!';
    header('location: /admin');
  } else {
    //echo "<script>alert('Erro ao deletar todos os dados dos usuários!'); window.location='/admin';</script>";
    $_SESSION['erro'] = 'Erro ao deletar!';
    header('location: /admin');
  }

} elseif (mysqli_real_escape_string($conn, $_GET['func']) == "del_theme") {
  $result_usuario = "DELETE FROM app_config WHERE user_id='$user_id' ";
  $resultado_usuario = mysqli_query($conn, $result_usuario);
  //echo "<script>alert('Tema deletado com sucesso!'); window.location='/app_config';</script>";
  $_SESSION['message'] = 'Resetado com sucesso!';
  header('location: /app_config');
} else {
  //echo "<script>alert('Erro: Não existe tema para ser deletado!'); window.location='/app_config';</script>";
  $_SESSION['erro'] = 'Erro ao resetar!';
  header('location: /app_config');
}
?>