<?php
include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");
session_start();
$login = $_SESSION['painel']['login'];
$result_produtos_login = "SELECT * FROM usuario WHERE login LIKE '$login'";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while ($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)) {
  $db_user_id = $row_produto_login['id'];
  $user_id = $db_user_id;
}

if (mysqli_real_escape_string($conn, $_GET['func']) == "del_conf2") {
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $result_usuario = "DELETE FROM config WHERE user_id='$db_user_id' ";
  $resultado_usuario = mysqli_query($conn, $result_usuario);
  //echo "<script>alert('Todas as configurações foram deletadas com sucesso!'); window.location='/config.php';</script>";
  $_SESSION['message'] = 'Deletado com sucesso!';
  header('location: /config');
} else {
  //echo "erro";
  $_SESSION['erro'] = 'Erro ao deletar!';
  header('location: /config');
}
?>