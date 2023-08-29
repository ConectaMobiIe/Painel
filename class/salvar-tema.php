<?php
session_start();

if ($_SESSION['painel']['login'] != "") {} else {
  echo "<br><br><center><h1>REDIRECIONANDO...</h1></center>";
  echo "<script>
window.location='/login.php';
</script>";
  exit;
}

include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");

$login = $_SESSION['painel']['login'];
$id = mysqli_real_escape_string($conn, $_GET['id']);

$result_produtos_login = "SELECT * FROM usuario WHERE login LIKE '$login' && id='$id' LIMIT 1";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while ($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)) {}

$result_produtos_tema = "SELECT * FROM app_config WHERE user_id='$id' LIMIT 1";
$resultado_produtos_tema = mysqli_query($conn, $result_produtos_tema);
while ($row_produto_tema = mysqli_fetch_assoc($resultado_produtos_tema)) {
  $id2 = $row_produto_tema['user_id'];
}

if ($id2 == $id) {
  
  echo "<script>alert('O tema deste usuário ja existe!!!'); window.location='/1-admin-usuarios.php';</script>";

} else if ($id2 < $id) {

  $app_name = "GLMod ConfigMods";
  $app_logo = "https://i.imgur.com/RoL3UI1.png";
  $logo_height = "150";
  $logo_width = "150";
  $app_qsTileIcon = "https://i.imgur.com/FNyYKck.png";
  $background_color = "#ff595959";
  $card_color = "#ff363636";
  $text_color = "#ffffffff";
  $button_color = "#ff595959";
  $icon_color = "#ffffffff";
  $border_color = "#ff595959";
  $app_dialog_config_background_color = "#ff595959";
  $app_config_item_background_color = "#ff363636";
  $app_dialog_success_background_color = "#ff595959";
  $app_dialog_success_text_color = "#ffffffff";
  $app_dialog_error_background_color = "#ff595959";
  $app_text_check_user = "Nome de usuario: {username} <br> Expira em: {validate} <br> Dias restantes: {days} <br> Conexoes: {connections}|{limit_connections}";
  $app_dialog_error_text_color = "#ffffffff";

  $result_usuario = "INSERT INTO app_config SET app_name = '$app_name',
app_logo = '$app_logo',
logo_height = '$logo_height',
logo_width = '$logo_width',
app_qsTileIcon = '$app_qsTileIcon',
background_color = '$background_color',
card_color = '$card_color',
text_color = '$text_color',
button_color = '$button_color',
icon_color = '$icon_color',
app_dialog_error_text_color = '$app_dialog_error_text_color',
border_color = '$border_color',
app_dialog_config_background_color = '$app_dialog_config_background_color',
app_config_item_background_color = '$app_config_item_background_color',
app_dialog_success_background_color = '$app_dialog_success_background_color',
app_dialog_success_text_color = '$app_dialog_success_text_color',
app_dialog_error_background_color = '$app_dialog_error_background_color',
app_text_check_user='$app_text_check_user',
user_id='$id'";
  $resultado_usuario = mysqli_query($conn, $result_usuario);
  if (mysqli_affected_rows($conn)) {
    echo "<script>alert('Tema criado com sucesso!!!'); window.location='/1-admin-usuarios.php';</script>";
  } else {
    echo "<script>alert('Tema não criado com sucesso!!!'); window.location='/1-admin-usuarios.php';</script>";
  }
}
?>